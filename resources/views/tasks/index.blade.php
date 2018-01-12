@extends('layouts.app')

@section('content')
@if (Auth::check())
        <?php $user = Auth::user(); ?>
        {{ $user->name }}
    @else

<div class="center jumbotron">
        <div class="text-center">
           
            {!! link_to_route('signup.get', '新規ユーザー登録', null, ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
    </div>
     @endif
      @include('users.users', ['users' => $users])

    <h1>タスク一覧</h1>

    @if (count($tasks) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>進捗</th>
                    <th>タスク</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!}</td>
                        <td>{{ $task->status }}</td>
                        <td>{{ $task->content }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
 {!! link_to_route('tasks.create', '新規タスクの投稿', null, ['class' => 'btn btn-primary']) !!}
@endsection