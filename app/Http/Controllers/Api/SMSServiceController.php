<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ErrorHandler;
use App\Http\Controllers\Controller;
use Twilio\Rest\Client;

class TwilioService {
    public function sendSms($customerPhone, $message){
        try{
            $twilio = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));
            $twilio->messages->create(
                $customerPhone,
                [
                    'from' => env('TWILIO_NUMBER'),
                    'body' => $message
                ]
            );
        } catch (\Exception $e) {
            //merkezi hata yönetim sınıfı
            ErrorHandler::handleException($e);
        }
    }
}

class TurkeySmsService {
    public function sendSms($customerPhone, $message){
        //echo "TurkeySmsService $message\n";
    }
}

class SMSServiceController extends Controller
{
    public static function getCountryCode($customerPhone)
    {
        $getCountryCode = substr($customerPhone, 0, 3);

        return $getCountryCode;
    }

}

