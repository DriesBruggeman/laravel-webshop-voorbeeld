@extends('master')
@section('pageTitle', 'Logout')
@section('content')
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        @yield('errors')
        <form class="container" method="post" action="{{ route('logout') }}">
            @csrf
                <div class="col">
                    <h3>Are you sure you want to logout?</h3>
                    <input type="submit" class="primary-btn order-submit" value="Logout">
                    <a href="{{ url()->previous() }}" class="btn btn-link">No, back</a>
                </div>
                <!-- /Order Details -->
            <!-- /row -->
        </form>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection
