<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskPostRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::all(['task_id', 'task_title', 'task_body', 'task_duetime', 'task_iscompleted']);
        return view("task.view", ["tasks" => $tasks]);
    }

    public function create()
    {
        return view("task.create");
    }

    public function store(TaskPostRequest $taskPostRequest)
    {
        $task = new Task();
        $task->task_title = $taskPostRequest->title;
        $task->task_body = $taskPostRequest->body;
        $task->task_iscompleted = false;
        $task->task_duetime = $taskPostRequest->duetime;

        $task->save();
        return redirect()->route("task.index")->with("success");
    }

    public function edit($task_id)
    {
        $task = Task::where("task_id", $task_id)->first(['task_id', 'task_title', 'task_body', 'task_duetime']);
        return view("task.edit", ["task" => $task]);
    }

    public function update($task_id, TaskUpdateRequest $taskUpdateRequest)
    {
        Task::where("task_id", $task_id)->update([
            "task_title" => $taskUpdateRequest->title,
            "task_body" => $taskUpdateRequest->body,
            "task_duetime" => $taskUpdateRequest->duetime
        ]);

        return redirect()->route("task.index")->with("success");
    }

    public function destroy($task_id)
    {
        Task::where("task_id", $task_id)->delete();
        return redirect()->route("task.index")->with("success");
    }

    public function completed($task_id, $cur_task_completion)
    {
        Task::where("task_id", $task_id)->update([
            "task_iscompleted" => !$cur_task_completion
        ]);
        return redirect()->route("task.index")->with("success");
    }
}
