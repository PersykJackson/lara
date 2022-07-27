<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveSettingsRequest;
use App\Models\Admin;
use App\Models\Setting;
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
        return view("admin.tabs.$tab", [
            'tabs' => $this->model->getTabsList(),
            'selectedTab' => $tab,
            'settings' => Setting::all(),
        ]);
    }

    /**
     * @param SaveSettingsRequest $request
     * @param Setting $setting
     * @return RedirectResponse
     */
    public function updateSettings(SaveSettingsRequest $request, Setting $setting): RedirectResponse
    {
        return $setting->updateSettings($request->except('_token'));
    }
}
