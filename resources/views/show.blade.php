@extends('adminLTE.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <a class="card-title btn btn-primary mb-2" href="{{ route('pertanyaan.index') }}">Kembali Ke Pertanyaan</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="ml-2 mt-2">
                <h4>
                    {{ $pertanyaan->judul }}
                </h4>
                <p>
                    {{ $pertanyaan->isi }}
                </p>
                <div>
                    Tags :
                    @forelse ($pertanyaan->pertanyaanHasTag as $tag)
                    <button class="btn btn-primary btn-sm">{{$tag->nama}}</button>
                        
                    @empty
                        No Tags
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
