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
                    <div class="card-body">
                        <div class="mb-8">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                {{__('messages.Order ID')}}: {{ $order->id }} - {{ $order->cloth->name }}
                            </h2>
                        </div>

                        <div class="">
                            <p class="card-text rtl pl-4 mt-8">
                                <span><strong> {{ $order->customer->name }} </strong></span><br>
                                <span><strong> {{__('messages.Mobile')}}: </strong> {{ $order->customer->mobile }} </span><br>
                                <span><strong> {{__('messages.National_code')}}: </strong> {{ $order->customer->national_code ?? '-' }} </span><br>
                                <span><strong> {{__('messages.Postal_code')}}: </strong> {{ $order->customer->postal_code ?? '-' }} </span><br>
                                <span><strong> {{__('messages.Address')}}: </strong> {{ $order->customer->address ?? '-' }} </span><br>
                                <span>
                                    <strong> {{__('messages.Deposit')}}: </strong>
                                    {{ $deposit > 0 ? number_format($deposit) : '-' }}
                                    <x-nav-link class="text-indigo-500 underline" :href="route('payments.show', ['order' => $order->id])">
                                        <strong> {{ 'جزییات پرداخت' }} </strong>
                                    </x-nav-link>
                                </span><br>
                                <span><strong> {{__('messages.Withdraw')}}: </strong> {{ $balance < 0 ? number_format($balance * -1) : '-' }} </span><br>
                                <span><strong> {{__('messages.Created_at')}}: </strong> {{ $order->created_at->format('Y-m-d H:i') }} </span><br>
                            </p>
                        </div>
                    </div>

                    <table class="mt-6 table">
                        <thead>
                        <tr>
                            <th> {{ __('messages.Id') }} </th>
                            <th> {{ __('messages.Cloth') }} </th>
                            <th> {{ __('messages.Value') }} </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($sizes as $size)
                            <tr>
                                <td> {{ $size->id }} </td>
                                <td> {{ $size->measurement->title }} </td>
                                <td> {{ $size->value }} </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
