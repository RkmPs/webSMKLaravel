<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

        <header class="bg-primary-custom text-white py-4 mb-4 position-relative">
        <div class="container text-center">
            <img src="{{ asset('images/Logo.png') }}" alt="Logo Sekolah" 
                 class="position-absolute start-0 ms-4" 
                 style="width:60px; height:60px; border-radius:50%; object-fit:cover;">
            <h1 class="fw-bold mb-0">SMKN 2 Bandung</h1>
            <p class="mb-0">Mohammad_Razzaq_Athallah_Khairi_Mubarad_Putra</p>
        </div>
    </header>
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Tambah Data</h4>
        </div>
        <div class="card-body">

            {{-- Tampilkan error validasi --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Perhatikan!</strong> Terdapat beberapa kesalahan:
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    {{-- Kolom kiri --}}
                    <div class="col-md-8">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">NIS</label>
                                <input type="text" name="nis" class="form-control" value="{{ old('nis') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir') }}" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-select" required>
                                <option value="">-- Pilih --</option>
                                <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kelas</label>
                            <input type="text" name="kelas" class="form-control" value="{{ old('kelas') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat" class="form-control" rows="2" required>{{ old('alamat') }}</textarea>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Kelurahan</label>
                                <input type="text" name="kelurahan" class="form-control" value="{{ old('kelurahan') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Kecamatan</label>
                                <input type="text" name="kecamatan" class="form-control" value="{{ old('kecamatan') }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Kota / Kabupaten</label>
                                <input type="text" name="kota_kabupaten" class="form-control" value="{{ old('kota_kabupaten') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Provinsi</label>
                                <input type="text" name="provinsi" class="form-control" value="{{ old('provinsi') }}" required>
                            </div>
                        </div>
                    </div>

                    {{-- Kolom kanan: Foto --}}
                    <div class="col-md-4 text-center">
                        <label class="form-label d-block">Foto</label>
                        <div class="border rounded mb-3" style="width: 200px; height: 200px; margin: 0 auto; overflow: hidden;">
                            <img id="preview" src="{{ asset('images/default-avatar.png') }}" alt="Foto Siswa" 
                                 class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <input type="file" name="foto" class="form-control mb-2" accept="image/*" onchange="previewImage(event)" required>
                        <button type="submit" class="btn btn-primary w-100">Simpan</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
function previewImage(event) {
    const preview = document.getElementById('preview');
    preview.src = URL.createObjectURL(event.target.files[0]);
}
</script>

</body>
</html>
