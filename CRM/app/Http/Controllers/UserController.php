<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
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
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            if ($image->isValid()) {
                $user->addImage($image);
            } else {
                return response()->json(['message' => 'Invalid image upload'], 400);
            }
        }


        return response()->json(new UserResource($user), 201);
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

        // تحديث بيانات المستخدم بدون تعيين القيم الفارغة
        $user->update(array_filter([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : null,
        ]));

        // إذا كانت هناك صورة جديدة، استبدلها بالصورة القديمة
        if ($request->hasFile('image')) {
            try {
                $image = $request->file('image');
                if ($image->isValid()) {
                    // حذف الصورة القديمة فقط بعد التأكد من صحة الصورة الجديدة
                    $user->clearMediaCollection('images');
                    $user->addImage($image);
                }
            } catch (\Exception $e) {
                return response()->json(['message' => 'Image upload failed: ' . $e->getMessage()], 400);
            }
        }

        return response()->json(new UserResource($user), 200);
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
