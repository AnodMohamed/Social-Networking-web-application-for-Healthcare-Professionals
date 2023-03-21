<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\Article;
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

        return view('public.home');
    }

    public function showprofile($user_id){
        $user = User::where('id', $user_id)->first();
        $medical_profile = medicalPersonProfile::where('user_id', $user_id)->first();

        return view('public.medical.showprofile')->with(compact('user','medical_profile'));
    }
    
    public function showarticle($article_id){
        $article =Article::find($article_id);
        return view('public.article.showarticle')->with(compact('article'));

    }
}