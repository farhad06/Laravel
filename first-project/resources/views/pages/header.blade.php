<h2>This is header page</h2>

{{-- <h3 style="color: red;">Hello Mr. {{$name}}</h3> --}}

<ul>
    @foreach ($names as $name)
    <li>{{$name}}</li>
        
    @endforeach
</ul>