<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function createTransaction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal_pemesanan' => 'required',
            'alamat' => 'required',
            'pilihan' => 'required',
            'jumlah' => 'required',
            'total' => 'required',
        ]);

        if ($validator->fails()) {
            flash()->addError('Gagal Menyimpan Data');
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $validatedData = $validator->validated();
        $orderId = str_pad(mt_rand(1, 9999999999), 10, '0', STR_PAD_LEFT);
        $validatedData['total'] = str_replace('.', '', $validatedData['total']);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['order_id'] = $orderId;
        $rental = Rental::create($validatedData);
        $user = User::firstWhere('id', $rental->user_id);
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $rental->total,
            ],
            'item_details' => [
                [
                    'id' => $orderId,
                    'quantity' => '1',
                    'price' => $rental->total,
                    'name' => 'Rental untuk ' . ucwords($rental->pilihan),
                ],
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ],
        ];

        // Mendapatkan Snap Token dari Midtrans
        $snapToken = Snap::getSnapToken($params);
        $rental->snap_token = $snapToken;
        $rental->save();
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Ditambahkan',
            'data' => $snapToken,
        ], 200);
    }
    public function callback()
    {
        Config::$isProduction = false;
        Config::$serverKey = config('midtrans.server_key');
        $serverKey = config('midtrans.server_key');
        $notif = new \Midtrans\Notification();

        $transaction_time = $notif->transaction_time;
        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
        $status_code = $notif->status_code;
        $gross_amount = $notif->gross_amount;
        $fraud = $notif->fraud_status;
        $settlement_time = $notif->settlement_time;
        $midtrans = Rental::where('order_id', $order_id)->first();
        $midtrans->payment_type = $type;
        $midtrans->status = $transaction;
        $midtrans->settlement_time = $settlement_time;
        $midtrans->save();

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Ditambahkan',
            'data' => $notif,
        ], 200);
    }
}
