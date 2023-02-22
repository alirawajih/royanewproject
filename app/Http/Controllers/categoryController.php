<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys= category::withCount('posts')->get();

        return view('AdminPanel.category.index',compact('categorys'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminPanel.category.add');
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
            'name' => ['required', 'string',Rule::unique('categories')]
        ]);

        category::create([
            'name' => $request->name,

        ]);
        return redirect('admin/category')->with('message','category store  Successfully  .');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        return view('AdminPanel.category.edit',['category'=>$category]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        if(auth()->user()->option =='admin'){
            $category->update([
                'name' => $request->name,

            ]);

        }

        return redirect('admin/category')->with('message','category update  Successfully  .');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        $valid = true;
        $message = 'Record successffully deleted';
        try {
            if(auth()->user()->option =='admin'){
                $category->delete();

            }

        } catch (\Exception $exception) {
            $valid = false;
            $message = $exception->getMessage();
        }
        return json_encode([
            'valid' => $valid,
            'message' => $message
        ]);
    }
}
