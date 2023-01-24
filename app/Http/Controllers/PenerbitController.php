<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenerbitController extends Controller
{
    public function index()
    {
        $penerbits = Penerbit::all();
        return response()->json(
            [
                'status' => true,
                'data' => $penerbits,
            ]
        );
    }
    public function createPenerbit(Request $request)
    {
        $data = $request->all();
        $rules = [
            'nama' => 'required',
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

        $penerbit = Penerbit::create(
            [
                'nama' => $data['nama'],
                'alamat' => $data['alamat'],
                'telp' => $data['telp'],
            ]
        );

        return response()->json([
            'status' => true,
            'data' => $penerbit,
        ]);
    }
}
