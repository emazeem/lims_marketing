<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    //
    public function store(Request $request){
        $emails=$request->emails;
        $emails=preg_split('/\r\n|[\r\n]/',$emails);
        foreach ($emails as $email){
            $table=new Email();
            $table->email=$email;
            $table->save();
        }
        return redirect()->back();
    }

}
