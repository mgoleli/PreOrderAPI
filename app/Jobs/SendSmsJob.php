<?php

namespace App\Jobs;

use App\Http\Controllers\Api\SMSServiceController;
use App\Http\Controllers\Api\TwilioService;
use App\Http\Controllers\Api\TurkeySmsService;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendSmsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $customerPhone;
    protected $message;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($customerPhone, $message)
    {
        $this->customerPhone = $customerPhone;
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $getCountryCode = SMSServiceController::getCountryCode($this->customerPhone);

        $countryServices = [
            '+10' => TwilioService::class,
            '+90' => TurkeySmsService::class
        ];
        
        if (isset($countryServices[$getCountryCode])) {

            $smsServiceClassName =  $countryServices[$getCountryCode];
            $smsServiceInstance = new $smsServiceClassName(); 
            try {
                $smsServiceInstance->sendSms($this->customerPhone, $this->message);
                //SMS GÖNDERİMİ SONRASI
            }catch(\Exception $e){
                throw $e;
            }
        } else {
            throw new \Exception("Ülke kodu için tanımlı SMS servisi bulunamadı.");
        }
    }
}
