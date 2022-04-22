<?php

namespace Level7up\Dashboard\Http\Controllers;

use Illuminate\Http\Request;
use Level7up\Dashboard\DataTables\UserDataTable;
use Level7up\Dashboard\Http\Controllers\Controller;


class UsersController extends Controller
{
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('dashboard::pages.users.index');
    }
    public function show()
    {
        abort(403, 'Fuck You.');
    }
}
