<?php namespace App\Controllers\Agreement;

use App\Controllers\BaseController;

class Agreement extends BaseController
{
    public function dashboard()
    {
        return view('agreement/dashboard');
    }
}
