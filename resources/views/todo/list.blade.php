<!-- resources/views/todo/list.blade.php -->

@extends('layouts.app')  <!-- Assuming you have a layout file, adjust as needed -->

@section('content')

<style>
    body {
        background: url('https://r4.wallpaperflare.com/wallpaper/885/751/661/rain-artwork-women-earring-wallpaper-9b06dcbde3413ff955041b099dec4cf0.jpg') center/cover no-repeat fixed;
    }

    .card {
        background: rgba(255, 255, 255, 0.8);
        border: none; /* Menghilangkan border kartu */
    }

    .card-header {
        background-color: rgba(255, 255, 255, 0.8);
        border-bottom: none; /* Menghilangkan border bawah judul kartu */
    }
</style>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Todo List
                        <span class="float-right">
                            @if(Auth::check())
                                User: {{ Auth::user()->name }}
                            @endif
                        </span>
                    </div>

                    <div class="card-body">
                        <!-- Display success message if exists -->
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- Display Todo List -->
                        @if ($todoList->count() > 0)
                            <ul class="list-group">
                                @foreach ($todoList as $todo)
                                    <li class="list-group-item">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span>{{ $todo->name }}</span>
                                            <div class="btn-group">
                                                <form action="{{ route('todos.update', $todo->id) }}" method="post">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-success">
                                                        {{ $todo->complete ? 'Mark Incomplete' : 'Mark Complete' }}
                                                    </button>
                                                </form>
                                                <input type="checkbox" class="form-check-input" {{ $todo->complete ? 'checked' : '' }} disabled>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>No todos found.</p>
                        @endif

                        <!-- Add Todo Form -->
                        <form action="{{ route('todos.store') }}" method="post" class="mt-3">
                            @csrf
                            <div class="form-row">
                                <div class="col-8">
                                    <label for="name" class="sr-only">New Todo:</label>
                                    <input type="text" name="name" class="form-control" placeholder="Add a new todo..." required>
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block">Add Todo</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
