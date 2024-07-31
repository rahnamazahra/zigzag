<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSizeRequest;
use App\Http\Requests\UpdateSizeRequest;
use App\Models\Order;
use App\Models\Size;
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
            if ($value !== null) {
                $order->sizes()->create([
                    'order_id'       => $validated['order_id'],
                    'measurement_id' => $key,
                    'value'          => $value,
                ]);
            }
        }

        return redirect()->route('orders.index');
    }

    public function create(Order $order): Factory|View|Application
    {
        $cloth        = $order->clothingType;
        $measurements = $cloth->measurements()->get();

        return view('size.create', compact('measurements', 'order'));
    }

    public function show()
    {
        //
    }

    public function edit(Order $order): Factory|View|Application
    {
        $cloth        = $order->clothingType;
        $measurements = $cloth->measurements()->get();

        return view('size.edit', compact('measurements', 'order'));
    }

    public function update(UpdateSizeRequest $request, Order $order): RedirectResponse
    {
        $validated    = $request->validated();
        $measurements = $validated['measurement'];
        $order->sizes()->delete();

        foreach ($measurements as $key => $value) {
            if ($value !== null) {
                $order->sizes()->create([
                    'order_id'       => $order->id,
                    'measurement_id' => $key,
                    'value'          => $value,
                ]);
            }
        }

        return redirect()->route('orders.index');
    }

    public function destroy()
    {
        //
    }
}
