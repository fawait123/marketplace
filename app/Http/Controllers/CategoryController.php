<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.category.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Category::create($request->all());
        return redirect()->route('category.index')->with(['message' => 'Category has been created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $id = $category->id;
        return view('pages.category.form', compact('category', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $category->update($request->all());
        return redirect()->route('category.index')->with(['message' => 'Category has been updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with(['message' => 'Category has been deleted']);
    }


    public function json(Request $request)
    {
        $columns = array(
            0 =>'name',
        );

        $totalFiltered = Category::query();

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        $categories = Category::query();
        if(!empty($request->input('search.value'))){
            $search = $request->input('search.value');
            $categories = $categories->where('name', 'like','%'.$search.'%');
            $totalFiltered = $totalFiltered->where('name', 'like','%'.$search.'%');

        }
        $categories = $categories->offset($start)->limit($limit)->orderBy($order,$dir)->latest()->get();

        $data = array();
        if(!empty($categories)){
            foreach ($categories as $key=>$category){
            $edit =  route('category.edit',$category->id);
            $destroy =  route('category.destroy',$category->id);

            $nestedData['no'] = (str_split($start)[0]) * $limit + $key + 1;
            $nestedData['name'] = $category->name;
            $nestedData['options'] = "&emsp;<a href='{$edit}'
            class='text-primary'><i class='mdi mdi-lead-pencil'></i></a>
                                    &emsp;<a href='#' data-toggle='modal'
                                    data-target='#exampleModal' data-url='{$destroy}'
                                    class='text-danger'><i class='mdi mdi-trash-can-outline'></i></a>";
            $data[] = $nestedData;

            }
        }


        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval(Category::count()),
            "recordsFiltered" => intval($totalFiltered->count()),
            "data"            => $data
        );

        return json_encode($json_data);
    }
}
