<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pet = DB::table('pets')
            ->join('pet_profiles', 'pets.id', '=', 'pet_profiles.pet_id')
            ->select('pets.*', 'pet_profiles.*')
            ->where('pets.is_adopted', 0)
            ->where('pets.deleted_at', NULL)
            ->paginate(8);

        $totalusers = DB::table('users')
            ->where('id', '!=', 1)
            ->count();

        $totalRegisteredPets = DB::table('pets')
            ->where('deleted_at', NULL)
            ->count();

        $totalAdoptedPets = DB::table('pets')
            ->join('pet_profiles', 'pets.id', '=', 'pet_profiles.pet_id')
            ->select('pets.*', 'pet_profiles.*')
            ->where('pets.is_adopted', 1)
            ->where('pets.deleted_at', NULL)
            ->count();

        $totalVolunteers = DB::table('volunteers')
            ->where('deleted_at', NULL)
            ->count();



        //$record = User::select(\DB::raw("COUNT(*) as count"), \DB::raw("DAYNAME(created_at) as day_name"), \DB::raw("DAY(created_at) as day"))
        //    ->where('created_at', '>', Carbon::today()->subDay(6))
        //    ->groupBy('day_name', 'day')
        //    ->orderBy('day')
        //    ->get();

        //donations pie chart
        $record = DB::table('donations')
            ->select('type', DB::raw('count(*) as count'))
            ->groupBy('type')
            ->get();

        $data = [];

        foreach ($record as $row) {
            $data['label'][] = $row->type;
            $data['data'][] = (int) $row->count;
        }

        $data['chart_data'] = json_encode($data);

        //return $data['chart_data'];

        //volunteers pie chart

        $volunteer = DB::table('volunteers')
            ->select('program', DB::raw('count(*) as count'))
            ->groupBy('program')
            ->get();

        $volunteers = [];

        foreach ($volunteer as $row) {
            $volunteers['label'][] = $row->program;
            $volunteers['data'][] = (int) $row->count;
        }

        $volunteers['volunteers_data'] = json_encode($volunteers);

        return view('home', [
            'pet' => $pet,
            'totalUsers' => $totalusers,
            'totalRegisteredPets' => $totalRegisteredPets,
            'totalAdoptedPets' => $totalAdoptedPets,
            'totalVolunteers' => $totalVolunteers,
            'data' => $data,
            'volunteers' => $volunteers
        ]);
    }
}
