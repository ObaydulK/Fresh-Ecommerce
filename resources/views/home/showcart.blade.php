@extends('home.layout')
@vite(['resources/css/app.css', 'resources/js/app.js'])

@section('content')

@if (session()->has('success'))
    <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('success')}}
    </div>
@endif

<div class="flex justify-center">
    <div class="border p-3  flex flex-col  ">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 justify-center inline-block align-middle">
                <div class="overflow-hidden">
                    <table class="   divide-y divide-gray-200 dark:divide-neutral-700">
                        <thead class="border">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                    Product Title</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                    Product Quantity</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                    Price</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                    Image</th>
                                <th scope="col"
                                    class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                    Action</th>
                            </tr>
                        </thead>

                        <?php $totalprice = 0; ?>

                        @foreach ($cart as $carts)
                            <tbody>
                                <tr>
                                    <td scope="col"
                                        class="border px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        {{$carts->product_title}}
                                    </td>
                                    <td scope="col"
                                        class="border px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        {{$carts->quantity}}
                                    </td>
                                    <td scope="col"
                                        class="border px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        {{$carts->price}}
                                    </td>
                                    <td scope="col"
                                        class="border px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        <img class="w-14" src="/product/{{$carts->image}}" alt="">
                                    </td>
                                    <td scope="col"
                                        class="border px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        <a class="btn btn-danger" onclick="return confirm('Delete Now this Cart')"
                                            href="{{url('/remove_cart', $carts->id)}}" ,>Remove Product</a>
                                    </td>

                                </tr>
                            </tbody>
                            <?php    $totalprice = $totalprice + $carts->price ?>
                        @endforeach


                    </table>
                    <div class=" flex justify-center">
                        <h2>Total price = {{$totalprice}}</h2>
                    </div>
                    <div class="flex justify-center">
                        <div class="text-center">
                            <h2>Proceed to Order</h2>
                            <a href="{{url('/order')}}" class="btn bg-black text-white rounded px-2 items-center">Order Cash on Delivery</a>
                            <a href="{{url('/stripe',$totalprice )}}" class="btn bg-black text-white rounded px-2 items-cente">Pay Using online Card</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection