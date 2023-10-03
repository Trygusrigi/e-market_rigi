<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePembelianRequest;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use PDOException;
use App\Models\Pembelian;
use App\Models\Pemasok;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lastId = Pembelian::select('kode_masuk')->orderBy('created_at','desc')->first();
        $data['kode'] = ($lastId== null?'P00000001':sprintf('P%08d', substr
        ($lastId->kode_masuk,1)+1));
        $data['pemasok'] = Pemasok::get();
        $data['barang'] = barang::get();

        return view('pembelian/index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { {
            try {
                $data['pembelian'] = Pembelian::orderBy('created_at', 'DESC')->get();
                return view('pembelian.index')->with($data);
            } catch (QueryException | Exception | PDOException $error) {
                return 'Terjadi Kesalahan' . $error->getMessage();
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\StorePembelianRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $requestall = $request->all();
            // $requestall['kode'] = rand(1222333, 4444555);
            // return $requestall;
            Pembelian::create($requestall);

            DB::commit();

            return redirect('pembelian')->with('success', 'Data Pembelian berhasil di tambahkan!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            return 'Terjadi Kesalahan' . $error->getMessage();
            // $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request\UpdatePembelianRequest  $request
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePembelianRequest $request, Pembelian $pembelian)
    { {
            $pembelian->update($request->all());
            return redirect('pembelian')->with('success', 'Update data berhasil!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembelian $pembelian)
    {
        try {
            DB::beginTransaction();
            $pembelian->delete();
            DB::commit();
            return redirect('pembelian')->with('success', 'Data Berhasil Di Hapus');
        } catch (QueryException | Exception | PDOException $error) {
            return 'Terjadi Kesalahan' . $error->getMessage();
        }
    }
}
