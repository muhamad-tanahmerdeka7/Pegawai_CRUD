<!DOCTYPE html>
<html>

<head>
    <style>
        /* Tambahkan gaya sesuai kebutuhan Anda untuk format Excel */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #460000;
        }
    </style>
</head>

<body>

    <h2>Data Pegawai</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Foto</th>
                <th>Jenis Kelamin</th>
                <th>Nomor Telepon</th>
                <th>Di Tambah</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp

            @foreach ($data as $row)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->foto }}</td>
                    <td>{{ $row->jenis_kelamin }}</td>
                    <td>{{ $row->no_telepon }}</td>
                    <td>{{ $row->created_at->format('D M Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
