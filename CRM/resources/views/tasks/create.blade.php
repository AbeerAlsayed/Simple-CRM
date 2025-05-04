@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-4">إنشاء مهمة جديدة</h2>

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block font-medium">عنوان المهمة</label>
                <input type="text" name="title" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">الوصف</label>
                <textarea name="description" class="w-full border rounded p-2" rows="4"></textarea>
            </div>

            <div class="mb-4">
                <label class="block font-medium">تاريخ التسليم</label>
                <input type="date" name="due_date" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">الحالة</label>
                <select name="status" class="w-full border rounded p-2">
                    <option value="pending">قيد الانتظار</option>
                    <option value="in_progress">قيد التنفيذ</option>
                    <option value="completed">مكتملة</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-medium">إسناد لمستخدم</label>
                <select name="user_id" class="w-full border rounded p-2">
                    <option value="">-- اختر مستخدمًا --</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-medium">المشروع</label>
                <select name="project_id" class="w-full border rounded p-2">
                    <option value="">-- اختر مشروعًا --</option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-medium">مهمة رئيسية (اختياري)</label>
                <select name="parent_task_id" class="w-full border rounded p-2">
                    <option value="">-- لا يوجد --</option>
                    @foreach($tasks as $task)
                        <option value="{{ $task->id }}">{{ $task->title }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">إنشاء</button>
        </form>
    </div>
@endsection
