<?php

namespace App\Http\Controllers;

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

        return view('home', [
            'pet' => $pet,
            'totalUsers' => $totalusers,
            'totalRegisteredPets' => $totalRegisteredPets,
            'totalAdoptedPets' => $totalAdoptedPets,
        ]);
    }
}
