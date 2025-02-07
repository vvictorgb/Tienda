<nav>
    <div>
        <img src="https://fashioninfrontrow.wordpress.com/wp-content/uploads/2012/10/logo-chanel2.png?w=800" alt="fotoLogo">
    </div>
    <div style="justify-content: space-around; margin-left:44px">
        <a href="{{ route('login') }}" style="color:black; text-decoration:none;">Login</a>
        <a href="{{ route('listadoProductos') }}" style="color:black; text-decoration:none;">Productos</a>
        @if (auth()->check() && auth()->user()->role === 'admin')
            <a href="{{ route('crud') }}" style="color:black; text-decoration:none;">Admin</a>
        @endif
        <a href="{{ route('verCarrito') }}" style="color:black; text-decoration:none;">Carrito
            @php
                $id = auth()->user()->id;

                $response = Http::withToken('Y23PklywnQJGlMNzB0qHkqRNabU0rgECtqqf83q2f75jPMqdHc7w27fLnJqE')->get("http://carrito/api/carrito/$id");


                $carrito = json_decode($response->body(), true);

                $cantidad = isset($carrito['cantidad']) ? $carrito['cantidad'] : 0;
            @endphp
            @if ($cantidad > 0)
                ({{ $cantidad }})
            @else
                (Vacío)
            @endif
        </a>
    </div>
</nav>
