<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostNewsRequest;
use App\Models\Accounts;
use App\Models\category;
use App\Models\PostNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $postnews=PostNews::latest()->first();
//        $postnews = PostNews::orderBy('title')->get();
        $postnews = PostNews::latest()->get();


        return view('AdminPanel.news.index', compact('postnews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = category::all();
        return view('AdminPanel.news.add', compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(PostNewsRequest $request)
    {

        $image = $this->uplodImge($request, null);
        $validated = $request->validated();
        $validated['category_id'] = $validated['option'];
        $validated['image'] = $image;
        $validated['views'] = 0;

        PostNews::create($validated);

        return redirect('admin/post-news')->with('message', 'post store  Successfully  .');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\PostNews $postNews
     * @return \Illuminate\Http\Response
     */
    public function show(PostNews $postNews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\PostNews $postNews
     * @return \Illuminate\Http\Response
     */
    public function edit(PostNews $postNews)
    {
        $categorys = category::all();
        return view('AdminPanel.news.edit', ['postNews' => $postNews, 'categorys' => $categorys]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PostNews $postNews
     * @return \Illuminate\Http\Response
     */
    public function update(PostNewsRequest $request, PostNews $postNews)
    {
        $image = $this->uplodImge($request, $postNews);
        $validated = $request->validated();
        $validated['category_id'] = $validated['option'];
        $validated['image'] = $image;
        if(auth()->user()->option =='admin'){
            $postNews->update($validated);
        }
        return redirect('admin/post-news')->with('message', 'post store  Successfully  .');
//
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\PostNews $postNews
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostNews $postNews)
    {
        $valid = true;
        $message = 'Record successfully deleted';
        try {
            if(auth()->user()->option =='admin'){
                $postNews->delete();
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


    //////////////////////////////////////////
    public function uplodImge($request, $postNews)
    {

        $image = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filePath = 'imgesnews';

            $fileName = rand(0, 1000000000000)
                . $file->getClientOriginalName();

            $file->move($filePath, $fileName);
            $image = $filePath . '/' . $fileName;
        } else {
            if ($request->image == null) {
                $image = $postNews->image;
            }

        }
        return $image;

    }

}
