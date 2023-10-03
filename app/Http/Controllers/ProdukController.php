<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\produk;
use App\Http\Requests\StoreprodukRequest;
use App\Http\Requests\UpdateprodukRequest;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data['produk'] = Produk::orderBy('created_at', 'DESC')->get();
            return view('produk.index')->with($data);
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreprodukRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreprodukRequest $request)
    {
        try {
            DB::beginTransaction();
            Produk::create($request->all());

            DB::commit();

            return redirect('produk')->with('success', 'Data produk berhasil di tambahkan!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateprodukRequest  $request
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateprodukRequest $request, produk $produk)
    {
        $produk->update($request->all());
        return redirect('produk')->with('success', 'Update data berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(produk $produk)
    {
        try {
            DB::beginTransaction();
            $produk->delete();
            DB::commit();
            return redirect('produk')->with('success', 'Data Berhasil Di Hapus');
        } catch (QueryException | Exception | PDOException $error) {
            return 'Terjadi Kesalahan' . $error->getMessage();
        }
    }
}
