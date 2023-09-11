<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use App\Models\Role;
use App\Models\user_role;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('dashboard.profile.index', [
            "title" => "Profile",
            'profile' => Profile::where('user_id', auth()->user()->id)->get()


        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.profile.create', [
            "title" => "Create Profile",

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfileRequest $request)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'kelas' => 'required',
            'alamat' => 'required'
        ]);
        $validateData['user_id'] = auth()->user()->id;

        Profile::create($validateData);

        return redirect('/profile')->with('success', 'Profile berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {

        return view('dashboard.profile.edit', [
            'title' => 'Update Profil',
            'profile' => $profile,
            'roles' => Role::orderBy('nama', 'ASC')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfileRequest  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request, Profile $profile)
    {
        $rules = [
            'nama' => 'required',
            'nim' => 'required',
            'kelas' => 'required',
            'alamat' => 'required'
        ];


        $validateData = $request->validate($rules);
        $validateData['user_id'] = auth()->user()->id;

        Profile::where('id', $profile->id)
            ->update($validateData);



        // User
        $validatedUser = $request->validate([
            'username' => 'required|max:255|min:3',
            'password' => 'required'
        ]);

        $validatedUser['password'] = Hash::make($validatedUser['password']);

        User::where('id', auth()->user()->id)
            ->update($validatedUser);



        return redirect('/profile')->with('success', ' Profile berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
