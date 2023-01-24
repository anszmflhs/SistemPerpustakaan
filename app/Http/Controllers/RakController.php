<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RakController extends Controller
{
    public function index()
    {
        $raks = Rak::all();
        return response()->json(
            [
                'status' => true,
                'data' => $raks,
            ]
        );
    }
    public function createRak(Request $request)
    {
        $data = $request->all();
        $rules = [
            'code_rak' => 'required',
            'lokasi' => 'required',
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

        $rak = rak::create(
            [
                'code_rak' => $data['code_rak'],
                'lokasi' => $data['lokasi'],
            ]
        );

        return response()->json([
            'status' => true,
            'data' => $rak,
        ]);
    }
}
