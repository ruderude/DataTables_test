<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'comments';

    protected $fillable = [
        'user_id', 'post_id', 'body',
    ];
}
