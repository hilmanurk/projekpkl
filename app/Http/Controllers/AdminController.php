<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\DataSekolah;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session as FacadesSession;

class AdminController extends Controller
{
    public function Index(){
        return view('admin.admin_login');
    } // end method

    public function Dashboard(){
        return view('admin.index');
    } // end method

    public function Login(Request $request){
        // dd($request->all());
        $check = $request->all();
        if(Auth::guard('admin')->attempt(['email'=>$check['email'], 
        'password'=>$check['password']])){
            return redirect()->route('admin.dashboard')->with('error','Admin Login Successfully');
        }
        else{
            return back()->with('error', 'Invalid Email or Password');
        }
    } //end method

    public function AdminLogout(){
        Auth::guard('admin')->logout();
        return redirect()->route('login_form')->with('error','Admin Logout Successfully');
    } //end method

    public function AdminRegister(){
        return view('admin.admin_register');
    } //end method

    public function AdminRegisterCreate(Request $request){
        // dd($request->all());
        Admin::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('admin.data_sekolah')->with('error','Data Sekolah Added Successfully');
    } 

    public function DataSekolah(){
        $data = DataSekolah::orderBy('nama', 'desc')->paginate(1);
        return view('admin.data_sekolah.index')->with('data',$data);
    }

    public function DataSekolahCreate(){
        // dd($request->all());
        return view('admin.data_sekolah.create');
    } 

    public function DataSekolahEdit($i){
        // dd($request->all());
        $sekolah = DataSekolah::where('nim', $i)->first();
        return view('admin.data_sekolah.edit')->with('data',$sekolah);
    } 

    public function DataSekolahStore(Request $request){
        FacadesSession::flash('kabupaten/kota',$request->kabkota);
        FacadesSession::flash('nisn',$request->nisn);
        FacadesSession::flash('nama',$request->nama);
        FacadesSession::flash('jenjang',$request->jenjang);
        FacadesSession::flash('email',$request->email);
        FacadesSession::flash('password',$request->password);

        $sekolah = [
            'cabdin'=>$request->cabdin,
            'kabupaten/kota'=>$request->kabkota,
            'nisn'=>$request->nisn,
            'nama'=>$request->nama,
            'jenjang'=>$request->jenjang,
            'email'=>$request->email,
            'password'=>$request->password
        ];
        DataSekolah::create($sekolah);
        return redirect()->to('admin.data_sekolah')->with('success','Data Sekolah Added Successfully');
    }  
     

    public function DataSekolahUpdate(Request $request, $i)
    {
        $request->validate([
            'kabupaten/kota' => 'required',
            'nisn' => 'required',
            'nama' => 'required',
            'jenjang' => 'required',
            'email' => 'required',
            'password' => 'required',
        ], [
            'nama.required' => 'Nama wajib diisi',
            'jurusan.required' => 'Jurusan wajib diisi',
        ]);
        $sekolah = [
            'cabdin'=>$request->cabdin,
            'kabupaten/kota'=>$request->kabkota,
            'nisn'=>$request->nisn,
            'nama'=>$request->nama,
            'jenjang'=>$request->jenjang,
            'email'=>$request->email,
            'password'=>$request->password
        ];
        DataSekolah::where('nisn', $i)->update($sekolah);
        return redirect()->to('admin/data_sekolah')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $i
     * @return \Illuminate\Http\Response
     */

    public function DataSekolahDelete($i){
        // dd($request->all());
        DataSekolah::where('nisn', $i)->delete();
        return redirect()->to('admin.data_sekolah')->with('success','Berhasil dihapus');
    } 

    public function KodeRekening(){
        return view('admin.kode_rekening.index');
    }

    public function KodeRekeningCreate(){
        // dd($request->all());
        return view('admin.kode_rekening.create');
    } 

    public function KodeRekeningStore(Request $request){
        FacadesSession::flash('kabupaten/kota',$request->kabkota);
        FacadesSession::flash('nisn',$request->nisn);
        FacadesSession::flash('nama',$request->nama);
        FacadesSession::flash('jenjang',$request->jenjang);
        FacadesSession::flash('email',$request->email);
        FacadesSession::flash('password',$request->password);

        $sekolah = [
            'cabdin'=>$request->cabdin,
            'kabupaten/kota'=>$request->kabkota,
            'nisn'=>$request->nisn,
            'nama'=>$request->nama,
            'jenjang'=>$request->jenjang,
            'email'=>$request->email,
            'password'=>$request->password
        ];
        DataSekolah::create($sekolah);
        return redirect()->to('admin.data_sekolah')->with('success','Data Sekolah Added Successfully');
    }  
}
