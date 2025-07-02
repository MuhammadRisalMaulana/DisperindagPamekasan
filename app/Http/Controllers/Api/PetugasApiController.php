<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PetugasApiController extends Controller
{
    // GET /api/petugas
    public function index()
    {
        $data = User::whereIn('roles', ['ADMIN', 'PETUGAS'])->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar petugas & admin',
            'data' => $data
        ], 200);
    }

    // POST /api/petugas
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|unique:users,email',
            'alamat' => 'required|string',
            'phone'  => 'required|string|max:15',
            'roles'  => 'required|string|in:ADMIN,PETUGAS',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'alamat'   => $request->alamat,
            'phone'    => $request->phone,
            'roles'    => $request->roles,
            'password' => Hash::make('default123'),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'User berhasil ditambahkan',
            'data'    => $user
        ], 201);
    }
}
