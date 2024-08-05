@php
    use App\Enums\TransactionType;
    use App\Enums\PaymentType;
@endphp

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Khayat.ir') }}
            </h2>
            <x-btn-link class="ml-4" :href="route('payments.create', ['order' => $order->id])">
                {{ __('messages.Payments') }}
            </x-btn-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="card-body">
                        <div class="mb-8">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                {{ __('messages.Order ID') }}: {{ $order->id }} - {{ $order->customer->name }}
                            </h2>
                        </div>
                        <div class="mt-8 mb-8">
                            <h2 class="font-semibold text-xs text-gray-600 leading-tight">
                                {{ __('messages.Order Price') }}: {{ $order->price == 0 ? __('messages.Not determined') : number_format($order->price) }}
                            </h2>
                        </div>
                    </div>

                    <table class="mt-6 table-auto w-full">
                        <thead>
                        <tr>
                            <th class="px-4 py-2">{{ __('messages.Id') }}</th>
                            <th class="px-4 py-2">{{ __('messages.Amount') }}</th>
                            <th class="px-4 py-2">{{ __('messages.Transaction Type') }}</th>
                            <th class="px-4 py-2">{{ __('messages.Payment Type') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($payments as $payment)
                            <tr>
                                <td class="border px-4 py-2">{{ $payment->id }}</td>
                                <td class="border px-4 py-2">{{ number_format($payment->amount) }}</td>
                                <td class="border px-4 py-2">{{ TransactionType::labels()[$payment->transaction_type->value] ?? '-' }}</td>
                                <td class="border px-4 py-2">{{ $payment->payment_type ? PaymentType::labels()[$payment->payment_type->value] : '-' }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="mt-8 float-right">
                        <h5 class="font-semibold text-xs text-gray-600 leading-tight">
                            {{ number_format($balance * -1) . ' تومان بدهکاری تا کنون ' }}
                        </h5>
                        <h5 class="font-semibold text-xs text-gray-600 leading-tight">
                            {{ number_format($deposit) . ' تومان واریزی تا کنون ' }}
                        </h5>
                    </div>

                    <!-- Pagination Links -->
                    <div class="mt-4">
                        {{ $payments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
