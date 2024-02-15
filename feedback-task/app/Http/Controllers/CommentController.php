<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->request->add(['user_name' => auth()->user()->name, 'date' => Carbon::now()]);
        Comment::create($request->all());
        return to_route('home')->with('success', 'Comment Added Successfully');
    }
}
