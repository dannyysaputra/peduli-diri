<nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-800">
    <div class="containter flex flex-wrap justify-between items-center mx-6">
        <a href="" class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 text-blue-600" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path d="M12 14l9-5-9-5-9 5 9 5z" />
                <path
                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
            </svg>
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">PeduliDiri</span>
        </a>
        {{-- pages --}}
        <div class="justify-between items-center md:flex md:w-auto md:order-1" id="mobile-menu-3">
            <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                <li class="{{ Request::is('home') ? 'active:bg-green-700' : '' }} mx-2">
                    <a href="/home" class="block py-2 pr-4 pl-3 text-md text-teal-200 hover:text-blue-500 md:bg-transparent md:text-blue-700 md:p-0 dark:text-white" aria-current="page">Home</a>
                </li>
                <li class="mx-2">
                    <a href="/catatan-perjalanan" class="block py-2 pr-4 pl-3 text-md hover:text-blue-900 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Catatan Perjalanan</a>
                </li>
                <li class="mx-2">
                    <a href="/isi-data" class="block py-2 pr-4 pl-3 text-md hover:text md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Isi Data</a>
                </li>
            </ul>
        </div>
        <div class="flex items-center md:order-2">
            <button type="button" class="flex mr-3 text-xl md:mr-0" id="user-menu-button" aria-expanded="false" type="button" data-dropdown-toggle="dropdown">
                <i class="fas fa-user"></i>
                <span class="block px-2 text-sm text-gray-900 dark:text-white">{{ auth()->user()->name }}</span>
            </button>
            {{-- Dropdown menu --}}
            <div class="hidden z-50 my-4 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown">
                <ul class="py-1" aria-labelledby="dropdown">
                    <li>
                        <a href="/logout" class="block py-2 px-4 text-sm text-red-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i class="fas fa-sign-out-alt"></i>Keluar</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>