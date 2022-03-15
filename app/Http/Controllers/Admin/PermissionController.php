<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Traits\FlashAlert;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    use FlashAlert;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $permissions = Permission::orderBy('created_at','desc')->paginate(10);
        return view('admin.pages.permission.index', compact('permissions'),[
            'subPermission' => 'active',
            'title' => 'Data Permission'

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.pages.permission.create',[
            'subPermission' => 'active',
            'title' => 'Tambah Permission'
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
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255', 'unique:permissions'],
            'display_name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ]);

        Permission::create([
            'name' => $request->input('name'),
            'display_name' => $request->input('display_name'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('admin.permission.index')->with($this->alertCreated());
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        try {
            $permission = Permission::findOrFail($id);

            return view('admin.pages.permission.edit', compact('permission'),[
                'subPermission' => 'active',
                'title' => 'Ubah Permission'
            ]);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.permission.index')->with($this->alertNotFound());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $permission = Permission::findOrFail($id);

            $this->validate($request, [
                'name' => ['required', 'string', 'max:255', 'unique:permissions,name,' . $id],
                'display_name' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'max:255'],
            ]);

            $permission->update([
                'name' => $request->input('name'),
                'display_name' => $request->input('display_name'),
                'description' => $request->input('description'),
            ]);

            return redirect()->route('admin.permission.index')->with($this->alertUpdated());
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.permission.index')->with($this->alertNotFound());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $permission = Permission::findOrFail($id);
            $permission->delete();
            return redirect()->route('admin.permission.index')->with($this->alertDeleted());
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.permission.index')->with($this->alertNotFound());
        }
    }
}
