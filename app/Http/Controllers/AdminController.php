<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Contracts\View\View;

class AdminController extends Controller
{
    /**
     * @param Admin $admin
     * @param string $tab
     * @return View
     */
    public function index(Admin $admin, string $tab): View
    {
        return view('admin.index', ['tabs' => $admin->getTabsList(), 'selectedTab' => $tab]);
    }
}
