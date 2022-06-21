<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Campaign;
use App\Models\AdSpace;
use App\Models\CampaignFile;
use App\Models\Billing;
use App\Models\Country;
use App\Models\GovernmentArea;
use \Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class CampaignController extends Controller
{
    public function index(Request $request)
    {
        $Country = Country::all();
        $Campaign = Campaign::select('countries.name as country_name','states.name as state_name','government_areas.name as government_name','campaigns.*','billings.amount')
        ->join('billings','billings.campaign_id','=','campaigns.id')
        ->join('countries','countries.id','=','campaigns.country')
        ->join('states','states.id','=','campaigns.state')
        ->join('government_areas','government_areas.id','=','campaigns.gov_area')
        ->where('campaigns.user_id',Auth::user()->id)
        ->filter($request->days)
        ->paginate(5);

        $Campaign->getCollection()->transform(function ($value)
        {
            $otherDate = $value->to_date->subMinutes(10);
            $nowDate = Carbon::now();
            if($nowDate->gt($otherDate))
            {
                $value->status = 'Completed';
            }
            return $value;
        });
    	return view('dashboard/campaign/index',compact('Campaign','Country'));
    }

          // Setting Create Validation Function
      protected function validator(array $data)
    {
        $validate = Validator::make($data, [
            'name'         => 'required|string',
            'description' => 'required|string',
            'objectives'    => 'required',
            'country'     => 'required|string',
            'state'     => 'required|string',
            'government'     => 'required|string',
            'type'     => 'required|string',
            'from'     => 'required',
            'to'     => 'required|date|after_or_equal:from|after:today',
            'adspot'     => 'required',
            'amount'     => 'required|numeric',
        ]);

        return $validate;
    }

    // Setting Create Data Insertion Function
    protected function add(array $data ,$files)
        {
             //Setting Create
            $Campaign = new Campaign();
            $Campaign->name     = isset($data['name']) ? $data['name'] : null;
            $Campaign->description     = isset($data['description']) ? $data['description'] : null;
            $objectives = implode(',', $data['objectives']);
            $Campaign->objective     = isset($objectives) ? $objectives : null;
            $Campaign->country     = isset($data['country']) ? $data['country'] : null;
            $Campaign->state     = isset($data['state']) ? $data['state'] : null;
            $Campaign->gov_area     = isset($data['government']) ? $data['government'] : null;
            $Campaign->type     = isset($data['type']) ? $data['type'] : null;
            $Campaign->from_date     = isset($data['from']) ? $data['from'] : null;
            $Campaign->to_date     = isset($data['to']) ? $data['to'] : null;
            $Campaign->ad_space_ids     = isset($data['adspot']) ? $data['adspot'] : null;
            $Campaign->status     = 'In Review';
            $Campaign->user_id     = Auth::user()->id;
            $Campaign->save();

            $path = 'assets/dashboard/images/campaign/';
            $image = time().$files->getClientOriginalName();
            $files->move($path, $image);
            $CampaignFile = new CampaignFile();
            $CampaignFile->file = $image;
            $CampaignFile->type = $data['type'];
            $CampaignFile->campaign_id = $Campaign->id;
            $CampaignFile->save();

            $Billing = new Billing();
            $Billing->status = 'Successful Payment';
            $adprice = AdSpace::find($Campaign->ad_space_ids);
//            $Billing->amount =$adprice->price;
            $Billing->amount =isset($data['amount']) ? $data['amount'] : null;
            $Billing->mode = 'Paystack';
            $Billing->campaign_id = $Campaign->id;
            $Billing->save();
        }
    // Setting Main Creation Function
    public function create(Request $request)
    {

    // calling Validation Function
        $this->validator($request->all())->validate();
    // calling Insertion Function
        $this->add($request->all(),$request->file('file'));

         $notify[] = ['success', "Campaign has been Added."];
            return redirect()->back()->withNotify($notify);
    }

    public function CheckAdSpot($country='',$state='',$government='')
    {
        $AdSpace = AdSpace::select('*')
        ->when(isset($country), function ($q) use ($country)  {
        return $q->where('country',$country);
      })
       ->when(isset($state), function ($q) use ($state)  {
        return $q->where('state',$state);
      })
       ->when(isset($government), function ($q) use ($government)  {
        return $q->where('gov_area',$government);
      })
        ->get();
        $Data = array();
        $GoveData = GovernmentArea::select('*')
        ->where('id',$government)
        ->get();
        $Data['AdSpace'] = $AdSpace;
        $Data['Government'] = $GoveData;
        return $Data;
    }

    public function CheckAdSpotNumber($value='',$colunm='')
    {
        $AdSpace = AdSpace::select('id')
        ->when($colunm == 'country', function ($q) use ($value)  {
        return $q->where('country',$value);
      })
       ->when($colunm == 'state', function ($q) use ($value)  {
        return $q->where('state',$value);
      })
       ->when($colunm == 'government', function ($q) use ($value)  {
        return $q->where('gov_area',$value);
      })
        ->pluck('id');

        $ids = $AdSpace;
        $count = $AdSpace->count();
        return ['adSpotIds' => $ids, 'count' => $count];

    }
    public function SelectedAdSpotData($value='')
    {
        $AdSpace = AdSpace::find($value);
        return $AdSpace;
    }
    public function ExtendCompaign(Request $req)
    {
        $req->validate([
            'date' => 'required|date|after:today',
        ]);

        $CompaignId = Campaign::find($req->id);
        $CompaignId->to_date = $req->date;
        $CompaignId->status = 'In Review';
        $CompaignId->save();
        $notify[] = ['success', "Wait For Admin Approval."];
        return redirect()->back()->withNotify($notify);
    }

    public function viewCampaign($id)
    {
        $campaign = Campaign::find($id);
        if($campaign)
        {
            dd($campaign);
        } else {
            $notify[] = ['error', "No campaign found against this id"];
            return redirect()->back()->withNotify($notify);
        }
    }
}
