<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdSpace;

class HomeController extends Controller
{
    public function index()
    {
    	$Spot = AdSpace::select('countries.name as country_name','states.name as state_name','government_areas.name as government_name','ad_spaces.name as ad_name','ad_spaces.file')
        ->join('countries','countries.id','=','ad_spaces.country')
        ->join('states','states.id','=','ad_spaces.state')
        ->join('government_areas','government_areas.id','=','ad_spaces.gov_area')
        ->where('featured',1)
        ->get(5);
    	return view('front/home/index',compact('Spot'));
    }
}
