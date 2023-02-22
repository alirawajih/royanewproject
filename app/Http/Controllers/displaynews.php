<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\PostNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class displaynews extends Controller
{

    public function index()
    {

        $latest = PostNews::orderBy('created_at', 'DESC')->first();

        return view('index', compact('latest'));

    }

    public function shownews($id)
    {
        $postnewsin = PostNews::findOrFail($id);
        $categoryPost = PostNews::where('category_id', $postnewsin->category_id)
            ->where('id', '!=', $id)->paginate(4);
        $postnewsin->update(['views' => ($postnewsin->views) + 1]);
        return view('subcategory', compact('postnewsin', 'categoryPost'));

    }

    public function shownewscategory(Request $request,$id)
    {
        $categoryPost = PostNews::where('category_id', $id)
            ->orderBy('created_at', 'DESC')
            ->paginate(5);
        $category = category::findOrFail($id);
        if ($request->ajax()) {
            $view = view('post',compact('categoryPost'))->render();
            return response()->json(['html'=>$view]);
        }
        return view('category', compact('categoryPost', 'category'));
    }

    public function search(Request $request)
    {

        $search = $request->search;
        $result = PostNews::where('title', 'LIKE', "%{$search}%")->get();

        if ($result->count()) {
            $message = '';
            return view('search', compact('result', 'search', 'message'));
        } else {
            $message = 'No Results Found';
            return view('search', compact('result', 'search', 'message'));
        }

    }

}
