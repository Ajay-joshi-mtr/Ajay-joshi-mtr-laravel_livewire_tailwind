<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

@include('layouts._head')

<body>
  <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
    @include('layouts._menu')

    <div class="flex flex-col flex-1 w-full">
      @include('layouts._topnav')

      <main class="h-full overflow-y-auto">
        <div class="container px-5 mx-auto">
          @yield('content-header')


          @include('layouts._flash')
          @yield('content')
        </div>
      </main>
    </div>
  </div>
  @livewireScripts

</body>

</html>