@extends('app')

@section('title')
    Input Tabel
@endsection

@section('app.content')
    <a href="/dashboard"><i class="fas fa-arrow-left"></i></a>
    <div class="flex items-center mt-4">
        <h2>Masukkan Data</h2>
    </div>
    <form method="POST" action="/buat-data" class="my-8">
        @csrf
        <div class="mb-6">
            <label for="tanggal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tanggal</label>
            <input type="date" min="2020-02-27" name="tanggal" id="datePicker" class="block p-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-3/4" value="{{ old('tanggal') }}" required>
        </div>
        <div class="mb-6">
            <label for="tanggal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Jam</label>
            <input type="time" name="jam" class="block p-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-3/4" value="{{ old('tanggal') }}" required>
        </div>
        <div class="mb-6">
            <label for="lokasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Lokasi</label>
            <input type="text" name="lokasi" id="lokasi" class="block p-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-3/4" value="{{ old('lokasi') }}" required>
        </div>
        <div class="mb-6">
            <label for="suhu" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Suhu</label>
            <input type="number" min="32" max="40" name="suhu" id="suhu" class=" @error('suhu') is-invalid @enderror block p-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-3/4" required value="{{ old('suhu') }}">
            @error('suhu')
                <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
    <script>
        datePicker.max = new Date().toISOString().split("T")[0];
    </script>
@endsection