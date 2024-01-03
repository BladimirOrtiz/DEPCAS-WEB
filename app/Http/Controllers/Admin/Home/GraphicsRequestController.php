<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solicitud;
use DB;

class GraphicsRequestController extends Controller
{
    public function index()
    {
        $requestData = DB::table('request')
        ->select(DB::raw('MONTH(created_date) as month'), DB::raw('COUNT(*) as count'))
        ->groupBy(DB::raw('MONTH(created_date)'))
        ->get();

    return view('admin.home.stadisticsrequest', compact('requestData'));
    }
}
