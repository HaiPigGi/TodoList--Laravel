<?php

namespace App\Http\Controllers\todo;

use App\Http\Controllers\Controller;
use App\Models\todoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
class todoController extends Controller
{
    /**
     * View ToDos listing.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $todoList = todoModel::where('user_id', Auth::id())->paginate(7);

        return view('todo.list', compact('todoList'));
    }
    /** Create Function TO add Todo to database
     * 
     * @param Request $request
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);
        // Create a new Todo instance
        $todo = new todoModel();
    
        // Set the Todo attributes
        $todo->name = $validatedData['name'];
        $todo->user_id = Auth::user()->id;
    
        // Save the Todo to the database
        $todo->save();
        // Redirect to the index page or wherever you prefer
        return redirect()->route('todos.index');
    }
    public function update($id)
    {
        $todo = todoModel::findOrFail($id);
        $todo->complete = !$todo->complete;
        $todo->save();
    
        // Redirect back to the index page or wherever you prefer
        return redirect()->route('todos.index')->with('success', 'Todo status updated successfully');
    }
    
    
}
