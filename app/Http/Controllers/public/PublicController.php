<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Like;
use App\Models\medicalPersonProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    //

    public function home(){
        if(Auth::check()){
            if(Auth::user()->type == "عامل في المجال الطبي"){
                $check =medicalPersonProfile::where('user_id',Auth::user()->id)->get();
                if (count($check) < 1) {
                    $medical= new  medicalPersonProfile();
                    $medical->user_id = Auth::user()->id;
                    $medical->save();
                }
            }
        }

        $countArticles = Article::count();
        $countMedicals = medicalPersonProfile::count();
        $countComments = Comment::count();

        $last6Articles = Article::latest('created_at')
                            ->take(6)
                            ->get();

        return view('public.home', compact('countArticles','countMedicals',
        'last6Articles','countComments'));
    }

    public function showprofile($user_id){
        $user = User::where('id', $user_id)->first();
        $medical_profile = medicalPersonProfile::where('user_id', $user_id)->first();
        $Articles = Article::where('user_id', $user_id)->get();
        return view('public.medical.showprofile')->with(compact('user','medical_profile','Articles'));
    }
    
    public function showarticle($article_id){
        $article =Article::find($article_id);
        $comments =Comment::where('article_id',$article_id)->get();
      
        $likes =Like::where('article_id',$article_id)->count();

        // $comments =Like::where('article_id',$article_id)->where('',);

        return view('public.article.showarticle')->with(compact('article','comments','likes'));

    }

    public function category($category){
        $profiles =medicalPersonProfile::where('specialization',$category)->get();
        return view('public.article.category')->with(compact('profiles','category'));

    }

    public function occupation($occupation){
        $profiles =medicalPersonProfile::where('occupation',$occupation)->get();
        return view('public.article.occupation')->with(compact('profiles','occupation'));

    }
}