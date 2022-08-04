<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryStoreRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $categories=Category::all();
        $categoryName=Category::get()->name;
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryStoreRequest $request
     * @return Application|Factory|View
     */
    public function store(CategoryStoreRequest $request): View|Factory|Application
    {
        $image = $request->file('image')->store('public/categories');

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image
        ]);
        $categories=Category::all();
        return view('admin.categories.index' ,compact('categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    // public function show($id)
    //{
        //
    //}

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Application|Factory|View
     */
    public function edit(Category $category): View|Factory|Application
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        $image = $category->image;
        if ($request->hasFile('image')){
            Storage::delete($category->image);
            $image = $request->file('image')->store('public/categories');
        }



        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image
        ]);
        $categories=Category::all();
        return to_route('admin.categories.index', compact('categories'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return RedirectResponse
     */
    public function destroy(Category $category): RedirectResponse
    {
        Storage::delete($category->image);
        $category->delete();

        return to_route('admin.categories.index');
    }
}
