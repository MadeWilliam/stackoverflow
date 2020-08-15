@extends('adminLTE.master')

@section('content')
    <div class="mt-3 ml-3">
        <div class="card">
            <div class="card-header">
                <a class="card-title btn btn-primary mb-2" href="{{ route('pertanyaan.create') }}">Create New Question</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Judul</th>
                            <th>Pertanyaan</th>
                            <th>Penulis</th>
                            <th>Jawaban Terbaik</th>
                            <th>Tags</th>
                            <th style="width: 40px">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($pertanyaan as $key => $pertanyaan_s)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $pertanyaan_s->judul }}</td>
                                <td>{{ $pertanyaan_s->isi }}</td>
                                <td>#</td>
                                <td>#</td>
                                <td>
                                    @php
                                    $arrCount = count($pertanyaan_s->pertanyaanHastag)
                                    @endphp
                                    @forelse ($pertanyaan_s->pertanyaanHasTag as $key_s => $tag)
                                        @if ($key_s == $arrCount - 1)
                                            {{ $tag->nama }}
                                        @else
                                            {{ $tag->nama . ',' }}
                                        @endif
                                    @empty
                                        No Tags
                                    @endforelse
                                </td>
                                <td style="display:flex">
                                    <a href="/pertanyaan/{{ $pertanyaan_s->id }}" class="btn btn-info btn-sm">Show</a>
                                    <a href="/pertanyaan/{{ $pertanyaan_s->id }}/edit" class="btn btn-default btn-sm">Edit</a>
                                    <form action="/pertanyaan/{{ $pertanyaan_s->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="delete" class="btn btn-danger btn-sm">
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" align="center">Tidak ada pertanyaan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
