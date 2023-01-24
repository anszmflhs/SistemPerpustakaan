<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PeminjamanController extends Controller
{
    function index () {
        $peminjaman = Peminjaman::all();
        return view('peminjaman',compact('peminjaman'));
    }
    public function createPeminjaman(Request $request)
    {
        $data = $request->all();
        $rules = [
            'buku_id' => 'required',
            'anggota_id' => 'required',
        ];
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $validator->errors()
                ],
                404
            );
        }
        $buku = Buku::find($data['buku_id']);
        if (!$buku) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Ga ketemu bukunya woe'
                ],
                404
            );
        }
        $anggota = Anggota::find($data['anggota_id']);
        if (!$anggota) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Anggotanya mana woe'
                ],
                404
            );
        }
        $date = date('Y-m-md h:i:s');

        $peminjaman = Peminjaman::create(
            [
                'tanggal' => $date,
                'buku_id' => $data['buku_id'],
                'anggota_id' => $data['anggota_id'],
            ]
        );

        return response()->json([
            'status' => true,
            'data' => $peminjaman,
        ]);
    }
}
