<?php

namespace App\Http\Controllers\Auth\Features;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use App\Models\PetProfile;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DataTables;

class AdminAdoption extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //admin datatables
        if ($request->ajax()) {
            $data = DB::table('pets')
                ->where('deleted_at', NULL)
                ->latest();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    if($row->is_adopted == 0){
                        $btn = '<a href="' . \URL::route('adoption.show', $row->id) . '" data-id="' . $row->id . '" class="btn btn-primary btn-circle btn-sm" id="viewbtn"><i class="fas fa-search"></i></a>';
                        $btn = $btn . '<a data-id="' . $row->id . '" class="btn btn-success btn-circle btn-sm ml-2" id="adoptedBtn"><i class="fas fa-home"></i></a>';
                        $btn = $btn . '<a data-id="' . $row->id . '" class="btn btn-warning btn-circle btn-sm ml-2" id="archiveBtn"><i class="fas fa-archive"></i></a>';
                        return $btn;
                    }else{
                        $btn = '<a href="' . \URL::route('adoption.show', $row->id) . '" data-id="' . $row->id . '" class="btn btn-primary btn-circle btn-sm" id="viewbtn"><i class="fas fa-search"></i></a>';
                        $btn = $btn . '<a data-id="' . $row->id . '" class="btn btn-danger btn-circle btn-sm ml-2" id="cancelBtn"><i class="fas fa-ban"></i></a>';
                        $btn = $btn . '<a data-id="' . $row->id . '" class="btn btn-warning btn-circle btn-sm ml-2" id="archiveBtn"><i class="fas fa-archive"></i></a>';
                        return $btn;
                    }

                })

                ->addColumn('status', function($row){
                    if ($row->is_adopted == 0){
                        return '<span class="badge badge-danger">Not yet adopted</span>';
                    }else{
                        return '<span class="badge badge-success">Adopted</span>';
                    }
                })

                ->addColumn('age', function($row){
                    $ageunit = $row->age . ' ' . $row->unit;
                    return $ageunit;
                })

                ->rawColumns(['action', 'age', 'status'])
                ->make(true);
        }



        // user side -- ecommerce view
        $pet = DB::table('pets')
            ->join('pet_profiles', 'pets.id', '=', 'pet_profiles.pet_id')
            ->select('pets.*', 'pet_profiles.*')
            ->where('pets.is_adopted', 0)
            ->where('pets.deleted_at', NULL)
            ->paginate(8);

        return view('features.adminadopt', [
            'pet' => $pet
        ]);
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
        return view('features.editpet', [
            'pets' => Pet::findOrFail($id),
            'petprofiles' => PetProfile::where('pet_id', $id)->get(),
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

            //'imageFile' => 'required',
            //'imageFile.*' => 'mimes:jpeg,png,jpg',
        ], $messages = [
            //'imageFile.required' => 'The image file field is required!',
            //'imageFile.*.mimes' => 'The file must be a in a type of jpg, jpeg, png!',
        ]);

        if ($validator->fails()) {
            return redirect('adoption/' . $id . '/' . 'edit')
                ->withErrors($validator)
                ->withInput();
        } else {

            $pet = Pet::find($id);
            $pet->name = $request->input('name');
            $pet->type = $request->input('type');
            $pet->breed = $request->input('breed');
            $pet->gender = $request->input('gender');
            $pet->stage = $request->input('stage');
            $pet->age = $request->input('age');
            $pet->unit = $request->input('unit');

            $pet->save();


            $petProfile = PetProfile::where('pet_id', $id)->first();
            $petProfile->size = $request->input('size');
            $petProfile->color = $request->input('color');
            $petProfile->personality = $request->input('personality');
            $petProfile->healthInfo = json_encode($request->input('healthInfo'));
            $petProfile->about = $request->input('about');

            $petProfile->save();

            return redirect('/adoption')->with('success', 'Pet has been edited!');
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
    
    }

    public function schedule($id)
    {
        $testString = 'schedule a visit';
        return view('features.scheduleavisit', [
            'pets' => Pet::findOrFail($id),
            'petprofiles' => PetProfile::where('pet_id', $id)->get(),
        ]);
    }

    public function success($id)
    {
        $latest = DB::table('visits')
            ->latest('created_at', 'desc')
            ->first();

        return view('features.successschedule', [

            'pets' => Pet::findOrFail($id),
            'petprofiles' => PetProfile::where('pet_id', $id)->get(),
            'visit_info' => $latest
        ]);
    }

    public function saveDate(Request $request)
    {
        $visit = Visit::create([
            'user_id' => 1,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'is_approved' => false,
        ]);
    }

    public function adopted($id){

        $pet = Pet::find($id);
        $pet->is_adopted = 1;
        $pet->save();

        return response()->json(['message' => 'The pet has been adopted!']);
        
    }

    public function cancelAdoption($id){
        $pet = Pet::find($id);
        $pet->is_adopted = 0;
        $pet->save();

        return response()->json(['message' => 'The adoption has been cancelled!']);
    }

    public function archivePet($id){
        $pet = Pet::find($id);
        $pet->deleted_at = now();
        $pet->save();

        $profile = PetProfile::where('pet_id', $id)->first();
        $profile->deleted_at = now();
        $profile->save();

        return response()->json(['message' => 'The pet has been archived!']);
    }
}
