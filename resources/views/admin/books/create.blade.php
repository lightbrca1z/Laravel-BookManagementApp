<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>書籍登録</title>
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

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
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
            padding: 10px 20px;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn:hover {
            opacity: 0.8;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            align-items: center;
            margin-top: 20px;
        }

        a {
            color: #0066cc;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>書籍登録</h1>
        
        @if ($errors->any())
            <div style="color: red; background-color: #f8d7da; padding: 10px; border-radius: 4px; margin-bottom: 20px;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.books.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>カテゴリ</label>
                <select name="category_id">
                    <option value="">カテゴリを選択してください</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                        @selected($category->id == old('category_id'))>    
                        {{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label>タイトル</label>
                <input type="text" name="title" value="{{ old('title') }}">
            </div>
            
            <div class="form-group">
                <label>価格</label>
                <input type="number" name="price" value="{{ old('price') }}">
            </div>
            
            <div class="action-buttons">
                <button type="submit" class="btn btn-primary">送信</button>
                <a href="{{ route('admin.books.index') }}">← 書籍一覧に戻る</a>
            </div>
        </form>
    </div>
</body>
</html>
