<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CloudflareRequest;

class CloudflareController extends Controller
{
    /**
     * @param Request $request
     */
    public function data(Request $request)
    {
        $this->validate($request, CloudflareRequest::rules());

        $formData = [
            'appId'    => $request->input('appId'),
            'clientId' => $request->input('clientId'),
            'source'   => $request->input('source'),
            'status'   => $request->input('status'),
            'userAgent' => $_SERVER['HTTP_USER_AGENT'] ?? $request->input('userAgent'),
            'origin'   =>  $_SERVER['HTTP_HOST'] ?? $request->input('origin'),
            'uri'      =>  $request->input('uri')
        ];

        $postEndpoints = [
            'pr' => 'https://connected.lexisnexisrisk.com/api/verify',
            'dr' => 'https://connected2.lexisnexisrisk.com/api/verify'
        ];

        $secretKey = env('CLOUDFLARE_VALIDATOR_APPKEY');
        $appId = env('CLOUDFLARE_VALIDATOR_APPID');

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => $postEndpoints[$request->input('source')],
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => http_build_query($formData),
          CURLOPT_HTTPHEADER => array(
            'Authorization: Basic ' . "$appId:$secretKey",
            'Content-Type: application/x-www-form-urlencoded'
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }
}
