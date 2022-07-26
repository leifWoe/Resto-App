<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\MenuStoreRequest;
use Termwind\Components\Dd;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $menus = Menu::with('categories')->get();
        return view('admin.menus.index', compact('menus'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $categories = Category::all();
        return view('admin.menus.create', compact('categories'));
    }
        
    /**
     * Store a newly created resource in storage.
     *
     * @param MenuStoreRequest $request
     * @return Application|Factory|View
     */
    public function store(MenuStoreRequest $request): View|Factory|Application
    {
        $image = $request->file('image')->store('public/menus');
        $categoriesId = $request->get('category');
        
        $menu = Menu::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $image,
            'category' => $categoriesId,
        ]);
        
        $menu->categories()->attach($categoriesId);
        
        $menus = Menu::all();
        $categories = Category::all();
        return view('admin.menus.index', compact('menus', 'categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return to_route('admin.menus.index');

        //TODO cascade delte to pivot table
    }
}
