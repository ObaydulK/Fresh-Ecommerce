@extends('home.layout')
@vite(['resources/css/app.css', 'resources/js/app.js'])

@section('content')
<div class="">
    <div class=" w-[50%] m-auto ">
        <article class="relative overflow-hidden rounded-lg shadow transition hover:shadow-lg">
            <img alt=""
                src="https://images.unsplash.com/photo-1661956602116-aa6865609028?ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=764&q=80"
                class="absolute inset-0 h-full w-full object-cover" />

            <div class="relative bg-gradient-to-t from-gray-900/50 to-gray-900/25 pt-32 sm:pt-48 lg:pt-64">
                <div class="p-4 sm:p-6">
                    <time datetime="2022-10-10" class="block text-xs text-white/90">  {{$product->created_at}}</time>

                    <a href="#">
                        <h3 class="mt-0.5 text-lg text-white">{{$product->title}}</h3>
                    </a>

                    <p class="mt-2 line-clamp-3 text-sm/relaxed text-white/95"> {{$product->description}} </p>
                </div>
            </div>
        </article>
        @if ($product->discount_price != null)
            <div class="flex justify-between">
                <h5 class="text-red-500"> Discount Price
                    ${{$product->price}}
                </h5>
                <h5 class="text-decoration-line-through text-blue">Old Price
                    ${{$product->price}}
                </h5>
            </div>
        @else
            <h5 class="text-blue-500">Price
            ${{$product->price}}</h5>
        @endif
        <h4>Product Catagory : {{$product->category}}</h4>
        <h4>Product Quality : {{$product->quantity}}</h4>
        <h4>Product Last Update : {{$product->updated_at}}</h4>
    </div>
</div>
@endsection