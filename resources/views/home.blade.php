@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (Session::get('msgSuccessUpdate'))
                    <div class="alert alert-success" role="alert">
                      <strong>Success : </strong> {{ Session::get('msgSuccessUpdate') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    @endif
                    @if (Session::get('msgFailedUpdate'))
                    <div class="alert alert-danger" role="alert">
                      <strong>Failed : </strong> {{ Session::get('msgFailedUpdate') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    @endif
                    @if (Session::get('msgSuccessDelete'))
                    <div class="alert alert-success" role="alert">
                      <strong>Success : </strong> {{ Session::get('msgSuccessDelete') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    @endif
                    @if (Session::get('msgFailedDelete'))
                    <div class="alert alert-danger" role="alert">
                      <strong>Success : </strong> {{ Session::get('msgFailedDelete') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    @endif
                    
                    <form class="form-inline" onsubmit="return filterMhs()">
                      <div class="form-group mb-2">
                        <a href="{{ route('tambah_mahasiswa') }}" class="btn btn-mini btn-primary">Tambah Mahasiswa</a>
                      </div>
                      <div class="form-group mx-sm-4 mb-2">
                        <select name="filter" id="selectFilter" class="form-control">
                          <option value="">- Pilih -</option>
                          <option value="Npm" {{ \Request::get('filter') == 'Npm' ? 'selected' : '' }}>NPM</option>
                          <option value="Nama" {{ \Request::get('filter') == 'Nama' ? 'selected' : '' }}>Nama</option>
                          <option value="Jurusan" {{ \Request::get('filter') == 'Jurusan' ? 'selected' : '' }}>Jurusan</option>
                        </select>
                      </div>
                      <div class="input-group mb-2">
                      <input type="text" class="form-control" placeholder="Search" aria-label="search" aria-describedby="button-addon2" name="search" value="{{ \Request::get('search') }}">
                          <div class="input-group-append">
                            <button class="btn btn-success" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                    </form>
                    <hr>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">NPM</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Jurusan</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($mahasiswa as $mhs)
                        <tr>
                          <td>{{ $mhs->id }}</td>
                          <td>{{ $mhs->npm }}</td>
                          <td>{{ $mhs->full_name }}</td>
                          <td>{{ $mhs->jurusan }}</td>
                          <td>
                          <a class="btn btn-warning btn-sm" href="{{ route('edit_mahasiswa', ['id' => $mhs->id]) }}" role="button"> <i class="fa fa-edit"></i> Edit</a>
                          <a class="btn btn-danger btn-sm btnDelete" href="javascript:;" data-toggle="modal" data-target="#exampleModal" data-npm='{{ $mhs->npm }}' data-nama='{{ $mhs->full_name }}' data-id='{{ $mhs->id }}'> <i class="fa fa-trash"></i> Delete</a>
                          </td>
                        </tr>
                        @empty
                        <tr>
                          <td colspan="5" class="text-center">Data Mahasiswa Kosong</td>
                        </tr>
                        @endforelse
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {{ Form::open(['route' => 'delete_mahasiswa', 'method' => 'DELETE']) }}
      <input type="hidden" name="id" id="id" />
      <div class="modal-body">
        Apakah Anda Yakin akan menghapus data ? <br />
        <b>NPM : <span id="npm"></span> </b> <br />
        <b>Nama Lengkap : <span id="nama"> </span> </b> <br />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>
  {{ Form::close() }}
<script>
  $(function(){
    $('.btnDelete').click(function(){
      var id = $(this).data('id');
      var npm = $(this).data('npm');
      var nama = $(this).data('nama');

      console.log('Id : ' + id);

      $('#id').val($(this).data('id'));
      $('#npm').text($(this).data('npm'));
      $('#nama').text($(this).data('nama'));
    });
  });

    function filterMhs() {
        var filter = $('#selectFilter').val();
        var search = $('input[name=search]').val();
        console.log(filter);
        console.log(search);
        
        if ( filter == ''){
          alert('Tolong dilengkapi terlebih dahulu !');
          return false
        }

        if ( search == ''){
          alert('Tolong diinput terlebih dahulu dan jangan kosong !');
          return false;
        }
        return true;
    };
</script>
<script src="https://kit.fontawesome.com/7700bc3a8a.js" crossorigin="anonymous"></script>
@endsection
