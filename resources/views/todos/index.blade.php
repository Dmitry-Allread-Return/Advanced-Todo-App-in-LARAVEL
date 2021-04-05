@extends('todos.layout')

@section('content')
<div class="flex justify-between border-b pb-4 px-3">
	<h1 class="text-2xl">All Your Todos</h1>
	<a href="{{route('todo.create')}}" class="mx-5 text-blue-400 py-2 cursor-pointer text-white">
		<span class="fa fa-plus-circle" />
	</a>
</div>
	<ul class="my-5">
		<x-alert/>
			@forelse($todos as $todo) 
				<li class="flex justify-between p-2">
					<div>
						@include('todos.complete-button')
					</div>


					@if($todo->completed)
					<p class="line-through">{{$todo->title}}</p>
					@else
					<a class="cursor-pointer" href="{{route('todo.show', $todo->id)}}">{{$todo->title}}</a>
					@endif


					<div>
						<a href="{{route('todo.edit', $todo->id)}}" class="text-yellow-500 cursor-pointer text-white"><span class="fas fa-edit px-2"></span></a>

						<span onclick="event.preventDefault();
											if(confirm('Are you really want to delete?')) {
												document.getElementById('form-delete-{{$todo->id}}')
												.submit(); 
											}"
								class="fas fa-trash px-2 text-red-500 cursor-pointer"></span>

						<form style="display: none;" 
								id="{{'form-delete-'.$todo->id}}" 
								method="post" 
								action="{{route('todo.destroy', $todo->id)}}">
							@csrf
							@method('delete')
						</form>
					</div>
				</li>
			@empty
				<p>No task available. Create one!</p>
			@endforelse
	</ul>

@endsection

