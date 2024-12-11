<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <!-- Google Fonts Quicksand -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- CDN Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body {
            font-family: 'Quicksand', sans-serif;
        }
    </style>
</head>

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="#">
            <img src="{{asset('smi.png')}}" alt="Logo" width="150">
        </a>
        <!-- Tombol untuk toggle navbar di mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Menu Navbar -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                
                <li class="nav-item">
                    <a class="nav-link" href="/form">Register</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="search">Cek Kandidat</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
  
<body class="bg-light">
    <div class="min-vh-100 d-flex align-items-start justify-content-center px-3 form-container">
        <div class="bg-white shadow rounded p-4 w-100" style="max-width: 500px;">
            <h1 class="h4 text-center mb-4">Pencarian Email</h1>

            <!-- Menampilkan pesan error jika ada -->
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Menampilkan info kandidat jika ditemukan -->
            @if (isset($candidate))
                <div class="mb-4">
                    <p><strong>Nama:</strong> {{ $candidate->name }}</p>
                    <p><strong>Email:</strong> {{ $candidate->email }}</p>
                    <p><strong>WhatsApp:</strong> {{ $candidate->whatsapp }}</p>
                    <p><strong>Alamat Domisili:</strong> {{ $candidate->domicile }}</p>
                    <p><strong>Instagram:</strong> {{ $candidate->instagram_account }}</p>

                    <p><strong>Status:</strong> 
                        @if (is_null($candidate->is_valid))
                            <span class="text-warning">Pending</span>
                        @elseif ($candidate->is_valid)
                            <span class="text-success">Approved</span>
                        @else
                            <span class="text-danger">Rejected</span>
                        @endif
                    </p>
                </div>
                
                <div class="d-grid gap-2">
                    <a href="/search" class="btn btn-secondary">
                        Kembali ke Pencarian
                    </a>
                </div>
            @else
                <form action="/search" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" name="email" required class="form-control" id="email" placeholder="Masukkan email">
                    </div>

                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-primary">
                            Cari
                        </button>
                    </div>
                </form>
            @endif
        </div>
    </div>

    <!-- Tambahkan CDN Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
