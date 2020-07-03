<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    // Разрешаем заполнение указанных атрибутов в таблице БД.
    protected $fillable = ['user_id', 'title', 'content'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
        // Строку следует читать так:
        // «Эта сущность (запись в блоге) относится к одному автору;
        // вернуть этого автора.

        // То же самое можно было бы записать иначе:
        // return $this->belongsTo('App\User');
    }
    //
}
