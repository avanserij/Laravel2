<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Task;
use App\Category;
use DB;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index', compact('tasks'));
    }


    public function show($id)
    {
        $task = Task::find($id);

        return view('tasks.show', compact('task'));
    }

    public function create()
    {
        return view('tasks.create' , [
            'task' => [],
            'categories' => Category::with('children')->where('parent_id', 0) -> get(),
            'delimiter' => ''
        ]);
    

    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);


                    // Handle File Upload
            
        if ($request->hasFile('cover_image')){
            $filenameWithExt = $request->file('coverimage')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('cover_image')->getClientOriginalExtension();

            $fileNameToStore=$filename. '_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

            } else {

                $fileNameToStore = 'noimage.jpg';
            }

            //Create Post
            
            $task = new Task;
            $task->title = $request->input('title');
            $task->body = $request->input('body');
            $task_id = $request->get('task_id'); 
            //$task->user_id = auth()->user()->id; 
            $task->cover_image = $fileNameToStore;
            //if ($request->has('categories')){
            //$task->categories()->attach($request->input('categories'));
        //}
            $task->save();

            $task->categories()->sync($request->categories, false);

            return redirect('/tasks')->with('success', 'Post Created');


        }

        public function edit($id)
        {
            $task = Task::find($id);
            // Check for correct user
            //if(auth()->user()->id !==$post->user_id){
            //   return redirect('/posts')->with('error', 'Unauthorized Page');
            // }
            return view('tasks.edit')->with('task', $task);
        }

        public function update(Request $request, $id)
        {
            $this->validate($request, [
                'title' => 'required',
                'body' => 'required'
            ]);

            // Handle File Upload
            if($request->hasFile('cover_image')) {
                // Get filename with the extension
                $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $request->file('cover_image')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                // Upload Image
                $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
            }

            $task = Task::find($id);
            $task->title = $request->input('title');
            $task->body = $request->input('body');
            if($request->hasFile('cover_image')){
                        $task->cover_image = $fileNameToStore;
            }
            $task->save();


            return redirect('/tasks')->with('success', 'Post Updated');
        }

        public function destroy($id)
        {
            $task = Task::find($id);

            if($task->cover_image != 'noimage.jpg'){
             //Delete Image
               Storage::delete('public/cover_images/'.$task->cover_image);
            }

            $task->delete();
            return redirect('/tasks')->with('success', 'Post Removed');
        }


    }

