<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 0 auto;
        }

        th,
        td {
            border: 1px solid black;
            padding: 5px;
        }

        th {
            font-weight: bold;
            text-align: center;
            vertical-align: middle;
        }

        td {
            text-align: left;
        }
    </style>
</head>

<body>
    <h1>Data Pegawai</h1>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>No telepon</th>
                <th>Di buat</th>
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

                    <td>{{ $row->jenis_kelamin }}</td>
                    <td>{{ $row->no_telepon }}</td>
                    <td>{{ $row->created_at->format('D M Y') }}</td>

                </tr>
            @endforeach



        </tbody>
    </table>


</body>

</html>
