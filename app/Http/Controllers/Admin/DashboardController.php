<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
use App\Models\medicalPersonProfile;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function index(){
        $countArticles = Article::count();
        $countMedicals = medicalPersonProfile::count();
        $countComments = Comment::count();

        $last6Articles = Article::latest('created_at')
                            ->take(6)
                            ->get();

        return view('admin.dashboard', compact('countArticles','countMedicals',
        'last6Articles','countComments'));
    }
}
