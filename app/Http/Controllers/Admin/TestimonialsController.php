<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\testimonials;
use App\Traits\FlashAlert;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{
    use FlashAlert;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = testimonials::all();
        return view('admin.pages.testimonials.index', [
            'title' => 'Testimonials',
            'subTestimonials' => 'active',
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
        return view('admin.pages.testimonials.create', [
            'title' => 'Testimonials',
            'subTestimonials' => 'active'
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
            'qoute'=> 'required|min:5|max:191',
            'name'=> 'required|min:5|max:191',
        ]);

        // thumbnail upload
        $thumbnailFile = '';
        if ($request->file('thumbnail')){
            $thumbnail = $request->file('thumbnail')->store('testimonials','public');
            $thumbnailFile = $thumbnail;
        }

        // save in db
        $news = testimonials::create([
            'thumbnail' => $thumbnailFile,
            'qoute' => $request->qoute,
            'name' => $request->name,
        ]);
        return redirect()->route('admin.testimonials.index')->with($this->alertCreated());
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
        $data = testimonials::findOrFail($id);
        return view('admin.pages.testimonials.edit',[
            'title' => 'Testimonials',
            'subTestimonials' => 'active',
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
            $data = testimonials::findOrFail($id);
            $request->validate([
                'thumbnail' => 'image|mimes:jpg,jpeg,png,gif|max:521',
                'qoute'=> 'required|min:5|max:191',
                'name'=> 'required|min:5|max:191',
            ]);

            if($request->file('thumbnail') === null) {
                    $data->update([
                    'qoute' => $request->qoute,
                    'name' => $request->name,
                ]);
                return redirect()->route('admin.testimonials.index')->with($this->alertCreated());
            }
            // thumbnail upload
            $thumbnailFile = '';
            if ($data->thumbnail && file_exists(storage_path('app/public/'. $data->thumbnail))){
                \Storage::delete('public/'.$data->thumbnail);
                $thumbnail = $request->file('thumbnail')->store('testimonials','public');
                $thumbnailFile = $thumbnail;
            }

            // save in db
            $data->update([
                'thumbnail' => $thumbnailFile,
                'qoute' => $request->qoute,
                'name' => $request->name,
            ]);
            return redirect()->route('admin.testimonials.index')->with($this->alertCreated());
        }catch (ModelNotFoundException $e){
            return redirect()->route('admin.testimonials.index')->with($this->alertNotFound());

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
            $data = testimonials::findOrFail($id);
            if ($data->thumbnail && file_exists(storage_path('app/public/'. $data->thumbnail))){
                \Storage::delete('public/'.$data->thumbnail);
            }
            $data->delete();
            return redirect()->route('admin.testimonials.index')->with($this->alertDeleted());
        }catch (ModelNotFoundException $e){
            return redirect()->route('admin.testimonials.index')->with($this->alertDeleted());

        }
    }
}
