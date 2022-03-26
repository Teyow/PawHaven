<?php

namespace App\Http\Controllers\Auth\Features;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use App\Models\PetProfile;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Visit;
use Carbon\Carbon;

class VisitationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //user data table
        if ($request->ajax()) {
            $data = DB::table('visits')
                ->where('deleted_at', NULL)
                ->where('user_id', Auth::user()->id)
                ->latest();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . \URL::route('visitation.show', $row->id) . '" data-id="' . $row->id . '" class="btn btn-primary btn-circle btn-sm" id="viewbtn"><i class="fas fa-search"></i></a>';

                    return $btn;
                })

                ->addColumn('status', function ($row) {
                    if ($row->is_approved == 0) {
                        return '<span class="badge badge-danger">Not yet approved</span>';
                    } else {
                        return '<span class="badge badge-success">Approved</span>';
                    }
                })

                ->editColumn('start', function($row){
                    //$formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $row->created_at)->format('M d, Y \a\t h:i A');
                   // return $formatedDate;

                   $formatedDate = Carbon::parse($row->start);

                   $parsedDate = Carbon::createFromFormat('Y-m-d H:i:s', $formatedDate)->format('M d, Y \a\t h:i A');
                   return $parsedDate;
                })

                ->editColumn('end', function($row){
                    //$formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $row->created_at)->format('M d, Y \a\t h:i A');
                   // return $formatedDate;

                   $formatedDate = Carbon::parse($row->end);

                   $parsedDate = Carbon::createFromFormat('Y-m-d H:i:s', $formatedDate)->format('M d, Y \a\t h:i A');
                   return $parsedDate;
                })

                ->rawColumns(['action', 'status'])
                ->make(true);
        }


        return view('features.visitation');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('features.addvisit');
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
        $petVisit = DB::table('pets')
                        ->join('visits', 'pets.id', 'visits.pet_id')
                        ->join('pet_profiles', 'pets.id', 'pet_profiles.pet_id')
                        ->select('pets.*', 'visits.*', 'pet_profiles.*')
                        ->where('visits.pet_id', '!=', null)
                        ->where('visits.id', $id)
                        ->get();

        $noPetVisit = DB::table('visits')
                        ->where('pet_id', null)
                        ->where('id', $id)
                        ->get();
                        
        return view('features.viewvisit', [
            'petVisit' => $petVisit,
            'noPetvisit' => $noPetVisit,
            
            
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

    public function success()
    {
        //$latest = DB::table('visits')
        //    ->latest('created_at', 'desc')
        //    ->first();
        //
        //return view('features.successvisit', [
        //
        //    'visit_info' => $latest
        //]);

        return 'hdsjhdjas';
    }

    public function successVisit()
    {
        $latest = DB::table('visits')
            ->latest('created_at', 'desc')
            ->first();

        return view('features.successvisit', [

            'visit_info' => $latest
        ]);
    }

    public function addVisit(Request $request)
    {
        $visit = Visit::create([
            'user_id' => Auth::user()->id,
            'pet_id' => null,
            'start' => $request->date_start,
            'end' => $request->date_end,
            'is_approved' => false,
        ]);
    }


    public function allVisits(Request $request)
    {

        if ($request->ajax()) {
            $data = DB::table('visits')
                ->join('users', 'visits.user_id', '=', 'users.id')
                ->select('users.first_name', 'users.last_name', 'visits.*')
                ->where('visits.deleted_at', NULL)
                ->latest();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    if($row->is_approved == 0){
                        $btn = '<a href="' . \URL::route('visitation.show', $row->id) . '" data-id="' . $row->id . '" class="btn btn-primary btn-circle btn-sm" id="viewbtn"><i class="fas fa-search"></i></a>';
                        $btn = $btn . '<a data-id="' . $row->id . '" class="btn btn-success btn-circle btn-sm ml-2" id="approvebtn"><i class="fas fa-check"></i></a>';
    
                        return $btn;
                    }else{
                        $btn = '<a href="' . \URL::route('visitation.show', $row->id) . '" data-id="' . $row->id . '" class="btn btn-primary btn-circle btn-sm" id="viewbtn"><i class="fas fa-search"></i></a>';
                        $btn = $btn . '<a data-id="' . $row->id . '" class="btn btn-danger btn-circle btn-sm ml-2" id="disapprovebtn"><i class="fas fa-times"></i></a>';
    
                        return $btn;
                    }

                })

                ->addColumn('user_id', function($row){
                    return $row->first_name . ' ' . $row->last_name;
                })

                ->editColumn('start', function($row){
                    //$formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $row->created_at)->format('M d, Y \a\t h:i A');
                   // return $formatedDate;

                   $formatedDate = Carbon::parse($row->start);

                   $parsedDate = Carbon::createFromFormat('Y-m-d H:i:s', $formatedDate)->format('M d, Y \a\t h:i A');
                   return $parsedDate;
                })

                ->editColumn('end', function($row){
                    //$formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $row->created_at)->format('M d, Y \a\t h:i A');
                   // return $formatedDate;

                   $formatedDate = Carbon::parse($row->end);

                   $parsedDate = Carbon::createFromFormat('Y-m-d H:i:s', $formatedDate)->format('M d, Y \a\t h:i A');
                   return $parsedDate;
                })

                ->addColumn('status', function ($row) {
                    if ($row->is_approved == 0) {
                        return '<span class="badge badge-danger">Not yet approved</span>';
                    } else {
                        return '<span class="badge badge-success">Approved</span>';
                    }
                })

                ->rawColumns(['action', 'status'])
                ->make(true);
        }




        return view('features.visitation');
    }

    public function approveVisit($id){
        $visit = Visit::find($id);
        $visit->is_approved = 1;
        $visit->save();

        return response()->json(['message' => 'The scheduled visit is already approved!']);
    }

    public function disapproveVisit($id){
        $visit = Visit::find($id);
        $visit->is_approved = 0;
        $visit->save();

        return response()->json(['message' => 'The scheduled visit is already disapproved!']);
    }
}
