<?php

namespace App\Http\Controllers;
use DB;
use App\User;
use App\Siswa;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
    	$user = DB::table('siswa')->where('user_id',auth()->user()->id)->first();
        $siswa = Siswa::find($user->id);
        $data = DB::table('siswa')
            ->join('rayon', 'siswa.id_rayon', '=', 'rayon.id')
            ->join('rombel', 'siswa.id_rombel', '=', 'rombel.id')
            ->select('siswa.*','rayon.nama_rayon','rombel.nama_rombel')
            ->where('user_id',auth()->user()->id)
            ->first();

        
        
    	return view('profile.index',compact('user','siswa','data'));
    }

    public function reset(Request $request, $id)
    {
    	$request->validate([
    		'password' => 'same:cpassword',
    	]);

    	$user = User::findOrFail($id);
    	$user->update([
    		'password' => bcrypt($request->password),
            ]);
         return redirect('/profile');
    }

    public function password()
    {
    	return view('profile.edit');
    }
}
