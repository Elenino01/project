<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function messages()
    {
    
        return $this->hasMany(Message::class);
        // Строку следует читать так:
        // «Эта сущность (пользователь) относится ко многим записям в блоге;
        // вернуть множество этих записей»

        // То же самое можно было бы записать иначе:
        // $this->hasMany('App\Message');
    }
    public function roles()
    {
        return $this->belongsToMany(App\Role::class);
        // Строку следует читать так:
        // «Эта сущность (пользователь) относится ко многим ролям;
        // вернуть множество этих ролей».
                
        // То же самое можно было бы записать иначе:
        // $this->belongsToMany('App\Role');
    }
}
