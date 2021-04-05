@extends('/todos.layout')

@section('content')
	<div class="flex justify-between border-b pb-4 px-3">
		<h1 class="text-2xl pb-4">Update this todo-list</h1>
		<a href="{{route('todo.index')}}" class="mx-5 text-gray-400 py-2 cursor-pointer text-white">
			<span class="fa fa-arrow-left" />
		</a>
	</div>
	
	<x-alert/>
	<form action="{{route('todo.update', $todo->id)}}" method="post" class="py-5">
		@csrf
		@method('patch')
			
		<div class="py-1">
			<input type="text" name="title" value="{{$todo->title}}" class="py-2 px-2 border rounded">
		</div>
		<div class="py-1">
			<textarea name="description" class="p-2 rounded border" placeholder="Description">{{$todo->description}}</textarea>
		</div>
		<div class="py-2">			
			@livewire('edit-step', ['steps' => $todo->steps])	
		</div>
		<div class="py-1">
			<input type="submit" value="Update" class="p-2 border rounded">
		</div>	
	</form>

@endsection