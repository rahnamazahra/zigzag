<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
   public function __invoke()
   {
       $tailor = Auth::user();
       $tailor->loadCount(['customers', 'orders']);
       $customersCount = $tailor->customers_count;

       $ordersCount = $tailor->orders_count;
       return view('dashboard', compact('customersCount', 'ordersCount'));
   }
}
