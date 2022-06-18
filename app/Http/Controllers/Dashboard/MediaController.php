<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;
use Illuminate\Support\Facades\Auth;

class MediaController extends Controller
{
    public function index()
    {
    	$Media = Campaign::select('campaign_files.file','campaign_files.type','campaigns.*')
    	->join('campaign_files','campaign_files.campaign_id','=','campaigns.id')
    	->where('campaigns.user_id',Auth::user()->id)
    	->paginate(5);
    	return view('dashboard/media/index',compact('Media'));
    }
}
