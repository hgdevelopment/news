<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\post;
use Auth;
use DB;
class uploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $file = strtolower(substr($request->title,0,5)).'heera'.time().'.'.$request->file->getClientOriginalExtension();
        $request->file->move(storage_path('post'), $file);


        $post= new post;
        $post->title= $request->title;
        $post->type= $request->type;
        if($request->type=='video')
        $post->url= $request->url;
        $post->file= $file;
        $post->description= $request->description;
        $post->categories= $request->categories;
        $post->user= Auth::guard('Admin')->user()->id;
        $post->save();
        session()->flash('message','New content uploaded successfully');
        return redirect('admin/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return $data=post::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(isset($request->file))
        {
        $file = strtolower(substr($request->title,0,5)).'heera'.time().'.'.$request->file->getClientOriginalExtension();
        $request->file->move(storage_path('post'), $file);
        }

        $post=post::find($id);
        $post->title= $request->title;
        $post->type= $request->type;
        if($request->type=='video')
        $post->url= $request->url;
        if(isset($request->file))
        $post->file= $file;
        $post->description= $request->description;
        $post->categories= $request->categories;
        $post->user= Auth::guard('Admin')->user()->id;
        $post->save();
        session()->flash('message','updated successfully');
        return redirect('admin/dashboard');

    }



    public function create(Request $request)
    {
        $post=post::all();
        return view('admin.uploadedajax',compact('post'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=post::where('id',$id)->delete();
        return redirect('admin/dashboard'); 
    }
}
