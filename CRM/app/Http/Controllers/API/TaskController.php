<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // عرض جميع المهام
    public function index()
    {
        // تحميل المهام مع بيانات المشروع والمستخدم
        $tasks = Task::with(['project', 'user'])->get();
        return response()->json($tasks, 200);
    }

    // عرض تفاصيل المهمة
    public function show(Task $task)
    {
        // إرجاع تفاصيل المهمة مع المشروع والمستخدم
        return response()->json($task->load(['project', 'user']), 200);
    }

    // إنشاء مهمة جديدة
    public function store(Request $request)
    {
        // التحقق من صحة المدخلات
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'nullable|date',
            'user_id' => 'required|exists:users,id',
            'project_id' => 'required|exists:projects,id',
            'status' => 'required|in:pending,in_progress,completed',
        ]);

        // إنشاء المهمة الجديدة
        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'user_id' => $request->user_id,
            'project_id' => $request->project_id,
            'status' => $request->status,
        ]);

        return response()->json($task, 201);
    }

    // تحديث المهمة
    public function update(Request $request, Task $task)
    {
        // التحقق من صحة المدخلات
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'nullable|date',
            'user_id' => 'required|exists:users,id',
            'project_id' => 'required|exists:projects,id',
            'status' => 'required|in:pending,in_progress,completed',
        ]);

        // تحديث المهمة
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'user_id' => $request->user_id,
            'project_id' => $request->project_id,
            'status' => $request->status,
        ]);

        return response()->json($task, 200);
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json(null, 204);
    }
}
