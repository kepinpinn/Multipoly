<x-app-layout>
    <h1 class="w-full text-3xl text-black pb-6">Tambah Customer</h1>

    <div class="flex flex-wrap">
        <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
            <p class="text-xl pb-6 flex items-center">
                <i class="fas fa-list mr-3"></i> Customer Form
            </p>
            <div class="leading-loose">
                <form method="POST" action="{{ route('crm.store') }}">
                    @csrf

                    <!-- Nama Customer -->
                    <div>
                        <x-input-label for="nama_customer" :value="__('Nama Customer')" />

                        <x-text-input id="nama_customer" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" type="text" name="nama_customer" :value="old('nama_customer')" required autofocus />

                        <x-input-error :messages="$errors->get('nama_customer')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email_customer" :value="__('Email Customer')" />

                        <x-text-input id="email_customer" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" type="email" name="email_customer" :value="old('email_customer')" required />

                        <x-input-error :messages="$errors->get('email_customer')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="no_hp_customer" :value="__('No HP')" />

                        <x-text-input id="no_hp_customer" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" type="number" name="no_hp_customer" :value="old('no_hp_customer')" required />

                        <x-input-error :messages="$errors->get('no_hp_customer')" class="mt-2" />
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
