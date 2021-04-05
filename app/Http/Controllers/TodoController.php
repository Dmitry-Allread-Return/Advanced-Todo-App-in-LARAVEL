<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Models\Step;
use App\Models\Todo;
// use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index() {
        $todos = auth()->user()->todos->sortBy('completed');
        // $todos = Todo::orderBy('completed')->get();
        // return view('todos.index')->with(['todos' => $todos]);
        return view('todos.index', compact('todos'));
    }

    public function create() {
        return view('todos.create');
    }

    public function show(Todo $todo)
    {
        return view('todos.show', compact('todo'));
    }

    public function store(TodoCreateRequest $request) {
        $todo = auth()->user()->todos()->create($request->all());
        if($request->step) {
            foreach($request->step as $step) {
                $todo->steps()->create(['name' => $step]);
            }
        }
        // uploading image
        return redirect(route('todo.index'))->with('message', 'Todo created successfully');
    }

    public function edit(Todo $todo) {
        return view('todos.edit', compact('todo'));
    }

    public function update(TodoCreateRequest $request, Todo $todo) {
        $todo->update(['title' => $request->title, 'description' => $request->description]);
        if($request->stepName) {
            foreach($request->stepName as $key => $value) {
                $id = $request->stepId[$key];
                if(!$id) {
                    $todo->steps()->create(['name' => $value]);
                } else {
                    $step = Step::find($id);
                    $step->update(['name' => $value]);
                }
            }
        }
        return redirect(route('todo.index'))->with('message', 'Updated!');
    }

    public function complete(Todo $todo) 
    {
        $todo->update(['completed' => true]);
        return redirect()->back()->with('message', 'Task Marked as completed!');
    }

    public function incomplete(Todo $todo) 
    {
        $todo->update(['completed' => false]);
        return redirect()->back()->with('message', 'Task Marked as Incompleted!');
    }

    public function destroy(Todo $todo) 
    {
        $todo->steps->each->delete();
        $todo->delete();
        return redirect()->back()->with('message', 'Task Deleted!');
    }
}
