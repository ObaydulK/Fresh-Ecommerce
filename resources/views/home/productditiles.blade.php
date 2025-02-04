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
        <h4 class="text-gray-700 font-bold uppercase  p-2 border">Product Catagory : {{$product->category}}</h4>
        <h4>Product Quality : {{$product->quantity}}</h4>
        <h4>Product Last Update : {{$product->updated_at}}</h4>
        
        <form action="{{url('add_to_cart', $product->id)}}" method="post">
            @csrf
            <div class="flex items-center justify-between">
                <input class="w-[50%]" type="number" name="quantity" value="1" min="1" id="">
                <input type="submit" value="Add to Cart" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            </div>
        </form>
    </div>
</div>
 
 
        <div  class="text-gray-700 font-bold uppercase  p-2 border">Id</div>
        <div  class="text-gray-700 font-bold uppercase  p-2 border">Name</div>
        <div  class="text-gray-700 font-bold uppercase  p-2 border">Email</div>
        <div  class="text-gray-700 font-bold uppercase  p-2 border">Product_Title</div>
        <div  class="text-gray-700 font-bold uppercase  p-2 border">Quantity</div>
        <div  class="text-gray-700 font-bold uppercase  p-2 border">Price</div>
        <div  class="text-gray-700 font-bold uppercase  p-2 border">Payment</div>
        <div  class="text-gray-700 font-bold uppercase  p-2 border">Deliver</div>
        <div  class="text-gray-700 font-bold uppercase   p-2 border">Created</div>
 
 
@endsection