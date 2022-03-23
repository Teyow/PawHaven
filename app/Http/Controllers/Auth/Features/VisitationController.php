<?php

namespace App\Http\Controllers\Auth\Features;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;


class VisitationController extends Controller
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
            $data = DB::table('visits')
                ->where('deleted_at', NULL)
                ->latest();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="#" data-id="' . $row->id . '" class="btn btn-primary btn-circle btn-sm" id="viewbtn"><i class="fas fa-search"></i></a>';
                        $btn = $btn . '<a data-id="' . $row->id . '" class="btn btn-success btn-circle btn-sm ml-2" id="adoptedBtn"><i class="fas fa-home"></i></a>';
                        $btn = $btn . '<a data-id="' . $row->id . '" class="btn btn-warning btn-circle btn-sm ml-2" id="archiveBtn"><i class="fas fa-archive"></i></a>';
                        return $btn;
                 
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('features.scheduleavisit');
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
}
