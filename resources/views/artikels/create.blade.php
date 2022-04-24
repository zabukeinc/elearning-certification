@extends('layouts.admin')

@section('title')
<title>Tambah Artikel</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Artikel</li>
        <li class="breadcrumb-item active">Add Artikel</li>

    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">

            <form action="{{ route('artikel.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tambah Artikel</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Artikel Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="name">Artikel Name</label>
                                    <textarea name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
                                    <p class="text-danger">{{ $errors->first('description') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="image">Foto Artikel</label>
                                    <input type="file" name="image" class="form-control" value="{{ old('image') }}" required>
                                    <p class="text-danger">{{ $errors->first('image') }}</p>
                                    <button class="btn btn-primary btn-sm">Tambah</button>
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

<!-- PADA ADMIN LAYOUTS, TERDAPAT YIELD JS YANG BERARTI KITA BISA MEMBUAT SECTION JS UNTUK MENAMBAHKAN SCRIPT JS JIKA DIPERLUKAN -->
@section('js')
<!-- LOAD CKEDITOR -->
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script>
    //TERAPKAN CKEDITOR PADA TEXTAREA DENGAN ID DESCRIPTION
    CKEDITOR.replace('description');
</script>
@endsection