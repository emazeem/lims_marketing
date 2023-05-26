<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    //
    public function store(Request $request){
        $country=new Country();
        $country->name=$request->country;
        $country->save();
        $emails=$request->emails;
        $emails=preg_split('/\r\n|[\r\n]/',$emails);
        foreach ($emails as $email){
            $table=new Email();
            $table->country_id=$country->id;
            $table->email=$email;
            $table->save();
        }
        return redirect()->back();
    }

}
