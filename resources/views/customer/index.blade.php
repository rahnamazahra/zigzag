<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Khayat.ir') }}
            </h2>
            <x-btn-link class="ml-4" :href="route('Customers.create')">New Customer</x-btn-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Customer") }}
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Brand</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
