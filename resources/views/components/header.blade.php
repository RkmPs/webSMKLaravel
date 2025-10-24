<style>
    .bg-primary-custom {
        background-color: #8C00FF !important;
    }
    .text-primary-custom {
        color: #8C00FF !important;
    }
    .card:hover {
        transform: translateY(-5px);
        transition: all 0.2s ease-in-out;
        box-shadow: 0 6px 15px rgba(0,0,0,0.15);
    }
</style>

<header class="bg-primary-custom text-white py-4 position-relative">
    <div class="container text-center">
        <img src="{{ asset('images/Logo.png') }}" alt="Logo Sekolah"
             class="position-absolute start-0 ms-4"
             style="width:60px; height:60px; border-radius:50%; object-fit:cover;">
        <h1 class="fw-bold mb-0">SMKN 2 Bandung</h1>
        <p class="mb-0">Mohammad_Razzaq_Athallah_Khairi_Mubarad Putra</p>
    </div>
</header>

<main class="container my-5">
    <div class="row g-4">

        <div class="col-md-4">
            <a href="{{ route('students.index') }}" class="text-decoration-none">
                <div class="card text-center h-100 border-0 shadow">
                    <div class="card-body">
                        <h5 class="card-title text-primary-custom fw-semibold">Daftar Siswa</h5>
                        <p class="text-muted mb-0">Kelola data seluruh siswa yang terdaftar di sistem.</p>
                    </div>
                </div>
            </a>
        </div>


        <div class="col-md-4">
            <a href="{{ route('students.index') }}" class="text-decoration-none">
                <div class="card text-center h-100 border-0 shadow">
                    <div class="card-body">
                        <h5 class="card-title text-primary-custom fw-semibold">Rangkuman</h5>
                        <p class="text-muted mb-0">Klik untuk melihat statistik dan data ringkas siswa.</p>
                    </div>
                </div>
            </a>
        </div>


        <div class="col-md-4">
            <a href="{{ route('students.index') }}" class="text-decoration-none">
                <div class="card text-center h-100 border-0 shadow">
                    <div class="card-body">
                        <h5 class="card-title text-primary-custom fw-semibold">Tentang Aplikasi</h5>
                        <p class="text-muted mb-0">Informasi seputar tujuan dan pengembang aplikasi ini.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</main>
