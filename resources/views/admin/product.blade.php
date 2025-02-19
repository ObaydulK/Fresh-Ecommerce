<!DOCTYPE html>
<html lang="en">

<head>
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
                    <div class="item-center text-center">
                        <!-- Contact Us -->
                        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
                            <div class="max-w-2xl lg:max-w-5xl mx-auto">
                                <div class="text-center">
                                    <h1 class="text-3xl font-bold text-gray-800 sm:text-4xl dark:text-white">
                                        Add you product
                                    </h1>
                                </div>

                                <div class="">
                                    <!-- Card -->
                                    <div class="  rounded-xl p-4 sm:p-6 lg:p-8 dark:border-neutral-700">

                                        <form class="border inline-block items-start" action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            
                                            <div class="grid grid-flow-col items-center  gap-3 ">
                                                <label class=" w-50%   w-full col-span-4 text-capitalize  " for="">title</label>
                                                <input class=" rounded p-2 w-50% my-2 text-black col-span-8" type="text" name="title" placeholder="Enter you title" required>
                                            </div>
                                            <div class="grid grid-flow-col items-center  gap-3 ">
                                                <label class=" w-50%   w-full col-span-4 text-capitalize  " for="">description</label>
                                                <input class=" rounded p-2 w-50% my-2 text-black col-span-8" type="text" name="description"
                                                    placeholder="Enter you description" required>
                                            </div>
                                            <div class="grid grid-flow-col items-center  gap-3 ">
                                                <label class=" w-50%   w-full col-span-4 text-capitalize  " for="">price</label>
                                                <input class=" rounded p-2 w-50% my-2 text-black col-span-8" type="text" name="price" placeholder="Enter you price" required>
                                            </div>
                                            <div class="grid grid-flow-col items-center  gap-3 ">
                                                <label class=" w-50%   w-full col-span-4 text-capitalize  " for="">quantity</label>
                                                <input class=" rounded p-2 w-50% my-2 text-black col-span-8" type="text" name="quantity" placeholder="Enter you quantity" required>
                                            </div>
                                            <div class="grid grid-flow-col items-center  gap-3 ">
                                                <label class=" w-50%   w-full col-span-4 text-capitalize  " for="">catagory</label>
                                                <select class=" rounded p-2 w-50% my-2 text-black col-span-8"  name="category" id="">
                                                    <option value="" selected="">Add a catagory</option>
                                                    @foreach ($categories  as $categorie)
                                                    <option value="{{$categorie->Category_Name}}">{{$categorie->Category_Name}}</option> 
                                                    @endforeach
                                                </select> 
                                            </div>
                                            <div class="grid grid-flow-col items-center  gap-3 ">
                                                <label class=" w-50%   w-full col-span-4 text-capitalize  " for="">discount_price</label>
                                                <input class=" rounded p-2 w-50% my-2 text-black col-span-8" type="text" name="discount_price"
                                                    placeholder="Enter you discount_price" required>
                                            </div>
                                            
                                            <div class="grid grid-flow-col items-center  gap-3 ">
                                                <label class=" w-50%   w-full col-span-4 text-capitalize  " for="">image</label>
                                                <input class=" rounded w-[100px] p-2 w-50% my-2 text-black col-span-8" type="file" name="image" placeholder="Enter you image" required>
                                            </div>
                                            <button class="btn bg-red-600 w-full" type="submit">Submit</button>
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