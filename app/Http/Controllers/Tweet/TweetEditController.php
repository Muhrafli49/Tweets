<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Tweet;
use Illuminate\Support\Facades\Auth;

class TweetEditController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id): View
    {
        $tweet = Tweet::find($id);

        $this->authorize('update', $tweet);

        return view('tweets.edit', [
            'tweet' => Tweet::find($id),
        ]);
    }
}
