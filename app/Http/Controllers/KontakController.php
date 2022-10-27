<?php

namespace App\Http\Controllers;

use App\Models\jenis_kontak;
use App\Models\siswa;
use App\Models\kontak;
use File;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Siswa::paginate(5);
        $kontak=jenis_kontak::all();
        return view('master.masterkontak', compact('data', 'kontak'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $siswa=siswa::find($id);
        $jenis = jenis_kontak::all();
        return view('kontak.TambahKontak', compact('siswa', 'jenis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $message=[
            'required'=>':attribute harus di isi yaa....',
            'min'=>':attribute minimal :min karakter ya...',
        ];

        //validasi data
        $this->validate($request,[
            'jenis_kontak_id'=>'required',
            'deskripsi'=>'required|min:5',
        ], $message);

        //insert data
        $kontak = new kontak();
           $kontak->siswa_id = $request -> siswa_id;
           $kontak->jenis_kontak_id = $request -> jenis_kontak_id;
           $kontak->deskripsi= $request -> deskripsi;
           $kontak->save();

        Session::flash('success', "Data Berhasil Di Tambahkan");
        return redirect('/masterkontak');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kontak=siswa::find($id)->kontak()->get();
        return view('kontak.ShowKontak', compact('kontak'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kontak=kontak::find($id);
        $jenis = jenis_kontak::all();
        return view('kontak.EditKontak', compact('kontak', 'jenis'));
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
        $message=[
            'required'=>':attribute harus di isi yaa....',
            'min'=>':attribute minimal :min karakter ya...',
        ];

        

        $this->validate($request,[
            'jenis_kontak_id'=>'required',
            'deskripsi'=>'required|min:5',
        ], $message);

            $kontak=kontak::find($id);
            $kontak->siswa_id = $request->siswa_id;
            $kontak->jenis_kontak_id = $request->jenis_kontak_id;
            $kontak->deskripsi = $request ->deskripsi;
            $kontak->save();
            Session::flash('success', "Data Berhasil Di Edit !");
            return redirect ('masterkontak');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        kontak::find($id)->delete();
        Session::flash('success', "Data Berhasil Di Hapus !");
        return redirect('/masterkontak');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapus($id)
    {
        jenis_kontak::find($id)->delete();
        Session::flash('success', "Jenis Kontak Berhasil Di Hapus !");
        return redirect('/masterkontak');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tambahjenis(Request $request)
    {
        $message=[
            'required'=>'Form Harus Di Isi....',
        ];

        $this->validate($request, [
            'jenis_kontak'=>'required',
        ], $message);

        jenis_kontak::create([
            'jenis_kontak' => $request -> jenis_kontak,
        ]);

        Session::flash('message', "Jenis Kotak Baru Telad Di Tambahkan");
        return redirect('/masterkontak');
    }

    public function tambahjenisview()
    {
        return view('kontak.TambahJenisKontak');
    }

}
