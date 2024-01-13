@extends('layout')
@section('title','about')
@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/about.css')}}">
@endpush
<style>
     #div1{ 
        margin: 8px;
        padding: 8px;
        border: 2px solid red;
        height: 250px;
        width: 500px;
        background-color: azure;
    } 
</style>
@section('content')
<div class="container">
    <h2 class="text-center"><em><strong>About Us</strong></em></h2>
    <p>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Totam praesentium minima est, ratione soluta deleniti debitis eum quia? Ex velit illum aliquid explicabo, tempore saepe eum ullam odit sunt vitae ad! Ad beatae exercitationem pariatur laborum? Culpa expedita eveniet ullam voluptates dignissimos, hic corrupti cumque deleniti saepe quis doloremque labore! Deleniti suscipit accusamus obcaecati sit at laborum, ea fugit. Laboriosam ab excepturi eaque eos cum asperiores at dicta eveniet unde aspernatur dolores, obcaecati atque quas quisquam maiores. Laboriosam eveniet numquam fuga soluta similique cumque! Distinctio quia est sed iusto nesciunt praesentium necessitatibus omnis possimus blanditiis labore in nisi dolorum ratione consequuntur consequatur natus dignissimos consectetur officia, asperiores beatae eveniet facere sequi! Eligendi harum sit beatae cumque alias dicta rerum dolorum obcaecati iste adipisci. Laboriosam debitis perspiciatis maiores doloremque aliquam laudantium tempora esse voluptatibus neque. Labore repellat rerum fuga voluptatem soluta dolor, commodi eum, placeat quam laborum deserunt officiis, quos aliquid.
    </p>
    <div id="div1">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reiciendis modi illo dolor sapiente iste. Deserunt ut voluptates quisquam, at ducimus veniam deleniti error cumque. Labore voluptas recusandae minima officia vel.
    </div>
    <button type="button" class="btn btn-dark shadow-none mt-3" onclick="clickme()">Click Me</button>
    @push('javascript')

    <script src="{{asset('js/custom.js')}}"></script>
        
    @endpush
</div>
    
@endsection