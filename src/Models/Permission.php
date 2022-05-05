<?php

namespace Veldman\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Veldman\Admin\Factories\PermissionFactory;

class Permission extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug'
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function getDisabledAttribute($value)
    {
        return $this->roles->map(function($item) { return (string) $item->id; });
    }

    protected static function newFactory()
    {
        return PermissionFactory::new();
    }
}
