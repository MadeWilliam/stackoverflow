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
                @empty($pertanyaan->isi)
                    <p>
                        Tidak ada tag
                    </p>
                @endempty
            </div>
        </div>
    </div>
@endsection
