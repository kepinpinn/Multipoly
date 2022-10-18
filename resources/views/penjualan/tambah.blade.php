<x-app-layout>
    <h1 class="w-full text-3xl text-black pb-6">Tambah Penjualan</h1>

    <div class="flex flex-wrap">
        <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
            <p class="text-xl pb-6 flex items-center">
                <i class="fas fa-list mr-3"></i> Form Penjualan
            </p>
            <div class="leading-loose">
                <form method="POST" action="{{ route('penjualan.store') }}"enctype="multipart/form-data">
                    @csrf

                    <!-- Nama Customer -->
                    <div>
                        <x-input-label for="nama_customer" :value="__('Nama Customer')" />
                        <select id="nama_customer" name="nama_customer"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 px-6 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($crms as $c)
                                <option value="{{ $c->id }}">{{ $c->nama_customer }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('nama_customer')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="nama_produk" :value="__('Nama Produk')" />
                        <x-text-input id="nama_produk"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                type="text" name="nama_produk" :value="old('nama_produk')" required />
                            <x-input-error :messages="$errors->get('nama_produk')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="ukuran" :value="__('Ukuran')" />

                        <x-text-input id="ukuran"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            type="text" name="ukuran" :value="old('ukuran')" required />

                        <x-input-error :messages="$errors->get('ukuran')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="harga_produk" :value="__('Harga Produk')" />

                        <x-text-input id="harga_produk"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            type="number" name="harga_produk" :value="old('harga_produk')" required />

                        <x-input-error :messages="$errors->get('harga_produk')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="jenis_produk" :value="__('Jenis Produk')" />

                        <x-text-input id="jenis_produk"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            type="text" name="jenis_produk" :value="old('jenis_produk')" required />

                        <x-input-error :messages="$errors->get('jenis_produk')" class="mt-2" />
                    </div>
                    <div class="flex items-center justify-end mt-4">

                        <x-primary-button class="ml-4">
                            {{ __('Submit') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>

</x-app-layout>
