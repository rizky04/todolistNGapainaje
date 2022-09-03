@extends('welcome')
@section('content')
    <form method="POST" action="{{ route('catetan.store') }}">
        @csrf
        <div class="form-group">
            <label for="categori_id" class="form-label">Kategori</label>
            <select class="custom-select" name="categori_id">
                <option selected>--Kategori--</option>
                @foreach ($categori as $c)
                    <option value="{{ $c->id }}">{{ $c->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="catatan">catatan</label>
            <textarea type="text" class="form-control" name="catatan" placeholder="catatan"></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
@endsection
