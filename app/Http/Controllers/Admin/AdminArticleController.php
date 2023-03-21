<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminArticleController extends Controller
{
    //
    public function index(){
        $articles = Article::all();
        return view('admin.article.index')->with(compact('articles'));
    }

    public function destroy($article_id){
        $article = Article::find($article_id); // Find the user with ID 1
        $article->delete(); // Delete the user
        
         //success message
         Session::flash('message', 'تم حذف المقال بنجاح');

         //redirect
         return redirect()->back();
    }
}
