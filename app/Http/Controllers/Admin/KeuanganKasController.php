<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\KeuanganKas;
use App\Traits\FlashAlert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeuanganKasController extends Controller
{
    use FlashAlert;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $keuangan = KeuanganKas::orderBy('id','ASC')->get();
        return view('admin.pages.keuangan.index', [
            'title' => 'Kelola keuangan masjid',
            'data' => $keuangan
        ]);
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_transaksi' => 'required',
            'nominal' => 'required|numeric',
            'keterangan' => 'required'
        ]);

        $keuanganSaldo = KeuanganKas::orderBy('id','desc');
        $keuCount = $keuanganSaldo->count();

        $lastSaldo = $keuanganSaldo->first();

        if($request->jenis_catatan == "pemasukan"){
            if(!$keuCount > 0) {
                $saldo = $request->nominal;
            }else{
                $saldo = $lastSaldo->saldo + $request->nominal;
            }

            $keuangan = [
                'tanggal_transaksi' =>  $request->tanggal_transaksi,
                'nominal' => $request->nominal,
                'keterangan' => $request->keterangan,
                'jenis_catatan' => $request->jenis_catatan,
                'saldo' => $saldo,
                'user_id' => auth()->user()->id
            ];


        }elseif ($request->jenis_catatan == "pengeluaran"){
            if(!$keuCount > 0) {
                $saldo = $request->nominal;
            }else{
                if ($request->nominal >= $lastSaldo->saldo) {
                    return redirect()->route('admin.keuangan.index')->with($this->alertDanger("saldo tidak cukup"));
                }else{
                    $saldo = $lastSaldo->saldo + $request->nominal;
                }
            }

            $keuangan = [
                'tanggal_transaksi' =>  $request->tanggal_transaksi,
                'nominal' => $request->nominal,
                'keterangan' => $request->keterangan,
                'jenis_catatan' => $request->jenis_catatan,
                'saldo' => $saldo,
                'user_id' => auth()->user()->id
            ];
        }
        else{
            return redirect()->route('admin.keuangan.index')->with($this->alertNotFound());
        }

        KeuanganKas::create($keuangan);

        return redirect()->route('admin.keuangan.index')->with($this->alertCreated());


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
