<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>

    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4">
                <a class="float-right px-4 py-2 font-semibold text-sm bg-cyan-500 text-white rounded-full shadow-sm" href="{{ route('company.create') }}" >Create</a>
            </div>
            <div class="clear-both bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">         
                <br><br>
                <table class="table-auto min-w-full text-sm">
                    <thead class="bg-gray-300">
                        <tr>
                            <th class="text-left border-b py-2">Name</th>
                            <th class="text-left border-b py-2">Email</th>
                            <th class="text-left border-b py-2">Phone</th>
                            <th class="text-left border-b py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($companies as $item)
                        <tr>
                            <td class="border-b py-2">{{ $item->name }}</td>
                            <td class="border-b py-2">{{ $item->email }}</td>
                            <td class="border-b py-2">{{ $item->mobile }}</td>
                            <td class="border-b py-2">
                                <a href="{{ route('company.edit',$item->id) }}">Edit</a>
                                <a class="text-red-700" href="">Delete</a>
                                <form action="{{ route('company.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    
                                </form>
                                {{-- tipe 2 --}}
                                {{-- <a href="{{ route('company.edit',['company'=>$company->id]) }}">Edit</a>
                                <a class="text-red-700" href="">Delete</a>
                                <form action="{{ route('company.destroy',['id'=>$company->id]) }}" method="POST">
                                 
                                    
                                </form> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
