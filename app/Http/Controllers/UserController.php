<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function edit(User $user)
    {
        //
        return view('dashboard.password.edit', [
            'user' => $user
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
       $rules = [
            'password' => 'required',
            'new' => 'required',
        ];

        if(!Hash::check($request->password, auth()->user()->password)){
            return redirect('/dashboard/password')->with('updateError', 'Password lama salah');
        }
        if($request->new == $request->password){
            return redirect('/dashboard/password')->with('duplicateError', 'Password baru dan lama sama');
        }
        $validatedData =  $request->validate($rules);

        $finalData = [
            'password' => bcrypt($validatedData['new'])
        ];
        //$validatedData['user_id'] = auth()->user()->id;
        //$validatedData['excerpt'] = Str::limit(strip_tags($request->body) , 50, '...');

        User::where('id', auth()->user()->id)->update($finalData);

        return redirect('/dashboard/password')->with('success', 'Password berhasil diperbarui');
    }
}
