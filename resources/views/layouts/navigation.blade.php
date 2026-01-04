 
 <aside id="sidebar" class="fixed inset-y-0 left-0 w-64 z-30 bg-dark-900 text-white flex-shrink-0 md:translate-x-0 md:static md:inset-0 md:flex flex-col transition-all duration-300  z-20"
               :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
            <div class="h-16 flex items-center px-8 border-b border-gray-800 bg-dark-900">
                <svg class="w-7 h-7 text-white mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                <span class="text-xl font-bold tracking-wide">IRON<span class="text-gym-600">GYM</span></span>
            </div>

            <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto custom-scroll">
                
                <p class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Menu Utama</p>

                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 text-gray-400 hover:bg-gray-800 hover:text-white rounded-xl transition-all duration-200 group 
                {{ request()->routeIs('admin.dashboard') ? 'bg-gym-500 text-white  shadow-lg shadow-gym-600/20 group hover:bg-gym-500 group-hover:text-white' : ''}}" >
                    <svg class="w-5 h-5 mr-3 group-hover:text-gym-500  {{ request()->routeIs('admin.dashboard') ? 'group-hover:text-white  transition-transform group-hover:scale-110 ': '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    <span class="font-medium">Dashboard</span>
                </a>

                <a href="{{ route('admin.member.index') }}" class="flex items-center px-4 py-3 text-gray-400 hover:bg-gray-800 hover:text-white rounded-xl transition-all duration-200 group
                {{ request()->routeIs('admin.member.index') ? 'bg-gym-500 text-white  shadow-lg shadow-gym-600/20 group hover:bg-gym-500 group-hover:text-white' : ''}}">
                    <svg class="w-5 h-5 mr-3 group-hover:text-gym-500  {{ request()->routeIs('admin.member.index') ? 'group-hover:text-white  transition-transform group-hover:scale-110 ': '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    <span class="font-medium">Members</span>
                </a>

                <a href="{{ route('admin.trainer.index') }}" class="flex items-center px-4 py-3 text-gray-400 hover:bg-gray-800 hover:text-white rounded-xl transition-all duration-200 group
                {{ request()->routeIs('admin.trainer.index') ? 'bg-gym-500 text-white  shadow-lg shadow-gym-600/20 group hover:bg-gym-500 group-hover:text-white' : ''}}">
                    <svg class="w-5 h-5 mr-3 group-hover:text-gym-500  {{ request()->routeIs('admin.trainer.index') ? 'group-hover:text-white  transition-transform group-hover:scale-110 ': '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    <span class="font-medium">Trainers</span>
                </a>
                <a href="{{ route('admin.paket.index') }}" class="flex items-center px-4 py-3 text-gray-400 hover:bg-gray-800 hover:text-white rounded-xl transition-all duration-200 group
                {{ request()->routeIs('admin.paket.index') ? 'bg-gym-500 text-white  shadow-lg shadow-gym-600/20 group hover:bg-gym-500 group-hover:text-white' : ''}}">
                 <svg class="w-6 h-6 ml-[-2px] mr-3 group-hover:text-gym-500  {{ request()->routeIs('admin.paket.index') ? 'group-hover:text-white  transition-transform group-hover:scale-110 ': '' }}" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier">
                         <path d="M33 16.5H35C35.552 16.5 36 16.948 36 17.5V27.5C36 28.052 35.552 28.5 35 28.5H33C32.448 28.5 32 28.052 32 27.5V17.5C32 16.948 32.448 16.5 33 16.5Z" stroke="currentColor" stroke-width="2"></path> 
                         <path d="M29 12.5H31C31.552 12.5 32 12.948 32 13.5V31.5C32 32.052 31.552 32.5 31 32.5H29C28.448 32.5 28 32.052 28 31.5V13.5C28 12.948 28.448 12.5 29 12.5Z" stroke="currentColor" stroke-width="2"></path> <path d="M15 12.5H17C17.552 12.5 18 12.948 18 13.5V31.5C18 32.052 17.552 32.5 17 32.5H15C14.448 32.5 14 32.052 14 31.5V13.5C14 12.948 14.448 12.5 15 12.5Z" stroke="currentColor" stroke-width="2"></path> <path d="M11 16.5H13C13.552 16.5 14 16.948 14 17.5V27.5C14 28.052 13.552 28.5 13 28.5H11C10.448 28.5 10 28.052 10 27.5V17.5C10 16.948 10.448 16.5 11 16.5Z" stroke="currentColor" stroke-width="2"></path> <path d="M36 22.5H39" stroke="currentColor" stroke-width="2"></path> <path d="M18 22.5H28" stroke="currentColor" stroke-width="2">
                    </path> <path d="M7 22.5H10" stroke="currentColor" stroke-width="2"></path> </g></svg>
                      <span class="font-medium">Paket</span>
                </a>

                <a href="#" class="flex items-center px-4 py-3 text-gray-400 hover:bg-gray-800 hover:text-white rounded-xl transition-all duration-200 group">
                    <svg class="w-5 h-5 mr-3 group-hover:text-gym-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="font-medium">Pembayaran</span>
                </a>

                <p class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider mt-6 mb-2">Sistem</p>

                <a href="{{ route('admin.scan') }}" class="flex items-center px-4 py-3 text-gray-400 hover:bg-gray-800 hover:text-white rounded-xl transition-all duration-200 group">
                    <svg class="w-5 h-5 mr-3 group-hover:text-gym-500 {{ request()->routeIs('admin.scan') ? 'group-hover:text-white  transition-transform group-hover:scale-110 ': '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path></svg>
                    <span class="font-medium">QR Absensi</span>
                </a>
            </nav>

            <div class="p-4 border-t border-gray-800">
                 <form action="{{ route('logout') }}" method="POST">
                    @csrf
                <button type="submit" class="flex items-center rounded-lg w-full  hover:bg-gym-600 ">
                   
                    <div class="h-10 w-10  p-[2px] flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="25px" viewBox="0 -960 960 960" width="25px" fill="#FFFFFF">
                        <path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z"/></svg>
                    </div>
                <div>
                    <h1 class="font-semibold text-xl text-white">Keluar</h1>
                </div>
            </button>
               </form>
            </div>
        </aside>
        

