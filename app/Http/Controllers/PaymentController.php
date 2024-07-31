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
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index(): Factory|View|Application
    {
        $payments = Payment::orderBy('id', 'desc')->paginate(10);
        $balance = Payment::calculateBalance(null);
        $deposit = Payment::calculateDeposit(null);

        return view('payment.index', compact('payments', 'balance', 'deposit'));
    }

    public function store(StorePaymengtRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $order     = Order::find($validated['order_id']);

        $paymentData = [
            'order_id'         => $validated['order_id'],
            'transaction_type' => $validated['transaction_type'],
            'amount'           => $validated['amount'],
        ];

        if ($validated['transaction_type'] != -1) {
            $paymentData['payment_type'] = $validated['payment_type'];
        }

        $order->payments()->create($paymentData);

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
        $payments = Payment::where('order_id', $order->id)->orderBy('id', 'desc')->paginate(10);
        $balance = Payment::calculateBalance($order->id);
        $deposit = Payment::calculateDeposit($order->id);

        return view('payment.show', compact('payments', 'order', 'balance', 'deposit'));
    }
}
