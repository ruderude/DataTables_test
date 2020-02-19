<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'posts';

    protected $fillable = [
        'user_id','title', 'body',
    ];

    /**
     * リレーション (従属の関係)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() // 単数形
    {
        return $this->belongsTo('App\User');
    }
}
