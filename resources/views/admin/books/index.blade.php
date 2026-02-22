<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>書籍一覧</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        h1 {
            color: #333;
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
            border-radius: 4px;
        }

        .btn {
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin: 0 1px;
            font-size: 14px;
            min-width: 80px;
            height: 40px;
            line-height: 1;
            vertical-align: top;
        }

        .btn1 {
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin: 0 1px;
            font-size: 14px;
            min-width: 80px;
            height: 40px;
            line-height: 1;
            vertical-align: top;
        }


        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn:hover {
            opacity: 0.8;
        }

        .action-buttons {
            display: flex;
            gap: 5px;
            align-items: center;
            justify-content: flex-start;
        }
    </style>
</head>
<body>
    <h1>書籍一覧</h1>
    
    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    @if(session('message'))
    <div style='color:blue'>
        {{ session('message') }}
    </div>
    @endif

    @if(session('error'))
    <div style='color:red; background-color: #f8d7da; padding: 10px; margin-bottom: 20px; border: 1px solid #f5c6cb; border-radius: 4px;'>
        {{ session('error') }}
    </div>
    @endif

    <a href="{{ route('admin.books.create') }}" class="btn btn-primary">新規登録</a>

    <table>
        <tr>
            <th>ID</th>
            <th>タイトル</th>
            <th>価格</th>
            <th>操作</th>
        </tr>
        @foreach ($books as $book)
        <tr>
            <td>
                <a href="{{ route('admin.books.show', $book->id) }}">
                {{ $book->id }}
                </a>
            </td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->price }}</td>
            <td class="action-buttons">
                <a href="{{ route('admin.books.show', $book->id) }}" class="btn btn-primary">詳細</a>
                <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn1 btn-danger" onclick="return confirm('本当に削除しますか？')">削除</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
