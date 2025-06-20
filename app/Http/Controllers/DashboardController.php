<?php

namespace App\Http\Controllers;

use App\Models\Notifications;
use App\Models\Payment;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use RealRashid\SweetAlert\Facades\Alert;
use Termwind\Components\Raw;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->guest()) {
            return redirect('/login');
        }
        if (auth()->user()->is_admin == 0) {
            abort(404);
        }
    
        // Menghitung total harga dari semua pembayaran dengan status "Down Payment"
        $payments = Payment::where('status', 'Down Payment')->get();
        $totalAmount = $payments->sum('price');

        // Menghitung total jumlah pembayaran per bulan
        $paymentsPerMonth = $payments->groupBy(function ($payment) {
            return Carbon::parse($payment->created_at)->format('M');
        });

        $months = [];
        $count = [];
        $qty = [];

        foreach ($paymentsPerMonth as $month => $paymentGroup) {
            $months[] = $month;
            $total = $paymentGroup->sum('price');
            $count[$month] = $total;
            $qty[] = $paymentGroup->count();
        }

        // dd($months);
        $currentMonth = Carbon::now()->format('M');
        $monthCount = isset($count[$currentMonth]) ? $count[$currentMonth] : 0;
        $currentMonthNumber = Carbon::now()->format('m') - 0;
        $previousMonthNumber = $currentMonthNumber - 1;
        $previousMonth = Carbon::createFromDate(null, $previousMonthNumber)->format('M');
        $transactionCount = Transaction::all()->count();
        $countPreviousMonth = 2;
        // dd($countPreviousMonth);
        $percentage = $countPreviousMonth > 0 ? ($monthCount / $countPreviousMonth) * 100 : 0;

        $kiri = 0;
        $kanan = 0;

        if ($percentage > 100) {
            $kiri = 100 / $percentage * 100;
            $kanan = ($percentage - 100) / $percentage * 100;
        } else if ($percentage == 0) {
            $kiri = 0;
            $kanan = 0;
        }

        return view('dashboard.index', compact('transactionCount', 'kiri', 'kanan', 'qty', 'totalAmount', 'months', 'count', 'monthCount', 'percentage'));
    }

    public function notifiable(Request $request)
    {
        // dd($request);
        if (auth()->guest()) {
            return redirect('/login');
        }
        if (auth()->user()->is_admin == 0) {
            abort(404);
        }
        // $no = json_decode($notif->data)->message[5] . json_decode($notif->data)->message[6] . json_decode($notif->data)->message[7];

        return redirect('/dashboard/order', compact('no'));
    }

    public function markall()
    {
        $notif = Notifications::where('status', 'unread')->get();
        foreach ($notif as $n) {
            $n->status = 'read';
            $n->read_at = Carbon::now();
            $n->save();
        }
        Alert::success('Success', 'Notification Read!');
        return redirect('/dashboard/order');
    }
}
