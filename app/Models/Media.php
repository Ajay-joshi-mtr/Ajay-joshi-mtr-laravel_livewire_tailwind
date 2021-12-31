<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    protected $fillable = ['name', 'path', 'size', 'type', 'ext'];

    public function mediable()
    {
        return $this->morphTo();
    }
}
