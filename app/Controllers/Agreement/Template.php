<?php namespace App\Controllers\Agreement;

use App\Controllers\BaseController;
use App\Models\Agreement\Agreement_template_model;
use App\Models\Agreement\Agreement_template_milestone_model;
use App\Models\Agreement\Agreement_template_fee_model;
use App\Models\Type_client_model;
use App\Libraries\Agreement\AgreementClauses;

class Template extends BaseController
{
    private function isAuthorized(): bool
    {
        return session()->get('isLoggedIn') == true;
    }

    // Snapshots the current (possibly unsaved) form state as a reusable template, then returns to the agreement.
    public function save($agreementId = null)
    {
        if (!$this->isAuthorized()) {
            return redirect()->to(base_url());
        }

        if ($this->request->getMethod() !== 'post') {
            return redirect()->to(base_url());
        }

        $agreementId = (int) $agreementId;
        $name = trim($this->request->getPost('template_save_name') ?? '');
        if ($name === '') {
            return redirect()->to(base_url('agreement/Agreement/detail/' . $agreementId))->with('error', 'Template name is required.');
        }

        $typeId = (int) ($this->request->getPost('type_id') ?? 0) ?: null;
        $TypeClient = new Type_client_model();
        $categoryId = $typeId ? ($TypeClient->find($typeId)['category_id'] ?? null) : null;

        $govtProcMain        = (float) ($this->request->getPost('govt_proc_main') ?? 0);
        $govtProcSpouse      = (float) ($this->request->getPost('govt_proc_spouse') ?? 0);
        $govtProcDepAbove22Fees = AgreementClauses::sanitizeFeeList($this->request->getPost('govt_proc_dep_above22') ?? []);
        $govtProcDepAbove22  = array_sum($govtProcDepAbove22Fees);
        $govtPrPnp           = (float) ($this->request->getPost('govt_pr_pnp') ?? 0);

        $TemplateModel = new Agreement_template_model();
        $templateId = $TemplateModel->insert([
            'name'           => $name,
            'type_id'        => $typeId,
            'category_id'    => $categoryId,
            'service_fee'    => (float) ($this->request->getPost('service_fee') ?? 0),
            'government_fee' => round($govtProcMain + $govtProcSpouse + $govtProcDepAbove22 + $govtPrPnp, 2),
            'govt_proc_main'        => $govtProcMain,
            'govt_proc_spouse'      => $govtProcSpouse,
            'govt_proc_dep_above22' => json_encode($govtProcDepAbove22Fees),
            'govt_pr_pnp'           => $govtPrPnp,
            'other_fee'      => (float) ($this->request->getPost('other_fee') ?? 0),
            'created_by'     => session()->get('id'),
            'insert_on'      => date('Y-m-d H:i:s'),
        ]);

        $MilestoneModel = new Agreement_template_milestone_model();
        $MilestoneModel->insertAll($templateId, $this->request->getPost('milestones') ?? []);

        $FeeModel = new Agreement_template_fee_model();
        $FeeModel->insertAll($templateId, $this->request->getPost('additional_fees') ?? []);

        return redirect()->to(base_url('agreement/Agreement/detail/' . $agreementId))->with('message', 'Agreement Template saved successfully.');
    }

    // AJAX: permanently removes a template and its milestone/fee rows.
    public function delete($templateId = null)
    {
        if (!$this->isAuthorized()) {
            return $this->response->setJSON(['success' => false]);
        }
        if ($this->request->getMethod() !== 'post') {
            return $this->response->setJSON(['success' => false]);
        }

        $templateId = (int) $templateId;
        $TemplateModel = new Agreement_template_model();
        if (!$TemplateModel->find($templateId)) {
            return $this->response->setJSON(['success' => false, 'message' => 'Template not found.']);
        }

        (new Agreement_template_milestone_model())->where('template_id', $templateId)->delete();
        (new Agreement_template_fee_model())->where('template_id', $templateId)->delete();
        $TemplateModel->delete($templateId);

        return $this->response->setJSON(['success' => true]);
    }

    // JSON snapshot of a template's fields, used to prefill the agreement form via AJAX.
    public function get($templateId = null)
    {
        if (!$this->isAuthorized()) {
            return $this->response->setJSON([]);
        }

        $templateId = (int) $templateId;
        $TemplateModel = new Agreement_template_model();
        $template = $TemplateModel->find($templateId);
        if (!$template) {
            return $this->response->setJSON([]);
        }

        $MilestoneModel = new Agreement_template_milestone_model();
        $FeeModel = new Agreement_template_fee_model();

        return $this->response->setJSON([
            'type_id'         => $template['type_id'],
            'service_fee'     => $template['service_fee'],
            'government_fee'  => $template['government_fee'],
            'govt_proc_main'        => $template['govt_proc_main'],
            'govt_proc_spouse'      => $template['govt_proc_spouse'],
            'govt_proc_dep_above22' => AgreementClauses::depAbove22Fees($template),
            'govt_pr_pnp'           => $template['govt_pr_pnp'],
            'other_fee'       => $template['other_fee'],
            'milestones'      => $MilestoneModel->getByTemplateId($templateId),
            'additional_fees' => $FeeModel->getByTemplateId($templateId),
        ]);
    }
}
