<?php

namespace App\Http\Controllers;  // هذا السطر مهم جداً

use App\Models\Payment;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    // public function checkout(\Illuminate\Http\Request $request)
    // {
    //     Stripe::setApiKey(env('STRIPE_SECRET'));

    //     $amount = $request->input('amount'); // السعر بالـ USD
    //     // dd($amount);
    //     $x = $amount * 10;
    //     // $xx = $x;
    //     // Stripe يستعمل العملات بالـ cent => خاصك تحول لـ USD cents
    //     $usdExchangeRate = 10; // مثال فقط: 1 USD = 10 DH (ضبطه حسب السعر الحقيقي)
    //     $amountInUsdCents = intval(($amount / $usdExchangeRate) * 100);

    //     $session = StripeSession::create([
    //         'payment_method_types' => ['card'],
    //         'line_items' => [[
    //             'price_data' => [
    //                 'currency' => 'usd',
    //                 'product_data' => ['name' => 'Room Booking'],
    //                 'unit_amount' => $amountInUsdCents,
    //             ],
    //             'quantity' => 1,
    //         ]],
    //         'mode' => 'payment',
    //         'success_url' => url('/stripe/success'),
    //         'cancel_url' => url('/stripe/cancel'),
    //     ]);

    //     return redirect($session->url);
    // }


    // public function success()
    // {
    //     return view('payment.success');
    // }

    // public function cancel()
    // {
    //     return view('payment.cancel');
    // }








    public function checkout(Request $request)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $data = session('reservation_data');
        if (!$data) {
            return redirect('/')->with('error', 'Aucune donnée de réservation.');
        }

        $amount = (int) ($data['total_price'] * 100); // ex: 2000 MAD => 200000 centimes

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'mad',
                    'product_data' => [
                        'name' => 'Réservation chambre ' . $data['room_id'],
                    ],
                    'unit_amount' => $amount,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('stripe.success'),
            'cancel_url' => route('stripe.cancel'),
        ]);

        return redirect($session->url);
    }


    // public function success()
    // {
    //     // Enregistrer la réservation ici
    //     // Transaction::create([...]);
    //     session()->forget('reservation_data');
    //     return view('payment.success');
    // }

    public function success()
    {
        $data = session('reservation_data');

        if (!$data) {
            return redirect('/')->with('error', 'Les données de réservation sont manquantes.');
        }

        // Générer un code de facture unique
        $invoice = 'INV-' . strtoupper(Str::random(8));

        // Enregistrer la transaction
        $transaction = Transaction::create([
            'room_id' => $data['room_id'],
            'c_id' => $data['customer_id'],
            'check_in' => Carbon::parse($data['check_in']),
            'check_out' => Carbon::parse($data['check_out']),
            'status' => 'paid', // ou 'confirmé', selon ton système
        ]);

        // إنشاء سجل الدفع
        $count = Payment::count() + 1;

        $payment = Payment::create([
            'c_id' => $data['customer_id'],
            'transaction_id' => $transaction->id,
            'price' => $data['total_price'],
            'status' => 'Down Payment',
            'payment_method_id' => 2, // Stripe
            'invoice' => '0' . $data['customer_id'] . 'INV' . $count . Str::random(4),
        ]);

        // نرسل الإيميل للمستخدم
        // $customer = Customer::find($data['customer_id']);
        // if ($customer && $customer->email) {
        //     Mail::to($customer->email)->send(new BookingConfirmedMail($transaction));
        // }

        // Supprimer les données de session
        session()->forget('reservation_data');

        return view('payment.success', [
            'transaction' => $transaction,'payment'=> $payment
        ]);
    }

    public function cancel()
    {
        return view('payment.cancel');
    }
}
