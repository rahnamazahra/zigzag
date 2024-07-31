@php use App\Enums\TransactionType; @endphp
@php use App\Enums\PaymentType; @endphp
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Khayat.ir') }}
            </h2>
            <x-btn-link class="ml-4"
                        :href="route('payments.create', ['order' => $order->id])">{{ __('messages.Payments') }}</x-btn-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="card-body">
                        <div class="mb-8">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{__('messages.Order ID')}}
                                : {{ $order->id }} - {{ $order->customer->name }} </h2>
                        </div>
                        <div class="mt-8 mb-8">
                            <h2 class="font-semibold text-xs text-gray-600 leading-tight">{{__('messages.Order Price')}}
                                : {{  $order->price == 0 ? __('messages.Not determined') :  $order->price }} </h2>
                        </div>
                    </div>

                    <table class="mt-6 table">
                        <thead>
                        <tr>
                            <th> {{ __('messages.Id') }}</th>
                            <th> {{ __('messages.Amount') }}</th>
                            <th> {{ __('messages.Transaction Type') }}</th>
                            <th> {{ __('messages.Payment Type') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($payments as $payment)
                            <tr>
                                <td> {{ $payment->id }} </td>
                                <td> {{ $payment->amount }} </td>
                                <td> {{ TransactionType::labels()[$payment->transaction_type->value] }} </td>
                                <td> {{ $payment->payment_type ? PaymentType::labels()[$payment->payment_type->value] : '-' }} </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="4">
                                <h3 class="font-semibold text-xl text-gray-700 leading-tight">
                                    {{ number_format($balance * -1) . ' تومان بدهکاری تا کنون ' }}
                                    -
                                    {{ number_format($deposit). ' تومان واریزی تا کنون ' }}
                                </h3>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <!-- Pagination Links -->
                    <div class="mt-4">
                        {{ $payments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
