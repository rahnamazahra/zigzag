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
                    <div class="mb-6 text-gray-900">
                        {{ __('messages.Create Size Order for') }} {{$order->customer->name}}
                    </div>
                    <form method="POST" action="{{ route('sizes.store') }}">
                        @csrf

                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                        @foreach($measurements as $measurement)
                            <div>
                                <label for="measurement_{{ $measurement->id }}">{{ $measurement->title }}</label>
                                <x-text-input id="measurement_{{ $measurement->id }}"
                                              class="block mt-1 w-full"
                                              type="text"
                                              name="measurement[{{ $measurement->id }}]"
                                              :value="old('measurement.' . $measurement->id)"
                                              required />
                            </div>
                        @endforeach

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('messages.Save') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
