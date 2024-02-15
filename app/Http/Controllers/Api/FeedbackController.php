<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackStoreRequest;
use App\Http\Resources\FeedbackCollection;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index()
    {
        return FeedbackCollection::collection(Feedback::with(['user'])->paginate(6));
    }

    public function store(FeedbackStoreRequest $request)
    {
        $request->user()->feedbacks()->create($request->all());
        return response()->json([
            'success' => 'Data Saved Successfully!',
        ]);
    }
}
