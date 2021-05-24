<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;


class TaskController extends Controller
{
    public function store(Request $request){
        // dd($request->all());
        $task= new Task;
        $this->validate($request,[
           'task'=>'required|max:100|min:5'
        ]);
        $task->task=$request->task;
        $task->save();
        return redirect()->back();
        $data=Task::all();
        return view('task')->with('accessTask',$data);
    
    }

    public function UpdateTaskAsCompleted($id){
        $task=Task::find($id);
        $task->iscompleted=1;
        $task->save();
        return redirect()->back();

    }

    public function UpdateTaskAsNotCompleted($id){
        $task=Task::find($id);
        $task->iscompleted=0;
        $task->save();
        return redirect()->back();

    }

    public function deletetask($id){
        $task=Task::find($id);
        $task->delete();
        return redirect()->back();

    }

    public function updatetask($id){
        $task=Task::find($id);
        return view('updatetaskview')->with('taskdata',$task);

    }

    public function updatetaskview(Request $request){
      $id=$request->id;
      $task=$request->updateTask;
      $data=Task::find($id);
      $data->task=$task;
      $data->save();
      $dataAll=Task::all();
      return view('task')->with('accessTask',$dataAll);

    }


}
