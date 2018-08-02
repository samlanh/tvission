<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
		$curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://staging.bookmebus.com/oauth/token",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "grant_type=client_credentials&client_id=7f8f8ffede42ab54572077a16d45919c7c8ecdba2f6becd75803003798a42ab3&client_secret=c552176efd6cc6ce12d5184d96c28c58e9af827b6e1da03f294f437bc34b0103",
        CURLOPT_HTTPHEADER => array(
          "Cache-Control: no-cache",
          "Content-Type: application/x-www-form-urlencoded",
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
         $array = json_decode($response);
              config(['app.access_token' => $array->access_token]);
              config(['app.token_type' => $array->token_type]);
      }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
