<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;

class frontController extends Controller
{
    public function home(){
    	 $posts = post::limit(3)->orderBy('id','DESC')->get();
    	return view('main',compact('posts'));
    }
    public function sports(){
    	$posts = post::where('categories','Sports')->get();
    	return view('category',compact('posts'));
    }
    public function politics(){
    	$posts = post::where('categories','Politics')->get();
    	return view('category',compact('posts'));
    }
    public function entertainment(){
    	$posts = post::where('categories','Entertainment')->get();
    	return view('category',compact('posts'));
    }

    public function api($type,$category,$limit){

    		$posts = post::where('type', 'like', '%'.$type.'%');

        if($category != 'all')
			$posts =$posts->where('categories', 'like', '%'.$category.'%');

			$count =$posts->count();


        if($limit != 'all')
        	$posts =$posts->limit($limit);

       		$post['post'] =$posts->orderBy('id','DESC')->get();
       		$post['count'] =$count;
       		

    	return json_encode($post);
    }
}
