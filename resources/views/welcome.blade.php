<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PT Citra Satria Utama</title>
        <link rel="icon" href="{{ asset('assets/img/logo.png') }}" type="image/png">
        <!-- CoreUI CSS -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        <!-- CoreUI JS -->
        <script src="{{ asset('public/vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else

        @endif
    </head>
    <body class="bg-[#161615] dark:bg-[#161615] text-[#EDEDEC] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
    <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 border-b-2 border-white">
    <!-- Logo & Nama Perusahaan -->
    <div class="flex items-center justify-between w-full flex-wrap">
        <!-- Logo -->
        <div class="flex items-center gap-2">
            <img src="{{ asset('assets/img/logoFull.png') }}" alt="Logo PT Citra Satria Utama" class="w-16 h-16">
            <h1 class="text-white font-bold text-2xl" style="font-family: 'BD-Wurst', sans-serif;">
            </h1>
            <!-- <p style="font-family: 'BD-Wurst'" class="text-black dark:text-white">Komplek Pergudangan Skypark Bizz,<br>  Jl. Bypass Alang-Alang Lebar Blok A4-A7,<br> Talang Kelapa, Alang-Alang Lebar,<br> Palembang City, South Sumatra 30154</p> -->
        </div>
        
        <!-- Tombol Login/Register -->
        <div class="flex items-center gap-4">
            @if (Route::has('login'))
                <nav class="flex flex-col items-start gap-2">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-flex items-center justify-center px-2 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#EDEDEC] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-flex items-center justify-center px-2 py-1.5 dark:text-[#EDEDEC] text-[#EDEDEC] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-flex items-center justify-center px-2 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#EDEDEC] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                            >
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </div>
</header>


    <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
        <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
            <div class="text-[13px] leading-[20px] flex-1 p-6 pb-12 lg:p-20 bg-[#161615] dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-bl-lg rounded-br-lg lg:rounded-tl-lg lg:rounded-br-none">
                <!-- Tulisan -->
                <h1 class="font-bold mb-6 text-gray-900 dark:text-white" style="font-family: 'Iceland', sans-serif; font-weight: bold; font-size: 100px; text-align: center; line-height: 0.8;">
                <span style="color: red;">CITRA</span><br>
                <span style="color: green;">SAT</span><span style="color: lightblue;">RIA</span><br>
                <span style="color: orange;">UT</span><span style="color: yellow;">AMA</span>
                </h1>
            </div>
            <div class="bg-[#161615] dark:bg-[#161615] relative lg:-ml-px -mb-px lg:mb-0 rounded-t-lg lg:rounded-t-none lg:rounded-r-lg w-full lg:w-[438px] shrink-0 overflow-hidden shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] flex justify-center items-center">
                <img src="{{ asset('assets/img/logoHD.png') }}" alt="Logo PT Citra Satria Utama" class="w-full h-full object-contain" />
            </div>
        </main>
    </div>
            <!-- Tombol daftar karyawan -->
            <div class="mt-auto w-full lg:w-[438px]">
            <a
                style="font-family: 'BD-Wurst'"
                href="{{ url('/daftar') }}"
                class="inline-block w-full px-8 py-4 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-lg leading-normal text-center"> <!-- Increased padding and text size -->
                FORM PENDAFTARAN KARYAWAN BARU
            </a>
        </div>

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</html>
