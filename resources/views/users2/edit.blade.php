

@if ($errors->any())
            <div>
                <strong>Ошибки ввода данных:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


    <h1>Редактировать пользователя</h1>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Имя:</label>
        <input type="text" name="name" value="{{ $user->name }}" required>

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ $user->email }}" required>

        <label for="password">Новый пароль:</label>
        <input type="password" name="password">


        <button type="submit">Сохранить изменения</button>
    </form>

