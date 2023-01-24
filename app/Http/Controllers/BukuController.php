<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penerbit;
use App\Models\Pengarang;
use App\Models\Rak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        return response()->json(
            [
                'status' => true,
                'data' => $buku,
            ]
        );
    }
    public function createBuku(Request $request)
    {
        $input = $request->all();
        $rules = [
            'judul' => 'required',
            'tahun_terbit' => 'required',
            'jumlah' => 'required',
            'isbn' => 'required',
            'pengarang_id' => 'required',
            'penerbit_id' => 'required',
            'rak_id' => 'required',
        ];

        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $validator->errors()
                ],
                400
            );
        }
        $pengarang = Pengarang::find($input['pengarang_id']);
        if (!$pengarang) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Pengarang Not Found'
                ],
                404
            );
        }
        $penerbit = Penerbit::find($input['penerbit_id']);
        if (!$penerbit) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Penerbit Not Found'
                ],
                404
            );
        }
        $rak = Rak::find($input['rak_id']);
        if (!$rak) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Rak Not Found'
                ],
                404
            );
        }
        $buku = Buku::create($input);
        return response()->json(
            [
                'status' => true,
                'data' => $buku,
            ]
            );
    }
}
