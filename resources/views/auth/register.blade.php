@extends('master')

@section('title')
    Register
@endsection

@section('content')
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="px-8 py-6 mx-4 mt-4 text-left bg-white shadow-lg md:w-1/3 lg:w-1/3 sm:w-1/3">
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
            <h3 class="text-2xl font-bold text-center">Daftar Akun</h3>
            <form action="post" method="POST">
                @csrf
                <div class="mt-4">
                    <div>
                        <label class="block" for="name">Nama Lengkap<label>
                                <input type="text" placeholder="Masukkan nama lengkap" id="name" name="name"
                                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 @error('name') is-invalid @enderror" autofocus required>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                    <div class="mt-4">
                        <label class="block" for="nik">NIK<label>
                                <input type="number" maxlength = "16" placeholder="Masukkan NIK" id="rulesInput" name="nik" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 @error('name') is-invalid @enderror" required>
                                    @error('nik')
                                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                            {{ $message }}
                                        </span>
                                    @enderror
                    </div>
                    <div class="flex">
                        <button class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900" type="submit">Buat Akun</button>
                    </div>
                    <div class="mt-6 text-grey-dark">
                        Sudah memiliki akun?
                        <a class="text-blue-600 hover:underline" href="/">
                            Masuk
                        </a>
                    </div>
                </div>
            </form>
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