<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\KegiatanMasjid;
use App\Traits\FlashAlert;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KegiatanMasjidController extends Controller
{
    use FlashAlert;
    /**
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = KegiatanMasjid::orderBy('tanggal_mulai', 'desc')->get();
        return view('admin.pages.kegiatan.index', [
            'subKegiatan' => 'active',
            'title' => 'Jadwal Kegiatan Pengajian',
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
        return view('admin.pages.kegiatan.create',[
            'title' => 'Tambah Kegiatan Jadwal Pengajian',
            'subKegiatanCreate' => 'active'
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
            'deskripsi' => 'required',
            'tanggal_mulai' => 'required',
            'jam_mulai' => 'required',
            'tanggal_akhir' => 'required',
            'jam_akhir' => 'required',
            'lokasi' => 'required',
            'published' => 'required',
        ]);


        // save in db
        $kegiatan = KegiatanMasjid::create([
            'judul' => $request->judul,
            'slug' => strtolower(Str::slug($request->title. '_'. time())),
            'deskripsi' => $request->deskripsi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'jam_mulai' => $request->jam_mulai,
            'tanggal_akhir' => $request->tanggal_akhir,
            'jam_akhir' => $request->jam_akhir,
            'lokasi' => $request->lokasi,
            'published' => $request->published
        ]);
        return redirect()->route('admin.kegiatan.index')->with($this->alertCreated());
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
            $data = KegiatanMasjid::findOrFail($id);
            return view('admin.pages.kegiatan.edit',[
                'title' => 'Ubah kegiatan jadwal pengajian',
                'data' => $data,
            ]);
        }catch (ModelNotFoundException $e) {
            return redirect()->route('admin.kegiatan.index')->with($this->alertNotFound());
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
            $data = KegiatanMasjid::findOrFail($id);

            $request->validate([
                'judul'=> 'required|min:5|max:191',
                'deskripsi' => 'required',
                'tanggal_mulai' => 'required',
                'jam_mulai' => 'required',
                'tanggal_akhir' => 'required',
                'jam_akhir' => 'required',
                'lokasi' => 'required',
                'published' => 'required',
            ]);


            // save in db
            $data->update([
                'judul' => $request->judul,
                'slug' => strtolower(Str::slug($request->title. '_'. time())),
                'deskripsi' => $request->deskripsi,
                'tanggal_mulai' => $request->tanggal_mulai,
                'jam_mulai' => $request->jam_mulai,
                'tanggal_akhir' => $request->tanggal_akhir,
                'jam_akhir' => $request->jam_akhir,
                'lokasi' => $request->lokasi,
                'published' => $request->published
            ]);
            return redirect()->route('admin.kegiatan.index')->with($this->alertUpdated());
        }catch (ModelNotFoundException $e){
            return redirect()->route('admin.kegiatan.index')->with($this->alertNotFound());
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
            $data = KegiatanMasjid::findOrFail($id);
            $data->delete();
            return redirect()->route('admin.kegiatan.index')->with($this->alertDeleted());
        }catch (ModelNotFoundException $e){
            return redirect()->route('admin.kegiatan.index')->with($this->alertNotFound());
        }
    }
}
