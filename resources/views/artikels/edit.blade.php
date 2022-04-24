@extends('layouts.admin')

@section('title')
<title>Edit Artikel</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Artikel</li>
        <li class="breadcrumb-item active">Edit Artikel</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">

            <!-- PASTIKAN MENGIRIMKAN ID PADA ROUTE YANG DIGUNAKAN -->
            <form action="{{ route('artikel.update', $artikel->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- KARENA UPDATE MAKA KITA GUNAKAN DIRECTIVE DIBAWAH INI -->
                @method('PUT')
                <!-- FORM INI SAMA DENGAN CREATE, YANG BERBEDA HANYA ADA TAMBAHKAN VALUE UNTUK MASING-MASING INPUTAN  -->
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Artikel</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $artikel->name }}" required>
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="name">Artikel Description</label>
                                    <textarea name="description" id="description" cols="30" rows="10">{{ $artikel->description }}</textarea>
                                    <p class="text-danger">{{ $errors->first('description') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="image">Foto Artikel</label>
                                    <br>
                                    <!--  TAMPILKAN GAMBAR SAAT INI -->
                                    <img src="{{ asset('articles/' . $artikel->image) }}" width="100px" height="100px" alt="{{ $artikel->name }}">
                                    <hr>
                                    <input type="file" name="image" class="form-control">
                                    <p><strong><i>ABAIKAN JIKA TIDAK INGIN MENGGANTI GAMBAR</i></strong></p>
                                    <p class="text-danger">{{ $errors->first('image') }}</p>
                                    <button class="btn btn-primary btn-sm">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection

@section('js')
<!-- LOAD CKEDITOR -->
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script>
    //TERAPKAN CKEDITOR PADA TEXTAREA DENGAN ID DESCRIPTION
    CKEDITOR.replace('description');
</script>
@endsection