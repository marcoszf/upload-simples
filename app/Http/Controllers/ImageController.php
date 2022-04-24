<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\Models\Postimage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('imageUpload');
    }

    public function create()
    {
        $image = Postimage::all();
        return view('createimage', compact('image'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'filename' => 'image|required|mimes:jpeg,png,jpg,gif,svg'
        ]);


        $originalImagem= $request->file('filename');
        $thumbnailImagem = Image::make($originalImagem);
        $thumbnailPath = public_path().'/thumbnail/';
        $originalPath = public_path().'/images/';
        $thumbnailImagem->resize(1920,1080)->save($originalPath.time().$originalImagem->getClientOriginalName());
        $thumbnailImagem->resize(150,150);
        $thumbnailImagem->save($thumbnailPath.time().$originalImagem->getClientOriginalName());

        $imagemodel= new Postimage();
        $imagemodel->description = $request->input('description');
        $imagemodel->filename=time().$originalImagem->getClientOriginalName();
        $imagemodel->save();

        return back()->with('success', 'A sua imagem foi enviada com sucesso!');

    }
}
