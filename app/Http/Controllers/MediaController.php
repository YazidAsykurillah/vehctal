<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use Image;

use App\Media;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('media.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('media.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file= $request->file('media');
        $extension = $file->getClientOriginalExtension();
        $file_name = time().'.'.$extension;
        $store = $request->file('media')->storeAs(
            'media', $file_name
        );

        //save to media table
        $newMedia = new Media;
        $newMedia->user_id = Auth::user()->id;
        $newMedia->path='public/storage/'.$file_name;
        $newMedia->save();

        $file_path = storage_path('app/public/media/'.$file_name);
        Image::make($file_path)->resize(240, 200)->save(storage_path('app/public/media/thumb_'.$file_name));
        exit();

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
