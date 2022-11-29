<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Payment;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tabel = Payment::all();

        return response()->json([
            "message" => "Payments",
            "data" => $tabel
        ], 201);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'tanggal' => 'required|string',
            'nomer_pembayaran' => 'required|string',
            'nomer_pesanan' => 'required|integer',
            'id_produk' => 'required|integer',
            'total_pesanan' => 'required|string',
            'bayar' => 'required|string',
            'kembalian' => 'required|string'
        ]);

        $data = Payment::create([
            'tanggal' => $request->tanggal,
            'nomer_pembayaran' => $request->nomer_pembayaran,
            'nomer_pesanan' =>$request->nomer_pesanan,
            'id_produk' =>$request->id_produk,
            'total_pesanan' =>$request->total_pesanan,
            'bayar' =>$request->bayar,
            'kembalian' =>$request->kembalian
        ]);

        if ($data) {
            return response([
                'status' => 201,
                'message' => "Data Pembayaran berhasil ditambahkan",
                'data' => $data
            ]);
        }else {
            return response([
                'status' => 401,
                'message' => "Data Pembayaran gagal ditambahkan",
                'data' => null
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tabel = Payment::find($id);
        if($tabel){
            return $tabel;
        }else{
            return ["message" => "Data Pembayaran tidak ditemukan"];
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}