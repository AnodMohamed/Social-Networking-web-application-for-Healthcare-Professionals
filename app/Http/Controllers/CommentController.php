<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    public function store(Request $request)
    {

        $request->validate([
            'body'=>'required',
        ]);
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        Comment::create($input); 
        return back();

    }

    
    public function edit($id)
    {
       $comment = Comment::find($id);

       return view('public.article.editcomment')->with(compact('comment'));

    }

    public function update(Request $request, $id)
    {
        $comment = Comment::where('id',$id)->first();
        $comment->body = $request->input('body');
        $comment->update();
        //redirect
        return redirect()->route('public.article.showarticle',$comment->article_id);
    }

    public function delete($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return back();

    }
    
    public function like(Request $request){

        $like = new Like;
        $like->user_id = Auth::user()->id;
        $like->article_id = $request->id;
        $like->save();

        //redirect
        return redirect()->route('public.article.showarticle',$request->id);
    }
}
