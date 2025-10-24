<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .card:hover {
            transform: translateY(-5px);
            transition: all 0.2s ease-in-out;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-light">

    <header class="bg-primary text-white py-4 mb-4 position-relative">
        <div class="container text-center">
            <img src="{{ asset('images/Logo.png') }}" alt="Logo Sekolah" class="position-absolute start-0 ms-4"
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

        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary">Daftar Siswa</h2>
            <a href="{{ route('siswa.create') }}" class="btn btn-primary">
                + Tambah Siswa
            </a>
        </div>

        {{-- Alert pesan sukses --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Card tabel --}}
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">NIS</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Umur</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($students as $student)
                            <tr>
                                <td>{{ $student->nis }}</td>
                                <td>{{ $student->nama }}</td>
                                <td>
                                    @php
                                        // Hitung umur manual
                                        $tanggal_lahir = new DateTime($student->tanggal_lahir);
                                        $hari_ini = new DateTime();
                                        $umur = $hari_ini->diff($tanggal_lahir)->y;
                                    @endphp
                                    {{ $umur }} tahun
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('siswa.show', $student->nis) }}"
                                        class="btn btn-sm btn-info text-white">Lihat</a>
                                    <a href="{{ route('siswa.edit', $student->nis) }}"
                                        class="btn btn-sm btn-warning text-white">Edit</a>
                                    <form action="{{ route('siswa.destroy', $student->nis) }}" method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">
                                    Belum ada data siswa.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Pagination --}}
        <div class="mt-3">
            {{ $students->links() }}
        </div>

    </div>

</body>

</html>
