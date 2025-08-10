<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $data = User::with('divisi')->orderBy('id','asc')->get();
        return view('pages.users.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $divisi = Divisi::all();
        return view('pages.users.create',compact('divisi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // echo "================================";
        // echo $request->is_super_admin;
        // echo $request->is_read;
        // echo "================================";
        
        $request->validate([
            'name' => ['unique:users,name'],
            'email' => ['unique:users,email'],
        ],[
            'name.unique' => 'Nama user sudah ada di database',
            'email.unique' => 'Email user sudah ada di database',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->divisi_id = $request->divisi_id;
        $user->keterangan = $request->keterangan;
        
        if ($request->is_super_admin == 1){
            $user->is_super_admin = 1;
            $user->is_read = 1; 
            $user->is_create = 1; 
            $user->is_update = 1; 
            $user->is_delete = 1; 
        }else{
            $user->is_super_admin = 0;
            $user->is_read = $request->has('is_read') ? 1 : 0;
            $user->is_create =  $request->has('is_create') ? 1 : 0;
            $user->is_update =  $request->has('is_update') ? 1 : 0;
            $user->is_delete =  $request->has('is_delete') ? 1 : 0;
        }
                
        $user->save();

        return redirect()->to('users')->with('success', 'Data user berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->to('users')->with('success', 'Data user berhasil dihapus');
    }
}
