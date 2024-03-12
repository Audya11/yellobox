<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href=/css/table.css>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 6px;
            border: 1px solid #ddd;
            text-align: center;
            font-size: 14px
        }


        th {
            background-color: #f2f2f2;
        }
    </style>
    </style>
</head>

<body>

    <table>
        <thead>
            <tr>
                <th class=" ">
                    Nama Instruktur</th>
                <th class="">
                    Mata Pelajaran</th>
                <th class=" ">
                    Tempat Mengajar</th>
                <th class="">
                    Jam Mengajar</th>
                <th class="">
                    Tanggal
                </th>
                <th class="">
                    asisten
                </th>

            </tr>
        </thead>
        <tbody>
            @foreach ($jadwals as $jadwal)
                <tr>
                    <td>
                        <p>
                            @foreach ($jadwal->user as $user)
                                {{ $user->name }}
                            @endforeach
                        </p>
                    </td>
                    <td>
                        <p>{{ $jadwal->matapelajaran }}
                        </p>
                    </td>
                    <td>
                        <p>
                            @foreach ($jadwal->sekolah as $sekolah)
                                {{ $sekolah->nama }}
                            @endforeach
                        </p>
                    </td>

                    <td>
                        <p>{{ $jadwal->jammengajar }}
                        </p>
                    </td>
                    <td>
                        <p>{{ $jadwal->tanggal }}</p>
                    </td>
                    <td>
                        <p>
                            @foreach ($jadwal->asisten as $asisten)
                                {{ $asisten->name }}
                            @endforeach
                        </p>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>



{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contoh Tabel</title>
    <style>
        /* CSS untuk styling tabel */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2>Contoh Tabel</h2>
    <table>
        <thead>
            <tr>
                <th>Kolom 1</th>
                <th>Kolom 2</th>
                <th>Kolom 3</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Baris 1, Kolom 1</td>
                <td>Baris 1, Kolom 2</td>
                <td>Baris 1, Kolom 3</td>
            </tr>
            <tr>
                <td>Baris 2, Kolom 1</td>
                <td>Baris 2, Kolom 2</td>
                <td>Baris 2, Kolom 3</td>
            </tr>
            <tr>
                <td>Baris 3, Kolom 1</td>
                <td>Baris 3, Kolom 2</td>
                <td>Baris 3, Kolom 3</td>
            </tr>
        </tbody>
    </table>
</body>

</html> --}}
