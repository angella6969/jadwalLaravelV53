<?php

namespace App\Http\Controllers;

use App\url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL as FacadesURL;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Url as ReferenceUrl;

class UrlController extends Controller
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
    public function create()
    {
        return view('form.createCodeYt');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $thumbnailUrl = "https://img.youtube.com/vi/{$request->input('url')}/maxresdefault.jpg";
        $thumbnailSize = @getimagesize($thumbnailUrl);

        $validator = Validator::make($request->all(), [
            'url' => 'required',
        ]);

        $thumbnailContent = @file_get_contents($thumbnailUrl);

        if ($thumbnailContent !== false) {
            // Thumbnail tersedia
            if ($validator->fails()) {
                return redirect('/dashboard/code')->with('error', 'Code Tidak Valid');
            }

            $url = new url();
            $url->url = $request->input('url');
            $url->save();

            return redirect('/dashboard')->with('success', 'Berhasil Menambahkan Daftar Video');
        } else {
            // Thumbnail tidak tersedia atau ada masalah lain
            return redirect('/dashboard/code')->with('error', 'Code Tidak Valid');
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
        //
    }
}
