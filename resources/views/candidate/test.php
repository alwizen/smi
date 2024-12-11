<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="{{asset('smi.png')}}" class="h-8" alt="Flowbite Logo">
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
    </a>
    <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Get started</button>
        <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
      <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <a href="#" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Home</a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
        </li>
      </ul>
    </div>
    </div>
  </nav>

    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-3xl">
            <h1 class="text-2xl font-bold text-center mb-6">Form Pendaftaran</h1>

            @if (session('success'))
                <p class="mb-4 text-green-600 bg-green-100 p-2 rounded">
                    {{ session('success') }}
                </p>
            @endif

            @if ($errors->any())
                <div class="mb-4 text-red-600 bg-red-100 p-2 rounded">
                    <ul>
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
                <div class="flex justify-between mb-6">
                    <div :class="step === 1 ? 'text-blue-600 font-bold' : 'text-gray-500'">1. Data Diri</div>
                    <div :class="step === 2 ? 'text-blue-600 font-bold' : 'text-gray-500'">2. Upload Media</div>
                    <div :class="step === 3 ? 'text-blue-600 font-bold' : 'text-gray-500'">3. Pernyataan</div>
                </div>

                <!-- Step 1: Data Diri -->
                <div x-show="step === 1" x-transition>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-gray-700 font-medium">Nama:</label>
                            <input type="text" name="name" value="{{ old('name') }}" required
                                class="w-full mt-1 p-2 border rounded-md focus:ring focus:ring-blue-200">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium">Email:</label>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                class="w-full mt-1 p-2 border rounded-md focus:ring focus:ring-blue-200">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium">WhatsApp:</label>
                            <input type="text" name="whatsapp" value="{{ old('whatsapp') }}" required
                                class="w-full mt-1 p-2 border rounded-md focus:ring focus:ring-blue-200">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium">Alamat Domisili:</label>
                            <textarea name="domicile" required
                                class="w-full mt-1 p-2 border rounded-md focus:ring focus:ring-blue-200">{{ old('domicile') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium">Nomor Paspor (Opsional):</label>
                            <input type="text" name="passport_number" value="{{ old('passport_number') }}"
                                class="w-full mt-1 p-2 border rounded-md focus:ring focus:ring-blue-200">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium">Tanggal Lahir:</label>
                            <input type="date" name="birth_date" value="{{ old('birth_date') }}" required
                                class="w-full mt-1 p-2 border rounded-md focus:ring focus:ring-blue-200">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium">Phone:</label>
                            <input type="text" name="phone" value="{{ old('phone') }}" required
                                class="w-full mt-1 p-2 border rounded-md focus:ring focus:ring-blue-200">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium">Instagram:</label>
                            <input type="text" name="instagram_account" value="{{ old('instagram_account') }}" required
                                class="w-full mt-1 p-2 border rounded-md focus:ring focus:ring-blue-200">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium">Asal Instansi:</label>
                            <input type="text" name="institution" value="{{ old('institution') }}" required
                                class="w-full mt-1 p-2 border rounded-md focus:ring focus:ring-blue-200">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium">Jurusan/Program Studi:</label>
                            <input type="text" name="study_program" value="{{ old('study_program') }}" required
                                class="w-full mt-1 p-2 border rounded-md focus:ring focus:ring-blue-200">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium">Pengalaman Organisasi (Opsional):</label>
                            <textarea name="organization_experience"
                                class="w-full mt-1 p-2 border rounded-md focus:ring focus:ring-blue-200">{{ old('organization_experience') }}</textarea>
                        </div>
                    </div>
                    <div class="mt-6">
                        <button type="button" @click="step = 2"
                            class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-200">
                            Next
                        </button>
                    </div>
                </div>

                <!-- Step 2: Upload Media -->
                <div x-show="step === 2" x-transition>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-gray-700 font-medium">Bukti Poster:</label>
                            <input type="file" name="poster_proof" required
                                class="w-full mt-1 p-2 border rounded-md focus:ring focus:ring-blue-200">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium">Bukti Follow Instagram:</label>
                            <input type="file" name="instagram_follow_proof" required
                                class="w-full mt-1 p-2 border rounded-md focus:ring focus:ring-blue-200">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium">Bukti Komentar Instagram:</label>
                            <input type="file" name="instagram_comment_proof" required
                                class="w-full mt-1 p-2 border rounded-md focus:ring focus:ring-blue-200">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium">Bukti Share WhatsApp:</label>
                            <input type="file" name="whatsapp_share_proof" required
                                class="w-full mt-1 p-2 border rounded-md focus:ring focus:ring-blue-200">
                        </div>
                    </div>
                    <div class="mt-6 flex justify-between">
                        <button type="button" @click="step = 1"
                            class="bg-gray-400 text-white py-2 px-4 rounded-md focus:outline-none focus:ring focus:ring-gray-200">
                            Previous
                        </button>
                        <button type="button" @click="step = 3"
                            class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-200">
                            Next
                        </button>
                    </div>
                </div>

                <!-- Step 3: Pernyataan -->
                <div x-show="step === 3" x-transition>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-gray-700 font-medium">Alasan Mengikuti Program:</label>
                            <textarea name="program_reason" required
                                class="w-full mt-1 p-2 border rounded-md focus:ring focus:ring-blue-200">{{ old('program_reason') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium">
                                <input type="checkbox" name="declaration" required
                                    class="mr-2 rounded-md focus:ring focus:ring-blue-200">
                                Saya mendaftarkan diri secara sukarela.
                            </label>
                        </div>
                    </div>
                    <div class="mt-6 flex justify-between">
                        <button type="button" @click="step = 2"
                            class="bg-gray-400 text-white py-2 px-4 rounded-md focus:outline-none focus:ring focus:ring-gray-200">
                            Previous
                        </button>
                        <button type="submit"
                            class="bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 focus:outline-none focus:ring focus:ring-green-200">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>