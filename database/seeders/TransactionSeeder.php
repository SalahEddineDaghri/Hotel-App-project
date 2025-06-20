<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use App\Models\Payments;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        // ✅ طرق الدفع بالدرهم المغربي
        PaymentMethod::create([
            'nama' => 'Cash at Reception',
            'no_rek' => null,
        ]);

        PaymentMethod::create([
            'nama' => 'Credit Card (Stripe)',
            'no_rek' => null,
        ]);

        PaymentMethod::create([
            'nama' => 'Bank Transfer (CIH Bank)',
            'no_rek' => 'CIH-000-1234567890',
        ]);
         PaymentMethod::create([
            'nama' => 'Paypal',
            'no_rek' => null,
        ]);

    }
}
