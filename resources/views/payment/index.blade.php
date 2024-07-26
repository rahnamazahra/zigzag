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
                                <td> {{ \App\Enums\TransactionType::labels()[$payment->transaction_type->value] }} </td>
                                <td> {{ \App\Enums\PaymentType::labels()[$payment->payment_type->value] }} </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
