<?php namespace App\Libraries\Agreement;

// Standard retainer-agreement clause text shared by the client-facing signing page
// and the generated PDF, so both always show identical wording.
class AgreementClauses
{
    // Each clause has an ordered list of 'blocks' rendered in sequence, since the source
    // legal text interleaves paragraphs, sub-headings, and bullet lists (e.g. clause 3's
    // bullet list sits between its opening paragraph and the "Estimated timelines" ones).
    // Block shapes: ['type' => 'p', 'text' => '...'], ['type' => 'h', 'text' => '...'],
    // ['type' => 'bullets', 'items' => ['...', '...']].
    //
    // Every clause can carry a per-agreement admin-edited override (see
    // $agreement['custom_clauses'], applied below).
    public static function all(array $agreement = []): array
    {
        return self::applyCustomOverrides(self::defaults($agreement), $agreement);
    }

    // The clause list before any per-agreement override is applied — this is what a client
    // who's never had their clauses edited actually sees, and what the clause editor UI
    // pre-fills from the first time an admin opens it for a given clause.
    public static function defaults(array $agreement = []): array
    {
        return [
            [
                'title'  => '1. INTRODUCTION',
                'blocks' => [
                    ['type' => 'p', 'text' => 'This Retainer Agreement is made between Sia Immigration Solutions Inc., a Regulated Canadian Immigration Consultant (RCIC), and the Client identified above. Sia Immigration Solutions Inc. agrees to provide immigration and related consultancy services to the Client in accordance with the terms and conditions set out in this Agreement.'],
                ],
            ],
            [
                'title'  => '2. GENERAL PROVISIONS',
                'blocks' => [
                    ['type' => 'p', 'text' => '2.1 Services provided under this agreement shall be primarily in English and any other language which the parties may wish to conveniently communicate with.'],
                    ['type' => 'p', 'text' => '2.2 The CLIENT acknowledges receipt of a copy of the "Code of Professional Conduct for College of Immigration and Citizenship Consultants Licensees" from the RCIC which is found at the following link: https://www.gazette.gc.ca/rp-pr/p2/2022/2022-06-22/html/sor-dors128-eng.html.'],
                    ['type' => 'p', 'text' => '2.3 All communications by the parties shall be carried out by way of e-mail, SMS, phone calls, fax and any other method which the parties deem convenient to ensure effective communication and transmission of information and documents.'],
                ],
            ],
            [
                'title'  => '3. THE RCIC RESPONSIBILITIES AND COMMITMENTS',
                'blocks' => [
                    ['type' => 'p', 'text' => '3.1 In consideration of the fees paid and the matter stated above, the RCIC agrees to the provision of the following services and commitments:'],
                    ['type' => 'bullets', 'items' => [
                        'Assess the CLIENT’s eligibility;',
                        'Assist the CLIENT and the CLIENT’s dependents in the preparation of his/her application for Express Entry Review Application to the Immigration, Refugee and Citizenship Canada (IRCC);',
                        'Collate the documents necessary in support of the application and advise the CLIENT as to which documents are required in support of the application;',
                        'Review, compile, and prepare case submissions and file with the relevant visa office;',
                        'Faithfully assist and update the CLIENT of on-going requirements by the visa office with respect to the CLIENT’s case;',
                        'Keep CLIENT reasonably informed of case progress including any additional assistance obtained by the RCIC;',
                        'Answer all reasonable requests from the CLIENT for information;',
                        'Provide quality immigration services and supervise employees and workers of the RCIC to ensure a qualitative standard service delivery;',
                        'Hold in strict confidence all information concerning the personal and business affairs of the CLIENT acquired during the course of the professional relationship, and not disclose such information unless disclosure is expressly or impliedly authorized by the CLIENT, is required by law, or is otherwise permitted by the rules;',
                        'Assist CLIENT with respect to the preparation for any interview granted in consideration of his/her application;',
                        'Not disclose the fact of having been consulted or retained by the CLIENT unless the nature of the matter required such disclosure;',
                        'Subject to being compelled by law or legal process, the RCIC shall preserve the CLIENT’s confidential information even after the termination of the retainer, whether or not differences have arisen between the RCIC and the CLIENT;',
                        'Ensure the safekeeping of the CLIENT’s property in accordance with the law and with reasonable care;',
                        'Return all original documents of the CLIENT used by the RCIC during the process which is no longer of any use in the application process.',
                    ]],
                    ['type' => 'h', 'text' => 'Estimated timelines'],
                    ['type' => 'p', 'text' => '3.2 The estimated timeframe for RCIC to respond to CLIENT’s communication shall be 48 to 72 business hours/2-3 business days.'],
                    ['type' => 'p', 'text' => '3.3 The estimated timeframe for RCIC to update the CLIENT of the status of delivery of any of the services hereinabove shall be 24-48 business hours / 1-2 business days.'],
                    ['type' => 'p', 'text' => '*Clauses 3.2 and 3.3 shall not be construed as an assurance or guarantee by the RCIC of the actual timeframe for completion of any part of the application process as this is totally within the exclusive control of the IRCC.'],
                ],
            ],
            [
                'title'  => '4. CLIENT’S RESPONSIBILITIES AND COMMITMENTS',
                'blocks' => [
                    ['type' => 'p', 'text' => 'The CLIENT agrees to the following:'],
                    ['type' => 'bullets', 'items' => [
                        'Provision of any necessary instructions to the RCIC in furtherance of CLIENT’s application;',
                        'Faithfully provide all information requested by the RCIC and the processing visa office as per IRCC’s instructions; the CLIENT shall be solely responsible for all the consequences for submission of false or incorrect information and any consequences arising out of any delays on the part of the CLIENT in submitting such documents;',
                        'Execute forms as required and obtain all documents and information that may be necessary for the processing of the case as per RCIC’s instructions;',
                        'Forthwith provide all supporting documentation and other evidence as requested by RCIC and only provide such documents which are legal, valid and genuine. Any inaccuracy with respect to the same may seriously affect the visa application. The CLIENT would be responsible for the adverse effect on case because of non-submission/delayed submission of required documents and other evidence;',
                        'Faithfully disclose to RCIC all information related to any and all of the CLIENT’s and dependents, current or prior criminal charges and/or convictions;',
                        'Forthwith advise RCIC of any and all communications received by the CLIENT from the processing visa office;',
                        'Provide RCIC adequate instructions at all times and more specifically of any change in information relating to address, education, training, employment, job responsibilities, marital status, criminal charges or any other information or circumstances that may render him/her inadmissible and/or have a direct impact on his/her case;',
                        'Attend all interviews as and when required by the processing visa office and promptly follow all instruction as communicated by the processing visa office, but only with consent and approval of RCIC;',
                        'Forthwith pay the processing fees levied by the processing visa office. The CLIENT would be responsible for any adverse effect on the case due to delay/non-payment of processing fee charges by immigration Authorities.',
                        'CLIENT has a duty to accept and act upon RCIC’s advise on all matters relating to his/her case;',
                        'Provide up-to-date and reliable contact information to the RCIC.',
                    ]],
                ],
            ],
            [
                'title'  => '5. METHODS OF PAYMENT',
                'blocks' => [
                    ['type' => 'h', 'text' => 'For Clients Located INSIDE Canada'],
                    ['type' => 'p', 'text' => 'We receive the following methods:'],
                    ['type' => 'bullets', 'items' => [
                        'In-person Cash Drop-Off – Please contact us to arrange a time to drop-off your payment in cash. We will provide you with a receipt.',
                        'E-transfer – Please send the payment and the answer to the secret question to the following e-mail address: mkj@siaimmigration.com',
                    ]],
                    ['type' => 'h', 'text' => 'For Clients Located OUTSIDE Canada'],
                    ['type' => 'p', 'text' => 'We receive the following methods:'],
                    ['type' => 'bullets', 'items' => [
                        'Wire Transfer',
                    ]],
                    ['type' => 'p', 'text' => '*Banks usually charge a processing fee for wire transfer, so please add a CAD $50 fee on top of your payment EVERYTIME you make a wire transfer.'],
                    ['type' => 'p', 'text' => 'TD CANADA TRUST — 500 NOTRE DAME DRIVE, KAMLOOPS, BC, CANADA V2C6T6'],
                    ['type' => 'p', 'text' => 'AC/ 5225229 | TRANSIT NO. 07900 | SWIFT CODE: TDOMCATTTOR | INSTITUTION 004'],
                    ['type' => 'p', 'text' => '*All Fees shall be made in Canadian Dollar Currency.'],
                    ['type' => 'h', 'text' => '5.1 Professional Fees Excludes'],
                    ['type' => 'p', 'text' => 'Professional fee of RCIC outlined in this agreement excludes translation costs, courier costs, medical examination costs, fax costs and bank transfer costs.'],
                ],
            ],
            [
                'title'  => '6. REFUND POLICY',
                'blocks' => [
                    ['type' => 'p', 'text' => '10.1 The CLIENT acknowledges that granting of a visa or status and the time required for processing this application is at the sole discretion of the government and not the RCIC. Therefore, in the event of a refusal of the application due to no fault of the RCIC, there are no refunds. If however, the application is denied because of an error or omission on the part of the RCIC or professional staff, the RCIC will refund all professional fees collected except the first payment stated in clause 7 and any sums paid under clause 8.1. The said fees are non-refundable whatsoever. Government fees are not refundable.'],
                    ['type' => 'p', 'text' => '10.2 The CLIENT agrees that the fees paid are for services indicated above, and any refund is strictly limited to the amount of fees paid less the non-refundable fees.'],
                    ['type' => 'p', 'text' => '10.3 The RCIC will not refund any of the professional fees charged and shall be entitled to full payment of professional fee as per this agreement if:'],
                    ['type' => 'bullets', 'items' => [
                        'The CLIENT does not cooperate in filling the application with the immigration authorities;',
                        'The application is withdrawn by the CLIENT at any stage;',
                        'The application gets rejected due to false information, misrepresentation, fraud, medical or security inadmissibility or failure by the CLIENT to adhere to the terms and conditions of this agreement;',
                        'The application gets rejected because of CLIENT’s withholding relevant information at any time during the processing of the immigration application or at the time of interview with visa officer;',
                        'CLIENT does not co-operate in the finalization of immigration case;',
                        'CLIENT fails to satisfy the immigration officer of his/her truthfulness of information submitted;',
                        'The application gets rejected for breaches of security, criminal convictions and pending charges.',
                    ]],
                ],
            ],
            [
                'title'  => '7. CHANGE POLICY',
                'blocks' => [
                    ['type' => 'p', 'text' => '7.1 The CLIENT acknowledge that if the RCIC is asked to act on the CLIENT’s behalf on matters other than those outlined above in this Agreement, or because of a material change in the CLIENT circumstances, or because of material facts not disclosed at the outset of the application, or because of a change in government legislation regarding the processing of immigration-related applications, the Agreement can be modified accordingly upon mutual agreement.'],
                    ['type' => 'p', 'text' => '7.2 Such mutual agreement shall be put down in writing and signed by the parties.'],
                ],
            ],
            [
                'title'  => '8. OTHER',
                'blocks' => [
                    ['type' => 'p', 'text' => '8.1 In the event Citizenship and Immigration Canada (CIC) or Human Resources Skills and Development Canada (HRSDC) or any other related Canadian authority should contact the CLIENT directly; the CLIENT are instructed to notify the RCIC immediately.'],
                    ['type' => 'p', 'text' => '8.2 The CLIENT is to immediately advise the RCIC of any change in the marital, family, or civil status or change of physical address or contact information for any person included in the application.'],
                    ['type' => 'p', 'text' => '8.3 The CLIENT understands that he/she must be accurate and honest in the information he/she provides and that any inaccuracies may void this agreement, or seriously affect the outcome of the application or the retention of any status he/she may obtain.'],
                    ['type' => 'p', 'text' => '8.4 Where the CLIENT is no longer able to contact the RCIC and has reason to believe the RCIC may be dead, incapacitated or otherwise unable to fulfil their duties, the CLIENT should contact the College of Immigration and Citizenship Consultants (CICC).'],
                ],
            ],
            [
                'title'  => '9. CONFIDENTIALITY & NOTICE',
                'blocks' => [
                    ['type' => 'p', 'text' => '9.1 Any notice or other communication between the parties under or in connection with this Agreement shall be in writing, addressed via email or any other platform of communication regularly used by the Parties.'],
                    ['type' => 'p', 'text' => '9.2 All information or material in oral, visual, written, electronic or other tangible or intangible form collected by the RCIC from the CLIENT shall be deemed to be Confidential Information and strictly protected indefinitely under the Code of Professional Conduct.'],
                    ['type' => 'p', 'text' => '9.3 This Confidential Information may only be disclosed subject to the provisions of article 28 (2) of the Code of Professional Conduct.'],
                    ['type' => 'p', 'text' => '9.4 In the event the CLIENT which to have a representative access the confidential information of the CLIENT, a written authorization must first be filed by the CLIENT to the RCIC naming such person as having express permission to access the confidential information.'],
                ],
            ],
            [
                'title'  => '10. DISCHARGE & TERMINATION',
                'blocks' => [
                    ['type' => 'p', 'text' => '10.1 This agreement is considered discharged upon completion of tasks identified under clause 3 & 4 of this agreement.'],
                    ['type' => 'p', 'text' => '10.2 This agreement may be terminated by the CLIENT under the applicable Canadian laws within the jurisdiction of the RCIC, at which time any outstanding fees or disbursements will be refunded by the RCIC to the CLIENTs/any outstanding fees or disbursements will be remitted by the CLIENT to the RCIC.'],
                    ['type' => 'p', 'text' => '10.3 This agreement shall be terminated by the RCIC if material changes occur to the CLIENT’s application or eligibility, which make it impossible to proceed with services detailed in clause 3 of this agreement.'],
                    ['type' => 'p', 'text' => '10.4 This agreement shall be terminated by the RCIC if at any point before discharge of the agreement, the RCIC is instructed by the CLIENT to act in a manner that is illegal under the Canadian laws or in contravention of the Code of Professional Conduct.'],
                    ['type' => 'p', 'text' => '10.5 This agreement may be terminated by the RCIC if at any point before discharge of the agreement, the RCIC believes that they have been deceived by the CLIENT and/or the CLIENT has failed to provide adequate information to the RCIC and/or the CLIENT has failed to act upon the advice of the RCIC.'],
                    ['type' => 'p', 'text' => '10.6 Where the CLIENT fails to pay the RCIC’s fees and reasonable notice has been served upon the CLIENT for payment which has not been honoured, the RCIC may terminate the agreement.'],
                    ['type' => 'p', 'text' => '10.7 The CLIENT upon reasonable believe and conviction that the RCIC is dead, incapacitated or unable to fulfil the duties under this agreement shall terminate this agreement;'],
                    ['type' => 'p', 'text' => '10.8 Upon termination, the RCIC shall:'],
                    ['type' => 'bullets', 'items' => [
                        'a) deliver to the CLIENT all documents, files and property which belong to the CLIENT;',
                        'b) give the CLIENT all the information that may be required in connection with the matter;',
                        'c) provide an invoice for all services that have been rendered or account for the time that has been spent on the CLIENT’s file;',
                        'd) promptly render an account for any outstanding Professional fees and Disbursements owed by the CLIENT;',
                        'e) Make best efforts to notify in writing, within ten (10) calendar days, any government agency where the RCIC’s name appears as representative for the CLIENT that the agreement has been terminated.',
                        'f) In the event of an unexpected termination under clause 14.7 of this agreement, the CLIENT may contact the RCIC’s office for any request of CLIENT’s confidential information and file.',
                    ]],
                    ['type' => 'p', 'text' => '10.9 This agreement may be terminated by the RCIC, provided that reasonable notice has been given to the CLIENT and the termination does not cause serious prejudice to the CLIENT.'],
                ],
            ],
            [
                'title'  => '11. DISPUTES & COMPLAINTS',
                'blocks' => [
                    ['type' => 'p', 'text' => '11.1 Any controversy or dispute between the Parties to this agreement involving the construction or application of any of the terms, provisions or conditions of this Agreement, shall first be attempted to be resolved by the RCIC.'],
                    ['type' => 'p', 'text' => '11.2 Where the parties cannot reach a resolution, the CLIENT shall provide the RCIC with a formal written complaint and allow the RCIC reasonable time to respond to the complaint.'],
                    ['type' => 'p', 'text' => '11.3 The complaint shall be sent by the CLIENT to the email address mkj@siaimmigration.com. Where it is not possible for the CLIENT to use the email service, the CLIENT may contact the RCIC by SMS or phone call at +1 - (604) – 786- 1214.'],
                ],
            ],
            [
                'title'  => '12. MISCELLANEOUS',
                'blocks' => [
                    ['type' => 'p', 'text' => 'Integration. This Agreement expresses the complete understanding of the Parties with respect to the subject matter contained herein and supersedes all prior proposals, agreements, representations and understandings relating to this subject matter.'],
                    ['type' => 'p', 'text' => 'Amendment. This Agreement may be amended by the parties in writing and the newly amended Agreement shall be signed and dated by the parties.'],
                    ['type' => 'p', 'text' => 'Acknowledgement. CLIENT acknowledges that he/she understands the provisions of this Agreement, that the Agreement is entered into knowingly and voluntarily, and that CLIENT has been afforded a sufficient amount of time to consider the Agreement and to consult with and seek the advice of any person of CLIENT’s choosing.'],
                    ['type' => 'p', 'text' => 'Governing Law. This Agreement shall be governed in accordance with the laws of the Canada.'],
                ],
            ],
        ];
    }

