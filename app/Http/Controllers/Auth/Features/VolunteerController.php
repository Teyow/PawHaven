<?php

namespace App\Http\Controllers\Auth\Features;

use App\Http\Controllers\Controller;
use App\Models\Programs;
use App\Models\Volunteer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DataTables;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('features.volunteer', [
            'programs' => Programs::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        return view('features.addvolunteer', [
            'programs' => Programs::find($id),
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

    public function addVolunteer(Request $request)
    {
        Volunteer::create([
            'user_id' => Auth::user()->id,
            'full_name' => $request->fullName,
            'program' => $request->program,
            'date_start' => $request->dateStart,
            'date_end' => $request->dateEnd,
            'is_approved' => false,
        ]);

        return redirect('volunteer/' . $request->programId)->with('success', 'Thank you for volunteering for the program!')->with('programs', Programs::find($request->programId));
    }

    public function allVolunteers(Request $request)
    {
        //admin datatables
        if ($request->ajax()) {
            $donation = DB::table('volunteers')
                ->latest();
           
            return DataTables::of($donation)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                   
                    if ($row->is_approved == 0) {
                        $btn =  '<a data-id="' . $row->id . '" class="btn btn-success btn-circle btn-sm " id="verifybtn"><i class="fas fa-check"></i></a>';
                        return $btn;
                    } else {
                        
                        $btn = '<a data-id="' . $row->id . '" class="btn btn-danger btn-circle btn-sm " id="unverifybtn"><i class="fas fa-times"></i></a>';
                        return $btn;
                    }
                })
               
                ->addColumn('is_approved', function ($row) {
                    if ($row->is_approved == 0) {
                        return '<span class="badge badge-danger">Not yet verified</span>';
                    } else {
                        return '<span class="badge badge-success">Verified</span>';
                    }
                })
               
                ->editColumn('date_start', function ($row) {
                    
                    //$formatedDate = Carbon::parse($row->date_start);
                    $formatedDate = $row->date_start;
                    $formatedDate = str_replace('/', '-', $formatedDate);
                    //
                    $parsedDate = date('F d, Y', strtotime($formatedDate));
                    //
                    //$parsedDate = Carbon::createFromFormat('d-m-Y', $formatedDate)->format('M d, Y');
                    return $parsedDate;
                })
                //
                ->editColumn('date_end', function ($row) {
                    //
                    //
                    //$formatedDate = Carbon::parse($row->date_end);
                    $formatedDate = $row->date_end;
                    $formatedDate = str_replace('/', '-', $formatedDate);
                    //$formatedDate = str_replace('/', '-', $formatedDate);
                    $parsedDate = date('F d, Y', strtotime($formatedDate));
                    //$parsedDate = Carbon::createFromFormat('d-m-Y', $formatedDate)->format('M d, Y');
                    return $parsedDate;
                })
                //
                ->rawColumns(['action', 'is_approved'])
                ->make(true);
        }


        return view('features.viewvolunteers');
    }

    public function approveVolunteer($id)
    {
        $volunteer = Volunteer::find($id);
        $volunteer->is_approved = 1;
        $volunteer->save();

        return response()->json(['message' => 'The volunteer is already verified!']);
    }

    public function disapproveVolunteer($id)
    {
        $volunteer = Volunteer::find($id);
        $volunteer->is_approved = 0;
        $volunteer->save();

        return response()->json(['message' => 'The volunteer is already unverified!']);
    }
}
