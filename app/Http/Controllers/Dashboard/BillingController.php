<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;

class BillingController extends Controller
{
     public function index()
    {
    	 $Billing = Campaign::select('campaigns.name','billings.*')
    	->join('billings','billings.campaign_id','=','campaigns.id')
    	->orderBy('campaigns.id')
    	->paginate(5);
    	return view('dashboard/billing/index',compact('Billing'));
    }
}
