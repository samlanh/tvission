<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Config;
use Redirect;
use App\ticketOrderModel;
use Illuminate\Support\Carbon;
class indexController extends Controller
{
    private  $credential;
    public function __construct(){
           $this->credential = env("BOOK_APP_ID");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
      // echo Config::get('app.book_app_secret');exit();
      // dd();
       return view("main/index");
      
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

    public function result(Request $request){
      
      $date=date_create($request->on_date);
      $ondate =  date_format($date,"d/m/Y");
      $querysearch = [
          'from'=>$request->from,
          'to'=>$request->to,
          'on_date'=>$ondate,
          
      ];

        $access_token = Config::get('app.access_token');
        $token_type = Config::get('app.token_type');
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => env("BOOK_HOST")."/api/v1/ticket_searches",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
         CURLOPT_POSTFIELDS => json_encode($querysearch),
        CURLOPT_HTTPHEADER => array(
          "Authorization: $token_type $access_token",
          "Cache-Control: no-cache",
          "Content-Type: application/json"
        ),
      ));

$response = curl_exec($curl);
 $array = json_decode($response)->data;
 return view('main.result', ['data' => $array]);

    

    }

   

    function ticket(Request $request){
      
      $date=date_create($request->on_date);
      $ondate =  date_format($date,"d/m/Y");
      if($ondate < date("d/m/Y")){
        $ondate = date("d/m/Y",strtotime("+1 day"));
      }
      $querysearch = [
          'route_schedule_vehicle_id'=>$request->route_schedule_vehicle_id,
          'on_date'=>$ondate,
          
      ];
      // dd(json_encode($querysearch));
      $access_token = Config::get('app.access_token');
      $token_type = Config::get('app.token_type');
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => env("BOOK_HOST")."/api/v1/route_operator_selections",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
         CURLOPT_POSTFIELDS => json_encode($querysearch),
        CURLOPT_HTTPHEADER => array(
         "Authorization: $token_type $access_token",
          "Cache-Control: no-cache",
          "Content-Type: application/json",
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);
      $array  = array();
      if ($err) {
        echo "cURL Error #:" . $err;
        exit();
      } else {
        $array = json_decode($response)->data;
        
      }

     
      $curl = curl_init();
      curl_setopt_array($curl, array(
      CURLOPT_URL => env("BOOK_HOST")."/api/v1/vehicle_seat_availabilities",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_POSTFIELDS => json_encode($querysearch),
        CURLOPT_HTTPHEADER => array(
          "Authorization: $token_type $access_token",
          "Cache-Control: no-cache",
          "Content-Type: application/json",
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      $arraySeat  = array();
      if ($err) {
        echo "cURL Error #:" . $err;
      } else {     
         $arraySeat = json_decode($response)->data;
      }

    return view('main.selectseat', ['data' => $array,'seat' => $arraySeat]);

    }


    function requestticket(Request $request){
       // dd($request->all());
      if(!empty($request->txtSelectedSeat)){
        $ids = explode(",", $request->txtSelectedSeat);
        $arrayTicket = array();
        foreach ($ids as $key => $value) {
          $seat= "txtSeatId".($key+1);
          $is_local= "is_local".($key+1);
          $txtName= "txtName".($key+1);
          $cboGender= "cboGender".($key+1);
        
          $array = array(
            'route_schedule_vehicle_id' => $request->routeScheduleVehicleId,
            'operator_id' => $request->operator_id,
            'vehicle_seat_id' => $request->$seat,
            'departure_date' => date("d/m/Y",strtotime($request->departuredate)),
            'is_local' => $request->$is_local,
            'contact_email' => $request->email,
            'contact_phone' =>$request->phone_number,
            'is_pickup' => 1,
            'name' => $request->$txtName,
            'gender' => $request->$cboGender,
            'address' => null,
            'note' => null,
            'is_request' => false,
             );
          array_unshift($arrayTicket, $array);
          
        }

        $arrayTicketCart = array(
          'refunded_ticket_id' => null,
          'promotional_code' => null, 
          'tickets' => $arrayTicket);
          // dd(json_encode($arrayTicketCart));
      // dd($arrayTicketCart);
       $access_token = Config::get('app.access_token');
       $token_type = Config::get('app.token_type');
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => env("BOOK_HOST")."/api/v1/ticket_carts",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => json_encode($arrayTicketCart),
          CURLOPT_HTTPHEADER => array(
             "Authorization: $token_type $access_token",
            "Cache-Control: no-cache",
            "Content-Type: application/json",
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);

        $array = json_decode($response);
        // dd($array);
    
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
           
          $arrayOrder = json_decode($response)->data;        
          $tokenOrder = $arrayOrder->attributes->token;

          $this->insertOrderTicket($arrayOrder);
          return redirect('tickets/pay?id='.$tokenOrder)->with('arrayOrder', $arrayOrder);
       
        }
      }

    }

      function insertOrderTicket($arrayOrder){
         DB::table('tv_ticket_order')->insert(
            [
            'ticket_order_number' => $arrayOrder->attributes->ticket_order_number, 
            'amount' => $arrayOrder->attributes->amount, 
            'total_original_fare' => $arrayOrder->attributes->total_original_fare, 
            'total_fare' => $arrayOrder->attributes->total_fare, 
            'discount' => $arrayOrder->attributes->discount, 
            'status' => $arrayOrder->attributes->status, 
            'time_to_cancel_in_sec' => $arrayOrder->attributes->time_to_cancel_in_sec, 
            'token' => $arrayOrder->attributes->token, 
            'created_at' => $arrayOrder->attributes->created_at,
             'createddate' => $arrayOrder->attributes->created_at,
            'completed_at' =>$arrayOrder->attributes->completed_at, 
            'user_id' => 1, 
            
            ]
        );
         return 1;
      }
    function makeBmbPayment($orderCode){
      $access_token = Config::get('app.access_token');
       $token_type = Config::get('app.token_type');

         $arrayBody = array(
          'order' => $orderCode,
          );

        $curl = curl_init();
          curl_setopt_array($curl, array(
          CURLOPT_URL => env("BOOK_HOST")."/api/v1/bmb_credits",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => json_encode($arrayBody),
          CURLOPT_HTTPHEADER => array(
             "Authorization: $token_type $access_token",
            "Cache-Control: no-cache",
            "Content-Type: application/json",
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
    
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          return $response;
        }
    }
    function getTiketOrder($orderToken,$token_type,$access_token){
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => env("BOOK_HOST")."/api/v1/ticket_orders/".$orderToken,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "Cache-Control: no-cache",
            "Content-Type: application/json",
            "Authorization: $token_type $access_token",
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          return $response;
        }
    }
    public function payment(Request $request){
        
        $arrayOrder = ticketOrderModel::whereToken($request->id)->first();

// dd($arrayOrder);
        $tokenOrder = $request->id;
        $access_token = Config::get('app.access_token');
        $token_type = Config::get('app.token_type');
        $tickets = $this->getTiketOrder($tokenOrder,$token_type,$access_token);
        $arrayTicket = json_decode($tickets)->data;
        // dd($arrayTicket);
      return view('main.ticketpay', ['arrayOrder'=>$arrayOrder, 'tickets' => $arrayTicket]); 
    }

    function comfirmpayment(Request $request){

      $orderToken = $request->id;
        $access_token = Config::get('app.access_token');
        $token_type = Config::get('app.token_type');
        $ticket = $this->getTiketOrder($orderToken,$token_type,$access_token); 
        $payment = $this->makeBmbPayment($orderToken); 
        
        $arrayPayment = json_decode($payment)->data;
        dd($arrayPayment);
        if($arrayPayment->attributes->status_code==0){
          $this->updateOrderTicket($arrayPayment->attributes->ticket_order->token);
        }
         return view('main.returnticket', ['paymentResult'=>$payment, 'ticketsResult' => $ticket]); 
        }
    }


     function updateOrderTicket($orderToken){
          $booking = new ticketOrderModel;
            $booking->where('token', $orderToken)
            ->update(['status' => "completed"]);
         return 1;
      }
}
