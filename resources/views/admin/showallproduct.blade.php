<!DOCTYPE html>
<html lang="en">

<head>
    <!-- all style file & link start -->
    @include('admin.css')
    <!-- all style file & link end -->
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')

</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sideber')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.navber')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <table class="table-fixed">
                        <thead>
                            <tr>
                                <th class="py-2 px-2 justify-between">title</th>
                                <th class="py-2 px-2 justify-between">description</th>
                                <th class="py-2 px-2 justify-between">images</th>
                                <th class="py-2 px-2 justify-between">price</th>
                                <th class="py-2 px-2 justify-between">quantity</th>
                                <th class="py-2 px-2 justify-between">category</th>
                                <th class="py-2 px-2 justify-between">discount_Price</th>
                                <th class="py-2 px-2 justify-between">Created_at</th>
                                <th class="py-2 px-2 justify-between">Update_at</th>
                                <th class="py-2 px-2 justify-between">Delete</th>

                            </tr>
                        </thead>
                        @foreach ($products as $product)
                            <tbody>
                                <tr class="">
                                    <td class="py-2 px-2 justify-between">
                                        <div class="  rounded-full">
                                            <img class="w-10 h-10 rounded-full" src="/product/{{$product->image }}">
                                        </div>
                                    </td>
                                    <td class="py-2 px-2 justify-between">{{$product->title }}</td>
                                    <td class="py-2 px-2 justify-between">{{$product->description }}</td>
                                    <td class="py-2 px-2 justify-between">{{$product->price }}</td>
                                    <td class="py-2 px-2 justify-between">{{$product->quantity }}</td>
                                    <td class="py-2 px-2 justify-between">{{$product->category }}</td>
                                    <td class="py-2 px-2 justify-between">{{$product->discount_price }}</td>
                                    <td class="py-2 px-2 justify-between">{{$product->created_at }}</td>
                                    <td class="py-2 px-2 justify-between">{{$product->updated_at}}</td>
                                    <td class="py-2 px-2 justify-between">
                                        <a href="{{url('/add_product_edit', $product->id)}}"
                                            class="btn btn-secondary rounded text-black">Edit</a>

                                        <a href="{{url('/add_product_destroy', $product->id)}}"
                                            class="btn btn-danger rounded text-white">Delete</a>

                                        
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>

                </div>
            </div>


            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- Script pard start  -->
    @include('admin.script')
    <!-- Script pard end -->
</body>

</html>