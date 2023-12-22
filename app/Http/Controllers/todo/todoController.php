<?php

namespace App\Http\Controllers\todo;

use App\Http\Controllers\Controller;
use App\Models\todoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class todoController extends Controller
{
    /** Create Function TO add Todo to database
     * 
     * @param Request $request
     * 
     * @return \Illuminate\Http\RedirectResponse
     */

     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'name' => ['required', 'string', 'max:255'],
         ]);
 
         // If validation passes, create a new Todo
         $todo = new todoModel();
         $todo->name = $validatedData['name'];
         // Add any other fields that you want to save
 
         // You can associate the todo with the authenticated user if needed
         $todo->user_id = auth()->user()->id;
         Log::info("Checking Id user by loggin : ".json_encode($todo->user_id));
 
         $todo->save();
 
         // Redirect to the index page or wherever you prefer
         return redirect()->route('todos.index');
     }
}
