<nav>
    <div>
        <img src="https://fashioninfrontrow.wordpress.com/wp-content/uploads/2012/10/logo-chanel2.png?w=800" alt="fotoLogo">
    </div>
    <div style="justify-content: space-around;">
        <a href="{{ url('login') }}" style="color:black; text-decoration:none;">Inicio</a>
        <a href="{{ url('productos') }}" style="color:black; text-decoration:none;">Productos</a>
        @if (auth()->user()->role === 'admin')
            <a href="{{ url('crud') }}" style="color:black; text-decoration:none;">Admin</a>
        @endif
        <a href="" style="color:black; text-decoration:none;">Carrito</a>
    </div>
</nav>

