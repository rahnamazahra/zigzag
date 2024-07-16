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
                        <h5 class="card-title">{{ $order->customer->name }}</h5>
                        <p class="card-text rtl">
                            <strong>{{__('messages.Mobile')}}:</strong> {{ $order->customer->mobile }}<br>
                            <strong>{{__('messages.Order ID')}}:</strong> {{ $order->id }}<br>
                            <strong>{{__('messages.Status')}}:</strong> {{ $order->status->label() }}<br>
                            <strong>{{__('messages.Created_at')}}:</strong> {{ $order->created_at->format('Y-m-d H:i') }}
                        </p>
                    </div>

                    <table class="mt-6 table">
                        <thead>
                        <tr>
                            <th>{{ __('messages.Id') }}</th>
                            <th>{{ __('messages.Cloth') }}</th>
                            <th>{{ __('messages.Value') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($sizes as $size)
                            <tr>
                                <td>{{ $size->id }}</td>
                                <td>{{ $size->measurement->title }}</td>
                                <td>{{ $size->value }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
