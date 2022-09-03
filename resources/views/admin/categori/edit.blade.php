@extends('welcome')
@section('content')
    <form method="POST" action="{{ route('categori.update', $categori->id) }}">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="nama">nama</label>
            <input type="text" class="form-control" value="{{ old('nama') ?? $categori->nama }}" name="nama"
                aria-describedby="nama" placeholder="nama">
            @error('title')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="keterangan">keterangan</label>
            <input type="text" class="form-control" value="{{ old('keterangan') ?? $categori->keterangan }}"
                name="keterangan" placeholder="keterangan">
            @error('title')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
@endsection
