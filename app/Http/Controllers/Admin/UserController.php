<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Traits\FlashAlert;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use FlashAlert;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.pages.user.index', compact('users'),[
            'title' => 'Daftar Tamir Masjid',
            'subUser' => 'active',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.pages.user.create', compact('roles'), [
            'title' => 'Tambah anggota',
            'subUser' => 'active',

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id' => ['required']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $role = Role::find($request->role_id);
        $user->attachRole($role);
        return redirect()->route('admin.user.index')->with($this->alertCreated());
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
        try {
            $user = User::findOrFail($id);
            $roles = Role::all();

            return view('admin.pages.user.edit', compact('user', 'roles'),[
                'title' => 'Ubah Anggota',
                'subUser' => 'active',
            ]);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.user.index')->with($this->alertNotFound());
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
            $user = User::findOrFail($id);

            $this->validate($request, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
                'role_id' => ['required']
            ]);

            $user->update([
                'name' => $request->name,
                'email' => $request->email
            ]);

            $roles = $user->roles;

            foreach ($roles as $role) {
                $user->detachRole($role);
            }

            $role = Role::find($request->role_id);

            $user->attachRole($role);

            return redirect()->route('admin.user.index')->with($this->alertUpdated());
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.user.index')->with($this->alertNotFound());
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
            $user = User::findOrFail($id);

            $roles = $user->roles;

            foreach ($roles as $role) {
                $user->detachRole($role);
            }

            $user->delete();

            return redirect()->route('admin.user.index')->with($this->alertDeleted());
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.user.index')->with($this->alertNotFound());
        }
    }
}
