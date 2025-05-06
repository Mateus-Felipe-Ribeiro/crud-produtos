<?php

namespace MateusTeste\CrudAdminlte\Controllers;

use App\Http\Controllers\Controller;

use MateusTeste\CrudAdminlte\Models\Product;
use MateusTeste\CrudAdminlte\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index() {
        $products = Product::paginate(10); // Paginação
        return view('CrudCP::products.index', compact('products'));
    }

    public function create() {
        $categories = Category::all();
        return view('CrudCP::products.create', compact('categories'));
    }

    public function store(Request $request) {
        $data = $request->validate(Product::$rules);

        // Upload da foto (se existir)
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('products', 'public');
        }

        Product::create($data);
        return redirect()->route('products.index')->with('success', 'Produto criado!');
    }

    public function edit(Product $product) {
        $categories = Category::all();
        return view('CrudCP::products.edit', compact('product','categories'));
    }

    public function update(Request $request, Product $product) {
        $data = $request->validate(Product::$rules);

        // Atualiza a foto (caso alterado)
        if ($request->hasFile('foto')) {
            if($product->foto)
                Storage::disk('public')->delete($product->foto); // Remove a antiga
            $data['foto'] = $request->file('foto')->store('products', 'public');
        }

        $product->update($data);
        return redirect()->route('products.index')->with('success', 'Produto atualizado!');
    }

    public function destroy(Product $product) {
        if ($product->foto) {
            Storage::disk('public')->delete($product->foto);
        }
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produto excluído!');
    }
}
