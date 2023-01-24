<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PengembalianController extends Controller
{
    public function createPengembalian(Request $request)
    {
        $input = $request->all();
        $rules = [
            'tanggal_pengembalian' => 'required',
            'denda' => 'required',
            'anggota_id' => 'required',
            'petugas_id' => 'required',
            'peminjaman_id' => 'required',
        ];

        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()
            ], 400);
        }

        $anggota = Anggota::find($input['anggota_id']);
        if (!$anggota) {
            return response()->json([
                'status' => false,
                'message' => 'Anggota not found'
            ], 404);
        }

        $petugas = Petugas::find($input['petugas_id']);
        if (!$petugas) {
            return response()->json([
                'status' => false,
                'message' => 'Petugas not found'
            ], 404);
        }
        $peminjaman = Peminjaman::find($input['peminjaman_id']);
        if (!$peminjaman) {
            return response()->json([
                'status' => false,
                'message' => 'Peminjaman not found'
            ], 404);
        }

        $pengembalian = Pengembalian::create($input);

        return response()->json([
            'status' => true,
            'data' => $pengembalian
        ]);
    }
}
