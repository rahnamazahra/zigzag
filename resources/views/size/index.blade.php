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
                    {{ __('messages.Orders') }}
                    <table class="mt-6 table">
                        <thead>
                        <tr>
                            <th>{{ __('messages.Id') }}</th>
                            <th>{{ __('messages.Name') }}</th>
                            <th>{{ __('messages.Mobile') }}</th>
                            <th>{{ __('messages.Status') }}</th>
                            <th>{{ __('messages.Created_at') }}</th>
                            <th>{{ __('messages.Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->customer->name }}</td>
                                <td>{{ $order->customer->mobile }}</td>
                                <td>{{ $order->status->label() }}</td>
                                <td>{{  $order->created_at }}</td>
                                <td class="flex space-x-4 justify-center items-center">
                                    <a href="{{ route('orders.show', ['order' => $order]) }}" class="text-blue-500 hover:text-blue-700">
                                        <i class="fas fa-info-circle fa-lg"></i>
                                    </a>
                                    <a href="{{ route('orders.edit', ['order' => $order]) }}" class="text-yellow-500 hover:text-yellow-700">
                                        <i class="fas fa-edit fa-lg"></i>
                                    </a>
                                    <a href="{{ route('orders.destroy', ['order' => $order]) }}" class="text-red-500 hover:text-red-700">
                                        <i class="fas fa-trash fa-lg"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
