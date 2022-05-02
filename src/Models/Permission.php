<?php

namespace Veldman\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Veldman\Admin\Factories\PermissionFactory;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];

    protected static function newFactory()
    {
        return PermissionFactory::new();
    }
}
