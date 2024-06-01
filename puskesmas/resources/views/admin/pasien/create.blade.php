<x-layout>
    <x-slot name="page_name">Halaman Pasien / Create</x-slot>
    <x-slot name="page_content">
        <form class="forms-sample" action="{{ url('dashboard/pasien/store') }}" method="post">
            @csrf
            <div class="form-group row">
                <label for="kode" class="col-sm-4 col-form-label">Kode Pasien</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="kode" name="kode"
                        placeholder="Masukkan Kode Pasien" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama_pasien" class="col-sm-4 col-form-label">Nama Pasien</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="nama_pasien" name="nama_pasien"
                        placeholder="Masukkan Nama Pasien" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="tempat_lahir" class="col-sm-4 col-form-label">Tempat Lahir</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                        placeholder="Masukkan Tempat Lahir" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="tanggal_lahir" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="gender" class="col-sm-4 col-form-label">Gender</label>
                <div class="col-sm-8">
                    <select class="form-control" id="gender" name="gender" required>
                        <option value="" disabled selected>Pilih Gender</option>
                        <option value="m" {{ old('gender') == 'laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                        <option value="f" {{ old('gender') == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" id="email" name="email"
                        placeholder="Masukkan Alamat Email" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="alamat" name="alamat"
                        placeholder="Masukkan Alamat Tempat Tinggal" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="unit_kerja" class="col-sm-4 col-form-label">Unit Kerja</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="unit_kerja" name="unit_kerja"
                        placeholder="Masukkan Nama Unit Kerja" required>
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
