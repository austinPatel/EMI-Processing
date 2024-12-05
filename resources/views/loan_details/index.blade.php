<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Loan Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table-auto border-collapse border border-gray-300 w-full">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border border-gray-300 px-4 py-2">Client ID</th>
                                <th class="border border-gray-300 px-4 py-2">Number of Payments</th>
                                <th class="border border-gray-300 px-4 py-2">First Payment Date</th>
                                <th class="border border-gray-300 px-4 py-2">Last Payment Date</th>
                                <th class="border border-gray-300 px-4 py-2">Loan Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($loanDetails as $loan)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $loan->clientid }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $loan->num_of_payment }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $loan->first_payment_date }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $loan->last_payment_date }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $loan->loan_amount }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center border border-gray-300 px-4 py-2">No Loan Details Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
