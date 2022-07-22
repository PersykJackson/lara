<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Admin extends Model
{
    use HasFactory;

    /**
     * @return array
     */
    public function getTabsList(): array
    {
        $tabs = Storage::disk('tabViews')->allFiles();

        return array_map(fn ($tab) => str_replace('.blade.php', '', $tab), $tabs);
    }
}
