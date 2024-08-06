@extends('layouts.dashboard-index')

@section('title')
Update Produk
@endsection

@section('content')
    <div class="p-4 sm:ml-64 sm:p-5 ">
        <div class="p-4">
            <div class="grid grid-cols-4 gap-4 mb-4">
                <div class="flex items-center justify-center h-24">
                    <svg class="w-6 h-6 text-purple-800 dark:text-white mx-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.75 4H19M7.75 4a2.25 2.25 0 0 1-4.5 0m4.5 0a2.25 2.25 0 0 0-4.5 0M1 4h2.25m13.5 6H19m-2.25 0a2.25 2.25 0 0 1-4.5 0m4.5 0a2.25 2.25 0 0 0-4.5 0M1 10h11.25m-4.5 6H19M7.75 16a2.25 2.25 0 0 1-4.5 0m4.5 0a2.25 2.25 0 0 0-4.5 0M1 16h2.25"/>
                    </svg>
                    <p class="text-2xl text-semibold">Update Produk </p>
                </div>
            </div>
        </div>

<form action="{{ route('product.update', $item->id) }}" lass="max-w-md mx-auto" method="post" enctype="multipart/form-data">
     @method('PUT')
    @csrf
  <div class="grid gap-6 mb-6 md:grid-cols-2">

        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Produk</label>
            <input type="text"  value="{{ $item->name }}" name="name" id="name" class="@error('name') is-invalid @enderror border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Nama Produk" />

            @error('name')
            <p id="name" class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror

        </div>

        <div>
            <label for="categoried_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
            <select id="categoried_id"  name="categories_id" class="@error('categories') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                <option  selected disabled >Pilih Kategori</option>
                    @foreach ($categories as  $category )
                        <option  value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach

            </select>
            @error('categories_id')
            <p id="categories" class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
            <input type="number" value="{{ $item->harga }}" name="harga" id="harga" class="@error('harga') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Rp. xxxxx" />
            @error('harga')
            <p id="harga" class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="photo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Photo</label>
            <input type="file" name="photo" id="photo"  class="@error('photo') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Rp. xxxxx" />
            @error('photo')
            <p id="photo" class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="kontak" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kontak</label>
            <input type="number" value="{{ $item->kontak }}" name="kontak" id="kontak" class="@error('kontak') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="085xxxxxxx" />
            @error('kontak')
            <p id="kontak" class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="mb-5">

        <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
        <textarea
            id="deskripsi"
            value="{{ $item->deskripsi }}"
            name="deskripsi" rows="4"
            class="@error('deskripsi') is-invalid @enderror block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Deskripsi"></textarea>
            @error('deskripsi')
            <p id="deskripsi" class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror

    </div>

    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    <a href="{{ route('product.index') }}" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Batal</a>
</form>

@endsection
