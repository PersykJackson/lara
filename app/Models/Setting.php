<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class Setting extends Model
{
    use HasFactory;

    private const URL = '/admin/settings';

    /**
     * @param array $settings
     * @return RedirectResponse
     */
    public function updateSettings(array $settings): RedirectResponse
    {
        $fieldChanged = false;

        foreach (self::all() as $setting) {
            $newValue = $settings[$setting->short_title];

            if ($setting->value !== $newValue) {
                $setting->value = $newValue;
                $setting->save();
                $fieldChanged = true;
            }
        }

        if ($fieldChanged) {
            return Redirect::to(self::URL);
        }

        return Redirect::back()->withErrors(['Changed 0 fields']);
    }
}
