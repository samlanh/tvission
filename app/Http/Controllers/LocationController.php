<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data1 = [
            'grant_type' => "client_credentials",
            'client_id' => env("BOOK_APP_ID"),
            'client_secret' => env("BOOK_APP_SECRET"),
        ];
         $access_token = Config::get('app.access_token');
         $token_type = Config::get('app.token_type');

        $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => env("BOOK_HOST")."/api/v1/locations",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "GET",
              CURLOPT_POSTFIELDS => json_encode($data1),
              CURLOPT_HTTPHEADER => array(
                "Host: staging.bookmebus.com",
                "Content-Type: application/json",
                "Authorization: $token_type $access_token"
              ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);
            $array = json_decode($response);

// dd($array->data);
             dd(json_encode($array->data));
            $arrayName = array();
            foreach ($array->data as $key => $value) {
                $arrayName[$key] = $value->attributes;
            }
            // dd($arrayName);
$arrayName = ['data'=>$arrayName];
            dd(json_encode($arrayName['data']));
// print_r($array->data[1]->attributes);exit();
// dd($array->data);
//             $jsonLocation =json_encode($array->data);
            
          dd($jsonLocation);
            curl_close($curl);

            if ($err) {
              echo "cURL Error #:" . $err;
            } else {
              echo $response;
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pickuplocationc(){
        $data1 = [
            'grant_type' => "client_credentials",
            'client_id' => env("BOOK_APP_ID"),
            'client_secret' => env("BOOK_APP_SECRET"),
        ];
         $access_token = Config::get('app.access_token');
         $token_type = Config::get('app.token_type');

            $curl = curl_init();
            curl_setopt_array($curl, array(
              CURLOPT_URL => env("BOOK_HOST")."/api/v1/locations",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "GET",
              CURLOPT_POSTFIELDS => json_encode($data1),
              CURLOPT_HTTPHEADER => array(
                "Host: staging.bookmebus.com",
                "Content-Type: application/json",
                "Authorization: $token_type $access_token"
              ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);
             $array = json_decode($response);
 // return json_encode($array->data);
            $arrayName = array();
            foreach ($array->data as $key => $value) {
                $arrayName[$key] = $value->attributes;
            }
           
            curl_close($curl);
        return json_encode($arrayName);
    }
}
