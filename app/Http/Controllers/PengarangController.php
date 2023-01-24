<?php

namespace App\Http\Controllers;

use App\Models\Pengarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PengarangController extends Controller
{
    public function index()
    {
        $pengarangs = Pengarang::all();
        return response()->json(
            [
                'status' => true,
                'data' => $pengarangs,
            ]
        );
    }
    public function createPengarang(Request $request)
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

        $pengarang = Pengarang::create(
            [
                'nama' => $data['nama'],
                'alamat' => $data['alamat'],
                'telp' => $data['telp'],
            ]
        );

        return response()->json([
            'status' => true,
            'data' => $pengarang,
        ]);
    }
}
