<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class SettingController extends Controller
{
    public function index()
    {
    	$user = User::find(Auth::user()->id);
    	return view('dashboard/setting/index',compact('user'));
    }

       // Setting Create Validation Function
      protected function validator(array $data)
    {
        $validate = Validator::make($data, [
            'email'         => 'required|string|email|unique:users,email,'.Auth::user()->id,
            'phone'      => 'required|numeric',
            'first_name'    => 'required|string',
            'last_name'     => 'required|string',
        ]);
 
        return $validate;
    }

    // Setting Create Data Insertion Function
    protected function add(array $data ,$file)
        {
         //Setting Create
        $user = User::find(Auth::user()->id);
        $user->first_name     = isset($data['first_name']) ? $data['first_name'] : null;
        $user->last_name     = isset($data['last_name']) ? $data['last_name'] : null;
        $user->email     = isset($data['email']) ? $data['email'] : null;
        $user->phone     = isset($data['phone']) ? $data['phone'] : null;
        if ($file) {
        $path = 'assets/dashboard/images/avatars/';
        $image = time().$file->getClientOriginalName();
        $file->move($path, $image);
        $user->avatar = $image;
        }
        $user->bank_name = isset($data['bank_name']) ? $data['bank_name'] : null;;
        $user->account_number = isset($data['account_number']) ? $data['account_number'] : null;;
        $user->save(); 

        }     
    // Setting Main Creation Function
    public function create(Request $request)
    {
    // calling Validation Function
        $this->validator($request->all())->validate();
    // calling Insertion Function
        $this->add($request->all(),$request->file('file'));

         $notify[] = ['success', "Information has been Updated."];
            return redirect()->back()->withNotify($notify);
    } 

}
