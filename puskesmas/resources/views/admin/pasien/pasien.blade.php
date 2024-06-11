<x-layout>
    <x-slot name="page_name">Halaman Pasien</x-slot>
    <x-slot name="page_content">

        @if (session('pesan'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('pesan') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if (session('update'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ session('update') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if (session('delate'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('delate') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <a href="{{ url('dashboard/pasien/create') }}" class="btn btn-primary">+ Tambah Kelurahan</a>

        <table class="table table-bordered">
            <tr class="table-success">
                <th>Id</th>
                <th>Kode</th>
                <th>Nama Pasien</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Unit Kerja</th>
                <th>Aksi</th>
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
                    <td>
                        <a href="{{ url('dashboard/pasien/show', $pasien->id) }}" class="btn btn-primary"><i class="far fa-eye"></i> Lihat</a>
                        <a href="{{ url('dashboard/pasien/edit', $pasien->id) }}" class="btn btn-warning"><i class="far fa-edit"></i> Edit</a>
                        <form action="{{ url('dashboard/pasien/destroy', $pasien->id) }}" class="d-inline"
                            method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Apa anda yakin ingin menghapus data?')"><i
                                    class="far fa-trash-alt"></i> Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </x-slot>
</x-layout>
