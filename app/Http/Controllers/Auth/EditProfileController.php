<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EditProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
        return view('features.editprofile', [
            'user' => User::find($id),
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
        $validator = Validator::make($request->all(), [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'contactNo' => ['required', 'string', 'max:255'],
            'file' => 'mimes:jpeg,png,jpg',
            'curr_pass' => [
                'required', function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail('Old Password didn\'t match!');
                    }
                },
            ],
            'new_pass' => ['required', 'string', 'min:8'],
            'conf_pass' => 'required | min:8 | same:new_pass',
        ], $messages = [
            'file.mimes' => 'The file must be a in a type of jpg, jpeg, png',
            'curr_pass.required' => 'The current password field must not be empty!',
            'new_pass.required' => 'The new password field must not be empty!',
            'conf_pass.required' => 'The confirm password field must not be empty!',
            'conf_pass.same' => 'Confirm password should match new password!',
        ]);

        if ($validator->fails()) {
            return redirect('editprofile/' . Auth::user()->id . '/edit')
                    ->withErrors($validator)
                    ->withInput();
        }else{

            if($request->hasFile('file')) {
                $file = $request->file('file')->getClientOriginalName();
                $request->file('file')->storeAs('profile_pics', Auth::user()->id . '/' . $file . '');

               $user = User::where('id', $id)->update([
                   'first_name' => $request->input('fname'),
                   'last_name' => $request->input('lname'),
                   'contact_no' => $request->input('contactNo'),
                   'profile_pic' => $file,
                   'password' => Hash::make($request->input('new_pass')),
               ]);

               
            }

            return redirect('editprofile/' . Auth::user()->id . '/edit')->with('success', 'Your account has been successfully updated!');

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
