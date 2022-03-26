<?php

namespace App\Http\Controllers\Auth\Features;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use DataTables;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('features.donate');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('features.adddonation');
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
            'type' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('donate/create')
                ->withErrors($validator)
                ->withInput();
        } else {

            if ($request->hasFile('inkind_file')) {
                $inkindImg = $request->file('inkind_file')->getClientOriginalName();
                $request->inkind_file->move(public_path('donations/in-kind/' . Auth::user()->id . '/'), $inkindImg);
                $donation = Donation::create([
                    'user_id' => Auth::user()->id,
                    'fullname' => Auth::user()->first_name . ' ' . Auth::user()->last_name,
                    'type' => $request->input('type'),
                    'items' => $request->input('items'),
                    'in_kind_img' => $inkindImg,
                    'is_approved' => 0,
                ]);

                return redirect('donate/view/' . $donation->id)->with('success', 'The donation has been posted!');
            } else {
                $monetaryImg = $request->file('monetary_file')->getClientOriginalName();
                $request->monetary_file->move(public_path('donations/monetary/' . Auth::user()->id . '/'), $monetaryImg);
                $donation = Donation::create([
                    'user_id' => Auth::user()->id,
                    'fullname' => Auth::user()->first_name . ' ' . Auth::user()->last_name,
                    'type' => $request->input('type'),
                    'amount' => $request->input('amount'),
                    'monetary_img' => $monetaryImg,
                    'is_approved' => 0,
                ]);

                return redirect('donate/view/' . $donation->id)->with('success', 'The donation has been posted!');
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
        return view('features.viewsingledonation', [
            'donation' => Donation::find($id),
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
        return view('features.editfeedbackdonation', [
            'donation' => Donation::find($id),
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
            'feedback' => 'required',
        ]);

        if($validator->fails()){
            return redirect('donate/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        }else{
            
            $donation = Donation::find($id);
            $donation->feedback = $request->feedback;
            $donation->save();

            return redirect('donate/' . $id)->with('success', 'The feedback has been updated!');
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

    public function showDonations(Request $request, $userid)
    {
        //admin datatables
        if ($request->ajax()) {
            $donation = DB::table('donations')
                ->where('user_id', Auth::user()->id)
                ->latest();

            return DataTables::of($donation)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . \URL::route('donate.show', $row->id) . '" data-id="' . $row->id . '" class="btn btn-primary btn-circle btn-sm" id="viewbtn"><i class="fas fa-search"></i></a>';
                    return $btn;
                })

                ->addColumn('is_approved', function ($row) {
                    if ($row->is_approved == 0) {
                        return '<span class="badge badge-danger">Not yet verified</span>';
                    } else {
                        return '<span class="badge badge-success">Verified</span>';
                    }
                })

                ->rawColumns(['action', 'is_approved'])
                ->make(true);
        }


        return view('features.viewdonations');
    }


    //public function showAlldonations(Request $request)
    //{
    //    $donation = DB::table('donations')
    //    ->where('user_id', Auth::user()->id)
    //    ->latest();
    //    dd($donation);
    //    //return view('features.viewdonations');
    //}

    public function showAll(Request $request)
    {
        $donation = DB::table('donations')
            ->latest();

        //admin datatables
        if ($request->ajax()) {
            $donation = DB::table('donations')
                ->latest();

            return DataTables::of($donation)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    if($row->is_approved == 0) {
                        $btn = '<a href="' . \URL::route('donate.show', $row->id) . '" data-id="' . $row->id . '" class="btn btn-primary btn-circle btn-sm mr-2" id="viewbtn"><i class="fas fa-search"></i></a>';
                        $btn = $btn . '<a data-id="' . $row->id . '" class="btn btn-success btn-circle btn-sm " id="verifybtn"><i class="fas fa-check"></i></a>';
                        return $btn;
                    }else{
                        $btn = '<a href="' . \URL::route('donate.show', $row->id) . '" data-id="' . $row->id . '" class="btn btn-primary btn-circle btn-sm mr-2" id="viewbtn"><i class="fas fa-search"></i></a>';
                        $btn = $btn . '<a data-id="' . $row->id . '" class="btn btn-danger btn-circle btn-sm " id="unverifybtn"><i class="fas fa-times"></i></a>';
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

                ->rawColumns(['action', 'is_approved'])
                ->make(true);
        }

        return view('features.viewdonations');
    }

    public function approve($id){
        $donation = Donation::find($id);
        $donation->is_approved = 1;
        $donation->save();

        return response()->json(['message' => 'The donation has been verified!']);
    }

    public function disapprove($id){
        $donation = Donation::find($id);
        $donation->is_approved = 0;
        $donation->save();

        return response()->json(['message' => 'The donation has been unverified!']);
    }
}
