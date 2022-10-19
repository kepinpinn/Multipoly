<x-app-layout>
    <h1 class="text-3xl text-black pb-6">Customer Relationship Management</h1>
    <div class="w-full mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> Data Customer
        </p>
        <div class="w-full lg:w-1/2 pr-0 lg:pr-2">
            <p class="text-xl pb-3 flex items-center">
                @if (Auth::user()->role == 'marketing')
                <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                    href="{{route ('crm.tambah')}}">
                    Tambah Data Customer
                </a>
                @endif
            </p>
        </div>
        <div class="bg-white overflow-auto">
            <table class="text-left w-full border-collapse">
                <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                <thead>
                    <tr>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            ID</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            Nama Customer</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            Email Customer</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            No HP Customer</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($crm as $c)
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-grey-light">{{ $c->id }}</td>
                        <td class="py-4 px-6 border-b border-grey-light">{{ $c->nama_customer }}</td>
                        <td class="py-4 px-6 border-b border-grey-light">{{ $c->email_customer }}</td>
                        <td class="py-4 px-6 border-b border-grey-light">{{ $c->no_hp_customer }}</td>
                        <td class="py-4 px-6 border-b border-grey-light">
                            <p class="text-xl pb-3 flex items-center">
                                <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded"
                                    href="{{ route('crm.edit', ['id' => $c->id]) }}">
                                    Edit
                                </a>
                            </p>
                            <a class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                href="{{route('crm.destroy', ['id' => $c->id]) }}" onclick="return confirm('Yakin Hapus data?')">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>

</x-app-layout>
