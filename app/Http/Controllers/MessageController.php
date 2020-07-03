<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMessageRequest;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Выбираем из БД все сообщения.
        $messages = Message::all();

        // Выводим перечень сообщений.
        return view('messages.index', [
            'messages' => $messages,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Создаём новое сообщение в оперативной памяти.
        $message = new Message();

        // Выводим форму создания сообщения.
        return view('messages.create', [
            'message' => $message,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMessageRequest $request)
    {
        // Извлекаем поля формы из запроса.
        $attributes = $request->only(['title', 'content']);

        $attributes['user_id'] = $request->user()->id;

        // Сохраняем сообщение в БД.
        $message = Message::create($attributes);

        // Перенаправляем клиент на страницу с конкретным сообщением.
        return redirect(route('messages.show', $message->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        // Выводим страницу с конкретным сообщением.
        return view('messages.show', [
            'message' => $message,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        // Выводим форму редактирования сообщения.
        return view('messages.edit', [
            'message' => $message,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        // Извлекаем поля формы из запроса.
        $attributes = $request->only(['title', 'content']);

        // Обновляем сообщение в БД.
        $message->update($attributes);

        // Перенаправляем клиент на страницу с перечнем сообщений.
        return redirect(route('messages.index'));
    }

    /**
     * Показать форму для удаления указанного ресурса.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function remove(Message $message)
    {
        // Выводим форму удаления сообщения.
        return view('messages.remove', [
            'message' => $message,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        // Удаляем сообщение из БД.
        $message->delete();

        // Перенаправляем клиент на страницу с перечнем оставшихся сообщений.
        return redirect(route('messages.index'));
    }

    public function __construct()
    {
        $this->authorizeResource(Message::class);
    }
}
