@extends('adminLTE.master')

@section('content')
    <div class="ml-2 mt-2">
        <form action="{{ route('pertanyaan.update', $pertanyaan->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Pertanyaan ke-{{ $pertanyaan->id }} </h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" value="{{ old('judul', $pertanyaan->judul) }}" id="judul"
                            placeholder="Masukkan Judul" name="judul">
                        @error('judul')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="isi">Isi</label>
                        <input type="isi" class="form-control" value="{{ old('isi', $pertanyaan->isi) }}" id="isi"
                            placeholder="Masukkan Isi Pertanyaan" name="isi">
                        @error('isi')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tags">Tags</label>
                        <input type="tags" class="form-control" value="{{ old('tags', $tags_str)}}"
                                id="tags" placeholder="Masukkan Tag, pisahkan dengan koma" name="tags">
                                
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
