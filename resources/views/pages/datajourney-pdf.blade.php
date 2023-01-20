<!DOCTYPE html>
<html>
<head>
<style>
table, td, th {
  border: 1px solid;
}

table {
  width: 100%;
  border-collapse: collapse;
}
</style>
</head>
<body>

<h2>Data Perjalanan {{ auth()->user()->name }}</h2>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Jam</th>
            <th>Lokasi</th>
            <th>Suhu</th>
        </tr>
    </thead>
    <tbody>
        @php
            $id = 1;
        @endphp
        @foreach ($data as $d)
        <tr>
            <th>{{ $id++ }}</th>
            <td>{{ $d->tanggal }} </td>
            <td> {{ $d->jam }}</td>
            <td>{{ $d->lokasi }}</td>
            <td>{{ $d->suhu }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>