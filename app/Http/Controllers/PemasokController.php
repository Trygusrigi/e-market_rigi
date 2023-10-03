<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePemasokRequest;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use PDOException;
use App\Models\Pemasok;
use Illuminate\Support\Facades\DB;

class PemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data['pemasok'] = Pemasok::orderBy('created_at', 'DESC')->get();
            return view('pemasok.index')->with($data);
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
    { {
            try {
                $data['pemasok'] = Pemasok::orderBy('created_at', 'DESC')->get();
                return view('pemasok.index')->with($data);
            } catch (QueryException | Exception | PDOException $error) {
                return 'Terjadi Kesalahan' . $error->getMessage();
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\StorePemasokRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $requestall = $request->all();
            // $requestall['kode'] = rand(1222333, 4444555);
            // return $requestall;
            Pemasok::create($requestall);

            DB::commit();

            return redirect('pemasok')->with('success', 'Data Pemasok berhasil di tambahkan!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            return 'Terjadi Kesalahan' . $error->getMessage();
            // $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request\UpdatePemasokRequest  $request
     * @param  \App\Models\Pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePemasokRequest $request, Pemasok $pemasok)
    { {
            $pemasok->update($request->all());
            return redirect('pemasok')->with('success', 'Update data berhasil!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemasok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemasok $pemasok)
    {
        try {
            DB::beginTransaction();
            $pemasok->delete();
            DB::commit();
            return redirect('pemasok')->with('success', 'Data Berhasil Di Hapus');
        } catch (QueryException | Exception | PDOException $error) {
            return 'Terjadi Kesalahan' . $error->getMessage();
        }
    }
}
