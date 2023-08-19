<?php

namespace App\Http\Controllers;

use Illuminate\Database\Query\IndexHint;
use Illuminate\Http\Request;
use App\Models\Vote;
use App\Models\Content;
use App\Http\Requests\VoteRequest;

class VoteController extends Controller
{
    public function index(){
        $votes = Vote::all();
        return view('vote.index',compact('votes'));
    }
     public function create($id)
    {
        $votes = new Vote;
        $contents = Content::findOrFail($id);
        return view('vote.form', compact('contents'));
    }

     public function store(VoteRequest $request, $id)
    {
        $votes = new Vote;
        $this->save($votes, $request, $id);
        return redirect('/content');
    }

    private function save($data, $value, $id)
    {
        $data->like = $value->vote;
        $data->content_id = $id;
        $data->save();
    }
}