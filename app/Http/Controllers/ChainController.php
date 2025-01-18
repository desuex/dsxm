<?php

namespace App\Http\Controllers;

use App\Models\Chain;

class ChainController extends Controller
{
    public function show($slug)
    {
        $chain = Chain::where('slug', $slug)->with('posts')->firstOrFail();

        return view('chain.show', compact('chain'));
    }
}
