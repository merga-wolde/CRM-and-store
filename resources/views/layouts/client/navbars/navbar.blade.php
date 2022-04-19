@auth()
    @include('layouts.client.navbars.navs.auth')
@endauth
    
@guest()
    @include('layouts.client.navbars.navs.guest')
@endguest