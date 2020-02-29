<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id','user_id', 'body',
    ];

    Public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    Public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
}
