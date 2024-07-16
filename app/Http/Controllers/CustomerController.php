<?php

namespace App\Http\Controllers;

use App\Http\Requests\customer\StoreCustomerRequest;
use App\Http\Requests\customer\UpdateCustomerRequest;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Role;

class CustomerController extends Controller
{
    public function index(
    ): Factory|View|Application
    {
        $customers = User::query()->where('tailor_id', auth()->id())->orderBy('id', 'desc')->paginate(20);

        return view('customer.index', compact('customers'));
    }

    public function store(StoreCustomerRequest $request)
    {
        $validated = $request->validated();

        $customer = User::create([
            'name'      => $validated['name'],
            'mobile'    => $validated['mobile'],
            'tailor_id' => auth()->id(),
        ]);

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

    public function edit(User $user
    ): Factory|View|Application {
        return view('customer.edit', compact('user'));
    }

    public function update(UpdateCustomerRequest $request, User $user): RedirectResponse
    {
        $validated = $request->validated();

        $user->update([
            'name'   => $validated['name'],
            'mobile' => $validated['mobile'],
        ]);

        return redirect()->route('customers.index');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('customers.index');
    }
}
