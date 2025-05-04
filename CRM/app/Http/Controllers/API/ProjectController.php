<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // عرض جميع المشاريع
    public function index()
    {
        // تحميل المشاريع مع بيانات العميل والمستخدم
        $projects = Project::with(['client', 'user'])->get();
        return response()->json($projects, 200);
    }

    // عرض تفاصيل المشروع
    public function show(Project $project)
    {
        // إرجاع تفاصيل المشروع مع العميل والمستخدم
        return response()->json($project->load(['client', 'user']), 200);
    }

    // إنشاء مشروع جديد
    public function store(Request $request)
    {
        // التحقق من صحة المدخلات
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'deadline' => 'nullable|date',
            'user_id' => 'required|exists:users,id',
            'client_id' => 'required|exists:clients,id',
            'status' => 'required|in:pending,in_progress,completed',
        ]);

        // إنشاء المشروع الجديد
        $project = Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'user_id' => $request->user_id,
            'client_id' => $request->client_id,
            'status' => $request->status,
        ]);

        return response()->json($project, 201);
    }

    // تحديث المشروع
    public function update(Request $request, Project $project)
    {
        // التحقق من صحة المدخلات
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'deadline' => 'nullable|date',
            'user_id' => 'required|exists:users,id',
            'client_id' => 'required|exists:clients,id',
            'status' => 'required|in:pending,in_progress,completed',
        ]);

        // تحديث المشروع
        $project->update([
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'user_id' => $request->user_id,
            'client_id' => $request->client_id,
            'status' => $request->status,
        ]);

        return response()->json($project, 200);
    }


    public function destroy(Project $project)
    {
        $project->delete();
        return response()->json(null, 204);
    }
}
