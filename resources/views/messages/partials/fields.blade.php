<div class="form-group">
    <label>
        Заголовок:
        <input
            type="text"
            name="title"
            value="{{ $message->title }}"
            class="form-control"
        >
    </label>
</div>

<div class="form-group">
    <label>
        Содержимое:
        <textarea
            name="content"
            class="form-control"
        >{{ $message->content }}</textarea>
    </label>
</div>