<?php

namespace App\Http\Controllers;
use App\Models\siswa;
use App\Models\project;
use File;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Siswa::paginate(5);
        return view('master.masterproject', compact('data'));
    }

    public function tambah($id)
    {
        $siswa=siswa::find($id);
        return view('project.TambahProject', compact('siswa'));
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
            'required'=>':attribute harus di isi yaa....',
            'min'=>':attribute minimal :min karakter ya...',
            'max'=>':attribute maksimal :max karakter ya...', 
        ];

        //validasi data
        $this->validate($request,[
            'nama_project'=>'required|max:30',
            'deskripsi'=>'required|min:5',
        ], $message);

        //insert data
        project::create([
            'id_siswa' => $request->id_siswa,
            'nama_project'=> $request -> nama_project,
            'deskripsi'=> $request -> deskripsi
        ]);

        Session::flash('success', "Data Berhasil Di Tambahkan");
        return redirect('/masterproject');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project=Siswa::find($id)->project()->get();
        return view('project.ShowProject', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project=project::findOrFail($id);
        // return($project);
        // dd ($project);
        return view('project.EditProject', compact('project'));
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
            'max'=>':attribute maksimal :max karakter ya coy...', 
        ];

        $this->validate($request,[
            'nama_project'=>'required|max:30',
            'deskripsi'=>'required|min:5',
            'tanggl'=>'required'
        ], $message);

                $project=project::find($id);
                $project->nama_project = $request ->nama_project;
                $project->deskripsi = $request ->deskripsi;
                $project->tanggl = $request ->tanggl;
                $project->save();
                Session::flash('success', "Data Berhasil Di Edit !");
                return redirect ('masterproject');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        project::find($id)->delete();
        Session::flash('success', "Data Berhasil Di Hapus !");
        return redirect('/masterproject');
    }
}
