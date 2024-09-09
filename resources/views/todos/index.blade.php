<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Todo List</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to the CSS file -->

    <style>
        /* Global Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
}


/* Container */
.container {
    width: 100%;
    max-width: 600px;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
}

/* Header */
.header {
    text-align: center;
    margin-bottom: 20px;
}

.title {
    font-size: 2.5rem;
    font-weight: bold;
    background: linear-gradient(90deg, #00c6ff, #0072ff);
    color: transparent;
    background-clip: text;
    -webkit-background-clip: text;
}

/* Form Styles */
.todo-form {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}

.todo-input {
    flex-grow: 1;
    padding: 10px;
    font-size: 1rem;
    border: 2px solid #ddd;
    border-radius: 5px;
    outline: none;
    transition: border-color 0.3s ease;
}

.todo-input:focus {
    border-color: #0072ff;
}

.todo-button {
    background-color: #0072ff;
    color: white;
    padding: 10px 15px;
    margin-left: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1rem;
    transition: background-color 0.3s ease;
}

.todo-button:hover {
    background-color: #005bb5;
}

/* Todo List Styles */
.todo-list {
    list-style: none;
    margin-top: 20px;
}

.todo-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px;
    margin-bottom: 10px;
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 5px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.todo-item:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

/* Form Inside List */
.update-form {
    flex-grow: 1;
}

.todo-text {
    width: 100%;
    padding: 10px;
    font-size: 1rem;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-right: 10px;
    outline: none;
    transition: border-color 0.3s ease;
}

.todo-text:focus {
    border-color: #ffc107;
}

.update-button {
    background-color: #ffc107;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.update-button:hover {
    background-color: #e0a800;
}

/* Delete Button */
.delete-button {
    background-color: #dc3545;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.delete-button:hover {
    background-color: #c82333;
}

/* Responsive Design */
@media (max-width: 600px) {
    .todo-form {
        flex-direction: column;
    }

    .todo-button {
        margin-left: 0;
        margin-top: 10px;
        width: 100%;
    }

    .todo-text {
        margin-bottom: 10px;
    }

    .update-button {
        margin-top: 10px;
        width: 100%;
    }
}

    </style>
</head>
<body>
<x-app-layout>
    <x-slot name="header">
       
    <div class="container">
        <!-- Header -->
        <header class="header">
            <h1 class="title">Todo List</h1>
        </header>

        <!-- Add Todo Form -->
        <form action="{{ route('todos.store') }}" method="POST" class="todo-form">
            @csrf
            <input type="text" name="todo" required placeholder="Enter a new todo" class="todo-input">
            <button type="submit" class="todo-button">Add Todo</button>
        </form>

        <!-- Todo List -->
        <ul class="todo-list">
            @foreach ($todos as $index => $todo)
                <li class="todo-item">
                    <form action="{{ route('todos.update', $index) }}" method="POST" class="update-form">
                        @csrf
                        @method('PUT')
                        <input type="text" name="todo" value="{{ $todo }}" class="todo-text">
                        <button type="submit" class="update-button">Update</button>
                    </form>

                    <form action="{{ route('todos.destroy', $index) }}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
    </x-slot>

    </x-app-layout>

</body>
</html>
