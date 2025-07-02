@extends('layouts.admin')

@section('title')
    Edit Data Petugas
@endsection

@section('content')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700">
                Edit Data Petugas
            </h2>

            <form action="{{ route('petugas.update', $petugas->id) }}" method="POST">
                @csrf


                <div class="mb-4">
                    <label class="block text-sm">
                        <span class="text-gray-700">Nama</span>
                        <input type="text" name="name" value="{{ old('name', $petugas->name) }}"
                            class="block w-full mt-1 text-sm form-input" />
                    </label>
                </div>

                <div class="mb-4">
                    <label class="block text-sm">
                        <span class="text-gray-700">No. HP</span>
                        <input type="text" name="phone" value="{{ old('phone', $petugas->phone) }}"
                            class="block w-full mt-1 text-sm form-input" />
                    </label>
                </div>

                <div class="mb-4">
                    <label class="block text-sm">
                        <span class="text-gray-700">Alamat</span>
                        <textarea name="alamat" class="block w-full mt-1 text-sm form-textarea">{{ old('alamat', $petugas->alamat) }}</textarea>
                    </label>
                </div>

                <div class="mb-4">
                    <label class="block text-sm">
                        <span class="text-gray-700">Role</span>
                        <select name="roles" class="block w-full mt-1 text-sm form-select">
                            <option value="ADMIN" {{ $petugas->roles === 'ADMIN' ? 'selected' : '' }}>ADMIN</option>
                            <option value="PETUGAS" {{ $petugas->roles === 'PETUGAS' ? 'selected' : '' }}>PETUGAS</option>
                        </select>
                    </label>
                </div>

                <div class="mb-4">
                    <label class="block text-sm">
                        <span class="text-gray-700">Email</span>
                        <input type="email" name="email" value="{{ old('email', $petugas->email) }}"
                            class="block w-full mt-1 text-sm form-input @error('email') border-red-500 @enderror" required
                            pattern="[^@\s]+@[^@\s]+\.[^@\s]+"
                            title="Masukkan format email yang valid (mis. nama@email.com)" />
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </label>
                </div>

                <div class="mb-4">
                    <label class="block text-sm">
                        <span class="text-gray-700">Password (Opsional)</span>
                        <input type="password" name="password" class="block w-full mt-1 text-sm form-input" />
                        <small class="text-gray-500">Kosongkan jika tidak ingin mengubah password</small>
                    </label>
                </div>

                <div class="mb-6">
                    <label class="block text-sm">
                        <span class="text-gray-700">Konfirmasi Password</span>
                        <input type="password" name="password_confirmation" class="block w-full mt-1 text-sm form-input" />
                    </label>
                </div>

                <button type="submit" class="px-5 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                    Simpan Perubahan
                </button>
            </form>
        </div>
    </main>
@endsection
