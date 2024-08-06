@extends('layouts.dashboard-index')

@section('title')

@endsection

@section('content')
    <div class="p-4 sm:ml-64 sm:p-5 ">
        <div class="flex- flex-wrap  mx-11 my-14">
            <div class="flex items-center me-4">
                <a href="{{ route('product.index') }}">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7"/>
                    </svg>

                </a>
                <p class="text-2xl px-4 text-semibold w-full">Tambah Produk </p>
            </div>
        </div>
        <form action="{{ route('product.store') }}" lass="max-w-md mx-auto" method="post" enctype="multipart/form-data">
            @csrf
        <div class="grid gap-6 mb-6 md:grid-cols-2">

                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Produk</label>
                    <input
                    type="text"
                    name="name" id="name"
                    aria-describedby="name"
                    class="bg-gray-50 border @error('name') is-invalid @enderror  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Masukkan Nama Produk"
                    />

                    @error('name')
                    <p id="name" class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror

                </div>


                <div>
                    <label for="categori_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                    <select id="categori_id" aria-describedby="categories_id" name="categories_id" class=" @error('categories_id') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  >
                        <option  selected disabled>Pilih Kategori</option>
                            @foreach ($categories as  $category )
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach

                    </select>
                    @error('categories_id')
                    <p id="categories_id" class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
                </div>

                <div>
                    <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>

                    <input type="number"
                    aria-describedby="harga"
                    name="harga" id="harga"
                    class="@error('harga') is-invalid @enderror
                    bg-gray-50 border border-gray-300
                    text-gray-900 text-sm rounded-lg focus:ring-blue-500
                    focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                    dark:border-gray-600 dark:placeholder-gray-400
                    dark:text-white dark:focus:ring-blue-500
                    dark:focus:border-blue-500"
                    placeholder="Rp. xxxxx"  />

                    @error('harga')
                        <p id="harga" class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Photo</label>
                    <input type="file"
                    aria-describedby="photo" name="photo" id="photo" class="@error('photo') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Rp. xxxxx" />

                    @error('photo')
                    <p id="photo" class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="kontak" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kontak</label>
                    <input type="number"
                    aria-describedby="kontak" name="kontak" id="kontak" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="085xxxxxxx"  />

                    @error('kontak')
                    <p id="kontak" class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror

                </div>
            </div>

            <div class="mb-5">

                <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                <textarea id="deskripsi" aria-describedby="deskripsi" name="deskripsi" rows="4" class="@error('deskripsi') is-invalid @enderror block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>

                @error('deskripsi')
                    <p id="deskripsi" class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 sm:mb-80 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>

@endsection
