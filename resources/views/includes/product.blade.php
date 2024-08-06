
@foreach($product as $item)
  <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
      <img class="h-50 w-full object-cover rounded-xl" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front.svg" alt="" />
    <div class="px-5 pb-5">
        <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $item->name }}</h5>
        <div class="flex items-center mt-2.5 mb-5">
            <p class="text-gray-700 text-xs font-semibold py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">{{ $item->deskripsi }}</p>
        </div>
        <div class="flex items-center justify-between">
            <span class="text-sm font-bold text-gray-900 dark:text-white">Rp. {{ Number::format($item->harga) }}</span>
            <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add to cart</a>
        </div>
    </div>
</div>

@endforeach



