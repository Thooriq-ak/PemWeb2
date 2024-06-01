<x-layout>
    <x-slot name="page_name">Halaman Kelurahan / Detail</x-slot>
    <x-slot name="page_content">
        <table class="table table-bordered">
            <tr class="table-success">
                <th>No</th>
                <th>Id</th>
                <th>Nama Kelurahan</th>
                <th>Nama Kecamatan</th>
                <th>Data dibuat pada</th>
                <th>Data diupdate pada</th>
            </tr>
            <tr>
                <th>1</th>
                <th>{{ $kelurahan->id }}</th>
                <th>{{ $kelurahan->nama }}</th>
                <th>{{ $kelurahan->kecamatan_nama }}</th>
                <th>{{ $kelurahan->created_at }}</th>
                <th>{{ $kelurahan->updated_at }}</th>
            </tr>
        </table>
    </x-slot>
</x-layout>