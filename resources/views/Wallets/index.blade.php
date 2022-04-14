<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Wallets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">N</th>
                            <th scope="col">Name</th>
                            <th scope="col">Type</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($wallets AS $wallet)
                              <tr>
                                  <td>{{$loop->index+1}}</td>
                                  <td>{{$wallet->name}}</td>
                                  <td>{{$wallet->type}}</td>
                              </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

