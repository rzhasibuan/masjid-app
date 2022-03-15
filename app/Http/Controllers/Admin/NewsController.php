<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\News;
use App\Traits\FlashAlert;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class NewsController extends Controller
{
    use FlashAlert;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $news = News::all();
        return view('admin.pages.news.index',[
            'title' => 'List news & atricles',
            'data' => $news,
            'subShowArticle' => 'active'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.pages.news.create',[
            'title' => 'Create news & articles',
            'subCreateAtricle' => 'active'
        ]);
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
                'title'=> 'required|min:5|max:191',
                'article' => 'required',
                'published' => 'required',
                'category' => 'required|max:30',
                'thumbnail' => 'required|image|mimes:jpg,jpeg,png,gif|max:521'
            ]);

            // thumbnail upload
            $thumbnailFile = '';
            if ($request->file('thumbnail')){
                $thumbnail = $request->file('thumbnail')->store('articles','public');
                $thumbnailFile = $thumbnail;
            }

            // save in db
            $news = News::create([
                'user_id' => auth()->user()->id,
                'title' => $request->title,
                'slug' => strtolower(Str::slug($request->title. '_'. time())),
                'thumbnail' => $thumbnailFile,
                'category' => $request->category,
                'article' => $request->article,
                'published' => $request->published
            ]);
            return redirect()->route('admin.news.index')->with($this->alertCreated());
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit($id)
    {
        try{
            $data = News::findOrFail($id);
            return view('admin.pages.news.edit',[
                'title' => 'Edit News & Article',
                'data' => $data,
                'subShowArticle' => 'active'
            ]);
        }catch (ModelNotFoundException $e) {
            return redirect()->route('admin.news.index')->with($this->alertNotFound());
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
        try{
            $data = News::findOrFail($id);

            $request->validate([
                'title'=> 'required|min:5|max:191',
                'article' => 'required',
                'published' => 'required',
                'category' => 'required|max:30',
                'thumbnail' => 'image|mimes:jpg,jpeg,png,gif|max:521'
            ]);

            if($request->file('thumbnail') === null) {
                $data->update([
                    'user_id' => auth()->user()->id,
                    'title' => $request->title,
                    'slug' => strtolower(Str::slug($request->title. '_'. time())),
                    'category' => $request->category,
                    'article' => $request->article,
                    'published' => $request->published
                ]);
                return redirect()->route('admin.news.index')->with($this->alertUpdated());
            }

            // thumbnail upload
            $thumbnailFile = '';
            if ($data->thumbnail && file_exists(storage_path('app/public/'. $data->thumbnail))){
                \Storage::delete('public/'.$data->thumbnail);
                $thumbnail = $request->file('thumbnail')->store('articles','public');
                $thumbnailFile = $thumbnail;
            }

            // save in db
            $data->update([
                'user_id' => auth()->user()->id,
                'title' => $request->title,
                'slug' => strtolower(Str::slug($request->title. '_'. time())),
                'thumbnail' => $thumbnailFile,
                'category' => $request->category,
                'article' => $request->article,
                'published' => $request->published
            ]);
            return redirect()->route('admin.news.index')->with($this->alertUpdated());
        }catch (ModelNotFoundException $e){
            return redirect()->route('admin.news.index')->with($this->alertDeleted());

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
            $data = News::findOrFail($id);
            if ($data->thumbnail && file_exists(storage_path('app/public/'. $data->thumbnail))){
                \Storage::delete('public/'.$data->thumbnail);
            }
            $data->delete();
            return redirect()->route('admin.news.index')->with($this->alertDeleted());
        }catch (ModelNotFoundException $e){
            return redirect()->route('admin.news.index')->with($this->alertDeleted());

        }
    }
}
