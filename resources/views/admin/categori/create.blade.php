@extends('welcome')
@section('content')
    <form method="POST" action="{{ route('categori.store') }}">
        @csrf
        <div class="form-group">
            <label for="nama">nama</label>
            <input type="text" class="form-control" name="nama" aria-describedby="nama" placeholder="nama">
        </div>
        <div class="form-group">
            <label for="keterangan">keterangan</label>
            <input type="text" class="form-control" name="keterangan" placeholder="keterangan">
        </div>

        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
@endsection
