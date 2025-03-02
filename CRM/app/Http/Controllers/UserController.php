<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // إنشاء مستخدم جديد مع صورة
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        // إضافة الصورة إذا كانت موجودة باستخدام Media Library
        if ($request->hasFile('image')) {
            $user->addImage($request->file('image'));
        }

        return response()->json($user, 201);
    }

    // تحديث معلومات المستخدم
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
            'role' => $request->role,
        ]);

        // إذا كانت صورة جديدة، يتم حذف الصورة القديمة وتخزين الصورة الجديدة
        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إذا كانت موجودة
            $user->clearMediaCollection('images');
            // إضافة الصورة الجديدة
            $user->addImage($request->file('image'));
        }

        return response()->json($user, 200);
    }

    // الحصول على تفاصيل المستخدم
    public function show(User $user)
    {
        return response()->json($user, 200);
    }

    // حذف المستخدم
    public function destroy(User $user)
    {
        // حذف الصورة المرتبطة بالمستخدم إذا كانت موجودة
        $user->clearMediaCollection('images');

        $user->delete();

        return response()->json(null, 204);
    }
}
