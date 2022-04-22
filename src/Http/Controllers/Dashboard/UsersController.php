<?php

namespace Level7up\Dashboard\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\DataTables\UserDataTable;
use Level7up\Dashboard\Http\Controllers\Controller;


class UsersController extends Controller
{
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('dashboard.pages.users.index');
    }
}
