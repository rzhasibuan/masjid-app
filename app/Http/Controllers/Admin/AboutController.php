<?php

namespace App\Http\Controllers\Admin;

use App\About;
use App\Http\Controllers\Controller;
use App\Traits\FlashAlert;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    use FlashAlert;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::get();
        if($about->count() > 0){
            return redirect()->route('admin.about.edit',$about->first()->id);
        }else{
            return view('admin.pages.about.index',[
                'title' => 'Setting about',
                'subAbout' => 'active'
            ]);

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required',
            'description' => 'required|max:255',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png,gif|max:521'
        ]);

        // thumbnail upload
        $thumbnailFile = '';
        if ($request->file('thumbnail')){
            $thumbnail = $request->file('thumbnail')->store('about','public');
            $thumbnailFile = $thumbnail;
        }

        // save in db
        $news = About::create([
            'thumbnail' => $thumbnailFile,
            'description' => $request->description,
            'text' => $request->text,
        ]);
        return redirect()->route('admin.about.index')->with($this->alertCreated());
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
        $data = About::findOrFail($id);
        return view('admin.pages.about.edit',[
            'title' => 'Setting About',
            'subAbout' => 'active',
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
            $data = About::findOrFail($id);

            $request->validate([
                'text' => 'required',
                'description' => 'required|max:255',
                'thumbnail' => 'image|mimes:jpg,jpeg,png,gif|max:521'
            ]);

            if($request->file('thumbnail') === null) {
                $data->update([
                    'description' => $request->description,
                    'text' => $request->text,
                ]);
                return redirect()->route('admin.about.index')->with($this->alertUpdated());
            }

            // thumbnail upload
            $thumbnailFile = '';
            if ($data->thumbnail && file_exists(storage_path('app/public/'. $data->thumbnail))){
                \Storage::delete('public/'.$data->thumbnail);
                $thumbnail = $request->file('thumbnail')->store('about','public');
                $thumbnailFile = $thumbnail;
            }

            // save in db
            $data->update([
                'thumbnail' => $thumbnailFile,
                'description' => $request->description,
                'text' => $request->text,
            ]);
            return redirect()->route('admin.about.index')->with($this->alertUpdated());
        }catch (ModelNotFoundException $e){
            return redirect()->route('admin.about.index')->with($this->alertDeleted());

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
        //
    }
}
