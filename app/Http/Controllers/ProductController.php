<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\DataTables\Facades\DataTables;

use App\Models\Product;

use App\Models\Category;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProdukUpdateRequest;

use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

       if(request()->ajax())
        {

            $query = Product::with(['category']);
            return Datatables::of($query)
                ->addColumn('action', function($item) {
                    return'
                    <div class="flex items-center px-6 py-4">
                        <a class="btn btn-gradient-success rounded py-2 mr-2" href="' .route('product.edit', $item->id). '">
                            <svg class="w-6 h-6 text-blue-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M14 4.182A4.136 4.136 0 0 1 16.9 3c1.087 0 2.13.425 2.899 1.182A4.01 4.01 0 0 1 21 7.037c0 1.068-.43 2.092-1.194 2.849L18.5 11.214l-5.8-5.71 1.287-1.31.012-.012Zm-2.717 2.763L6.186 12.13l2.175 2.141 5.063-5.218-2.141-2.108Zm-6.25 6.886-1.98 5.849a.992.992 0 0 0 .245 1.026 1.03 1.03 0 0 0 1.043.242L10.282 19l-5.25-5.168Zm6.954 4.01 5.096-5.186-2.218-2.183-5.063 5.218 2.185 2.15Z" clip-rule="evenodd"/>
                            </svg>

                        </a>
                        <form action="'.route('product.destroy', $item->id).'" method="POST">
                            ' . method_field('delete') . csrf_field() .'
                                <button type="submit" class="btn btn-gradient-danger rounded show_confirm py-4 my-2" onclick="return confirm(`Yakin ingin hapus data?`)">
                                    <svg class="w-6 h-6  text-red-600 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                    </svg>
                                </button>
                        </form>
                    </div>
                ';
                })
                ->editColumn('photo', function($photo) {
                     return $photo->photo ?
                        '<img src="'. Storage::url($photo->photo) .'" style="max-height: 80px;"/>' : '';
                })
                ->rawColumns(['action', 'photo'])
                  ->make();
        }

        return view('pages.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.product.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {

        $data = $request->all();

        $data['photo'] = $request->file('photo')->store('assets/product', 'public');

        Product::create($data);
        return redirect()->route('product.index')->with('message',"Data Berhasil Ditambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Product::findOrFail($id);
        $categories = Category::all();

        return view('pages.product.edit', [
                'item'=> $item,
                'categories'=> $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProdukUpdateRequest $request, string $id)
    {
        $data = $request->all();
        $data['photo'] = $request->file('photo')->store('assets/product', 'public');

        $item = Product::findOrFail($id);
        $item->update($data);
        return redirect()->route('product.index')->with('message',"Data Berhasil Diupdate");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $item = Product::findOrFail($id);
        $item->delete();

        return redirect()->route('product.index')->with('message', 'Data Berhasil Dihapus');
    }
}
