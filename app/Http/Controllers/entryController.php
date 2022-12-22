<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class entryController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        //$tasks = Task::orderBy('id', 'asc')->get();
        $tasks = Task::where([
            ['task_title', '!=', Null],
            [function($query) use ($request){
                if(($term = $request->term)){
                    $query->orWhere('task_title','LIKE', '%' .$term . '%')->get();
                }
            }]
        ])
            ->orderBy('id', 'asc')
            ->paginate(10);
        return view('index', compact('tasks'))
            ->with('i',(request()->input('page',1) - 1)*5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $statuses = [
            [
                'label' => 'Ongoing',
                'value' => 'Ongoing',
            ],
            [
                'label' => 'Done',
                'value' => 'Done',
            ]
            ];

        
        return view('createEntry', compact('statuses'));
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $request->validate([
            'task_title'=>'required'
        ]);

        $task = new Task();

        $task->task_title = request('task_title');
        $task->description = request('description');
        $task-> status = request('status');
        $task->save();
        //return redirect('/index');

        //not working
        //return redirect()->route('index');
        //return back()->with('success', 'Task has been successfully created');
        //return redirect()->route('index')
        //->with('success', 'Task has been successfully created');
        return redirect()->route('index')->with('success', 'Task added successfully');


        /*
        $task->task_title = $request->title;
        $task->description = $request->description;
        $task->status = $request->status;
        */

      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $statuses = [
            [
                'label' => 'Ongoing',
                'value' => 'Ongoing',
            ],
            [
                'label' => 'Done',
                'value' => 'Done',
            ]
            ];
        return view('edit', compact('statuses', 'task'));
        //return redirect()->route('index')->with('success', 'Task added successfully');

        //return redirect()->route('index')
        //->with('success', 'Task has been successfully created');
        //return redirect()->route('index')->with('success', 'Task added successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $request->validate([
            'task_title' => 'required'
        ]);

        $task->task_title = request('task_title');
        $task->description = request('description');
        $task->status = request('status');
        $task->save();
        //return back();
        return redirect()->route('index')->with('success', 'Task updated successfully');

        //return redirect()->route('index')->with('success', 'Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        if ($task){
            $task->delete();
            return back();
        }
    }

  

}
