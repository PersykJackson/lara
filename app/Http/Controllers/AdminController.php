<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    private const DEFAULT_TAB_URL = 'admin/info';

    private Admin $model;

    /**
     * @param Admin $admin
     */
    public function __construct(Admin $admin)
    {
        $this->model = $admin;
    }

    /**
     * @return RedirectResponse
     */
    public function index(): RedirectResponse
    {
        return Redirect::to(self::DEFAULT_TAB_URL);
    }

    /**
     * @param string $tab
     * @return View
     */
    public function show(string $tab): View
    {
        return view('admin.index', ['tabs' => $this->model->getTabsList(), 'selectedTab' => $tab]);
    }
}
