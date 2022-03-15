<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Traits\FlashAlert;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    use FlashAlert;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $role = Role::paginate(10);
        return view('admin.pages.role.index', [
            'roles' => $role,
            'subRole' => 'active',
            'title' => 'Roles Data',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.pages.role.create', compact('permissions'),[
            'subRole' => 'active',
            'title' => 'Add Role'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255', 'unique:roles'],
            'display_name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ]);

        $role = Role::create([
            'name' => $request->input('name'),
            'display_name' => $request->input('display_name'),
            'description' => $request->input('description'),
        ]);
//        foreach ($request->permissions_id as $p)
//        {
            $role->attachPermissions($request->input('permissions_id'));
//        }

        return redirect()->route('admin.role.index')->with($this->alertCreated());
//        dd($request->permissions_id);

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
            $role = Role::findOrFail($id);
            $permissions = Permission::all();
            $rolePermissions = $role->permissions()->get()->pluck('id')->toArray();

            return view('admin.pages.role.edit', compact('role', 'permissions', 'rolePermissions'),[
                'subRole' => 'active',
                'title' => 'Update Role'
            ]);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.role.index')->with($this->alertNotFound());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        try {
            $role = Role::findOrFail($id);

            $this->validate($request, [
                'name' => ['required', 'string', 'max:255', 'unique:roles,name,' . $id],
                'display_name' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'max:255'],
            ]);

            $role->update([
                'name' => $request->input('name'),
                'display_name' => $request->input('display_name'),
                'description' => $request->input('description'),
            ]);

            $role->syncPermissions($request->input('permissions_id'));

            return redirect()->route('admin.role.index')->with($this->alertUpdated());
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.role.index')->with($this->alertNotFound());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $role = Role::findOrFail($id);
            $role->detachPermissions($role->permissions()->get()->pluck('id')->toArray());
            $role->forceDelete();

            return redirect()->route('admin.role.index')->with($this->alertDeleted());
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.role.index')->with($this->alertNotFound());
        }
    }
}
