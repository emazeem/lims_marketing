<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    //
    public function show($id){
        $country=Country::find($id);
        return view('email',compact('country'));
    }
    public function delete($id){
        Email::find($id)->delete();
        return redirect()->back();
    }
    public function addFavourite($id){
        $email=Email::find($id);
        $email->is_favourite=($email->is_favourite==0)?1:0;
        $email->save();
        return redirect()->back();
    }


    public function sendAgain($country){
       $emails=Email::where('country_id',$country)->get();
        foreach ($emails as $email) {
            $email->status=0;
            $email->save();
       }
        return redirect()->back();
    }
    public function store(Request $request){
        //dd($request->option);
        if ($request->option==1){
            $country=Country::find($request->country_id);
        }else{
            $country=new Country();
            $country->name=$request->country;
            $country->save();
        }

        $emails=$request->emails;
        $emails=preg_split('/\r\n|[\r\n]/',$emails);
        foreach ($emails as $email){
            foreach (explode(',',$email) as $e){
                foreach (explode(';',$e) as $x){
                    if ($x){
                        $table=new Email();
                        $table->country_id=$country->id;
                        $table->email=$x;
                        $table->save();
                    }
                }

            }
        }
        return redirect()->back();
    }

}
