<?php

namespace App\Listeners;

use App\Events\UserRegister;
use App\Verification;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\JsonResponse;
use Illuminate\Queue\InteractsWithQueue;

class SendVerificationCodeListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param UserRegister $event
     * @return JsonResponse
     * @throws \Exception
     */
    public function handle(UserRegister $event)
    {
        try {
            $code = random_int(1000, 9999);
            $verification = new Verification;
            $verification->code = $code;
            $verification->user_id = $event->user['id'];
            $verification->created_at = Carbon::now();
            $verification->save();
            $api = new \Kavenegar\KavenegarApi("365A484F724970447A4E52784570574D4C4661434166622B484B556A4A32697132523370717730484354633D");
            $sender = "1000596446";
            $message = 'کد فعالسازی آلارم کنکوری: ‌' . $code;
            $receptor = $event->user['phone'];
            $result = $api->Send($sender, $receptor, $message);
            if ($result) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'کد فعالسازی با موفقیت ارسال شد'
                ]);
            }
        } catch (\Kavenegar\Exceptions\ApiException $e) {
            // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
            return response()->json([
                'status' => 'error',
                'message' => 'کد فعالسازی ارسال نشد , دوباره تلاش کنید!'
            ]);
        } catch (\Kavenegar\Exceptions\HttpException $e) {
            // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
            return response()->json([
                'status' => 'error',
                'message' => 'خطلا در برقراری با سرور , دوباره تلاش کنید!'
            ]);
        }
    }
}
