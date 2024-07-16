<?php

namespace App\Http\Controllers;

use App\Http\Requests\order\StoreOrderRequest;
use App\Http\Requests\order\UpdateOrderRequest;
use App\Models\Category;
use App\Models\Cloth;
use App\Models\Order;
use App\Models\Size;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(): Factory|View|Application
    {
        $orders = Order::query()->where('tailor_id', auth()->id())->orderBy('id', 'desc')->paginate(20);

        return view('order.index', compact('orders'));
    }

    public function store(StoreOrderRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $order = Order::query()->create([
            'tailor_id'   => Auth::id(),
            'customer_id' => $validated['customer_id'],
            'cloth_id'    => $validated['cloth_id'],
            'category_id' => $validated['category_id'],
            'quantity'    => $validated['quantity'],
            'price'       => $validated['price'],
        ]);

        return redirect()->route('sizes.create', ['order' => $order->id]);
    }

    public function create(User $customer): Factory|View|Application
    {
        $clothes    = Cloth::all()->pluck('name', 'id')->toArray();
        $categories = Category::all()->pluck('name', 'id')->toArray();

        return view('order.create', compact('customer', 'clothes', 'categories'));
    }

    public function show(Order $order): Factory|View|Application
    {
        $sizes = Size::where('order_id', $order->id)->get();
        return view('order.show', compact('sizes', 'order'));
    }

    public function edit(User $user): Factory|View|Application
    {
        return view('order.edit', compact('user'));
    }

    public function update(UpdateOrderRequest $request, User $user): RedirectResponse
    {
        $validated = $request->validated();

        $user->update([
            'name'   => $validated['name'],
            'mobile' => $validated['mobile'],
        ]);

        return redirect()->route('orders.index');
    }

    public function destroy(Order $order): RedirectResponse
    {
        $order->delete();

        return redirect()->back();
    }
}
