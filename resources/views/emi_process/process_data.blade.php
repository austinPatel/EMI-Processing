<!-- resources/views/process_data.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('EMI Process data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(isset($success))
                        <div class="alert alert-success">
                            {{ $success }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('emiprocess.data') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Process Data</button>
                    </form>

                    @if(!empty($data))
                        <div class="mt-5 overflow-x-auto">
                            <h3>EMI Details</h3>
                            <table class="table-auto border-collapse border border-gray-300 w-full ">
                                <thead>
                                    <tr class="bg-gray-200">
                                        @foreach($columns as $column)
                                            <th>{{ $column }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $row)
                                        <tr>
                                            @foreach($columns as $column)
                                                <td>{{ $row->$column ?? 0 }}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="mt-5">No data found. Click "Process Data" to generate EMI details.</p>
                    @endif
                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
