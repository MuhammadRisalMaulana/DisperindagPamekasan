@extends('layouts.admin')

@section('title')
    MADUKONCER | Data Petugas
@endsection

@section('content')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Form
            </h2>

            <form action="{{ route('petugas.store') }} " method="POST" enctype="multipart/form-data">
                @csrf
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Nama</span>
                        <input
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray"
                            type="text" placeholder="Nama" value="{{ old('name') }}" name="name"
                            required></input>
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Alamat</span>
                        <input
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray"
                            type="text" placeholder="Alamat" value="{{ old('alamat') }}" name="alamat" required></input>
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Email</span>
                        <input
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray"
                            type="email" placeholder="Email" value="{{ old('email') }}" name="email"
                            required></input>
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">No. Hp</span>
                        <input
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray"
                            type="text" placeholder="No Telepon" value="{{ old('phone') }}" name="phone"
                            required></input>
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Role</span>
                        <select
                            class="block w-full text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray"
                            name="roles" required>
                            <option value="PETUGAS">Petugas</option>
                        </select>
                    </label>
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Password</span>
                        <input
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray"
                            type="password" placeholder="Password" value="{{ old('password') }}" name="password"
                            required></input>
                    </label>
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Konfirmasi Password</span>
                        <input
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray"
                            type="password" placeholder="Confirm Password" value="{{ old('password') }}"
                            name="password_confirmation" required></input>
                    </label>


                    <button type="submit"
                        class="mt-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                        Tambah Petugas
                    </button>
                </div>
            </form>
        </div>
    </main>
@endsection
