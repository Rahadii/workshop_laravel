@extends('layouts.app')

@section('content')
<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">Edit Mahasiswa</div>
					<div class="card-body">
						@if (Session::get('msg_berhasil'))
						<div class="alert alert-success" role="alert">
							<strong>Well Done! </strong> {{ Session::get('msg_berhasil') }}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
	
						@endif @if (Session::get('msg_gagal')) {{ Session::get('msg_gagal') }} @endif @if (Session::get('msg_error'))
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong>Error: </strong> {{ Session::get('msg_error') }}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
	
						@endif {{--
						<form method="PATCH" action="{{ route('update_mahasiswa', ['id' => $mahasiswa->id]) }}"> --}} 
						{{ Form::open(['route' => ['update_mahasiswa', $mahasiswa->id], 'method' => 'PATCH']) }}
							<div class="form-group row">
								<label for="npm" class="col-sm-2 col-form-label">Npm</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="npm" value="{{ $mahasiswa->npm }}" disabled> {!! $errors->first('npm', '
									<p class="badge badge-danger text-wrap" style="width: 10rem">:message</p>') !!}
								</div>
							</div>
							<div class="form-group row">
								<label for="nama_depan" class="col-sm-2 col-form-label">Nama Depan</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="nama_depan" value="{{ $mahasiswa->nama_depan }}"> {!! $errors->first('nama_depan', '
									<p class="badge badge-danger text-wrap" style="width: 10rem">:message</p>') !!}
								</div>
							</div>
							<div class="form-group row">
								<label for="nama_belakang" class="col-sm-2 col-form-label">Nama Belakang</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="nama_belakang" value="{{ $mahasiswa->nama_belakang }}"> {!! $errors->first('nama_belakang', '
									<p class="badge badge-danger text-wrap" style="width: 10rem">:message</p>') !!}
								</div>
							</div>
							<div class="form-group row">
								<label for="alamat_asal" class="col-sm-2 col-form-label">Alamat Asal</label>
								<div class="col-sm-10">
									<textarea type="textarea" class="form-control" name="alamat_asal"> {{ $mahasiswa->alamat_asal }} </textarea>
									{!! $errors->first('alamt_asal', '
									<p class="badge badge-danger text-wrap" style="width: 10rem">:message</p>') !!}
								</div>
							</div>
							<div class="form-group row">
								<label for="alamat_tinggal" class="col-sm-2 col-form-label">Alamat Tinggal</label>
								<div class="col-sm-10">
									<textarea type="textarea" class="form-control" name="alamat_tinggal"> {{ $mahasiswa->alamat_tinggal }} </textarea>
									{!! $errors->first('alamat_tinggal', '
									<p class="badge badge-danger text-wrap" style="width: 10rem">:message</p>') !!}
								</div>
							</div>
							<div class="form-group row">
								<label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
								<div class="col-sm-10">
									<select name="jurusan" class="form-control">
										<option value="-">-- Pilih --</option>
										<option value="Akuntansi" {{ $mahasiswa->jurusan == "Akuntansi" ? "selected" : "" }}>Akuntansi</option>
										<option value="Perpajakan" {{ $mahasiswa->jurusan == "Perpajakan" ? "selected" : "" }}>Perpajakan</option>
										<option value="Manajemen Informatika" {{ $mahasiswa->jurusan == "Manajemen Informatika" ? "selected" : "" }}>Manajemen Informatika</option>
									</select>
									{!! $errors->first('jurusan', '
									<p class="badge badge-danger text-wrap" style="width: 10rem">:message</p>') !!}
								</div>
							</div>
							<div class="form-group row">
								<label for="fakultas" class="col-sm-2 col-form-label">Fakultas</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="fakultas" value="{{ $mahasiswa->fakultas }}"> {!! $errors->first('jurusan', '
									<p class="badge badge-danger text-wrap" style="width: 10rem">:message</p>') !!}
								</div>
							</div>
							<div class="form-group row">
								<label for="no_hp" class="col-sm-2 col-form-label">No Hp</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="no_hp" value="{{ $mahasiswa->no_hp }}"> {!! $errors->first('no_hp', '
									<p class="badge badge-danger text-wrap" style="width: 10rem">:message</p>') !!}
								</div>
							</div>
							<div class="form-group row">
								<label for="gender" class="col-sm-2 col-form-label">Gender</label>
								<div class="col-sm-10">
									<select name="gender" class="form-control">
										<option value="-">-- Pilih --</option>
										<option value="Laki-laki" {{ $mahasiswa->gender == "Laki-laki" ? "selected" : "" }}>Laki-Laki</option>
										<option value="Perempuan" {{ $mahasiswa->gender == "Perempuan" ? "selected" : "" }}>Perempuan</option>
										{!! $errors->first('gender', '
										<p class="badge badge-danger text-wrap" style="width: 10rem">:message</p>') !!}
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="angkatan" class="col-sm-2 col-form-label">Angkatan</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="angkatan" value="{{ $mahasiswa->angkatan }}"> {!! $errors->first('angkatan', '
									<p class="badge badge-danger text-wrap" style="width: 10rem">:message</p>') !!}
								</div>
							</div>
							<div class="form-group row">
								<label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="tempat_lahir" value="{{ $mahasiswa->tempat_lahir }}"> {!! $errors->first('tempat_lahir', '
									<p class="badge badge-danger text-wrap" style="width: 10rem">:message</p>') !!}
								</div>
							</div>
							<div class="form-group row">
								<label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
								<div class="col-sm-10">
									<input type="date" class="form-control" name="tanggal_lahir" value="{{ $mahasiswa->tanggal_lahir }}"> {!! $errors->first('tanggal_lahir', '
									<p class="badge badge-danger text-wrap" style="width: 10rem">:message</p>') !!}
								</div>
							</div>
							<div class="form-group row">
								<label for="agama" class="col-sm-2 col-form-label">Agama</label>
								<div class="col-sm-10">
								<select name="agama" class="form-control">
										<option value="-">- Pilih -</option>
										<option value="Islam" {{ $mahasiswa->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
										<option value="Kristen" {{ $mahasiswa->agama == 'Kristen' ? 'selected' : '' }}>Kristen</option>
										<option value="Hindu" {{ $mahasiswa->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
										<option value="Budha" {{ $mahasiswa->agama == 'Budha' ? 'selected' : '' }}>Budha</option>
										<option value="Konguchu" {{ $mahasiswa->agama == 'Konguchu' ? 'selected' : '' }}>Konguchu</option>
								</select> 
								</div>	
								{!! $errors->first('agama', '
									<p class="badge badge-danger text-wrap" style="width: 10rem">:message</p>') !!}
							</div>
							<div class="form-group row">
								<div class="col-sm-10">
									<button type="submit" class="btn btn-warning">Edit</button>
								</div>
							</div>
							{{ Form::close() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection