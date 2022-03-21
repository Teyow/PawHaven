<?php

namespace App\Http\Controllers\Auth\Features;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use App\Models\PetProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminAdoption extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('features.adminadopt');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('features.addpet');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'type' => 'required',
            'breed' => 'required',
            'gender' => 'required',
            'stage' => 'required',
            'age' => 'required',
            'unit' => 'required',

            'size' => 'required',
            'color' => 'required',
            'personality' => 'required',
            'healthInfo' => 'required',
            'about' => 'required',

            'imageFile' => 'required',
            'imageFile.*' => 'mimes:jpeg,png,jpg',
        ], $messages = [
            'imageFile.required' => 'The image file field is required!',
            'imageFile.*.mimes' => 'The file must be a in a type of jpg, jpeg, png!',
        ]);

        if ($validator->fails()) {
            return redirect('adoption/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            if ($request->hasFile('imageFile')) {

                $pet = Pet::create([
                    'name' => $request->input('name'),
                    'type' => $request->input('type'),
                    'breed' => $request->input('breed'),
                    'gender' => $request->input('gender'),
                    'stage' => $request->input('stage'),
                    'age' => $request->input('age'),
                    'unit' => $request->input('unit'),
                    'is_adopted' => 0,
                    'is_visited' => 0,
                ]);

                //$healthInfoString = implode(",", $request->input('healthInfo'));

                foreach ($request->file('imageFile') as $file) {
                    //$name = $file->getClientOriginalName();
                    ////$request->file('imageFile')->storeAs('pet', $pet->id . '/' . $name, '');

                    //dump($request->all());

                    //$image = PetImage::create([
                    //    'pet_id' => $pet->id,
                    //    'pet_image' => $name,
                    //]);

                    $name = $file->getClientOriginalName();
                    $file->move(public_path() . '/pet/' .  $pet->id . '/', $name);
                    $imgData[] = $name;
                }

                //$fileImage = new PetProfile();
                //$fileImage->pet_image = json_encode($imgData);
                //$fileImage->save();

                $petProfile = PetProfile::create([
                    'pet_id' => $pet->id,
                    'size' => $request->input('size'),
                    'color' => $request->input('color'),
                    'personality' => $request->input('personality'),
                    'healthInfo' => json_encode($request->input('healthInfo')),
                    'about' => $request->input('about'),
                    'pet_image' => json_encode($imgData)
                ]);

                return redirect('/adoption/create')->with('success', 'Pet has been added!');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('features.viewpet', [
            'pets' => Pet::findOrFail($id),
            'petprofiles' => PetProfile::where('pet_id', $id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    public function schedule($id)
    {
        return view('features.scheduleavisit', [
            'pets' => Pet::findOrFail($id),
            'petprofiles' => PetProfile::where('pet_id', $id)->get(),
        ]);
    }

    public function success($id)
    {
        return view('features.successschedule', [

            'pets' => Pet::findOrFail($id),
            'petprofiles' => PetProfile::where('pet_id', $id)->get(),

        ]);
    }
}
