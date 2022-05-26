@extends('app')

@section('title')
    Dashboard
@endsection

@section('app.content')
    <div class="relative overflow-x-auto sm:rounded-lg">
        @if (session()->has('message'))
            <div class="flex justify-between text-green-200 shadow-inner rounded p-3 bg-green-600">
                <p class="self-center">
                    <strong>Success </strong> {{ session('message') }}
                </p>
                <strong class="text-xl align-center cursor-pointer alert-del">&times;</strong>
            </div>
        @endif
        <div class="p-4">
            {{-- search by category --}}
            <form action="/cari" method="GET">
                @csrf
                <div class="flex justify-between">
                    <div class="flex justify-start">
                        <select onchange="searchCategories(this);" name="search" id="search" class="bg-gray-50 border border-gray-300 px-7 text-gray-900 text-sm rounded-lg">
                            <option value="tanggal">Tanggal</option>
                            <option value="lokasi">Lokasi</option>
                            <option value="suhu">Suhu</option>
                        </select>
                        <div class="ml-3">
                            {{-- tanggal --}}
                            <div class="form-group inline-flex" id="iftanggal">
                                <input type="text" name="tanggal" id="table-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-l-lg focus:ring-blue-500 focus:border-blue-500 block w-60 pl-8 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan tanggal">
                                <button type="submit" class="p bg-gray-50 border border-gray-300 text-gray-900 rounded-r-lg py-3 px-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white ">Cari</button>
                                {{-- filter --}}
                                <button id="dropdownFilteringButton" data-dropdown-toggle="dropdownTanggal" class="text-gray-900 bg-gray-50 mx-4 focus:ring-blue-500 focus:border-blue-500  focus:outline-none font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Urutkan <i class="fas fa-angle-down ml-2"></i></button>
                                {{-- dropdown menu --}}
                                <div id="dropdownTanggal" class="hidden z-10 w-44 bg-gray-50 rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDividerButton">
                                        <li>
                                            <a href="/urutkan?field=tanggal&mode=desc" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Terbaru</a>
                                        </li>
                                        <li>
                                            <a href="/urutkan?field=tanggal&mode=asc" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Terlama</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            {{-- lokasi --}}
                            <div class="form-group hidden" id="iflokasi">
                                <input type="text" name="lokasi" id="table-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-l-lg focus:ring-blue-500 focus:border-blue-500 block w-60 pl-8 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan lokasi">
                                <button type="submit" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-r-lg py-3 px-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white ">Cari</button>
                                {{-- filter --}}
                                <button id="dropdownFilteringButton" data-dropdown-toggle="dropdownLokasi" class="text-gray-900 bg-gray-50 mx-4 focus:ring-blue-500 focus:border-blue-500  focus:outline-none font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Urutkan <i class="fas fa-angle-down ml-2"></i></button>
                                {{-- dropdown menu --}}
                                <div id="dropdownLokasi" class="hidden z-10 w-44 bg-gray-50 rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDividerButton">
                                        <li>
                                            <a href="/urutkan?field=lokasi&mode=asc" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">A-Z</a>
                                        </li>
                                        <li>
                                            <a href="/urutkan?field=lokasi&mode=desc" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Z-A</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            {{-- suhu --}}
                            <div class="form-group hidden" id="ifsuhu">
                                <input type="text" name="suhu" id="table-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-l-lg focus:ring-blue-500 focus:border-blue-500 block w-60 pl-8 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan suhu">
                                <button type="submit" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-r-lg py-3 px-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white ">Cari</button>
                                {{-- filter --}}
                                <button id="dropdownFilteringButton" data-dropdown-toggle="dropdownSuhu" class="text-gray-900 bg-gray-50 mx-4 focus:ring-blue-500 focus:border-blue-500  focus:outline-none font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Urutkan <i class="fas fa-angle-down ml-2"></i></button>
                                {{-- dropdown menu --}}
                                <div id="dropdownSuhu" class="hidden z-10 w-44 bg-gray-50 rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDividerButton">
                                        <li>
                                            <a href="/urutkan?field=suhu&mode=asc" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">A-Z</a>
                                        </li>
                                        <li>
                                            <a href="/urutkan?field=suhu&mode=desc" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Z-A</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="/isi-data" class="py-3 px-2 text-white bg-blue-600 rounded-lg hover:bg-blue-900">Masukkan Data</a>
                </div>
            </form>
            
            <table class="table-auto w-full my-8 text-sm text-center text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-3 py-1">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Lokasi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Suhu
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $id = 1;
                    @endphp
                    @foreach ($data as $d)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-3 py-1">{{ $id++ }}</th>
                            <td class="px-6 py-3">{{ $d->tanggal }} {{ $d->jam }}</td>
                            <td class="px-6 py-3">{{ $d->lokasi }}</td>
                            <td class="px-6 py-3">{{ $d->suhu }}</td>
                            <td class="px-6 py-3">
                                <a href="/ubah/{{ $d->id }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded-md">Update</a>
                                <a href="/hapus/{{ $d->id }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-md" onclick="return confirm('Yakin menghapus data ini?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                
            </table>
            {{ $data->links() }}
        </div>
    </div>
    <script>
        function searchCategories(category) {
            if (category.value == 'tanggal') {
                document.getElementById('iftanggal').style.display = 'flex';
                document.getElementById('iflokasi').style.display = 'none';
                document.getElementById('ifsuhu').style.display = 'none';
            } else if (category.value == 'lokasi') {
                document.getElementById('iftanggal').style.display = 'none';
                document.getElementById('iflokasi').style.display = 'flex';
                document.getElementById('ifsuhu').style.display = 'none';
            } else {
                document.getElementById('iftanggal').style.display = 'none';
                document.getElementById('iflokasi').style.display = 'none';
                document.getElementById('ifsuhu').style.display = 'flex';
            }
        }
        var alert_del = document.querySelectorAll('.alert-del');
        alert_del.forEach((x) =>
            x.addEventListener('click', function () {
            x.parentElement.classList.add('hidden');
            })
        );
    </script>
@endsection