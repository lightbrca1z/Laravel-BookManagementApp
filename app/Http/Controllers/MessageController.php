<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Message;

class MessageController extends Controller
{
    public function index(): View
    {
        $messages = Message::all();
        return view('messages.index', ['messages' => $messages]);
    }

    public function store(Request $request): RedirectResponse
    {
        $message = new Message();
        $message->body = $request->body;
        $message->save();
        return redirect()->route('messages.index');
    }

    public function destroy(string $id): RedirectResponse
    {
        Message::destroy($id);
        return redirect()->route('messages.index');
    }

    public function destroyAll(): RedirectResponse
    {
        Message::truncate();
        return redirect()->route('messages.index');
    }
}
