@extends('layouts.base_admin.base_dashboard') @section('judul', 'Tambah Akun')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Akun</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="breadcrumb-item active">Tambah Tutorial</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    @if(session('status'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
        {{ session('status') }}
      </div>
    @endif
    <form method="post" action="{{ route('addTutorial.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Input Tutorial</h3>

                        <div class="card-tools">
                            <button
                                type="button"
                                class="btn btn-tool"
                                data-card-widget="collapse"
                                title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Judul</label>
                            <input
                                type="text"
                                id="inputJudul"
                                name="judul"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Masukkan Judul"
                                value="{{ old('name') }}"
                                required="required"
                                autocomplete="name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputDeskripsi">Deskripsi</label>
                            <textarea
                                id="inputDeskripsi"
                                name="deskripsi"
                                class="form-control @error('deskripsi') is-invalid @enderror"
                                placeholder="Masukkan Deskripsi"
                                required="required"
                                autocomplete="deskripsi"
                            >{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="inputBahan">Bahan</label>
                            <input
                                type="text"
                                id="inputBahan"
                                name="bahan"
                                class="form-control @error('bahan') is-invalid @enderror"
                                placeholder="Masukkan Bahan"
                                required="required"
                                autocomplete="bahan">
                            @error('bahan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputAlat">Alat</label>
                            <input
                                type="text"
                                id="inputAlat"
                                name="alat"
                                class="form-control @error('alat') is-invalid @enderror"
                                placeholder="Masukkan alat"
                                required="required"
                                autocomplete="alat">
                            @error('alat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputLangkah">Langkah</label>
                            <input
                                type="text"
                                id="inputLangkah"
                                name="langkah"
                                class="form-control @error('langkah') is-invalid @enderror"
                                placeholder="Masukkan langkah pembuatan"
                                required="required"
                                autocomplete="langkah">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        <div class="form-group">
                            <label for="inputFoto">Foto Barang</label>
                            <div class="row">
                                <div class="col-md-4">
                                    <img
                                        class="elevation-3"
                                        id="prevImg"
                                        src="{{ asset('vendor/adminlte3/img/user2-160x160.jpg') }}"
                                        width="150px"/>
                                </div>
                                <div class="col-md-8">
                                    <input
                                        type="file"
                                        id="inputFoto"
                                        name="foto"
                                        accept="image/*"
                                        class="form-control @error('user_image') is-invalid @enderror"
                                        placeholder="Upload foto profil">
                                </div>
                            </div>

                            @error('user_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <div class="row">
                    <div class="col-12 text-center">
                        <a href="{{ route('home') }}" class="btn btn-secondary mx-2">Cancel</a>
                        <button type="submit" class="btn btn-success mx-2">Tambah Akun</button>
                    </div>
                </div>
            </form>
            {{-- </div>
            <div class="col-md-6">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Password</h3>

                        <div class="card-tools">
                            <button
                                type="button"
                                class="btn btn-tool"
                                data-card-widget="collapse"
                                title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input
                                id="password"
                                type="password"
                                placeholder="Kata Sandi"
                                class="form-control @error('password') is-invalid @enderror"
                                name="password"
                                required="required"
                                autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">Konfirmasi Password</label>
                            <input
                                placeholder="Ketik ulang kata sandi"
                                id="password-confirm"
                                type="password"
                                class="form-control"
                                name="password_confirmation"
                                required="required"
                                autocomplete="new-password">
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <a href="{{ route('home') }}" class="btn btn-secondary mx-2">Cancel</a>
                <button type="submit" class="btn btn-success mx-2">Tambah Akun</button>
            </div>
        </div>
    </form>
</section> --}}
<!-- /.content -->

@endsection 
@section('script_footer')
<script>
    inputFoto.onchange = evt => {
        const [file] = inputFoto.files
        if (file) {
            prevImg.src = URL.createObjectURL(file)
        }
    }
</script>
@endsection
