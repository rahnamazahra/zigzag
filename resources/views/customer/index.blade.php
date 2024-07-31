<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Khayat.ir') }}
            </h2>
            <x-btn-link class="ml-4" :href="route('customers.create')">{{ __('messages.New Customer') }}</x-btn-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight"> {{ __('messages.Customers') }}</h2>

                    <table class="mt-6 table">
                        <thead>
                        <tr>
                            <th>{{ __('messages.Id') }}</th>
                            <th>{{ __('messages.Name') }}</th>
                            <th>{{ __('messages.Mobile') }}</th>
                            <th>{{ __('messages.Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{$customer->id}}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->mobile }}</td>
                                <td colspan="2" class="grid grid-cols-2 gap-1">
                                    <a href="{{ route('orders.create', ['customer' => $customer->id]) }}"
                                       class="btn btn-success">
                                        <i class="bi bi-plus"></i>
                                    </a>

                                    <a href="{{ route('customers.edit', ['customer' => $customer->id]) }}"
                                       class="btn btn-success">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination Links -->
                    <div class="mt-4">
                        {{ $customers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
