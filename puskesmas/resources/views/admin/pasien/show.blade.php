<x-layout>
    <x-slot name="page_name">Halaman Kelurahan / Detail</x-slot>
    <x-slot name="page_content">
        <table class="table table-bordered">
            <tr class="table-success">
                <th>No</th>
                <th>Kode</th>
                <th>Nama Pasien</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Unit Kerja</th>
                <th>Data dibuat pada</th>
                <th>Data diupdate pada</th>
            </tr>
            <tr>
                <th>1</th>
                <td>{{ $pasien->kode }}</td>
                <td>{{ $pasien->nama_pasien }}</td>
                <td>{{ $pasien->tempat_lahir }}</td>
                <td>{{ $pasien->tanggal_lahir }}</td>
                <td>{{ $pasien->gender }}</td>
                <td>{{ $pasien->email }}</td>
                <td>{{ $pasien->alamat }}</td>
                <td>{{ $pasien->unit_kerja }}</td>
                <th>{{ $pasien->created_at }}</th>
                <th>{{ $pasien->updated_at }}</th>
            </tr>
        </table>
    </x-slot>
</x-layout>
