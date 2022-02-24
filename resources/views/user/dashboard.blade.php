<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>

                <div class="card col-md-3">
        <form action="/dashboard" method="get">
            <input type="text" id="search" name="search" class="form-control" placeholder="Search Product">
            <input type="submit" value="search">
        </form>
</br>

@if($search)
<h2>Searching for {{ $search }}...</h2>
@endif

</div>

                @foreach($products as $product)
 <div class="card col-md-3">
    <img src="/img/products/{{ $product->image }}" alt="{{ $product->title }}";>
      <div class="card body">
       <h5 class="card-title">{{$product->name}}</h5>
       <h5 class="card-title">{{$product->price}}</h5>
       <a href="/dashboard/{{ $product->id }}" class="btn btn-primary">See product</a>
   </div>
 </div>
@endforeach

@if(count($products) == 0 && $search)
    <p>No product found with {{$search}}! <a href="/dashboard">See other products</a></p>
@endif
            </div>
        </div>
    </div>
</x-app-layout>
