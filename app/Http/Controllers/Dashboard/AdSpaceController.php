<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\AdSpace;
use App\Models\Country;
use App\Models\State;
use App\Models\GovernmentArea;
use Illuminate\Support\Facades\Auth;

class AdSpaceController extends Controller
{
   public function index()
    {
        $Country = Country::where('status','active')->get();
    	$AdSpace = AdSpace::select('countries.name as country_name','states.name as state_name','government_areas.name as government_name','ad_spaces.id', 'ad_spaces.name as ad_name','ad_spaces.media_type','ad_spaces.created_at')
        ->join('countries','countries.id','=','ad_spaces.country')
        ->join('states','states.id','=','ad_spaces.state')
        ->join('government_areas','government_areas.id','=','ad_spaces.gov_area')
        ->where('user_id',Auth::user()->id)
        ->paginate(5);
    	return view('dashboard/adspace/index',compact('AdSpace','Country'));
    }


      // Setting Create Validation Function
      protected function validator(array $data)
    {
        $validate = Validator::make($data, [
            'spot_name'         => 'required|string',
            'price'         => 'required|numeric',
            'country'      => 'required|string',
            'state'    => 'required|string',
            'gov_area'     => 'required|string',
            'media_type'     => 'required|string',
            'address'     => 'required|string',
            'dimention1'     => 'required|numeric',
            'dimention2'     => 'required|numeric',
            'hight'     => 'required',
            'lightning'     => 'required',
            'brand'     => 'required',
            'medium'     => 'required',
            'road'     => 'required',
            'orientation'     => 'required',
            'clutter'     => 'required',
            'runup'     => 'required|numeric',
            'faces'     => 'required|numeric',
        ]);

        return $validate;
    }

    // Setting Create Data Insertion Function
    protected function add(array $data ,$file)
        {
         //Setting Create
        $AdSpace = new AdSpace();
        $AdSpace->name     = isset($data['spot_name']) ? $data['spot_name'] : null;
        $AdSpace->price     = isset($data['price']) ? $data['price'] : null;
        $AdSpace->country     = isset($data['country']) ? $data['country'] : null;
        $AdSpace->state     = isset($data['state']) ? $data['state'] : null;
        $AdSpace->gov_area     = isset($data['gov_area']) ? $data['gov_area'] : null;
        $AdSpace->media_type     = isset($data['media_type']) ? $data['media_type'] : null;
        $AdSpace->address     = isset($data['address']) ? $data['address'] : null;
        $AdSpace->dimension     = $data['dimention1'].'*'.$data['dimention2'];
        $AdSpace->hight     = isset($data['hight']) ? $data['hight'] : null;
        $AdSpace->lightning     = isset($data['lightning']) ? $data['lightning'] : null;
        $AdSpace->brand     = isset($data['brand']) ? $data['brand'] : null;
        $AdSpace->side_road     = isset($data['road']) ? $data['road'] : null;
        $AdSpace->medium     = isset($data['medium']) ? $data['medium'] : null;
        $AdSpace->orientation     = isset($data['orientation']) ? $data['orientation'] : null;
        $AdSpace->clutter     = isset($data['clutter']) ? $data['clutter'] : null;
        $AdSpace->runup     = isset($data['runup']) ? $data['runup'] : null;
        $AdSpace->faces     = isset($data['faces']) ? $data['faces'] : null;
        $AdSpace->user_id     = Auth::user()->id;
        // if ($file) {
        $path = 'assets/dashboard/images/media/';
        $image = time().$file->getClientOriginalName();
        $file->move($path, $image);
        $AdSpace->file = $image;
        // }
        $AdSpace->save();

        }
    // Setting Main Creation Function
    public function create(Request $request)
    {
    // calling Validation Function
        $this->validator($request->all())->validate();
    // calling Insertion Function
        $this->add($request->all(),$request->file('file'));

         $notify[] = ['success', "Ad Space has been Added."];
            return redirect()->back()->withNotify($notify);
    }

    public function NewState($country='')
    {
        $State = State::select('*')
        ->where('country_id',$country)
        ->get();
        return $State;
    }
    public function NewGovernment($state='')
    {
        $GovernmentArea = GovernmentArea::select('*')
        ->where('state_id',$state)
        ->get();
        return $GovernmentArea;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function deleteAdSpace($id)

    {
        $adSpaced = AdSpace::find($id);
        if($adSpaced)
        {
            $adSpaced->delete();
            $response['success'] = 'Ad Space successfully deleted!';
            $status = 200;
        }else{
            $response['error'] = 'Ad Space not exist against this id!';
            $status = 400;
        }
        return response()->json(['result'=>$response], $status);
    }
}
