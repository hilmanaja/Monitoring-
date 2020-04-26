<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'nis', 'nama', 'jenis_kelamin','id_rombel','id_rayon'];


    public function rayon()
    {
    	return $this->belongsto('App\Rayon');
    }
}