    // Decodes govt_proc_dep_above22 into a list of per-child fee amounts. The column stores a
    // JSON array (e.g. "[500,300]") once saved through the multi-child "+ Add Child" UI;
    // agreements saved before that existed still have a plain decimal value (e.g. "500.00"),
    // which is treated as a single-child list so old data keeps rendering correctly.
    public static function depAbove22Fees(array $agreement): array
    {
        $raw = $agreement['govt_proc_dep_above22'] ?? null;
        if ($raw === null || $raw === '') {
            return [];
        }
        $decoded = json_decode((string) $raw, true);
        $fees = is_array($decoded) ? $decoded : [$raw];
        return array_map('floatval', $fees);
    }

    // Normalizes a raw posted fee-list (array of strings/numbers from the "+ Add Child" rows,
    // or a single legacy scalar) into a clean list of positive floats, ready to be
    // json_encode()'d into govt_proc_dep_above22. Shared by Agreement::save() and Template::save().
    public static function sanitizeFeeList($raw): array
    {
        $rows = is_array($raw) ? $raw : [$raw];
        $fees = array_map('floatval', $rows);
        return array_values(array_filter($fees, fn ($fee) => $fee > 0));
    }

    // Ordered non-zero government-fee line items — ['group' => sub-heading or null, 'label' =>
    // ..., 'amount' => float] — used by the "Fees & Payment Summary" table (sign.php /
    // AgreementPdfBuilder). Falls back to a
    // single ungrouped "Government / Application Fee" line for agreements saved before this
    // breakdown existed. "Other Fee (If Any)" is folded into this same list (as an ungrouped
    // line, no sub-heading) rather than being shown as its own separate row elsewhere, so the
    // Government / Application Fee total the admin sees on the edit form always matches what's
    // itemized here.
    public static function governmentFeeLines(array $agreement): array
    {
        $depAbove22Fees = self::depAbove22Fees($agreement);
        $procRows = [
            'Main Applicant' => (float) ($agreement['govt_proc_main'] ?? 0),
            'Spouse' => (float) ($agreement['govt_proc_spouse'] ?? 0),
        ];
        $prRows = [
            'PNP Govt. Main Applicant' => (float) ($agreement['govt_pr_pnp'] ?? 0),
        ];
        $otherFee = (float) ($agreement['other_fee'] ?? 0);
        $hasProc = array_sum($procRows) > 0 || array_sum($depAbove22Fees) > 0;
        $hasPr = array_sum($prRows) > 0;

        $lines = [];
        if (!$hasProc && !$hasPr) {
            $legacyAmount = (float) ($agreement['government_fee'] ?? 0);
            if ($legacyAmount > 0) {
                $lines[] = ['group' => null, 'label' => 'Government / Application Fee', 'amount' => $legacyAmount];
            }
        } else {
            if ($hasProc) {
                foreach ($procRows as $label => $amount) {
                    if ($amount > 0) {
                        $lines[] = ['group' => 'Government Processing Fee', 'label' => $label, 'amount' => $amount];
                    }
                }
                $nonZeroDepFees = array_values(array_filter($depAbove22Fees, fn ($amount) => $amount > 0));
                $depCount = count($nonZeroDepFees);
                foreach ($nonZeroDepFees as $i => $amount) {
                    $label = $depCount > 1
                        ? 'Dependent Child (Child ' . ($i + 1) . ')'
                        : 'Dependent Child';
                    $lines[] = ['group' => 'Government Processing Fee', 'label' => $label, 'amount' => $amount];
                }
            }
            if ($hasPr) {
                foreach ($prRows as $label => $amount) {
                    if ($amount > 0) {
                        $lines[] = ['group' => 'Other Govt Fee', 'label' => $label, 'amount' => $amount];
                    }
                }
            }
        }

        if ($otherFee > 0) {
            $lines[] = ['group' => null, 'label' => 'Other Fee', 'amount' => $otherFee];
        }

        return $lines;
    }

