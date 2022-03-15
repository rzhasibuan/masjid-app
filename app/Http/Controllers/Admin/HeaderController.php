<?php

namespace App\Http\Controllers\Admin;

use App\Header;
use App\Http\Controllers\Controller;
use App\Traits\FlashAlert;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    use FlashAlert;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header = Header::get();
        if($header->count() > 0){
           return redirect()->route('admin.header.edit',$header->first()->id);
        }else{
            return view('admin.pages.header.index',[
                'title' => 'Setting header',
                'subHeader' => 'active'
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
            'bigTitle'=> 'required|min:5|max:191',
            'text' => 'required',
            'linkButton'=> 'required|min:5|max:191',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png,gif|max:521'
        ]);

        // thumbnail upload
        $thumbnailFile = '';
        if ($request->file('thumbnail')){
            $thumbnail = $request->file('thumbnail')->store('header','public');
            $thumbnailFile = $thumbnail;
        }

        // save in db
        $news = Header::create([
            'bigtitle' => $request->bigTitle,
            'thumbnail' => $thumbnailFile,
            'text' => $request->text,
            'linkButton' => $request->linkButton,
        ]);
        return redirect()->route('admin.header.index')->with($this->alertCreated());
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $data = Header::findOrFail($id);
        return view('admin.pages.header.edit',[
            'title' => 'Setting header',
            'subHeader' => 'active',
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
            $data = Header::findOrFail($id);

            $request->validate([
                'bigTitle'=> 'required|min:5|max:191',
                'text' => 'required',
                'linkButton'=> 'required|min:5|max:191',
                'thumbnail' => 'image|mimes:jpg,jpeg,png,gif|max:521'
            ]);

            if($request->file('thumbnail') === null) {
                $data->update([
                    'bigtitle' => $request->bigTitle,
                    'text' => $request->text,
                    'linkButton' => $request->linkButton,
                ]);
                return redirect()->route('admin.header.index')->with($this->alertUpdated());
            }

            // thumbnail upload
            $thumbnailFile = '';
            if ($data->thumbnail && file_exists(storage_path('app/public/'. $data->thumbnail))){
                \Storage::delete('public/'.$data->thumbnail);
                $thumbnail = $request->file('thumbnail')->store('header','public');
                $thumbnailFile = $thumbnail;
            }

            // save in db
            $data->update([
                'bigtitle' => $request->bigTitle,
                'thumbnail' => $thumbnailFile,
                'text' => $request->text,
                'linkButton' => $request->linkButton,
            ]);
            return redirect()->route('admin.header.index')->with($this->alertUpdated());
        }catch (ModelNotFoundException $e){
            return redirect()->route('admin.header.index')->with($this->alertDeleted());

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
