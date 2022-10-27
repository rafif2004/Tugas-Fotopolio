<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\siswa;
use App\Models\kontak;
use App\Models\project;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
class SiswaController extends Controller
{
    // public function_construct()
    // {
    //     $his->middleware(['auth', 'admin']);
    //     $his->middleware(['auth', 'walas'])->only['index'];
    // }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = siswa::all();
        return view('master.mastersiswa', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.TambahSiswa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message=[
            'required'=>':attribute harus di isi yaa...',
            'min'=>':attribute minimal :min karakter ya...',
            'max'=>':attribute maksimal :max karakter ya...',
            'numeric'=>':attribut harus di isi angka',
            'mimes'=>':gambar harus berupa jpg atau png' 
        ];

        //validasi data
        $this->validate($request,[
            'nama'=>'required|min:7|max:30',
            'nisn'=>'required|numeric',
            'alamat'=>'required',
            'jk'=>'required',
            'foto'=>'required|mimes:jpg,png',
            'about'=>'required|min:10'
        ], $message);

        //ambil informasi file yang di upload 
        $file = $request->file('foto');
        //rename 
        $nama_file = time()."_".$file->getClientOriginalName();
        //proses upload 
        $tujuan_upload= './template/img';
        $file->move($tujuan_upload,$nama_file); 

        //insert data
        siswa::create([
            'nama'=> $request -> nama,
            'nisn'=> $request -> nisn,
            'alamat'=> $request -> alamat,
            'jk'=> $request -> jk,
            'foto'=> $nama_file,
            'about'=> $request -> about
        ]);

        Session::flash('success', "Data Berhasil Di Tambahkan");
        return redirect('/mastersiswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa=siswa::find($id);
        $kontak=$siswa->kontak()->get();
        $project=$siswa->project()->get();
        return view('siswa.ShowSiswa', compact('siswa','kontak', 'project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa=Siswa::find($id);
        return view('siswa.EditSiswa', compact('siswa'));
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
            'required'=>':attribute harus di isi yaa...',
            'min'=>':attribute minimal :min karakter ya...',
            'max'=>':attribute maksimal :max karakter ya...',
            'numeric'=>':attribut harus di isi angka',
            'mimes'=>':gambar harus berupa jpg atau png' 
        ];

        $this->validate($request,[
            'nama'=>'required|min:7|max:30',
            'nisn'=>'required|numeric',
            'alamat'=>'required',
            'jk'=>'required',
            'foto'=>'mimes:jpg,png',
            'about'=>'required|min:10'
        ], $message);

        if($request->foto !=''){
            //1. menghapus file foto lama
            $siswa=siswa::find($id); 
            $file = $request->file('foto');
            file::delete('./template/img/'.$siswa->foto);
            //2. ambil informasi file foto baru yang diupload 
            $file = $request->file('foto');
            //3. rename
            $nama_file = time()."_".$file->getClientOriginalName();
            //4. proses upload 
            $tujuan_upload= './template/img';
            $file->move($tujuan_upload,$nama_file);
            //5. menyimpan ke databases

                $siswa->nama = $request -> nama;
                $siswa->nisn = $request ->nisn;
                $siswa->alamat = $request -> alamat;
                $siswa->jk = $request -> jk;
                $siswa->about = $request -> about;
                $siswa->foto = $nama_file;
                $siswa->save();
                Session::flash('success', "Data Berhasil Di Edit !");
                return redirect ('mastersiswa');

            }else{
                $siswa=Siswa::find($id);
                $siswa->nama = $request->nama;
                $siswa->nisn = $request->nisn;
                $siswa->alamat = $request->alamat;
                $siswa->jk = $request->jk;
                $siswa->about = $request->about;
                $siswa->save();
                Session::flash('success', "Data Berhasil Di Edit !");
                return redirect ('mastersiswa');
            }
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapus($id)
    {
        $siswa=siswa::find($id);
        $siswa->delete();
        Session::flash('danger', "Data Berhasil Di Hapus");
        return redirect('/mastersiswa');
    }
}
