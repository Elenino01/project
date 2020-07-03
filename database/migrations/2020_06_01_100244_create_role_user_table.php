<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->id();
            // Атрибут с внешним ключом на таблицу users
            $table->bigInteger('user_id') // Атрибут user_id
                  ->unsigned();            // беззнакового целого типа
            $table->index('user_id');     // Индексация user_id.
            $table->foreign('user_id')    // Внешний ключ на атрибуте user_id
                  ->references('id')      // ссылающимся на атрибут id
                  ->on('users')           // таблицы users,
                  ->onDelete('CASCADE')   // допускающим удалять кортежи role_user
                                          // с удалением связанного кортежа users
                  ->onUpdate('RESTRICT')  // и запрещающим изменение id в users
            ;

            // Атрибут с внешним ключом на таблицу roles
            $table->bigInteger('role_id') // Атрибут role_id
                  ->unsigned();            // беззнакового целого типа
            $table->index('role_id');     // Индексация user_id.
            $table->foreign('role_id')            
                  ->references('id')      // ссылающимся на атрибут id
                  ->on('roles')           // таблицы roles,
                  ->onDelete('CASCADE')   // допускающим удалять кортежи role_user
                                          // с удалением связанного кортежа roles
                  ->onUpdate('RESTRICT')  // и запрещающим изменение id в roles
            ;

            // Можно создать составной первичный ключ,
            // заодно запрещая дублирование кортежей,
            // но пока мы не будем этого делать.
            // $table->primary(['user_id', 'role_id']);
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
        Schema::dropIfExists('role_user');
    }
}
