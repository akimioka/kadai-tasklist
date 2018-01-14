@extends('layouts.app')

@section('content')
@if (Auth::check())      
<?php $user = Auth::user(); ?>
        {{ $user->name }}
 <div class="row">
            <aside class="col-md-4">
                {!! Form::open(['route' => 'tasks.store']) !!}
                    <div class="form-group">
                        {!! Form::label('status', '進捗:') !!}
                        {!! Form::text('status', old('status'), ['class' => 'form-control', 'rows' => '5']) !!}
                        {!! Form::label('content', 'タスク:') !!}
                        {!! Form::text('content', old('content'), ['class' => 'form-control', 'rows' => '5']) !!}
                    </div>
                    {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
                {!! Form::close() !!}
            </aside>
            <div class="col-xs-8">
                @if (count($tasks) > 0)
                    @include('tasks.tasks', ['tasks' => $tasks])
                @endif
                </div>
        </div>
        


    
     

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
        
    @else
    <div class="center jumbotron">
        <div class="text-center">
           
            {!! link_to_route('signup.get', '新規ユーザー登録', null, ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
    </div>
    @endif

@endsection