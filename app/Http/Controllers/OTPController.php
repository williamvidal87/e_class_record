<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Infobip\Api\SmsApi;
use Infobip\Configuration;
use Infobip\ApiException;
use Infobip\Model\SmsAdvancedTextualRequest;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;

class OTPController extends Controller
{
    public function showVerifyForm()
    {
        return view('auth.verify-otp');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'otp' => 'required',
        ]);

        if ($request->otp == session('otp_code')) {
            $user = Auth::user();
            $user->is_otp_verified = true;
            $user->save();

            return redirect('dashboard');
        }

        return back()->withErrors(['otp' => 'The OTP code is incorrect.']);
    }

    public function sendOTP()
    {
        // $otp = rand(100000, 999999);
        $otp = 123456;
        session(['otp_code' => $otp]);
        $user = Auth::user();
        $phone = $user->phone_number;
        // $configuration = new Configuration(
        //     host: 'https://89ljgr.api.infobip.com',
        //     apiKey: '1079dd4ca6061011c676b31082f71093-5dc7cff6-784a-4f7d-be9e-02c73760068e'
        // );
        // $sendSmsApi = new SmsApi(config: $configuration);
        // $message = new SmsTextualMessage(
        //     destinations: [
        //         new SmsDestination(to: '63'.$phone)
        //     ],
        //     from: 'E-class',
        //     text: "E-Class: ".$otp." is your security code. Don't share your code."
        // );
        // // $request = new SmsAdvancedTextualRequest(messages: [$message]);
        // try {
        //     // $smsResponse = $sendSmsApi->sendSmsMessage($request);
        // } catch (ApiException $apiException) {
        //     // dd($apiException);
        // }
        
        $apiSecret = "8674b65c85d896de6b4cfa89f6670546163be261";
        $deviceId = "00000000-0000-0000-3229-b4d8b3f7a96f";
        $phone = "+63".$user->phone_number;
        $messageContent = "E-Class: ".$otp." is your security code. Don't share your code.";
        $messageData = array(
            "secret" => $apiSecret,
            "mode" => "devices",
            "device" => $deviceId,
            "sim" => 2,
            "priority" => 1,
            "phone" => $phone,
            "message" => $messageContent
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.cloud.smschef.com/api/send/sms");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($messageData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($response, true);

        return redirect()->route('otp.verify');
    }
}
