<?php

namespace App\Console\Commands;

use App\Mail\SendEmail;
use App\Models\Email;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;


class EmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emailcommand:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        foreach (Email::where('status',0)->get() as $dbRow){
            try {
                $data = array('name'=>"Muhammad Azeem","message"=>"Message");
                Mail::send('email_template', $data, function($message) use($dbRow) {
                    $message->to($dbRow->email, explode('@',$dbRow->email)[0])
                        ->subject('Introducing a Revolutionary LIMS Solution Tailored for ISO 17025 Accredited Labs');
                    $message->from('emazeem07@gmail.com','Muhammad Azeem');
                });
                $dbRow->status=1;
                $dbRow->save();
                echo $dbRow->email.'('.$dbRow->id.')';
            } catch (\Exception $exception) {
                return response()->json($exception->getMessage());
            }
        }
    }
}
