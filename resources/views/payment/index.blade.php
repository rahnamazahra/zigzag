@php use App\Enums\TransactionType; @endphp
@php use App\Enums\PaymentType; @endphp
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Khayat.ir') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight"> {{ __('messages.Payments') }} </h2>

                    <table class="mt-6 table">
                        <thead>
                        <tr>
                            <th> {{ __('messages.Id') }}</th>
                            <th> {{ __('messages.Order ID') }}</th>
                            <th> {{ __('messages.Amount') }}</th>
                            <th> {{ __('messages.Transaction Type') }}</th>
                            <th> {{ __('messages.Payment Type') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($payments as $payment)
                            <tr>
                                <td> {{ $payment->id }} </td>
                                <td> {{ $payment->order_id }} </td>
                                <td> {{ $payment->amount }} </td>
                                <td> {{ TransactionType::labels()[$payment->transaction_type->value] }} </td>
                                <td> {{ $payment->payment_type ? PaymentType::labels()[$payment->payment_type->value] : '-' }} </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="5">
                                <h3 class="font-semibold text-xl text-gray-600 leading-tight">
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
