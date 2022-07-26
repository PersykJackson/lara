<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $primaryKey = 'title';

    protected $keyType = 'string';

    public $incrementing = false;

    /**
     * @return HasMany
     */
    public function users(): HasMany {
        return $this->hasMany(User::class, 'role');
    }
}
