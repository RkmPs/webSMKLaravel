<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
        <header class="bg-primary text-white py-4 mb-4 position-relative">
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
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">info Siswa</h4>
        </div>

        <div class="card-body">
            <div class="row">

                <div class="col-md-8">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">NIS</label>
                            <p class="form-control-plaintext">{{ $student->nis }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Nama</label>
                            <p class="form-control-plaintext">{{ $student->nama }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Tempat Lahir</label>
                            <p class="form-control-plaintext">{{ $student->tempat_lahir }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Tanggal Lahir</label>
                            <p class="form-control-plaintext">
                                {{ \Carbon\Carbon::parse($student->tanggal_lahir)->translatedFormat('d F Y') }}
                                ({{ \Carbon\Carbon::parse($student->tanggal_lahir)->age }} tahun)
                            </p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jenis Kelamin</label>
                        <p class="form-control-plaintext">{{ $student->jenis_kelamin }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Kelas</label>
                        <p class="form-control-plaintext">{{ $student->kelas }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Alamat</label>
                        <p class="form-control-plaintext">{{ $student->alamat }}</p>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Kelurahan</label>
                            <p class="form-control-plaintext">{{ $student->kelurahan }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Kecamatan</label>
                            <p class="form-control-plaintext">{{ $student->kecamatan }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Kota / Kabupaten</label>
                            <p class="form-control-plaintext">{{ $student->kota_kabupaten }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Provinsi</label>
                            <p class="form-control-plaintext">{{ $student->provinsi }}</p>
                        </div>
                    </div>
                </div>

                  <div class="col-md-4 text-center">
                    <label class="form-label fw-semibold d-block">Foto</label>
                    <div class="border rounded mb-3" style="width: 200px; height: 200px; margin: 0 auto; overflow: hidden;">
                        <img src="{{ asset('storage/students/' . $student->foto) }}" 
                             alt="{{ $student->nama }}" 
                             class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>

                    {{-- Tombol Kembali di bawah foto --}}
                    <a href="{{ route('siswa.index') }}" class="btn btn-secondary w-100">
                        OK, Saya Mengerti
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
