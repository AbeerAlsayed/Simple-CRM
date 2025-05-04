@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-4">إنشاء مشروع جديد</h2>

        <form action="{{ route('projects.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block font-medium">عنوان المشروع</label>
                <input type="text" name="title" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">الوصف</label>
                <textarea name="description" class="w-full border rounded p-2" rows="4"></textarea>
            </div>

            <div class="mb-4">
                <label class="block font-medium">تاريخ التسليم</label>
                <input type="date" name="deadline" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">الحالة</label>
                <select name="status" class="w-full border rounded p-2">
                    <option value="pending">قيد الانتظار</option>
                    <option value="in_progress">قيد التنفيذ</option>
                    <option value="completed">مكتمل</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-medium">إسناد لمستخدم</label>
                <select name="assigned_user_id" class="w-full border rounded p-2">
                    <option value="">-- اختر مستخدمًا --</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-medium">إسناد لعميل</label>
                <select name="assigned_client_id" class="w-full border rounded p-2">
                    <option value="">-- اختر عميلًا --</option>
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">إنشاء</button>
        </form>
    </div>
@endsection
