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
    
    <div class="min-vh-100 d-flex align-items-center justify-content-center">
        <div class="bg-white shadow rounded p-4 p-md-5 w-100" style="max-width: 900px;">
            <h1 class="text-center mb-4">Form Pendaftaran SMI</h1>

            <!-- Success Message -->
            @if (session('success'))
                <p class="alert alert-success">
                    {{ session('success') }}
                </p>
            @endif

            <!-- Error Message -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('candidate.store') }}" method="POST" enctype="multipart/form-data" x-data="{ step: 1 }">
                @csrf

                <!-- Step Indicator -->
                <div class="d-flex justify-content-between mb-4">
                    <div :class="step === 1 ? 'text-primary fw-bold' : 'text-muted'">1. Data Diri</div>
                    <div :class="step === 2 ? 'text-primary fw-bold' : 'text-muted'">2. Upload Media</div>
                    <div :class="step === 3 ? 'text-primary fw-bold' : 'text-muted'">3. Pernyataan</div>
                </div>

                <!-- Step 1: Data Diri -->
                <div x-show="step === 1" x-transition>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama:</label>
                        <input type="text" name="name" value="{{ old('name') }}" id="name" required placeholder="Nama Lengkap"
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" name="email" value="{{ old('email') }}" id="email" required placeholder="Email"
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="whatsapp" class="form-label">No WhatsApp:</label>
                        <input type="number" name="whatsapp" value="{{ old('whatsapp') }}" id="whatsapp" required placeholder="62857xxxx"
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="domicile" class="form-label">Alamat Domisili:</label>
                        <textarea name="domicile" id="domicile" placeholder="Alamat" required class="form-control">{{ old('domicile') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="passport_number" class="form-label">Nomor Paspor (Opsional):</label>
                        <input type="text" placeholder="No Pasport" name="passport_number" value="{{ old('passport_number') }}" id="passport_number"
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="birth_date" class="form-label">Tanggal Lahir:</label>
                        <input type="date" name="birth_date" value="{{ old('birth_date') }}" id="birth_date" required
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone:</label>
                        <input type="number" placeholder="62857xxxx" name="phone" value="{{ old('phone') }}" id="phone" required
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="instagram_account" class="form-label">Instagram:</label>
                        <input type="text" name="instagram_account" value="{{ old('instagram_account') }}" id="instagram_account" required placeholder="tanpa @ "
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="institution" class="form-label">Asal Instansi:</label>
                        <input type="text" name="institution" placeholder="Asal Instansi" value="{{ old('institution') }}" id="institution" required
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="study_program" class="form-label">Jurusan/Program Studi:</label>
                        <input type="text" name="study_program" value="{{ old('study_program') }}" id="study_program" required
                            class="form-control" placeholder="Jurusan / Program studi">
                    </div>
                    <div class="mb-3">
                        <label for="organization_experience" class="form-label">Pengalaman Organisasi (Opsional):</label>
                        <textarea name="organization_experience" placeholder="Pengalaman Organisasi" id="organization_experience" class="form-control">{{ old('organization_experience') }}</textarea>
                    </div>
                    <div>
                        <button type="button" @click="step = 2" class="btn btn-primary w-100">Lanjutkan</button>
                    </div>
                </div>

                <!-- Step 2: Upload Media -->
                <div x-show="step === 2" x-transition>
                    <div class="mb-3">
                        <label for="poster_proof" class="form-label">Bukti Poster</label>
                        <small class="text-danger">* (Format JPG,PNG Max 2 Mb)</small>
                        <input type="file" name="poster_proof" id="poster_proof" required class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="instagram_follow_proof" class="form-label">Bukti Follow Instagram:</label>
                        <small class="text-danger">* (Format JPG,PNG Max 2 Mb)</small>
                        <input type="file" name="instagram_follow_proof" id="instagram_follow_proof" required class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="instagram_comment_proof" class="form-label">Bukti Komentar Instagram:</label>
                        <small class="text-danger">* (Format JPG,PNG Max 2 Mb)</small>
                        <input type="file" name="instagram_comment_proof" id="instagram_comment_proof" required class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="whatsapp_share_proof" class="form-label">Bukti Share WhatsApp:</label>
                        <small class="text-danger">* (Format JPG,PNG Max 2 Mb)</small>
                        <input type="file" name="whatsapp_share_proof" id="whatsapp_share_proof" required class="form-control">
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="button" @click="step = 1" class="btn btn-secondary">Previous</button>
                        <button type="button" @click="step = 3" class="btn btn-primary">Next</button>
                    </div>
                </div>

                <!-- Step 3: Pernyataan -->
                <div x-show="step === 3" x-transition>
                    <div class="mb-3">
                        <label for="program_reason" class="form-label">Alasan Mengikuti Program:</label>
                        <textarea name="program_reason" placeholder="Alasan Mengikuti Program ini" id="program_reason" required class="form-control">{{ old('program_reason') }}</textarea>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="declaration" required class="form-check-input" id="declaration">
                        <label class="form-check-label" for="declaration">Dengan ini, Saya menyatakan mendaftarkan diri sebagai calon peserta SMI Youth Exchange secara sukarela tanpa paksaan dari pihak manapun. Selanjutnya, Saya bersedia mengikuti seluruh tahapan seleksi yang telah ditentukan oleh penyelenggara (Biaya seleksi sebesar Rp.90.000,- jika dinyatakan lolos berkas).</label>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="button" @click="step = 2" class="btn btn-secondary">Previous</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- CDN Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
