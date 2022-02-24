<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard for admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                <div id="product-create-container" class="col-md6 offset-md-3">
                <h1><strong>Add a New Product</strong></h1>
</br>

    <form action="/dashboard" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- csrf é um método de proteção do banco de dados no laravel --}}

        <div class="form-group">
            <label for="name"></label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name of the Product">
        </div>
</br>

        <div class="form-group">
            <label for="price"></label>
            <input type="number" class="form-control" id="price" name="price" placeholder="Price of the Product">
        </div>
</br>

        <div class="form-group">
            <label for="image">Image for the Product:</label>
</br>
            <input type="file" id="image" name="image" class="input form-control-file"></div>
</br>

            <input type="submit" class="btn btn-primary" value="Launch Product" style="color:blue;" onMouseOver="this.style.color='#0F0'" onMouseOut="this.style.color='#00F'">
</form>
        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>