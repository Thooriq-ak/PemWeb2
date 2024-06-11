<x-layout>
    <x-slot name="page_name">Halaman Pasien / Edit</x-slot>
    <x-slot name="page_content">
        <form class="forms-sample" action="{{ url('dashboard/pasien/update', $pasien->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label for="kode" class="col-sm-4 col-form-label">Kode Pasien</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="kode" name="kode"
                        placeholder="Masukkan Kode Pasien" required
                        value="{{ $pasien->kode }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="nama_pasien" class="col-sm-4 col-form-label">Nama Pasien</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="nama_pasien" name="nama_pasien"
                        placeholder="Masukkan Nama Pasien" required
                        value="{{ $pasien->nama_pasien }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="tempat_lahir" class="col-sm-4 col-form-label">Tempat Lahir</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                        placeholder="Masukkan Tempat Lahir" required
                        value="{{ $pasien->tempat_lahir }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="tanggal_lahir" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required
                    value="{{ $pasien->tanggal_lahir }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Gender</label>
                <div class="col-sm-8">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="gender_laki" name="gender" value="laki-laki" required
                            {{ $pasien->gender == 'laki-laki' ? 'checked' : '' }}>
                        <label class="form-check-label" for="gender_laki">Laki-Laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="gender_perempuan" name="gender" value="perempuan" required
                            {{ $pasien->gender == 'perempuan' ? 'checked' : '' }}>
                        <label class="form-check-label" for="gender_perempuan">Perempuan</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" id="email" name="email"
                        placeholder="Masukkan Alamat Email" required
                        value="{{ $pasien->email }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="alamat" name="alamat"
                        placeholder="Masukkan Alamat Tempat Tinggal" required
                        value="{{ $pasien->alamat }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="unit_kerja" class="col-sm-4 col-form-label">Unit Kerja</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="unit_kerja" name="unit_kerja"
                        placeholder="Masukkan Nama Unit Kerja" required
                        value="{{ $pasien->unit_kerja }}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-4"></div>
                <div class="col-sm-8">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
            </div>
        </form>
    </x-slot>
</x-layout>
