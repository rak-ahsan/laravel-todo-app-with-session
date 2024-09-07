<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = session()->get('todos', []);
        return view('todos.index', compact('todos'));
    }

    public function store(Request $request)
    {
        $todos = session()->get('todos', []);
        $todos[] = $request->input('todo');
        session()->put('todos', $todos);
        return redirect()->route('todos.index');
    }

    public function update(Request $request, $index)
    {
        $todos = session()->get('todos', []);
        $todos[$index] = $request->input('todo');
        session()->put('todos', $todos);
        return redirect()->route('todos.index');
    }

    public function destroy($index)
    {
        $todos = session()->get('todos', []);
        unset($todos[$index]);
        $todos = array_values($todos);
        session()->put('todos', $todos);
        return redirect()->route('todos.index');
    }
}

