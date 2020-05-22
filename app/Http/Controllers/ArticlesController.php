<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 18.05.2020
 * Time: 18:52
 */
namespace App\Http\Controllers;


use App\Models\Article;

class ArticlesController extends Controller
{
    public function getAll() {
        return response()
            ->json([
                'data' => Article::all()
            ]);
    }

    public  function getOne($id) {
        return view('article_detail', [
            'article' => Article::find($id)
        ]);
    }

    public  function home() {
        return view('welcome', [
            'articles' => Article::all()
        ]);
    }
}