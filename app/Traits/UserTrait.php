<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait UserTrait
{
    protected static function bootUserTrait()
    {
        static::creating(function ($model) {
            $oauth = auth()->user();
            $model->user_id = $oauth['id'];
        });
    }
    public function getImageAttribute($val)
    {
        return $val ? Storage::disk('public')->url($val) : '';
    }
}
