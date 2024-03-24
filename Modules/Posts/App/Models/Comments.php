<?php

namespace Modules\Posts\App\Models;

use App\Models\User;
use App\Traits\UserTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Posts\Database\factories\CommentsFactory;

class Comments extends Model
{
    use HasFactory, SoftDeletes, UserTrait;

    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function post()
    {
        return $this->belongsTo(Posts::class, 'post_id');
    }
}
