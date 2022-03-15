<?php

namespace App\Http\Controllers\Admin;

use App\Colaboration;
use App\Http\Controllers\Controller;
use App\Traits\FlashAlert;
use Illuminate\Http\Request;

class ColaborationController extends Controller
{
    use FlashAlert;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Colaboration::all();
        return view('admin.pages.colaboration.index', [
            'title' => 'Collaboration With',
            'subColaboration' => 'active',
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
        return view('admin.pages.colaboration.create', [
            'title' => 'Collaboration With',
            'subColaboration' => 'active'
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
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png,gif|max:521',
            'link'=> 'required|min:5|max:191',
        ]);

        // thumbnail upload
        $thumbnailFile = '';
        if ($request->file('thumbnail')){
            $thumbnail = $request->file('thumbnail')->store('collaboration','public');
            $thumbnailFile = $thumbnail;
        }

        // save in db
        $news = Colaboration::create([
            'thumbnail' => $thumbnailFile,
            'link' => $request->link,
        ]);
        return redirect()->route('admin.colaboration.index')->with($this->alertCreated());
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
        $data = Colaboration::findOrFail($id);
        return view('admin.pages.colaboration.edit',[
            'title' => 'Collaboration with',
            'subColaboration' => 'active',
            'data' => $data
        ]);
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
        try{
            $data = Colaboration::findOrFail($id);

            $request->validate([
                'thumbnail' => 'image|mimes:jpg,jpeg,png,gif|max:521',
                'link'=> 'required|min:5|max:191',
            ]);

            if($request->file('thumbnail') === null) {
                $data->update([
                    'link' => $request->link,
                ]);
                return redirect()->route('admin.colaboration.index')->with($this->alertUpdated());
            }

            // thumbnail upload
            $thumbnailFile = '';
            if ($data->thumbnail && file_exists(storage_path('app/public/'. $data->thumbnail))){
                \Storage::delete('public/'.$data->thumbnail);
                $thumbnail = $request->file('thumbnail')->store('collaboration','public');
                $thumbnailFile = $thumbnail;
            }

            // save in db
            $data->update([
                'thumbnail' => $thumbnailFile,
                'link' => $request->link,
            ]);
            return redirect()->route('admin.colaboration.index')->with($this->alertUpdated());
        }catch (ModelNotFoundException $e){
            return redirect()->route('admin.colaboration.index')->with($this->alertDeleted());

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
        try{
            $data = Colaboration::findOrFail($id);
            if ($data->thumbnail && file_exists(storage_path('app/public/'. $data->thumbnail))){
                \Storage::delete('public/'.$data->thumbnail);
            }
            $data->delete();
            return redirect()->route('admin.colaboration.index')->with($this->alertDeleted());
        }catch (ModelNotFoundException $e){
            return redirect()->route('admin.colaboration.index')->with($this->alertDeleted());

        }
    }
}
