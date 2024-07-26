<?php

namespace App\Http\Controllers;

use App\Enums\PaymentType;
use App\Enums\TransactionType;
use App\Http\Requests\StorePaymengtRequest;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class PaymentController extends Controller
{
    public function index(): Factory|View|Application
    {
        $payments = Payment::orderBy('id', 'desc')->paginate(20);

        return view('payment.index', compact('payments'));
    }

    public function store(StorePaymengtRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $order     = Order::find($validated['order_id']);
        $order->payments()->create([
            'order_id'         => $validated['order_id'],
            'transaction_type' => $validated['transaction_type'],
            'payment_type'     => $validated['payment_type'],
            'amount'           => $validated['amount'],
        ]);

        return redirect()->route('payments.show', ['order' => $order->id]);
    }

    public function create(Order $order): Factory|View|Application
    {
        $transactionTypes = TransactionType::getArray();
        $paymentTypes = PaymentType::getArray();

        return view('payment.create', compact('order', 'paymentTypes', 'transactionTypes'));
    }

    public function show(Order $order): Factory|View|Application
    {
        $payments = Payment::where('order_id', $order->id)->get();

        return view('payment.show', compact('payments', 'order'));
    }
}
