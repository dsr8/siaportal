<?php
namespace App\Controllers;
use App\Models\Birthday_model;

class Birthday extends BaseController
{
    protected $birthdayModel;

    public function __construct(){
        $this->birthdayModel = new Birthday_model();
    }

    public function index(){
        if (session()->get('isLoggedIn') != true) {
            return redirect()->to('index');
        }
        $data['list'] = $this->birthdayModel->getAll();
        return view('birthday/index', $data);
    }

    public function add(){
        if (session()->get('isLoggedIn') != true) {
            return redirect()->to('index');
        }

        if ($this->request->getMethod() === 'post') {
            $data = [
                'name'  => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'dob'   => $this->request->getPost('dob'),
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $this->birthdayModel->addBirthday($data);
            session()->setFlashdata('success', 'Birthday added successfully.');
            return redirect()->to(base_url().'/Birthday');
        }
        return view('birthday/add');
    }

    public function edit($id){
        if (session()->get('isLoggedIn') != true) {
            return redirect()->to('index');
        }

        if ($this->request->getMethod() === 'post') {
            $data = [
                'name'  => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'dob'   => $this->request->getPost('dob'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $this->birthdayModel->updateBirthday($id, $data);
            session()->setFlashdata('success', 'Birthday updated successfully.');
            return redirect()->to(base_url().'/Birthday');
        }
        $data['row'] = $this->birthdayModel->find($id);
        return view('birthday/edit', $data);
    }

    public function delete($id){
        if (session()->get('isLoggedIn') != true) {
            return redirect()->to('index');
        }
        $this->birthdayModel->deleteBirthday($id);
        session()->setFlashdata('success', 'Birthday removed.');
        return redirect()->to(base_url().'/Birthday');
    }

    // Consumed by admininclude/header.php's ribbon/balloon + "Happy Birthday" widget.
    public function today(){
        if (session()->get('isLoggedIn') != true) {
            return $this->response->setJSON(['status' => false, 'rows' => []]);
        }
        $rows = $this->birthdayModel->getToday();
        return $this->response->setJSON(['status' => true, 'rows' => $rows]);
    }
}
