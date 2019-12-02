<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
	{
    	
		$mahasiswa = DB::table('mahasiswa')->get();

    	
		return view('index',['mahasiswa' => $mahasiswa]);

	}

	
	public function store(Request $request)
	{
		
		DB::table('mahasiswa')->insert([
			'nim' => $request->nim,
			'nama_mahasiswa' => $request->nama,
			'kelas' => $request->kelas,
			'prodi' => $request->prodi
		]);
		
		return redirect('/mahasiswa');

	}

	
	public function update(Request $request)
	{
		
		DB::table('mahasiswa')->where('nim',$request->nim)->update([
			'nim' => $request->nim,
			'nama_mahasiswa' => $request->nama,
			'kelas' => $request->kelas,
			'prodi' => $request->prodi
		]);
		
		return redirect('/mahasiswa');
	}

	
	public function hapus($nim)
	{
		
		DB::table('mahasiswa')->where('nim',$nim)->delete();
		
		
		return redirect('/mahasiswa');
	}
}
