<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackStoreRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index()  
    {
        $feedbacks = Feedback::with('user')->paginate(5);
        return view('welcome', compact('feedbacks'));
    }

    public function create()  
    {
        if (!Auth::check()) {
            return to_route('home')->with('error', 'Kindly log in before submitting feedback');
        }
        return view('create-feedback');
    }
    
    public function store(FeedbackStoreRequest $request)  
    {
        $request->user()->feedbacks()->create($request->all());
        return to_route('home')->with('success', 'Data Saved Successfully');
    }
}
