@include('partials.navbar')
        <main class="py-4">
            <div class="container col-md-9" style="margin-left: 20%">
                @include('partials.messages')
            </div>
            @yield('content')
        </main>
    </div>

    @livewireScripts
</body>
</html>
