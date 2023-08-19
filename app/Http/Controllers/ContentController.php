<?php

namespace App\Http\Controllers;


use App\Models\Content;
use Illuminate\Http\Request;

use App\Http\Requests\ContentRequest;


class ContentController extends Controller
{
    public function index()
    {
        $contents = Content::paginate(5);
        return view("content.index", compact("contents"));
    }

    public function create()
    {
        $contents = new Content;
        return view('content.form',compact('contents'));
    }


    public function store(ContentRequest $request)
    {
        $content = new Content;
        $content->topic = $request->topic;
        $content->description =$request->description;
        $content->tags = $request->tags;
        $content->user_id=1;
        $content->links=$request->links;
        $content->save();
        return redirect('/content');

    }
    public function edit($id){

        $contents = Content::findOrFail($id);
        return view('content.form',compact('contents'));

    }
    public function save($data,$value){
        $data->topic = $value->topic;
        $data->description = $value->description;
        $data->tags = $value->tags;
        $data->links = $value->links;
        $data->user_id = 1;
        if($value->status != null){
            $data->status = $value->status;
        }
        $data->save();
    }
    //lab 06
    public function EditStatus($id,$status){

        $content = Content::findOrFail($id);
        if($content->status == 0){
            $content->status =1;
        }
        else{
            $content->status =0;
        }
        $content->save();
        $this->index();
    }

    public function update(ContentRequest $request,$id){
        $content = Content::findOrFail($id);
        $this->save($content,$request);
        return redirect('/content');
    }
    public function destroy($id){
        // Content::destroy($id);
        // $this->index();
    }
}
//$contents = Content::all();
//return view('content.index', compact('contents'));