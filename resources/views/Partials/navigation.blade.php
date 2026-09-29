
<ul>
    <li><a class="{{request()->routeIs('home') ? 'text-gray-400' :'text-gray-600'}}" href="{{ route('home')}}">Home</a></li>
    <li><a class="{{request()->routeIs('blog.*') ? 'text-green-400':'text-red-400'}}" href="{{ route('posts.index')}}">blog</a></li>
    <li><a class="{{request()->routeIs('nosotros')? 'text-blue-400':'text-yellow-800'}}"href="{{ route('nosotros')}}">nosotros</a></li>
    <li><a class="{{request()->routeIs('contact')? 'text-orange-200':'text-pink-900'}}"href="{{ route('contact') }}">contacto</a></li>
</ul> 

</nav>