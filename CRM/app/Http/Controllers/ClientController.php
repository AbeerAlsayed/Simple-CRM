<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // إنشاء عميل جديد
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'vat' => 'required|string|max:255',
            'address' => 'required|string',
        ]);

        $client = Client::create($request->all());

        return response()->json($client, 201);
    }

    // عرض جميع العملاء
    public function index()
    {
        $clients = Client::all();
        return response()->json($clients);
    }

    // عرض عميل معين
    public function show(Client $client)
    {
        return response()->json($client);
    }

    // تحديث عميل معين
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'vat' => 'required|string|max:255',
            'address' => 'required|string',
        ]);

        $client->update($request->all());

        return response()->json($client);
    }

    // حذف عميل معين
    public function destroy(Client $client)
    {
        $client->delete();

        return response()->json(['message' => 'Client deleted successfully']);
    }
}
