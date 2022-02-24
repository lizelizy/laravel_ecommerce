<div class="col-md-10 offset-md-1">
    <div class="row">
        <div id="image-container" class="col-md-6">
            <img src="/img/products/{{ $product->image }}" alt="{{ $product->name }}" class="image-fluid">
        </div>
        <div id="info-container" class="col-md-6">
        <h1>{{ $product->name }}</h1>
        <p class="price"> {{ $product->price }} </p>
    </div>
    </div>
</div>