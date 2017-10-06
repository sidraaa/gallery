<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Album;
use App\Image;

class ImagesController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $album = Album::find($id);
        return view("app.addimage",compact('album'));
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
            'album_id'         =>  'required|numeric|exists:albums,id',
            'image'            =>  'required|image', 
        ]);
        if ($validator->fails()) {
            return redirect()->route('add_image', ['id' => $request->album_id])
                ->withErrors($validator)
                ->withInput($request->all());
        }
        else{
            $destination_path = 'public/albums';
            $fname = $request->file('image')->store($destination_path);

            $image = Image::create([
                'album_id'          =>  $request->album_id,
                'description'       =>  $request->description,
                'image'             =>  substr($fname, strpos($fname, '/')+1)
            ]);
            return redirect()->route('show_album',['id' => $request->album_id]);
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
        $image = Image::find($id);
        $album_id = $image->album_id;
        $image->delete();
        return Redirect::route('show_album', ['id' => $album_id] );
    }
}
