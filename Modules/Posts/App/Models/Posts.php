<?php

namespace Modules\Posts\App\Models;

use App\Traits\UserTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Posts\Database\factories\PostsFactory;

class Posts extends Model
{
    use HasFactory, SoftDeletes, UserTrait;

    protected $guarded = [];
    public function comments()
    {
        return $this->hasMany(Comments::class, 'post_id', 'id');
    }
}