    // Sum of governmentFeeLines() — i.e. itemized government fees + Other Fee. This is what
    // "Government / Application Fee — Total (auto-calculated)" shows on the edit form and what
    // the PDF/sign-page breakdown adds up to. Deliberately NOT the same as the raw
    // agreement['government_fee'] column, which stays itemized-only (no Other Fee) so the
    // legacy-fallback branch above keeps working for agreements saved before this breakdown
    // existed. Use this — not the raw column — anywhere "Government Fee" is displayed as a
    // single number (e.g. the "Send for eSign" email), so it always matches the form/PDF.
    public static function governmentFeeTotal(array $agreement): float
    {
        return array_sum(array_column(self::governmentFeeLines($agreement), 'amount'));
    }

    private static function money(array $agreement, $amount): string
    {
        return '$' . number_format((float) $amount, 2) . ' ' . ($agreement['currency'] ?? 'CAD');
    }

    // Replaces a clause's blocks with the admin's saved rich-text override, when one exists
    // for that index. $agreement['custom_clauses'] is a JSON object: {"<index>": "<html>"}.
    private static function applyCustomOverrides(array $clauses, array $agreement): array
    {
        $overrides = self::decodeOverrides($agreement);
        foreach ($overrides as $index => $html) {
            if (!isset($clauses[$index]) || $html === '') {
                continue;
            }
            $clauses[$index]['blocks'] = [['type' => 'html', 'html' => $html]];
        }
        return $clauses;
    }

