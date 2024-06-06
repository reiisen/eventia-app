<div class="relative flex flex-row">
    <a href="/">Home</a>
    <a href="/browse">Browse</a>
    @guest
    <a href="/register">Register</a>
    <a href="/login">Login</a>
    @endguest
    @auth
    <a href={{ url('', []) }}>Inventory</a>
    <a href="/auth/logout">Logout</a>
    @endauth
    </div>
