<ul>
    <li><a href="{{ route('welcome') }}">Home</a></li>
    <li><a href="{{ route('product') }}">Products</a></li>
    <li><a href="{{ route('contact') }}">Contact</a></li>
    @if (auth()->user() && auth()->user()->role == 'user')
        <li><a href="{{ route('account') }}">My Account</a></li>
        <li><a href="{{ route('booking') }}">Booking</a></li>
        <li><a href="{{ route('order.mechanic') }}">Order Mechanic</a></li>
    @endif
    @if (!auth()->user())
        <li><a href="{{ route('login') }}">Login</a></li>
    @endif
    @if (auth()->user() && auth()->user()->role == 'admin')
        <li><a href="{{ route('home') }}">Back to Dashboard</a></li>
    @endif
</ul>
