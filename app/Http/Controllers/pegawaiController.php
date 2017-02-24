<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Pegawai;
use App\Jabatan;
use App\Golongan;
use File;

class pegawaicontroller extends Controller
{
    use RegistersUsers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('HRD');
    }
    public function index()
    {
        //
        $pegawai=Pegawai::all();
        return view('pegawai.index', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $jabatann=Jabatan::all();
        $golongann=Golongan::all();
        return view('pegawai.create',compact('jabatann', 'golongann'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'name' => 'required',
            'nip' => 'required|unique:pegawais,nip',
            'permission' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',

            ]);

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'permission' => $request->get('permission'),
            'password' => bcrypt($request->get('password')),
        ]);

        //isi fiedl photo jika ada cover yang di upload
        if($request->hasFile('photo'))
        {
            
            $uploaded_photo = $request->file('photo');
            $extension = $uploaded_photo->getClientOriginalExtension();
            $filename = md5(time()) . '.' . $extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
            $uploaded_photo->move($destinationPath, $filename);

            $pegawai = new Pegawai;
            $pegawai->nip = $request->get('nip');
            $pegawai->user_id = $user->id;
            $pegawai->jabatan_id = $request->get('jabatan_id');
            $pegawai->golongan_id = $request->get('golongan_id');

            $pegawai->photo = $filename;
            $pegawai->save();
        }

        return redirect('gawai');
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
        $pegawai=Pegawai::find($id);
        return view('pegawai.read', compact('pegawai'));
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
        $jabatann=Jabatan::all();
        $golongann=Golongan::all();
        $pegawai=Pegawai::find($id);
        return view('pegawai.edit', compact('pegawai', 'jabatann', 'golongann'));
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
        
        $pegawai = Pegawai::find($id);
        $pegawai->nip = $request->get('nip');
        $pegawai->jabatan_id = $request->get('jabatan_id');
        $pegawai->golongan_id = $request->get('golongan_id');

        if($request->hasFile('photo'))
        {
            

            $filename = null;
            $uploaded_photo = $request->file('photo');
            $extension = $uploaded_photo->getClientOriginalExtension();
            $filename = md5(time()) . '.' . $extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
            $uploaded_photo->move($destinationPath, $filename);
            if($pegawai->photo){
                $old_photo =  $pegawai->photo;
                $filepath = public_path() . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . $pegawai->photo;
                try{
                    File::delete($filepath);
                } catch (FileNotFoundException $e) {

                }
            }
           $pegawai->photo = $filename;
            
        }
        $pegawai->update();

            return redirect('gawai');
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
        Pegawai::find($id)->delete();
        return redirect('gawai');
    }
}
