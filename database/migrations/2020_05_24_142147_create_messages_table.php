<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
             $table->bigInteger('user_id') // Атрибут user_id целого типа,
                ->unsigned();           // беззнаковый.
             $table->index('user_id');     // Индексация user_id.
             $table->foreign('user_id')    // Внешний ключ на атрибуте user_id
                 ->references('id')      // ссылается на атрибут id
                 ->on('users')           // в таблице users.
                 ->onDelete('CASCADE')   // Записи удаляются с пользователем.
                 ->onUpdate('RESTRICT'); // Изменять id в users нельзя.
            $table->string('title', 255)
                ->unique();
            $table->text('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
