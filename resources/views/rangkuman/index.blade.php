<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rangkuman Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        .card:hover {
            transform: translateY(-5px);
            transition: all 0.2s ease-in-out;
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="bg-light">

    <header class="bg-primary text-white py-4 position-relative">
        <div class="container text-center">
            <img src="{{ asset('images/Logo.png') }}" alt="Logo Sekolah" 
                 class="position-absolute start-0 ms-4" 
                 style="width:60px; height:60px; border-radius:50%; object-fit:cover;">
            <h1 class="fw-bold mb-0">SMKN 2 Bandung</h1>
            <p class="mb-0">Mohammad_Razzaq_Athallah_Khairi_Mubarad_Putra</p>
        </div>
    </header>

    <main class="container my-5">
        
        <div class="row g-4">
            <div class="col-md-4">
                <a href="{{ route('siswa.index') }}" class="text-decoration-none">
                    <div class="card text-center h-100 border-0 shadow">
                        <div class="card-body">
                            <h5 class="card-title text-primary fw-semibold">Daftar Siswa</h5>
                            <p class="text-muted mb-0">Kelola data seluruh siswa yang terdaftar di sistem.</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('rangkuman.index') }}" class="text-decoration-none">
                    <div class="card text-center h-100 border-0 shadow">
                        <div class="card-body">
                            <h5 class="card-title text-primary fw-semibold">Rangkuman</h5>
                            <p class="text-muted mb-0">Klik untuk melihat statistik dan data ringkas siswa.</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('about') }}" class="text-decoration-none">
                    <div class="card text-center h-100 border-0 shadow">
                        <div class="card-body">
                            <h5 class="card-title text-primary fw-semibold">Tentang Aplikasi</h5>
                            <p class="text-muted mb-0">Informasi seputar tujuan dan pengembang aplikasi ini.</p>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </main>

<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Rangkuman Data Siswa</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Tabel Berdasarkan Jenis Kelamin -->
                <div class="col-md-6 mb-4 mb-md-0">
                    <h5 class="text-center mb-3">Berdasarkan Jenis Kelamin</h5>
                    <table class="table table-bordered table-striped">
                        <thead class="table-primary">
                            <tr>
                                <th>Jenis Kelamin</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Laki-laki</td>
                                <td>{{ $jumlahLaki }}</td>
                            </tr>
                            <tr>
                                <td>Perempuan</td>
                                <td>{{ $jumlahPerempuan }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Tabel Berdasarkan Kelas -->
                <div class="col-md-6">
                    <h5 class="text-center mb-3">Berdasarkan Kelas</h5>
                    <table class="table table-bordered table-striped">
                        <thead class="table-primary">
                            <tr>
                                <th>Kelas</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>X</td>
                                <td>{{ $jumlahX }}</td>
                            </tr>
                            <tr>
                                <td>XI</td>
                                <td>{{ $jumlahXI }}</td>
                            </tr>
                            <tr>
                                <td>XII</td>
                                <td>{{ $jumlahXII }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
