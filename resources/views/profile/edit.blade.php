@extends('layout.master')
@section('judul', 'Daftar Siswa')
@section('content')
	<div class="main">
		<div class="main-content">
			<div class="container-fluid">
				@if ($errors->any())
					<div class="alert alert-danger">
						<strong>Oops</strong> Password tidak sama.<br><br>
						    <ul>
						        @foreach ($errors->all() as $error)
						            <li>{{ $error }}</li>
						        @endforeach
						    </ul>
					</div>
				@endif	
				<div class="row">
					<div class="col-md-12">
						<div class="panel">

								<div class="panel-heading">
									<h3 class="panel-title">Ganti Password</h3>
									<div class="right">
									</div>
								</div>
								<div class="panel-body">
									<form action="/profile/{{auth()->user()->id}}/reset" method="post">
										{{csrf_field()}}

									<div class="form-group">
									<label>Password</label>
									<input type="text" class="form-control" placeholder="Masukan Password baru" name="password">
									</div>

									<div class="form-group">
									<label>Confirm Password</label>
									<input type="text" class="form-control" placeholder="Confirm Password" name="cpassword">
									</div>
									
								</div>
								<button type="submit" class="btn btn-warning btn-block">Ganti</button>
								</form>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop




