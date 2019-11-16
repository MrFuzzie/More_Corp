<?php

namespace App\Http\Controllers;

use App\Bid;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard(){

        if(!Auth::user()->type == 1){
            return view('pages.errors.404');
        }

        $firstDayOfWeek = Carbon::now()->startOfWeek();
        $lastDayOfWeek = Carbon::now()->endOfWeek();

        $data = Bid::select(array(
            DB::raw('DATE(`created_at`) as `date`'),
            DB::raw('SUM(bid) as total')
        ))
        ->where('created_at', '>=', $firstDayOfWeek)
        ->where('created_at', '<=', $lastDayOfWeek)
        ->groupBy('date')
        ->orderBy('date', 'DESC')
        ->pluck('total');


        return view('pages.dashboard', compact('data'));
    }
}
