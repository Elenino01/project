<?php

namespace Tests\Feature;

use App\User;
use App\Message;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MessageTest extends TestCase
{
    /**
     * Trait, отменяющий изменения в БД
     * после выполнения каждого тестового варианта.
     */
    //use RefreshDatabase;

    /**
     * Тестирование вставки сообщения в таблицу БД.
     *
     * @return void
     */
    public function testInsertingIntoDatabase()
    {
        // Метод factory() возвращает фабрику объектов класса Message.
        // Метод create() создаёт соответствующий кортеж в БД.
        // Ссылка на объект записывается в переменную $message.
        $message = factory(Message::class)->create();

        // assertDatabaseHas() проверяет таблицу на наличие указанных данных.
        // $message->getTable() возвращает имя таблицы БД ⁠— messages.
        // $message->toArray() возвращает массив значений свойств.
        $this->assertDatabaseHas($message->getTable(), $message->toArray());
    }

    /**
     * Тест изменения кортежа в таблице БД.
     *
     * @return void
     */
    public function testUpdatingInDB()
    {
        // Создаём объект в ОЗУ и кортеж в БД.
        $old_message = factory(Message::class)->create();
        // Создаём ещё один объект, но только в ОЗУ.
        $new_message = factory(Message::class)->make();
        // Обновляем кортеж данными из второго объекта.
        $old_message->update($new_message->toArray());
        // Проверяем, обновлён ли кортеж.
        $this->assertDatabaseHas(
            $old_message->getTable(),
            $new_message->toArray()
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
        $message = factory(Message::class)->create();
        // Удаляем кортеж.
        $message->delete();
        // Проверяем, удалён ли кортеж.
        $this->assertDatabaseMissing($message->getTable(), $message->toArray());
    }
}
