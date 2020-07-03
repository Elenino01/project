<?php

namespace App\Policies;

use App\Message;
use App\User;
use App\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class MessagePolicy
{
    use HandlesAuthorization;

    /**
     * Обуславливает просмотр любого сообщения.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Обуславливает просмотр конкретного сообщения.
     *
     * @param  \App\User  $user
     * @param  \App\Message  $message
     * @return mixed
     */
    public function view(User $user, Message $message)
    {
        return true;
    }

    /**
     * Обуславливает создание сообщений.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Обуславливает обновление (редактирование) конкретного сообщения.
     *
     * @param  \App\User  $user
     * @param  \App\Message  $message
     * @param  \App\Role  $role
     * @return mixed
     */
    public function update(User $user, Message $message)
    {
        
        return $user->id === $message->user_id;
        return $user->id === $role->user_id;
    }

    /**
     * Обуславливает логическое удаление конкретного сообщения.
     *
     * @param  \App\User  $user
     * @param  \App\Message  $message
     * @return mixed
     */
    public function delete(User $user, Message $message)
    {
        // Может ли данный пользователь удалить данное сообщение?
        return $user->id === $message->user_id;
    }

    /**
     * Обуславливает восстановление конкретного сообщения.
     *
     * @param  \App\User  $user
     * @param  \App\Message  $message
     * @return mixed
     */
    public function restore(User $user, Message $message)
    {
        return $user->id === $message->user_id;
    }

    /**
     * Обуславливает физическое удаление конкретного сообщения.
     *
     * @param  \App\User  $user
     * @param  \App\Message  $message
     * @return mixed
     */
    public function forceDelete(User $user, Message $message)
    {
        return $user->id === $message->user_id;
    }
}
