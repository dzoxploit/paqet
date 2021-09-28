<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Organization;
use App\Models\Connote;
use Carbon\Carbon;

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

        $transaction->connote_id = $connote->nextid();

        $connotes[] = [
            "connote_id" => $connote->nextid(),
            "connote_number" => $request->connote->connote_number,
            "connote_service" =>  $request->connote->connote_service,
            "connote_service_price" =>  $request->connote->connote_service_price,
            "connote_amount" => $request->connote->connote_amount,
            "connote_code" => $request->connote->connote_code,
            "connote_order" => $request->connote_corder,
            "connote_booking_code" => $request->connote->connote_booking_code,
            "connote_state" => $request->connote->connote_state,
            "connote_state_id" => $request->connote->connote_state_id,
            "zone_code_from" => $request->connote->zone_code_from,
            "zone_code_to" => $request->connote->zone_code_to,
            "surcharge_amount" => $request->connote->supercharge_amount,
            "transaction_id" => $request->connote->transaction_id,
            "actual_weight" => $request->connote->actual_weight,
            "volume_weight" => $request->connote->volume_weight,
            "chargeable_weight" => $request->connote->chargeble_weight,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
            "organization_id" => $request->organization_id,
            "location_id" => $request->location_id,
            "connote_total_package" => $request->connote->connote_total_package,
            "connote_surcharge_amount" => $request->connote->connote_supercharge_amount,
            "connote_sla_day" => $request->connote->connote_sla_day,
            "location_name" => $request->connote->location_name,
            "location_type" => $request->connote->location_type,
            "source_tariff_db" => $request->connote->source_tariff_db,
            "id_source_tariff" => $request->connote->id_source_tariff,
            "pod" => null,
            "history" => []
        ];

        $connoted = $connote->create(json_encode($connotes));
        $transaction->connote = json_encode($connotes);
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
