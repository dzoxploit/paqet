<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Organization;
use App\Models\Connote;

class PackageController extends Controller
{
    public function index(Request $request){

    }

    public function show($id)
    {
        return view('transaction', [
            'transaction' => Transaction::where('transaction_id', '=', $id)->first()
        ]);
    }
 
    public function store(Request $request)
    {

        $rules = [
            "transaction_id" => "required|string",
            "customer_name" => "required|string",
            "customer_code" => "required|int|unique",
            "transaction_amount" => "required|int",
            "transaction_discount" => "required|int",
            "transaction_additional_field" => "string|nullable",
            "transaction_payment_type" => "required|int",
            "transaction_state" => "required|string",
            "transaction_code" => "required|string",
            "transaction_order" => "required|int",
            "location_id" => "required|text",
            "organization_id" => "required|uniques:organizations",
            "transaction_payment_type_name" => "required|string",
            "transaction_cash_amount" => "required|int",
            "transaction_cash_change" => "required|int",
        ];
        $this->validate($request,$rules);

        $transaction = new Transaction;
 
        $transaction->transaction_id = $request->transaction_id;
        $transaction->customer_name = $request->customer_name;
        $transaction->customer_code = $request->customer_code;
        $transaction->transaction_amount = $request->transaction_amount;
        $transaction->transaction_discount = $request->transaction_discount;
        $transaction->transaction_additional_field = $request->transaction_additional_field;
        $transaction->transaction_payment_type = $request->transaction_payment_type;
        $transaction->transaction_state = $request->transaction_state;
        $transaction->transaction_code = $request->transaction_code;
        $transaction->location_id = $request->location_id;
        $transaction->organization_id = $request->organization_id;
        $transaction->transaction_payment_type_name = $request->transaction_payment_type_name;
        $transaction->transaction_cash_amount = $request->transaction_cash_amount;
        $transaction->transaction_cash_change = $request->transaction_cash_change;

        
        $customerattribute[] = [
            'nama_sales' => $request->nama_sales,
            'top' => $request->top,
            'jenis_pelanggan' => $request->jenis_pelanggan,
        ];

        $transaction->customer_attribute = json_encode($customerattribute);

        $connote = new Connote;
        $connotes[] = [
            "connote_id" => "f70670b1-c3ef-4caf-bc4f-eefa702092ed",
            "connote_number": 1,
            "connote_service": "ECO",
            "connote_service_price": 70700,
            "connote_amount": 70700,
            "connote_code": "AWB00100209082020",
            "connote_booking_code": "",
            "connote_order": 326931,
            "connote_state": "PAID",
            "connote_state_id": 2,
            "zone_code_from": "CGKFT",
            "zone_code_to": "SMG",
            "surcharge_amount": null,
                "transaction_id": "d0090c40-539f-479a-8274-899b9970bddc",
            "actual_weight": 20,
            "volume_weight": 0,
            "chargeable_weight": 20,
            "created_at": "2020-07-15T11:11:12+0700",
            "updated_at": "2020-07-15T11:11:22+0700",
            "organization_id": 6,
            "location_id": "5cecb20b6c49615b174c3e74",
            "connote_total_package": "3",
            "connote_surcharge_amount": "0",
            "connote_sla_day": "4",
            "location_name": "Hub Jakarta Selatan",
            "location_type": "HUB",
            "source_tariff_db": "tariff_customers",
            "id_source_tariff": "1576868",
            "pod": null,
            "history": []
    
        ];

        $transaction->save();
 
        return response()->json(["package" => $transaction], 201);
    }

    public function edit(Request $request)
    {
        $post = new Post;
 
        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = $request->slug;
 
        $post->save();
 
        return response()->json(["result" => "ok"], 201);
    }

    public function update(Request $request)
    {
        $post = new Post;
 
        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = $request->slug;
 
        $post->save();
 
        return response()->json(["result" => "ok"], 201);
    }

    public function delete(Request $request)
    {
        $post = new Post;
 
        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = $request->slug;
 
        $post->save();
 
        return response()->json(["result" => "ok"], 201);
    }


}
