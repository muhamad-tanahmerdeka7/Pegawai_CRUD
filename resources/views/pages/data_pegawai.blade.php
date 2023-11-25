<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body>
    <h1 class="text-center">Data Pegawai</h1>
    <div class="container">
        <a href="/tambahdata" class="btn btn-success">Tambah +</a>
        <div class="row g-3 align-items-center mt-2">

            <div class="col-auto">
                <form action="/pegawai" method="GET">
                    <input type="search" id="inputPassword6" name="search" class="form-control"
                        aria-describedby="passwordHelpInline">
                </form>
            </div>

            <div class="col-auto">
                <a href="/exportpdf" class="btn btn-info">Export PDF</a>
            </div>


            <div class="col-auto">
                <a href="/exportexcel" class="btn btn-secondary">Export EXCEL</a>
            </div>

            <div class="col-auto">

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Import Excel
                </button>
            </div>

            {{-- modal --}}


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="/importexcel" method="POST" enctype="multipart/form-data">
                            @csrf




                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="file" name="file" required>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>

                    </div>

                    </form>
                </div>
            </div>


        </div>
        <div class="row mt-2">
            {{-- ini pesan muncul ketika update atau delete karna menggunakan toastr kita hapus
            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif --}}

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Nomor telepon</th>
                        <th scope="col">Di Tambah</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp

                    @foreach ($data as $index => $row)
                        <tr>
                            <th scope="row">{{ $index + $data->firstItem() }}</th>
                            <td>{{ $row->nama }}</td>
                            <td>
                                <img src="{{ asset('potopegawai/' . $row->foto) }}" alt=""
                                    style=" max-width: 40px;">
                            </td>
                            <td>{{ $row->jenis_kelamin }}</td>
                            <td>{{ $row->no_telepon }}</td>
                            <td>{{ $row->created_at->format('D M Y') }}</td>
                            <td>
                                <a href="/tampildata/{{ $row->id }}" class="btn btn-warning">Edit</a>
                                {{--
                               // <a href="/hapusdata/{{ $row->id }}" class="btn btn-danger">Hapus</a> --}}
                                <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}"
                                    data-nama="{{ $row->nama }}">Hapus</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $data->links() }}
        </div>
    </div>
    </table>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        // SweetAlert untuk hapus
        $('.delete').on('click', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            swal({
                title: "Apakah Anda yakin?",
                text: "Data " + nama + " akan dihapus!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    window.location = "/hapusdata/" + id;
                    swal("Data " + nama + " Berhasil Di Hapus!", {
                        icon: "success",
                    });
                } else {
                    swal("Data " + nama + " Tidak jadi di hapus");
                }
            });
        });

        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif
    </script>
</body>

</html>
