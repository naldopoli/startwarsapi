<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MoviesModel;
use Validator;
use Lang;
class MovieController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = MoviesModel::all();

        return response()->json(['success'=> true, 'data'=> $list], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->only('title', 'description','launched_at','direct_by','awars','total_sold','url_image','rate','tags','long_time');
        $rules = [
            'title' => 'required|max:100',
            'description' => 'required|max:600',
            'launched_at' => 'required',
            'awars' => 'required',
            'total_sold' => 'required',
            'url_image' => 'required',
            'rate' => 'required',
            'direct_by' => 'required',
            'tags' => 'required',
            'long_time' => 'required'
        ];
        $input['user_created']=1;
        $input['user_edited']=1;
        $validator = Validator::make($input, $rules);

        if($validator->fails()) {
            return response()->json(['success'=> false, 'message'=> $validator->messages()], 400);
        }
        try {
        	$newmovie=new MoviesModel();
        	$newmovie->title=$input['title'];
        	$newmovie->description=$input['description'];
        	$newmovie->launched_at=$input['launched_at'];
        	$newmovie->awars=$input['awars'];
        	$newmovie->total_sold=$input['total_sold'];
        	$newmovie->url_image=$input['url_image'];
        	$newmovie->rate=$input['rate'];
        	$newmovie->direct_by=$input['direct_by'];
        	$newmovie->tags=$input['tags'];
        	$newmovie->user_created=$input['user_created'];
        	$newmovie->user_edited=$input['user_edited'];
        	$newmovie->long_time=$input['long_time'];
        	$newmovie->save();
            return response()->json(['success'=> true, 'message'=> Lang::get('validation.attributes.create_success')], 200);
        } catch (\Exception $ex) {
            return response()->json(['success'=> false, 'message'=> $ex->getMessage()], 500);
        }
    }

}
