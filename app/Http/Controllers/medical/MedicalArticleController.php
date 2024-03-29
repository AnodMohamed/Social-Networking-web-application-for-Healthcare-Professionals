<?php

namespace App\Http\Controllers\medical;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\medicalPersonProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class MedicalArticleController extends Controller
{
    //
    public function index(){
        $articles = Article::where('user_id', Auth::user()->id)->get();
        return view('medical.article.index')->with(compact('articles'));

    } 

    public function create(){
        $medical_profile = medicalPersonProfile::where('user_id', Auth::user()->id)->first();
        return view('medical.article.add')->with(compact('medical_profile'));

    } 

    public function store(Request $request){
        //validate
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|max:2048|mimes:png,jpg',
        ]);
        
          //
          $article = New Article();
          $article->user_id = Auth::user()->id;
          $article->title = $data['title'];
          $article->content = $data['content'];

          if ($request->hasFile('image')) {
            $file = $request->file('image');
               // to get the original name of the image for example test.png
            $newname = Str::random(40) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $newname);
            $article->image= $newname;  
          }

  
          $article->save();
  
           //success message
          Session::flash('message', 'تمت إضافة المقال بنجاح');
  
          //redirect
          return redirect()->back();

    } 

    public function edit($article_id){
        $medical_profile = medicalPersonProfile::where('user_id', Auth::user()->id)->first();
        $article =Article::where('id',$article_id)->first();
        return view('medical.article.edit')->with(compact('article','medical_profile'));
    }

    public function update(Request $request ,$article_id){
        //validate
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|max:2048|mimes:png,jpg',

        ]);

        $article =Article::find($article_id);
        $article->title = $data['title'];
        $article->content = $data['content'];

        if ($request->hasFile('image')) {
          $file = $request->file('image');
             // to get the original name of the image for example test.png
          $newname = Str::random(40) . '.' . $file->getClientOriginalExtension();
          $file->storeAs('public/images', $newname);
          $article->image= $newname;  
        }


        $article->save();

         //success message
        Session::flash('message', 'تمت تعديل المقال بنجاح');

        //redirect
        return redirect()->back();
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
