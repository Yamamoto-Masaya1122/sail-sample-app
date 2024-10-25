<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ApiArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $articles;

    public function __construct (Article $articles) {
        $this->articles = $articles;
    }

    public function index()
    {
        //
        $articles = $this->articles->latest()->get();
        return response()->json([
            'status' => true,
            'articles' => $articles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'status' => 'required'
        ]);

        // バリデーションされたデータを使って保存する
        $article = Article::create($validated);

        return response()->json([
            'status' => true,
            'message' => "Article Created successfully!",
            'article' => $article
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);  
        $article->update([  
            "title" => $request->title,  
            "body" => $request->body,  
            "status" => $request->status,  
        ]); 

        return response()->json([
            'status' => true,
            'message' => "Article Created successfully!",
            'article' => $article
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        try {
            $article = Article::find($id);  
            $article->delete();
            return response()->json([
                'message' => "Article deleted successfully!",
            ], 200);
        } catch (\Exception $e) {
            abort(406);
        }

    }
}
