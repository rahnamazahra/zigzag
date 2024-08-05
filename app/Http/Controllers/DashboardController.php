<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Morilog\Jalali\Jalalian;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $tailor = Auth::user();

        $monthlyCustomerCounts = [];
        $currentYear = Carbon::now()->year;

        // Get all customers and their created_at dates
        $customers = $tailor->customers()->get(['created_at']);

        // Initialize monthly counts
        for ($i = 0; $i < 12; $i++) {
            $monthlyCustomerCounts[$i] = 0;
        }

        foreach ($customers as $customer) {
            $carbonDate = Carbon::parse($customer->created_at);
            $jalaliDate = Jalalian::fromCarbon($carbonDate);

            if ($jalaliDate->getYear() == Jalalian::fromCarbon(Carbon::now())->getYear()) {
                $jalaliMonth = $jalaliDate->getMonth();
                $monthlyCustomerCounts[$jalaliMonth - 1]++;
            }
        }

        return view('dashboard', compact('monthlyCustomerCounts'));
    }
}