    public static function decodeOverrides(array $agreement): array
    {
        if (empty($agreement['custom_clauses'])) {
            return [];
        }
        $decoded = json_decode((string) $agreement['custom_clauses'], true);
        if (!is_array($decoded)) {
            return [];
        }
        $overrides = [];
        foreach ($decoded as $index => $html) {
            $overrides[(int) $index] = (string) $html;
        }
        return $overrides;
    }

    // Renders one clause's blocks to an HTML string — used to pre-fill the rich-text editor,
    // both for clauses never edited before (converted from their p/h/bullets blocks) and for
    // clauses that already have a saved override (already HTML, passed through as-is).
    public static function blocksToHtml(array $blocks): string
    {
        $html = '';
        foreach ($blocks as $block) {
            if ($block['type'] === 'html') {
                $html .= $block['html'];
            } elseif ($block['type'] === 'p') {
                $html .= '<p>' . esc($block['text']) . '</p>';
            } elseif ($block['type'] === 'h') {
                $html .= '<p><strong>' . esc($block['text']) . '</strong></p>';
            } elseif ($block['type'] === 'bullets') {
                $html .= '<ul>';
                foreach ($block['items'] as $item) {
                    $html .= '<li>' . esc($item) . '</li>';
                }
                $html .= '</ul>';
            }
        }
        return $html;
    }
}
