<nav class="navbar navbar-expand-md navbar-light bg-white shadow rounded  mb-5">
    <div class="container">

        <a class="navbar-brand" href="{{ route('homeView') }}">LeaveMS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                
            </ul>
    
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
                @else
                <li class="nav-item">
                    <a id="logout-button" class="nav-link" href="#">Logout</a>
                    <form class="d-none" id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </li>
                @endguest
            </ul>
        </div>
    </div>
    @push('js')
    <script>
        $(document).ready(function () {
            $('#logout-button').on('click', function () {
                $('#logout-form').submit();
            });
        });

    </script>
    @endpush
</nav>
