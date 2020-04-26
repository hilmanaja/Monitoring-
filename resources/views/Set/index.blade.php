

@extends('layout.master')
@section('judul', 'Set Waktu')
@section('content')
	<div class="main">
		<div class="main-content">
			<div class="container-fluid">
				
				<div class="row">
					<div class="col-md-12">
						<div class="panel">
							<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title"> NIS : {{$siswa->nis}} <br><br> Nama : {{auth()->user()->name}}</h3>
									<p class="panel-subtitle text-center text-success">Silahkan atur jadwal kamu</p>
									
										
								
								<div class="panel-body">
									<form action="" method="post">

									<div class="form-group">
									<label>Hari</label>
									<input type="text" class="form-control" placeholder="text field" name="hari" disabled="true" value="{{$hari_ini}}">
									</div>

									<div class="form-group">
									<label>Tanggal</label>
									<input type="" class="form-control" placeholder="text field" name="tanggal" disabled="true" value="{{$date}}">
									</div>

									</form>
									<br>
									
									</div>
									<div class="right">
										<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i></button>
									</div>
									<table class="table">
										<thead>
											<tr>
												<th>NAMA KEGIATAN</th>	
												<th>TANGGAL</th>
												<th>WAKTU</th>
												<th>AKSI</th>
											</tr>
										</thead>
										@foreach($jadwal as $j)
											
										<tr>
											<td>{{$j->nama_kegiatan}}</td>
											<td>{{$j->tanggal}}</td>
											<td>{{$j->waktu}}</td>
											
											<td>
												<a href="/siswa/{{$j->id}}/edit" class="btn btn-warning btn-sm">edit</a>
												<a href="/siswa/{{$j->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Untuk Menghapus Data?')">delete</a>
											</td>
										</tr>
										@endforeach
									</table>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Penambahan Data Siswa</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <form action="/set/create" method="POST">
				        	{{csrf_field()}}

						  <div class="form-group">
						    <label for="exampleInputEmail1">Nama Kegiatan</label>
						    <input type="text" name="nama_kegiatan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Kegiatan">
						  </div>
						  <div class="form-group">
							    <label for="exampleFormControlSelect1">Pilih Mata Pelajaran</label>
							    <select class="form-control" name="mapel" id="exampleFormControlSelect1">
							      <option value="Agama">Agama</option>
							      <option value="PPKN">PPKN</option>
								  <option value="PJOK">PJOK</option>
								</select>
							</div>

						   <div class="form-group">
						    <label for="exampleInputEmail1">Tanggal</label>
						    <input type="date" name="tanggal" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$date}}" disabled="true">
						  </div>

						  
						   <div class="form-group">
						    <label for="exampleInputEmail1">Waktu</label>
						    <input type="time" name="waktu" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
						  </div>
						 
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        <button type="submit" class="btn btn-primary">Submit</button>
				        </form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@stop






