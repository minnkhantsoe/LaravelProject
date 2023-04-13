<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {

        $data = Article::latest()->paginate(5);

        return view('articles/index', ['articles' => $data]);
    }

    public function detail($id)
    {

        $data = Article::find($id);

        return view('articles/detail', ['article' => $data]);
    }

    public function add()
    {

        $data = [
            ["id" => 1, "name" => "Tech"],
            ["id" => 2, "name" => "Business"],
            ["id" => 3, "name" => "Education"],
        ];

        return view('articles/add', ['categories' => $data]);
    }

    public function create()
    {

        $validator = validator(request()->all(), [

            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $article = new Article;
        $article->title = request()->title;
        $article->body = request()->body;
        $article->category_id = request()->category_id;
        $article->save();

        return redirect('/articles');
    }

    public function delete($id)
    {

        $article = Article::find($id);
        $article->delete();

        return redirect('/articles')->with('info', 'Article Deleted');
    }

    public function edit($id)
    {

        $data = Article::find($id);

        return view('articles/edit', ['article' => $data]);
    }

    public function update($id)
    {

        $data = Article::find($id);
        $data->title = request()->title;
        $data->body = request()->body;
        $data->update();

        return redirect('/articles')->with('info', 'Article Edited');
    }

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'detail']);
    }
}
