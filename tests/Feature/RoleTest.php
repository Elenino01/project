<?php

namespace Tests\Feature;

use App\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoleTest extends TestCase
{
    /**
     * Trait, отменяющий изменения в БД
     * после выполнения каждого тестового варианта.
     */
    //use RefreshDatabase;

    /**
     * Тестирование вставки роли в таблицу БД.
     *
     * @return void
     */
    public function testInsertingIntoDatabase()
    {
        // Метод factory() возвращает фабрику объектов класса Role.
        // Метод create() создаёт соответствующий кортеж в БД.
        // Ссылка на объект записывается в переменную $role.
        $role = factory(Role::class)->create();

        // assertDatabaseHas() проверяет таблицу на наличие указанных данных.
        // $role->getTable() возвращает имя таблицы roles.
        // $role->toArray() возвращает массив значений свойств.
        $this->assertDatabaseHas($role->getTable(), $role->toArray());
    }

    /**
     * Тест изменения кортежа в таблице БД.
     *
     * @return void
     */
    public function testUpdatingInDB()
    {
        // Создаём объект в ОЗУ и кортеж в БД.
        $old_role = factory(Role::class)->create();
        // Создаём ещё один объект, но только в ОЗУ.
        $new_role = factory(Role::class)->make();
        // Обновляем кортеж данными из второго объекта.
        $old_role->update($new_role->toArray());
        // Проверяем, обновлён ли кортеж.
        $this->assertDatabaseHas(
            $old_role->getTable(),
            $new_role->toArray()
        );
    }

    /**
     * Тест удаления кортежа из таблицы БД.
     *
     * @return void
     */
    public function testDeletingFromDB()
    {
        // Создаём объект в ОЗУ и кортеж в БД.
        $role = factory(Role::class)->create();
        // Удаляем кортеж.
        $role->delete();
        // Проверяем, удалён ли кортеж.
        $this->assertDatabaseMissing($role->getTable(), $role->toArray());
    }
}
