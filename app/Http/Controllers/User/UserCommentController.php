<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class UserCommentController extends Controller
{
    //
    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

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

}
