@extends('welcome')
@section('content')
    <form method="POST" action="{{ route('catetan.update', $catetan->id) }}">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="categori_id" class="form-label">Kategori</label>
            <select class="custom-select" name="categori_id">
                @foreach ($categori as $c)
                    <option value="{{ $c->id }}">{{ $c->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="keterangan">keterangan</label>
            <input type="text" class="form-control" value="{{ old('catatan') ?? $catetan->catatan }}" name="catatan"
                placeholder="catatan">
            @error('title')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
@endsection
