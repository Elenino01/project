<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRoleRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Выбираем из БД все роли.
        $roles = Role::all();

        // Выводим перечень ролей.
        return view('roles.index', [
            'roles' => $roles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Создаём новую роль в оперативной памяти.
        $role = new Role();

        // Выводим форму создания роли.
        return view('roles.create', [
            'role' => $role,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        // Извлекаем поля формы из запроса.
        $attributes = $request->only(['name']);

        // Сохраняем роль в БД.
        $role = Role::create($attributes);

        // Перенаправляем клиент на страницу с конкретным сообщением.
        return redirect(route('roles.show', $role->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        // Выводим страницу с конкретной ролью.
        return view('roles.show', [
            'role' => $role,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        // Выводим форму редактирования роли.
        return view('roles.edit', [
            'role' => $role,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        // Извлекаем поля формы из запроса.
        $attributes = $request->only(['name']);

        // Обновляем роль в БД.
        $role->update($attributes);

        // Перенаправляем клиент на страницу с перечнем ролей.
        return redirect(route('roles.index'));
    }

    /**
     * Показать форму для удаления указанного ресурса.
     *
     * @param  \App\Role $role
     * @return \Illuminate\Http\Response
     */
    public function remove(Role $role)
    {
        // Выводим форму удаления роли.
        return view('roles.remove', [
            'role' => $role,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        // Удаляем роль из БД.
        $role->delete();

        // Перенаправляем клиент на страницу с перечнем оставшихся ролей.
        return redirect(route('roles.index'));
    }
}
