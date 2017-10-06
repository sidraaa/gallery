<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Album;
use App\Image;

class AlbumsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::get();
        return view('app.index', compact('albums'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.create_album');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator= Validator::make($request->all(), [
            'name'         =>  'required',
            'cover_image'  =>  'required|image', 
        ]);
        if ($validator->fails()) {
            return redirect('/createalbum')
                ->withErrors($validator)
                ->withInput($request->all());
        }
        else{
           
            $destination_path = 'public/albums';
            $fname = $request->file('cover_image')->store($destination_path);

            $album = Album::create([
                'name'              =>  $request->name,
                'description'       =>  $request->description,
                'cover_image'       => substr($fname, strpos($fname, '/')+1)
            ]);
           
            return redirect()->route('show_album',['id' => $album->id]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Album::find($id);
        $album->images;
        return view('app.album', compact('album')); 
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
        Album::destroy($id);
        return redirect('/gallery');
    }
}
