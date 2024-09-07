@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Todo List</h1>
    <form action="{{ route('todos.store') }}" method="POST">
        @csrf
        <input type="text" name="todo" required>
        <button type="submit">Add Todo</button>
    </form>

    <ul>
        @foreach ($todos as $index => $todo)
            <li>
                <form action="{{ route('todos.update', $index) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PUT')
                    <input type="text" name="todo" value="{{ $todo }}">
                    <button type="submit">Update</button>
                </form>

                <form action="{{ route('todos.destroy', $index) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection
