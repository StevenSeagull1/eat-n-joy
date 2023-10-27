<style>
    .navbar {
        background:#F6A109;
        width: 100%;
        position: fixed;
        top: 0;
        z-index: 100;
    }

    .containernav{
        display: grid;
        grid-template-columns: auto auto auto;
        grid-template-rows: auto;
    }

    /* region logo */
    .logo {
        text-align: center;
    }

    .alogo {
        text-align: center;
        margin:0 auto;
        display: inline-block;
    }
    /* endregion */

    #burgerbutton {
        color: #94580E;
    }

    /* region winkelwagen */
    .winkelwagencontainer {
        display: flex;
        justify-content: flex-end; 
        align-items: center; 
        height: 100%;
    }

    .winkelwagen{
        height:auto;
        width: 80px; 
        max-width: 100%;
        float: right; 
        cursor: pointer;
        padding: 0.5rem;
    }
    /* endregion */

    /*region media queries*/
    @media (max-width: 768px) {
        .containernav{
            grid-template-columns: auto auto auto;
            grid-template-rows: auto;
        }
    }

    @media (max-width: 576px) {
        .containernav{
            grid-template-columns: auto auto auto;
            grid-template-rows: auto;
        }

        .p-2 {
            margin-top: 0.5rem;
            margin-left: 0.5rem;
        }
    }
    /*endregion*/
</style>

<nav x-data="{ open: false }" class="navbar border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div>
        <div class="containernav">
            <!-- Settings Dropdown -->
                     
            <div style='position:relative; float:left;' class="sm:flex sm:items-center sm">
                <x-dropdown align="left" width="48">
                    <x-slot name="trigger">
                    <button id="burgerbutton" class="inline-flex items-center justify-center p-2 rounded-md focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-12 w-12" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('bestelling.show')">
                            {{ __('Bestelling') }}
                        </x-dropdown-link>
                        
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                        <img src="images/mascotte verbaasd.svg" width="160" style="margin-top:50px">
                    </x-slot>
                </x-dropdown>
            </div>
            <div class="logo">
                <a href="/main" class="alogo">
                    <img src="images\broodje eat en joy zonder tekst.svg" width="120">
                </a>
            </div>
            <div id='winkelwagen' class="winkelwagencontainer">  
                <img src="images/icons/winkelwagen.svg" class="winkelwagen">
            </div>
            <!-- Hamburger -->
            <!-- <div class="-mr-2 flex items-center sm:hidden">
                <button id="burgerbutton" @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div> -->
        </div>
    </div>
    
    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>