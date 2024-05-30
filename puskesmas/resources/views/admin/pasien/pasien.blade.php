<x-layout>
    <x-slot name="page_name">Halaman Pasien</x-slot>
    <x-slot name="page_content">
        <table class="table table-bordered">
            <tr class="table-success">
                <th>Id</th>
                <th>Kode</th>
                <th>Nama Pasien</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Unit Kerja</th>
            </tr>
            @foreach ($list_pasien as $pasien)
                <tr>
                    <td>{{ $pasien->id }}</td>
                    <td>{{ $pasien->kode }}</td>
                    <td>{{ $pasien->nama_pasien }}</td>
                    <td>{{ $pasien->tempat_lahir }}</td>
                    <td>{{ $pasien->tanggal_lahir }}</td>
                    <td>{{ $pasien->gender }}</td>
                    <td>{{ $pasien->email }}</td>
                    <td>{{ $pasien->alamat }}</td>
                    <td>{{ $pasien->unit_kerja }}</td>
                </tr>
            @endforeach
        </table>
    </x-slot>
</x-layout>
