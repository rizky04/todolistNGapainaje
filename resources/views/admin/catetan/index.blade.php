@extends('welcome')
@section('content')
    <div>
        <a href="{{ route('catetan.create') }}" type="button" class="btn btn-primary m-3">
            tambah data
        </a>

        <h1>catetan kegiatan sehari hari</h1>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">no</th>
                <th scope="col">kategori</th>
                <th scope="col">catatan kegiatan</th>
                <th scope="col">aksi</th>

        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @forelse ($catetan as $a)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $a->categori->nama }}</td>
                    <td> {{ $a->catatan }}</td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                            action="{{ route('catetan.destroy', $a->id) }}" method="POST">
                            <a href="{{ route('catetan.edit', $a->id) }}" class="btn btn-sm btn-primary">EDIT</a>
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
    {{ $catetan->links() }}
@endsection
