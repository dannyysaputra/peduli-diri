@extends('master')

@section('title')
    Masuk
@endsection

@section('content')
    <div class="flex items-center justify-center min-h-screen px-4 sm:px-6 lg:px-8 bg-gray-100 md:w-auto">
        <div class="px-16 py-12 rounded-lg mt-4 max-w-md space-y-8 w-5/6 text-left bg-white shadow-lg">
            @if (session()->has('success'))
                <div class="bg-green-100 rounded-lg py-5 px-6 mb-4 text-base text-green-700" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session()->has('failed'))
                <div class="bg-red-100 rounded-lg py-5 px-6 mb-4 text-base text-red-700" role="alert">
                    {{ session('failed') }}
                </div>
            @endif
            <div class="flex justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 text-blue-600" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path d="M12 14l9-5-9-5-9 5 9 5z" />
                    <path
                        d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-center">Masuk ke PeduliDiri</h3>
            <form action="login" method="POST">
                @csrf
                <div class="mt-4">
                    <div>
                        <label class="block" for="name">Nama<label>
                        <input type="text" placeholder="Masukkan Nama" id="name" name="name"
                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"  autofocus value="{{ old('name') }}" 
                        @if (Cookie::has('username'))
                            value="{{ Cookie::get('username') }}"
                        @endif>
                        @error('name')
                            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="block" for="password">NIK<label>
                        <input type="number" maxlength="16" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)" min="0" id="rulesInput" pattern="[0-9]" placeholder="Masukkan NIK" id="password" name="password"
                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" required
                        @if (Cookie::has('userpassword'))
                            value="{{ Cookie::get('userpassword') }}"
                        @endif>
                        @error('password')
                            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="flex items-center mt-2 justify-between">
                        <div class="flex items-center">
                            <input id="remember-me" value="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                            @if (Cookie::has('username')) checked @endif>
                            <label for="remember-me" class="ml-2 block text-sm text-gray-900"> Remember me </label>
                        </div>
                        {{-- <div class="text-sm">
                            <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500"> Lupa NIK? </a>
                        </div> --}}
                    </div>
                    <div class="flex justify-center items-baseline mt-3">
                        <button class="px-6 py-2 mt-4 w-full text-white bg-blue-600 rounded-lg hover:bg-blue-900">Masuk</button>
                    </div>
                </div>
            </form>
            <div class="mt-6 text-grey-dark">
                Belum punya akun?
                <a class="text-blue-600 hover:underline" href="/daftar">
                    Buat sekarang
                </a>
            </div>
        </div>
    </div>
    <script>
        var inputBox = document.getElementById("rulesInput");

        var invalidChars = [
        "-",
        "+",
        "e",
        "E",
        "."
        ];

        inputBox.addEventListener("keydown", function(e) {
        if (invalidChars.includes(e.key)) {
            e.preventDefault();
        }
        });

    </script>
@endsection