<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Http\Requests\BookPostRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BookController extends Controller
{
    public function index(): View
    {
        try {
            $books = Book::with('category')->orderBy('category_id')->orderBy('title')->get();
            return view('admin.books.index', compact('books'));
        } catch (\Exception $e) {
            \Log::error('Book index error: ' . $e->getMessage());
            return view('admin.books.index', ['books' => collect()])->with('error', 'データの取得中にエラーが発生しました。');
        }
    }

    public function show(string $id): View
    {
        $book = Book::findOrFail($id);
        return view('admin.books.show', compact('book'));
    }

    public function create(): View
    {
        $categories = Category::all();
        return view('admin.books.create', compact('categories'));
    }

    public function edit(string $id): View
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();
        return view('admin.books.edit', compact('book', 'categories'));
    }

    public function store(BookPostRequest $request): RedirectResponse
    {
        // 書籍データを一括で作成
        Book::create($request->only(['category_id', 'title', 'price']));

        //保存後、書籍一覧ページにリダイレクト
        return redirect()->route('admin.books.index')->with('success', '書籍が正常に登録されました。');
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        // バリデーション
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $book = Book::findOrFail($id);
        $book->update($request->only(['category_id', 'title', 'price']));

        return redirect()->route('admin.books.show', $id)->with('success', '書籍が正常に更新されました。');
    }

    public function destroy(string $id): RedirectResponse
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('admin.books.index')->with('success', '書籍が正常に削除されました。');
    }
}
