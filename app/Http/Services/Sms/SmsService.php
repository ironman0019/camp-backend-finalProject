<?php

namespace App\Http\Services\Sms;

use SoapClient;
use SoapFault;

class SmsService {
    
    private $username;
    private $password;
    private $from;

    public function __construct()
    {
        $this->username = config('sms.username');
        $this->password = config('sms.password');
        $this->from = config('sms.from');
    }

    public function SendOtpSms($phoneNumber, $otpCode)
    {
        try {

            $client = new SoapClient("http://api.payamak-panel.com/post/Send.asmx?wsdl", array('encoding' => 'UTF-8'));

            $parameters = [
                'username' => $this->username,
                'password' => $this->password,
                'from' => $this->from,
                'to' => $phoneNumber,
                'text' => 'کد تایید شما : ' . $otpCode,
                'isflash' => false
            ];

            $result = $client->SendSimpleSms2($parameters);

            if(isset($resault->SendSimpleSms2Result)) {
                $responseCode = $result->SendSimpleSms2Result;
                if($responseCode == 0) {
                    return true;
                } else {
                    throw new \Exception('Error in sending sms!');
                }
            }
            
        } catch (SoapFault $e) {
            throw new \Exception('Error in sending sms' . $e->getMessage()); // Don't show the message in production!
        }
    }


    public function OrderStatus($phoneNumber, $orderStatus)
    {

        switch ($orderStatus) {
            case 0:
                $text =  'سفارش شما ثبت و در انتظار پرداخت است';
            case 2:
                $text =  'سفارش شما پرداخت و تکمیل شد به داشبورد کاربری خود مراجعه کنید.';
            case 3:
                $text =  'سفارش شما لغو شد.';
            default:
                $text =  '';
        }

        try {

            $client = new SoapClient("http://api.payamak-panel.com/post/Send.asmx?wsdl", array('encoding' => 'UTF-8'));

            $parameters = [
                'username' => $this->username,
                'password' => $this->password,
                'from' => $this->from,
                'to' => $phoneNumber,
                'text' => $text,
                'isflash' => false
            ];

            $result = $client->SendSimpleSms2($parameters);

            if(isset($resault->SendSimpleSms2Result)) {
                $responseCode = $result->SendSimpleSms2Result;
                if($responseCode == 0) {
                    return true;
                } else {
                    throw new \Exception('Error in sending sms!');
                }
            }
            
        } catch (SoapFault $e) {
            throw new \Exception('Error in sending sms' . $e->getMessage()); // Don't show the message in production!
        }
    }

}