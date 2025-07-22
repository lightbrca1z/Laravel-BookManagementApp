<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>書籍詳細</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        .container {
            background-color: white;
            padding: 20px;
            border: 1px solid #ddd;
            max-width: 600px;
            margin: auto;
        }

        h1 {
            color: #333;
            border-bottom: 2px solid #333;
            padding-bottom: 8px;
        }

        .book-info {
            margin-top: 20px;
        }

        .book-info dt {
            font-weight: bold;
            margin-top: 10px;
        }

        .book-info dd {
            margin-left: 0;
            margin-bottom: 10px;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            color: #0066cc;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .btn {
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin: 0 5px;
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

        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
            border-radius: 4px;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            align-items: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>書籍詳細</h1>
        
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <dl class="book-info">
            <dt>ID:</dt>
            <dd>{{ $book->id }}</dd>

            <dt>タイトル:</dt>
            <dd>{{ $book->title }}</dd>

            <dt>価格:</dt>
            <dd>{{ $book->price }} 円</dd>

            <dt>作成日:</dt>
            <dd>{{ $book->created_at }}</dd>

            <dt>更新日:</dt>
            <dd>{{ $book->updated_at }}</dd>
        </dl>
        
        <div class="action-buttons">
            <a href="{{ route('admin.books.edit', $book->id) }}" class="btn btn-primary">修正</a>
            <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('本当に削除しますか？')">削除</button>
            </form>
            <a href="{{ route('admin.books.index') }}">← 書籍一覧に戻る</a>
        </div>
    </div>
</body>
</html>
