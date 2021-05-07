<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function store(CommentRequest $request){
        // return $request->all();
        $request['user_id'] = auth()->id();
        // return $request->all();
        Comment::create($request->except(['_token']));
        session()->flash('success',"Comment Inserted!!");
        return redirect()->back();
    }
}
