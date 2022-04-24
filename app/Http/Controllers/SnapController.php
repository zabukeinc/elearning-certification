<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Veritrans\Midtrans;
use Illuminate\Validation\Rules\Unique;

class SnapController extends Controller
{
    public function __construct()
    {
        Midtrans::$serverKey = env('MIDTRANS_SERVER_KEY');
        //set is production to true for production mode
        Midtrans::$isProduction = false;
    }

    public function snap()
    {
        return view('snap_checkout');
    }

    public function token()
    {
        $midtrans = new Midtrans;
        try {
            $snap_token = $midtrans->getSnapToken($this->getTransactionFromCart());
            //return redirect($vtweb_url);
            return $snap_token;
        } catch (Exception $e) {
            return $e->getMessage;
        }
    }

    public function finish(Request $request)
    {
        $result = $request->input('result_data');
        $result = json_decode($result);
        echo $result->status_message . '<br>';
        echo 'RESULT <br><pre>';
        var_dump($result);
        echo '</pre>';
    }

    public function notification()
    {
        $midtrans = new Midtrans;
        echo 'test notification handler';
        $json_result = file_get_contents('php://input');
        $result = json_decode($json_result);

        if ($result) {
            $notif = $midtrans->status($result->order_id);
        }

        error_log(print_r($result, TRUE));

        /*
        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
        $fraud = $notif->fraud_status;

        if ($transaction == 'capture') {
          // For credit card transaction, we need to check whether transaction is challenge by FDS or not
          if ($type == 'credit_card'){
            if($fraud == 'challenge'){
              // TODO set payment status in merchant's database to 'Challenge by FDS'
              // TODO merchant should decide whether this transaction is authorized or not in MAP
              echo "Transaction order_id: " . $order_id ." is challenged by FDS";
              } 
              else {
              // TODO set payment status in merchant's database to 'Success'
              echo "Transaction order_id: " . $order_id ." successfully captured using " . $type;
              }
            }
          }
        else if ($transaction == 'settlement'){
          // TODO set payment status in merchant's database to 'Settlement'
          echo "Transaction order_id: " . $order_id ." successfully transfered using " . $type;
          } 
          else if($transaction == 'pending'){
          // TODO set payment status in merchant's database to 'Pending'
          echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
          } 
          else if ($transaction == 'deny') {
          // TODO set payment status in merchant's database to 'Denied'
          echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
        }*/
    }

    public function getTransactionFromCart()
    {
        $carts = json_decode(request()->cookie("kd-carts"), true);

        $subtotal = collect($carts)->sum(function ($q) {
            return $q['qty'] * $q['product_price'];
        });

        $transaction_details = array(
            'order_id' => uniqid(),
            'gross_amount' => $subtotal
        );

        $items = [];

        foreach ($carts as $cart) {
            $items[] = [
                'id' => $cart['product_id'],
                'price' => $cart['product_price'],
                'quantity' => $cart['qty'],
                'name' => $cart['product_name']
            ];
        }

        $name = Auth::user()->name;

        $billing_address = array(
            'first_name'    => $name,
            'address'       => "Gegerkalong, Ciwaruga.",
            'city'          => "Bandung",
            'postal_code'   => "12345",
            'phone'         => "081322311801",
            'country_code'  => 'IDN'
        );

        $shipping_address = array(
            'first_name'    => $name,
            'address'       => "Bakerstreet 221B.",
            'city'          => "Jakarta",
            'postal_code'   => "51162",
            'phone'         => "081322311801",
            'country_code'  => 'IDN'
        );


        // Populate customer's Info
        $customer_details = array(
            'first_name'      => $name,
            'email'           => "andrisetiawan@asdasd.com",
            'phone'           => "081322311801",
            'billing_address' => $billing_address,
            'shipping_address' => $shipping_address
        );

        $credit_card['secure'] = true;
        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O", $time),
            'unit'       => 'hour',
            'duration'   => 2
        );

        $transaction_data = array(
            'transaction_details' => $transaction_details,
            'item_details'       => $items,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

        return $transaction_data;
    }
}
