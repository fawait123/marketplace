<ul>
    <li><a href="{{ route('welcome') }}">Home</a></li>
    <li><a href="{{ route('product') }}">Products</a></li>
    <li><a href="{{ route('contact') }}">Contact</a></li>
    @if (auth()->user())
        <li><a href="{{ route('account') }}">My Account</a></li>
    @else
        <li><a href="{{ route('login') }}">Login</a></li>
    @endif
</ul>
