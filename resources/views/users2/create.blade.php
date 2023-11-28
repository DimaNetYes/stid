<!-- resources/views/users/create.blade.php -->


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

    <h1>Создать пользователя</h1>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <label for="name">Имя:</label>
        <input type="text" name="name" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="password">Пароль:</label>
        <input type="password" name="password" required>


        <button type="submit">Создать</button>
    </form>

