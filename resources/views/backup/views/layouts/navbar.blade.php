<nav class="bg-white shadow p-3">
    <div class="flex justify-center space-x-6">

        <a href="{{ route('home') }}"
           class="{{ request()->routeIs('home') ? 'text-indigo-600 font-semibold border-b-2 border-indigo-600' : 'text-gray-700 hover:text-indigo-600' }}">
           Home
        </a>

        <a href="{{ route('profil') }}"
           class="{{ request()->routeIs('profil') ? 'text-indigo-600 font-semibold border-b-2 border-indigo-600' : 'text-gray-700 hover:text-indigo-600' }}">
           Profil
        </a>

        <a href="{{ route('katalog') }}"
           class="{{ request()->routeIs('katalog') ? 'text-indigo-600 font-semibold border-b-2 border-indigo-600' : 'text-gray-700 hover:text-indigo-600' }}">
           Katalog
        </a>

        <a href="{{ route('bantuan') }}"
           class="{{ request()->routeIs('bantuan') ? 'text-indigo-600 font-semibold border-b-2 border-indigo-600' : 'text-gray-700 hover:text-indigo-600' }}">
           Bantuan
        </a>

        <a href="{{ route('kontak') }}"
           class="{{ request()->routeIs('kontak') ? 'text-indigo-600 font-semibold border-b-2 border-indigo-600' : 'text-gray-700 hover:text-indigo-600' }}">
           Kontak
        </a>

    </div>
</nav>