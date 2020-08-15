@extends('adminLTE.master')

@section('content')
    <div class="ml-2 mt-2">
        <form action="{{ route('pertanyaan.store') }}" method="post">
            @csrf
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create Question</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" value="{{ old('judul', '') }}" id="judul"
                            placeholder="Masukkan Judul" name="judul">
                        @error('judul')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="isi">Isi</label>
                        <input type="isi" class="form-control" value="{{ old('isi', '') }}" id="isi"
                            placeholder="Masukkan Isi Pertanyaan" name="isi">
                        @error('isi')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tag">Tags</label>
                        <input type="tag" class="form-control" value="{{ old('tag', '') }}" id="tag"
                            placeholder="Masukkan Tags" name="tag">
                        @error('tag')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
