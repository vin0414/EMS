<?php

namespace App\Controllers;

class Home extends BaseController
{
    private $db;
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function index()
    {
        return view('welcome_message');
    }

    public function newExpense()
    {
        return view('new-expense');
    }

    public function Upload()
    {
        return view('upload');
    }

    public function manageExpenses()
    {
        return view('manage-expenses');
    }

    public function listContracts()
    {
        return view('list-contracts');
    }

    public function generateExpense()
    {
        return view('generate-expense');
    }

    public function Settings()
    {
        return view('settings');
    }
}
