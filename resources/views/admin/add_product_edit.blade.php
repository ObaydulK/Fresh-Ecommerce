<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    <!-- all style file & link start -->
    @include('admin.css')
    <!-- all style file & link end -->
    @vite('resources/js/app.js')
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
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{session()->get('message')}}
                    </div>
                    @endif
                    <div class="item-center text-center">
                        <!-- Contact Us -->
                        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
                            <div class="max-w-2xl lg:max-w-5xl mx-auto">
                                <div class="text-center">
                                    <h1 class="text-3xl font-bold text-gray-800 sm:text-4xl dark:text-white">
                                        Update you product
                                    </h1>
                                </div>

                                <div class="">
                                    <!-- Card -->
                                    <div class="  rounded-xl p-4 sm:p-6 lg:p-8 dark:border-neutral-700">

                                        <form action="{{url('/add_product_edit_submit', $product->id)}}" method="Post" enctype="multipart/form-data">
                                            @csrf 
                                            <div>
                                                <label for="">title</label>
                                                <input type="text" name="title" placeholder="Enter you title" required value="{{$product->title}}" >
                                            </div>
                                            <div>
                                                <label for="">description</label>
                                                <input type="text" name="description"
                                                    placeholder="Enter you description" required value="{{$product->description}}">
                                            </div>
                                            <div>
                                                <label for="">Current image</label>
                                                <img src="/product/{{$product->image}}" alt="">
                            
                                            </div>
                                            <div>
                                                <label for="">change image</label>
                                                <input type="file" name="image" placeholder="change you image" >
                                            </div>

                                            <div>
                                                <label for="">price</label>
                                                <input type="text" name="price" placeholder="Enter you price" required value="{{$product->price}}">
                                            </div>
                                            <div>
                                                <label for="">quantity</label>
                                                <input type="text" name="quantity" placeholder="Enter you quantity" required value="{{$product->quantity}}">
                                            </div>
                                            <div>
                                                <label for="">catagory</label>
                                                <select name="category" id=""  >
                                                    <option value="{{$product->category}}" selected="">{{$product->category}}</option>
                                                    @foreach ($categories  as $categorie)
                                                    <option value="{{$categorie->Category_Name}}">{{$categorie->Category_Name}}</option> 
                                                    @endforeach
                                                </select>   
                                            </div>
                                            <div>
                                                <label for="">discount_price</label>
                                                <input type="text" name="discount_price"
                                                    placeholder="Enter you discount_price" required value="{{$product->discount_price}}">
                                            </div>
                                            <button type="submit">Submit</button>
                                        </form>
                                    </div>
                                    <!-- End Card -->
                                </div>
                            </div>
                        </div>
                        <!-- End Contact Us -->
                    </div>

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