   <header class="h-16 flex items-center justify-between px-6 bg-white border-b border-gray-100 shadow-sm z-10">
                <div class="flex items-center">
                    <button @click="sidebarOpen = !sidebarOpen" class="md:hidden text-gray-500 hover:text-gym-600 mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                    <h2 class="text-xl font-bold text-gray-800">Dashboard Overview</h2>
                </div>
                
                <div class="flex items-center space-x-5">
                    <div class="hidden md:flex relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </span>
                        <input type="text" class="bg-gray-100 text-gray-700 text-sm rounded-full w-64 pl-10 pr-4 py-2 focus:outline-none focus:ring-2 focus:ring-gym-500 focus:bg-white transition-all" placeholder="Cari member...">
                    </div>

                    <button class="relative text-gray-400 hover:text-gym-600 transition-colors">
                        <div class="absolute top-0 right-0 h-2 w-2 bg-red-500 rounded-full border border-white"></div>
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    </button>
                </div>
            </header>
