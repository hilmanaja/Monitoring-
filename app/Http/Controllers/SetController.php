<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Siswa;
use App\Rayon;
use App\Rombel;
use App\Jadwal;
class SetController extends Controller
{

	public function timeZone($location)
	{
		return date_default_timezone_set($location);
	}

	public function index()
	{
		$jadwal = Jadwal::all();
		$this->timeZone('Asia/Jakarta');
		$date = date("Y-m-d");
    	$user = DB::table('siswa')->where('user_id',auth()->user()->id)->first();
        $siswa = Siswa::find($user->id);
        $data = DB::table('siswa')
            ->join('rayon', 'siswa.id_rayon', '=', 'rayon.id')
            ->join('rombel', 'siswa.id_rombel', '=', 'rombel.id')
            ->select('siswa.*','rayon.nama_rayon','rombel.nama_rombel')
            ->where('user_id',auth()->user()->id)
            ->first();
       

   		$hari = date ("D");
 
		switch($hari){
			case 'Sun':
				$hari_ini = "Minggu";
			break;
	 
			case 'Mon':			
				$hari_ini = "Senin";
			break;
	 
			case 'Tue':
				$hari_ini = "Selasa";
			break;
	 
			case 'Wed':
				$hari_ini = "Rabu";
			break;
	 
			case 'Thu':
				$hari_ini = "Kamis";
			break;
	 
			case 'Fri':
				$hari_ini = "Jumat";
			break;
	 
			case 'Sat':
				$hari_ini = "Sabtu";
			break;
			
			default:
				$hari_ini = "Tidak di ketahui";		
			break;
		}
   
    return view('set.index',compact('siswa','data','date','hari_ini','date','jadwal'));
   }

   public function create(Request $request)
   {
   		$this->timeZone('Asia/Jakarta');
		$date = date("Y-m-d");
        $konvert = date("H:i", strtotime($request->waktu));    
        $siswa = Jadwal::create([
        	'siswa_id' => Auth()->user()->id,
			'nama_kegiatan' => $request->nama_kegiatan,
			'mapel' => $request->mapel,	
        	'tanggal' => $date,
        	'waktu' => $konvert
        ]);
        return redirect('/siswa')->with('sukses','Data Berhasil Di Input');
   }


}
