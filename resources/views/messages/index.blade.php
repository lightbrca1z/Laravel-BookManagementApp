<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>メッセージ</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 40px;
        }

        main {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
        }

        h1 {
            margin-top: 0;
            font-size: 24px;
            color: #333;
            border-bottom: 2px solid #ccc;
            padding-bottom: 10px;
        }

        form.message-form {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        input[type="text"] {
            flex: 1;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 8px 14px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .delete-all-form {
            text-align: right;
            margin-bottom: 20px;
        }

        .delete-all-form button {
            background-color: #dc3545;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .delete-all-form button:hover {
            background-color: #c82333;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            background: #f0f0f0;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        li form {
            margin: 0;
        }

        li button {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 6px 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        li button:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <main>
        <h1>メッセージ</h1>

        <form class="message-form" action="{{ route('messages.store') }}" method="POST">
            @csrf
            <input type="text" name="body" placeholder="メッセージを入力" required>
            <input type="submit" value="投稿">
        </form>

        @if(count($messages))
            <form class="delete-all-form" action="{{ route('messages.destroyAll') }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('本当に全削除しますか？')">全件削除</button>
            </form>
        @endif

        <ul>
            @foreach($messages as $message)
                <li>
                    <span>{{ $message->body }}</span>
                    <form action="{{ route('messages.destroy', $message->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('削除しますか？')">削除</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </main>
</body>
</html>
