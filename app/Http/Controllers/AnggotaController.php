<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggotas = Anggota::all();
        return response()->json(
            [
                'status' => true,
                'data' => $anggotas,
            ]
        );
    }
    public function createAnggota(Request $request)
    {
        $data = $request->all();
        $rules = [
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
        ];

        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $validator->errors()
                ],
                400
            );
        }

        $anggota = Anggota::create(
            [
                'nama' => $data['nama'],
                'jenis_kelamin' => $data['jenis_kelamin'],
                'alamat' => $data['alamat'],
                'telp' => $data['telp'],
            ]
        );

        return response()->json([
            'status' => true,
            'data' => $anggota,
        ]);
    }
}
