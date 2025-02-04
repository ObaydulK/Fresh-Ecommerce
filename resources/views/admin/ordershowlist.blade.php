<!DOCTYPE html>
<html lang="en">

<head>
    <!-- all style file & link start -->
    @include('admin.css')
    <!-- all style file & link end -->
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
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">All Product</h4>
                            <form action="{{url('/search')}}" method="get">
                                @csrf
                                
                                <input type="text" name="search" class="bg-white text-black font-semibold"  placeholder="Search name..">
                                <input type="submit" value="Search" class="btn btn-outline-primary"> 
                            </form>
                            <table class=" m-auto justify-between" >
                                <thead  >
                                    <tr>
                                        <th class="border p-2">Name</th>
                                        <th class="border p-2">Email</th>
                                        {{-- <th class="border p-2">Address</th>
                                        <th class="border p-2">Phone</th> --}}
                                        <th class="border p-2">User_id</th>
                                        <th class="border p-2">Product Title</th>
                                        <th class="border p-2">Quantity</th>
                                        <th class="border p-2">Price</th>
                                        <th class="border p-2">Product Id</th>
                                        <th class="border p-2">Payment Status</th>
                                        <th class="border p-2">Delivery Status</th>
                                        <th class="border p-2">Created</th>
                                        <th class="border p-2">Image</th>
                                        <th class="border p-2">Deliverd</th>
                                        <th class="border p-2">Print Pdf</th>
                                        

                                    </tr>
                                </thead>
                                @forelse ($orders as $order)
                                <tbody>
                                    <tr>
                                        <td class="border p-2">{{$order->name}}</td>
                                        <td class="border p-2">{{$order->email}}</td>
                                        <td class="border p-2">{{$order->user_id}}</td>
                                        <td class="border p-2">{{$order->product_title}}</td>
                                        <td class="border p-2">{{$order->quantity}}</td>
                                        <td class="border p-2">{{$order->price}}</td>
                                        <td class="border p-2">{{$order->product_id}}</td>
                                        <td class="border p-2">{{$order->payment_status}}</td>
                                        <td class="border p-2">{{$order->deliver_status}}</td>
                                        <td class="border p-2">{{$order->created_at}}</td>
                                        <td> <img class="h-48 w-96 object-scale-down" src="/product/{{$order->image}}" alt=""></td>
                                        
                                        <td class="border p-2">
                                            @if ($order->deliver_status=='Processing')
                                            <a href=" {{url('delivered', $order->id)}} " class="btn btn-primary" >Deleverd</a>
                                            @else
                                            <p>Deleverd</p>
                                            @endif
                                        </td>
                                        <td class="border p-2">
                                            <a href="{{url('printpdf', $order->id)}}"  class="btn btn-primary" >Print pdf</a>

                                        </td>

                                        
                                    </tr>
                                </tbody>
                                @empty
                                <div>
                                    <p>No data fount</p>
                                </div>


                                @endforelse
                            </table>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- Script pard start  -->
    @include('admin.script')
    <!-- Script pard end -->
</body>

</html>