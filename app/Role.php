<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // Разрешаем заполнение указанных атрибутов в таблице БД.
    protected $fillable = ['name'];
    public function users()
    {
        return $this->belongsToMany(App\User::class);
        // Строку следует читать так:
        // «Эта сущность (роль) относится ко многим пользователям»;
        // вернуть множество этих пользователей».

        // То же самое можно было бы записать иначе:
        // $this->belongsToMany('App\User');
    }
}
