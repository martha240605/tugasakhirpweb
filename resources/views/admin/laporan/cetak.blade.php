<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $reportTitle }}</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }
        h1, h2 {
            text-align: center;
            margin-bottom: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #999;
            padding: 5px;
            text-align: left;
        }
        .summary {
            margin-top: 20px;
        }
        .summary td {
            padding: 4px;
        }
    </style>
</head>
<body>

    <h1>{{ $reportTitle }}</h1>
    <h2>Dibuat pada: {{ $generatedAt }}</h2>

    <table class="summary">
        <tr>
            <td><strong>Total Booking</strong></td>
            <td>{{ $totalBookings }}</td>
        </tr>
        <tr>
            <td><strong>Total Lapangan</strong></td>
            <td>{{ $totaLapangans }}</td>
        </tr>
        <tr>
            <td><strong>Total Pengguna</strong></td>
            <td>{{ $totalUsers }}</td>
        </tr>
    </table>

    <h3 style="margin-top: 30px;">10 Booking Terbaru</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Pengguna</th>
                <th>Lapangan</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Durasi</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($latestBookings as $booking)
                <tr>
                    <td>#{{ $booking->id }}</td>
                    <td>{{ $booking->user->name }}</td>
                    <td>{{ $booking->lapangan->nama }}</td>
                    <td>{{ \Carbon\Carbon::parse($booking->tanggal)->format('d-m-Y') }}</td>
                    <td>{{ $booking->jam_mulai }} - {{ $booking->jam_selesai }}</td>
                    <td>{{ $booking->durasi }} jam</td>
                    <td>Rp{{ number_format($booking->total_harga, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3 style="margin-top: 30px;">Daftar Lapangan</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Jenis</th>
                <th>Harga per Jam</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lapangans as $lap)
                <tr>
                    <td>{{ $lap->id }}</td>
                    <td>{{ $lap->nama }}</td>
                    <td>{{ $lap->jenis }}</td>
                    <td>Rp{{ number_format($lap->harga_per_jam, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3 style="margin-top: 30px;">Daftar Pengguna</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $u)
                <tr>
                    <td>{{ $u->id }}</td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
