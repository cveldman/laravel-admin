<?php

namespace Veldman\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Veldman\Admin\Factories\RoleFactory;
use Veldman\Admin\HasPermissions;

class Role extends Model
{
    use HasFactory, HasPermissions;

    protected $fillable = [
        'name',
        'slug'
    ];

    protected static function newFactory()
    {
        return RoleFactory::new();
    }
}
