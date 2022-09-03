@extends('welcome')
@section('content')
    <div>
        <a href="{{ route('categori.create') }}" type="button" class="btn btn-primary m-3">
            tambah data
        </a>
        <h1>Kategori kegiatan</h1>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">no</th>
                <th scope="col">nama kategori</th>
                <th scope="col">Keteranga</th>
                <th scope="col">aksi</th>


        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @forelse ($categori as $e)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $e->nama }}</td>
                    <td> {{ $e->keterangan }}</td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                            action="{{ route('categori.destroy', $e->id) }}" method="POST">
                            <a href="{{ route('categori.edit', $e->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                        </form>
                    </td>
                </tr>
            @empty
                <div class="alert alert-danger">
                    Data Post belum Tersedia.
                </div>
            @endforelse
        </tbody>
    </table>
    {{ $categori->links() }}
@endsection
