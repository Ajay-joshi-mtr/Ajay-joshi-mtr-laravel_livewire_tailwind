<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Filters\PermissionFilter;

class Permission extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    protected $fillable = ['id', 'group', 'name', 'description'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    /**
     * The roles that belong to the permissions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class)
            ->withPivot('owner_restricted')
            ->using(PermissionRole::class);
    }

    public function newEloquentBuilder($query)
    {
        return new PermissionFilter($query);
    }
}
