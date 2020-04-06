<?php

namespace App\Console\Commands;

use App\Notification;
use App\Token;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendNotificationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notification:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send push notifications to users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $notification = \App\Notification::where('send' , false)->where('sendDate' ,'<=', \Carbon\Carbon::now())->first();
        if ($notification) {
            foreach (\App\Token::get() as $token) {
                $tokens[] = $token->token;
            }
                $url = 'https://fcm.googleapis.com/fcm/send';
                $fields = array(
                    'registration_ids' => $tokens,
                    'notification' => array(
                        "body" => $notification->body,
                        "title" => $notification->title,
                        "icon" => "MyIcon",
                        'click_action' => $notification->link,
                        "sound" => "default"
                    )
                );
                $fields = json_encode($fields);
                $apiKey = 'AAAADz-MHLI:APA91bEPHiHSksv1RM6SS0cVqthasozs3E_0BLNiFp95viZ4PwYwMNa9mVwNYHksdyOKX5T_w6M9oGnoGCEODoNYu8--D9vuWW27zfp0sQgSG_VULoa95ZBrinmLddwdDLocqQsT8JKQ';
                $headers = array(
                    'Authorization: key=' . $apiKey,
                    'Content-Type: application/json'
                );
    
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    
                $result = curl_exec($ch);
                curl_close($ch);
                $notification->update([
                    'send' => true
                ]);    
        }
        else {
            return 'notification does not exists';
        }
    }
}
