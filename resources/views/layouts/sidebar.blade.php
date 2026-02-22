<aside id="sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-full bg-gray-800 text-white shadow-xl transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out">
    <div class="p-6">
        <div class="text-3xl font-bold text-indigo-400 mb-8">
            {{ config('app.name') }}
        </div>

        <!-- Navigation Links -->
        <nav class="space-y-4">
            <a href="{{ route('dashboard') }}"
                class="flex items-center space-x-3 px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors duration-200 {{ request()->routeIs('dashboard') ? 'bg-gray-700 pointer-events-none' : '' }}">
                <svg class="h-6 w-6 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7m-7 7v10a1 1 0 001 1h10a1 1 0 001-1v-10m-2-2h-4v4h4v-4zm0 0v-4" />
                </svg>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('vendors.index') }}"
                class="flex items-center space-x-3 px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors duration-200 {{ request()->routeIs('profile.*') ? 'bg-gray-700 pointer-events-none' : '' }}">
                <svg class="h-6 w-6 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span>Vendors</span>
            </a>
            <a href="#"
                class="flex items-center space-x-3 px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                <svg class="h-6 w-6 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 19V6l-2 2h-4a1 1 0 01-1-1v-4a1 1 0 011-1h4l2-2v13zm9 0V6l2 2h4a1 1 0 011-1v-4a1 1 0 01-1-1h-4l-2-2v13z" />
                </svg>
                <span>Products</span>
            </a>
            <a href="#"
                class="flex items-center space-x-3 px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                <svg class="h-6 w-6 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c1.657 0 3 .895 3 2s-1.343 2-3 2v2m0 0a.75.75 0 000 1.5.75.75 0 000-1.5z" />
                </svg>
                <span>Analytics</span>
            </a>
            <a href="#"
                class="flex items-center space-x-3 px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                <svg class="h-6 w-6 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.942 3.31.82 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.942 1.543-.82 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.942-3.31-.82-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.942-1.543.82-3.31 2.37-2.37a1.724 1.724 0 002.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span>Settings</span>
            </a>
            <a href="{{ route('profile.edit') }}"
                class="flex items-center space-x-3 px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors duration-200 {{ request()->routeIs('profile.*') ? 'bg-gray-700 pointer-events-none' : '' }}">
                <svg class="h-6 w-6 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span>Profile</span>
            </a>
            <form method="POST" action="{{ route('logout') }}" class="rounded-lg hover:bg-gray-700 transition-colors duration-200" onclick="return confirm('Do you want to logout?')">
                @csrf
                <button
                    class="flex items-center space-x-3 px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="w-6 h-6 text-indigo-300"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6A2.25 2.25 0 005.25 5.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                    </svg>
                    <span>Logout</span>
                </button>
            </form>
        </nav>

    </div>
    <span class="" style="position: relative; bottom:0">{{ auth()->user()->name }}</span>

</aside>
