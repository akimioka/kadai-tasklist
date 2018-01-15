<div class="media-list">
@foreach ($tasks as $task)
    <?php $user = $task->user; ?>
    <div class="media">
        @if (Auth::user()->id == $task->user_id)
        <div class="media-left">
            <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
        </div>
        <div class="media-body">
            
            
            <div>
                
                <div>
                {!! $user->name!!} <span class="text-muted">posted at {{ $task->created_at }}</span>
                </div>
                <div>
                <p>{!! nl2br(e($task->content)) !!}</p>
                </div>
                    {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </div>
@endforeach
</div>
{!! $tasks->render() !!}