<?php

namespace App\Http\Controllers\Admin;

use App\BantuanMasjid;
use App\Http\Controllers\Controller;
use App\Traits\FlashAlert;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class BantuanController extends Controller
{
    use FlashAlert;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = BantuanMasjid::orderBy('tanggal_akhir', 'desc')->get();
        return view('admin.pages.bantuan.index', [
            'subBantuan' => 'active',
            'title' => 'Bantuan',
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.bantuan.create',[
            'title' => 'Tambah Bantuan',
            'subBantuan' => 'active'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'=> 'required|min:5|max:191',
            'pemberi' => 'required',
            'penerima' => 'required',
            'tanggal_ambil' => 'required',
            'tanggal_akhir' => 'required',
            'lokasi' => 'required',
        ]);


        // save in db
        $kegiatan = BantuanMasjid::create([
            'judul' => $request->judul,
            'pemberi' => $request->pemberi,
            'penerima' => $request->penerima,
            'tanggal_ambil' => $request->tanggal_ambil,
            'tanggal_akhir' => $request->tanggal_akhir,
            'lokasi' => $request->lokasi,
        ]);
        return redirect()->route('admin.bantuan.index')->with($this->alertCreated());
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
        try{
            $data = BantuanMasjid::findOrFail($id);
            return view('admin.pages.bantuan.edit',[
                'title' => 'Ubah data bantuan',
                'data' => $data,
            ]);
        }catch (ModelNotFoundException $e) {
            return redirect()->route('admin.bantuan.index')->with($this->alertNotFound());
        }
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
        try {
            $data = BantuanMasjid::findOrFail($id);

            $request->validate([
                'judul'=> 'required|min:5|max:191',
                'pemberi' => 'required',
                'penerima' => 'required',
                'tanggal_ambil' => 'required',
                'tanggal_akhir' => 'required',
                'lokasi' => 'required',
            ]);


            // save in db
            $data->update([
                'judul' => $request->judul,
                'pemberi' => $request->pemberi,
                'penerima' => $request->penerima,
                'tanggal_ambil' => $request->tanggal_ambil,
                'tanggal_akhir' => $request->tanggal_akhir,
                'lokasi' => $request->lokasi,
            ]);
            return redirect()->route('admin.bantuan.index')->with($this->alertUpdated());
        }catch (ModelNotFoundException $e){
            return redirect()->route('admin.bantuan.index')->with($this->alertNotFound());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $data = BantuanMasjid::findOrFail($id);
            $data->delete();
            return redirect()->route('admin.bantuan.index')->with($this->alertDeleted());
        }catch (ModelNotFoundException $e){
            return redirect()->route('admin.bantuan.index')->with($this->alertNotFound());
        }
    }
}
