<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePelangganRequest;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;
use App\Models\Pelanggan;

use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data['pelanggan'] = Pelanggan::orderBy('created_at', 'DESC')->get();
            return view('pelanggan.index')->with($data);
        } catch (QueryException | Exception | PDOException $error) {
            return 'Terjadi Kesalahan' . $error->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $data['pemasok'] = Pelanggan::orderBy('created_at', 'DESC')->get();
            return view('pelanggan.index')->with($data);
        } catch (QueryException | Exception | PDOException $error) {
            return 'Terjadi Kesalahan' . $error->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\StorePelangganRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $requestall = $request->all();
            $requestall['kode_pelanggan'] = rand(5, 10);
            // return $requestall;
            Pelanggan::create($requestall);

            DB::commit();

            return redirect('pelanggan')->with('success', 'Data Pelanggan berhasil di tambahkan!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            return 'Terjadi Kesalahan' . $error->getMessage();
            // $this->failResponse($error->getMessage(), $error->getCode());
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggan $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request\UpdatePemasokRequest  $request
     * @param  \App\Models\Pelanggan $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePelangganRequest $request, Pelanggan $pelanggan)
    {
        $pelanggan->update($request->all());
        return redirect('pelanggan')->with('success', 'Update data berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggan $pelanggan)
    {
        try {
            DB::beginTransaction();
            $pelanggan->delete();
            DB::commit();
            return redirect('pelanggan')->with('success', 'Data Berhasil Di Hapus');
        } catch (QueryException | Exception | PDOException $error) {
            return 'Terjadi Kesalahan' . $error->getMessage();
        }
    }
}
