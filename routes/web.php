<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\EmailController;

Route::get('/', function () {return view('welcome');});
Route::get('/email-template', function () {return view('email_template');});
Route::post('store-emails', [EmailController::class,'store'])->name('store-emails');
Route::get('show-emails/{id}', [EmailController::class,'show'])->name('emails.show');
Route::post('email-submit', function (Request $request) {
    try {
        $subject=$request->subject;
        foreach ($request->email as $to){
            Mail::html($request->message, function ($message) use ($subject, $to) {
                $message->subject($subject)->to($to);
            });
        }

        return true;
    } catch (Exception $exception) {
        //dd($exception->getMessage());
        return response()->json($exception->getMessage());
    }
})->name('send.email');
