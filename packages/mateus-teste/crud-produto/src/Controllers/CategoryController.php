<?php

namespace MateusTeste\CrudAdminlte\Controllers;

use App\Http\Controllers\Controller;

use MateusTeste\CrudAdminlte\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('CrudCP::categories.index', compact('categories'));
    }

    public function create()
    {
        return view('CrudCP::categories.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nome' => 'required|string|max:255']);
        Category::create($request->all());
        return redirect()->route('categories.index')->with('success', 'Categoria criada!');
    }

    public function edit(Category $category)
    {
        return view('CrudCP::categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate(['nome' => 'required|string|max:255']);
        $category->update($request->all());
        return redirect()->route('categories.index')->with('success', 'Categoria atualizada!');
    }

    public function destroy(Category $category)
    {
        dd($category);
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Categoria excluída!');
    }
}
