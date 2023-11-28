
    <h1>Список пользователей</h1>

    <table>
        <thead>
            <tr>
                <th>Имя</th>
                <th>Email</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}">Редактировать</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Вы уверены?')">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('users.create') }}">Создать пользователя</a>
