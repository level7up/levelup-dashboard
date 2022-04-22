<?php

namespace Level7up\Dashboard\Http\Controllers;

use Level7up\Dashboard\DataTables\AdminsDataTable;
use Level7up\Dashboard\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(AdminsDataTable $dataTable)
    {
        return $dataTable->render('dashboard::pages.admin.index');
    }
}
