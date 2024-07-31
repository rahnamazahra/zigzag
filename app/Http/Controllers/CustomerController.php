<?php

namespace App\Http\Controllers;

use App\Http\Requests\customer\StoreCustomerRequest;
use App\Http\Requests\customer\UpdateCustomerRequest;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;

class CustomerController extends Controller
{
    public function index(
    ): Factory|View|Application
    {
        $customers = User::query()->where('tailor_id', auth()->id())->orderBy('id', 'desc')->paginate(10);

        return view('customer.index', compact('customers'));
    }

    public function store(StoreCustomerRequest $request)
    {
        $validated = $request->validated();
        $validated = Arr::except($validated, 'tailor_id');

        $customer = User::make($validated);
        $customer->tailor_id = auth()->id();
        $customer->save();

        //TODO: event
        $role = Role::firstWhere('name', 'customer');
        $customer->assignRole($role);

        return redirect()->route('orders.create', ['customer' => $customer->id]);
    }

    public function create(
    ): Factory|View|Application
    {
        return view('customer.create');
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $customer): Factory|View|Application {
        return view('customer.edit', compact('customer'));
    }

    public function update(UpdateCustomerRequest $request, User $customer): RedirectResponse
    {
        $validated = $request->validated();

        $customer->update($validated);

        return redirect()->route('customers.index');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('customers.index');
    }
}
