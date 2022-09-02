<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>

</head>

<body>

    <div class="container px-4 p-5">
        <div class="card">
            <div class="card-body">
                <div class="m-1">
                    <button type="button" id="tambahin" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                    <button type="button" class="btn btn-warning">NGapain</button>
                    <button type="button" class="btn btn-info">Aje</button>
                </div>

                <ol class="list-group list-group-numbered mt-3">
                    @foreach ($data as $d)
                        <li @class([
                            $d->isDone
                                ? 'list-group-item-success d-flex justify-content-between align-items-start'
                                : 'list-group-item d-flex justify-content-between align-items-start',
                        ])>
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">{{ $d->judul }}</div>
                                {{ $d->deskripsi }}
                            </div>
                            @if ($d->prioritas == '1')
                                <span class="badge bg-danger rounded-pill m-2">hight priority</span>
                            @elseif($d->prioritas == '2')
                                <span class="badge bg-warning rounded-pill m-2">medium priority</span>
                            @elseif($d->prioritas == '3')
                                <span class="badge bg-info rounded-pill m-2">low priority</span>
                            @endif


                            <button class="btn btn-outline-warning m-1 edit" name="edit" id="{{ $d->id }}"><i
                                    class="fa-solid fa-pencil"></i></button>
                            <button type="button" class="btn btn-outline-danger m-1 hapus" name="hapus"
                                id="{{ $d->id }}"><i class="fa-solid fa-trash"></i></button>
                        </li>
                    @endforeach

                </ol>
            </div>


            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">catatan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('tambah') }}" method="POST" id="forms">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="judul" class="form-label">judul</label>
                                    <input type="text" name="judul" class="form-control" id="judul"
                                        placeholder="judul" required>
                                    <input type="hidden" class="form-control" name="id" id="id">
                                    {{-- <input type="hidden" class="form-control" value="0" name="isDone"
                                        id="isDone"> --}}
                                </div>
                                <div class="mb-3">
                                    <label for="judul" class="form-label">Prioritas</label>
                                    <select class="form-select" aria-label="Default select example" name="prioritas"
                                        id="prioritas">
                                        <option selected>--pilih priority--</option>
                                        <option value="1">hight priority</option>
                                        <option value="2">medium priority</option>
                                        <option value="3">low priority</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="judul" class="form-label">status</label>
                                    <select class="form-select" aria-label="Default select example" name="isDone"
                                        id="isDone">
                                        <option selected>--Status--</option>
                                        <option value="0">Pending</option>
                                        <option value="1">Selesai</option>

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">deskripsi</label>
                                    <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" required></textarea>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" id="tutup" name="tutup"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" id="simpan" name="simpan" class="btn btn-primary">Save
                                    changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).on('submit', 'form', function(event) {
            event.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                typeData: "JSON",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(res) {
                    console.log(res);
                    $('#tutup').click()
                },
                error: function(xhr) {
                    console.log(xhr);
                }

            });
        })

        $(document).on('click', '.edit', function(event) {
            $('#forms').attr('action', "{{ route('update') }}")
            event.preventDefault();
            let id = $(this).attr('id')
            $.ajax({
                url: "{{ route('edit') }}",
                type: 'post',
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(res) {
                    console.log(res);
                    $('#id').val(res.id)
                    $('#judul').val(res.judul)
                    $('#prioritas').val(res.prioritas)
                    $('#isDone').val(res.isDone)
                    $('#deskripsi').val(res.deskripsi)
                    $('#tambahin').click()

                },
                error: function(xhr) {
                    console.log(xhr);
                }
            })
        })

        $(document).on('click', '.hapus', function() {
            let id = $(this).attr('id')
            $.ajax({
                url: "{{ route('delete') }}",
                type: 'post',
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(res) {
                    console.log(res);
                    location.reload();
                    toastr.success(res.text, 'Sukses')
                },
                error: function(xhr) {
                    toastr.error(xhr.responseJSON.text)
                }
            })
        })

        $('#simpan').click(function() {
            location.reload()
            $('#form')[0].reset()
        })
    </script>



</body>

</html>
