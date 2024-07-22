<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSizeRequest;
use App\Models\Order;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class SizeController extends Controller
{
    public function index()
    {
        //
    }

    public function store(StoreSizeRequest $request): RedirectResponse
    {
        $validated    = $request->validated();
        $order        = Order::find($validated['order_id']);
        $measurements = $validated['measurement'];

        foreach ($measurements as $key => $value) {
            $order->size()->create([
                'order_id'       => $validated['order_id'],
                'measurement_id' => $key,
                'value'          => $value,
            ]);
        }

        return redirect()->route('orders.show', ['order' => $order]);
    }

    public function create(Order $order): Factory|View|Application
    {
        $cloth        = $order->clothingType;
        $measurements = $cloth->measurements()->get();

        return view('size.create', compact('measurements', 'order'));
    }

    public function show()
    {
    }

    public function edit()
    {
        //
    }

    public function update()
    {
        //
    }

    public function destroy()
    {//
    }
}
