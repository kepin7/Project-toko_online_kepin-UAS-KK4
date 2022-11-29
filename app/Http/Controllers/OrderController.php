<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tabel = Order::all();

        return response()->json([
            "message" => "Orders",
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
            'alamat' => 'required|string',
            'kode_pos' => 'required|integer',
            'nama_pesanan' => 'required|string',
            'jumlah_pesanan' => 'required|integer',
            'jenis_pembayaran' => 'required|string',
            'tanggal' => 'required|string',
            'total_pesanan' => 'required|string'

        ]);

        $data = Order::create([
            'alamat' => $request->alamat,
            'kode_pos' => $request->kode_pos,
            'nama_pesanan' => $request->nama_pesanan,
            'jumlah_pesanan' => $request->jumlah_pesanan,
            'jenis_pembayaran' => $request->jenis_pembayaran,
            'tanggal' => $request->tanggal,
            'total_pesanan' => $request->total_pesanan
        ]);

        if ($data) {
            return response([
                'status' => 201,
                'message' => "Data Pesanan berhasil ditambahkan",
                'data' => $data
            ]);
        }else {
            return response([
                'status' => 401,
                'message' => "Data Pesanan gagal ditambahkan",
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
        $tabel = Order::find($id);
        if($tabel){
            return $tabel;
        }else{
            return ["message" => "Data Pesanan tidak ditemukan"];
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
        $data = $request->except(['_method']);
        $update = Order::where("id", $id)->update($data);

        return response()->json([
            "message" => "Data Pesanan berhasil diubah",
            "data" => $update
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tabel = Order::find($id);
        if($tabel){
            $tabel->delete();
            return ["message" => "Data Pesanan berhasil dihapus"];
        }else{
            return ["message" => "Data Pesanan tidak ditemukan"];
        }
    }
}
