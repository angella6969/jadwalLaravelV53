<?php

namespace App\Http\Controllers;

use App\jadwal;
use App\url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $q = jadwal::latest()->get();
        return view('jadwal.views', [
            'jadwal' => $q

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form.createJadwal');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tittle' => 'required',
            'days' => 'required',
            'by' => 'required',
            'room' => 'required',
            'time' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/dashboard/create')->withErrors($validator)->withInput();
        }

        $validatedData = $validator->getData();
        $existingJadwal = Jadwal::where('days', $validatedData['days'])
            ->where('time', $validatedData['time'])
            ->where('room', $validatedData['room'])
            ->first();

        if ($existingJadwal) {
            return redirect('/dashboard/create')->with('fail', 'Ruang Rapat Sudah Terisi, silahkan pilih RR atau waktu yang lain ');
        } else {
            Jadwal::create($validatedData);
            return redirect('/dashboard')->with('success', 'Berhasil Menambahkan Agenda Rapat');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $url = url::all()->pluck('url');
        $videoId = $url;

        return view('jadwal.video', compact('videoId'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $a = jadwal::findOrFail($id);

        return view('form/editJadwal', [
            'jadwal' => $a
        ]);
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
        $validator = Validator::make($request->all(), [
            'tittle' => 'required',
            'days' => 'required',
            'by' => 'required',
            'room' => 'required',
            'time' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($request->all());

        return redirect('/dashboard')->with('success', 'Berhasil Memperbarui Agenda Rapat');
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
