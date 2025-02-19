<!DOCTYPE html>
<html lang="en">

<head>
    <!-- all style file & link start -->
    @include('admin.css')
    <!-- all style file & link end -->
    
    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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

                    <div class=" text-center">
                        <h2>Add Catagory</h2>
                        <form action="{{url('/add_catagory')}}" method="post">
                            @csrf
                            <div class="grid grid-flow-col items-center py-10 gap-2">
                                <label class="col-span-2">Catagory Name</label>
                                <input class="col-span-8 rounded p-2" type="text" name="Category"
                                    placeholder="Enter your Category Name">
                                <button class="col-span-2 btn btn-secondary" type="submit">Submit</button>
                            </div>
                        </form>
                        <hr>
                        <table class="m-auto justify-between ">
                            <thead>
                                <tr class=" ">
                                    <td class="px-4">Id</td>
                                    <td class="px-4">Category</td>
                                    <td class="px-4">Create Time</td>
                                    <td class="px-4">Update Time</td>
                                    <td class="px-4">Action</td>
                                </tr>
                            </thead>
                            @foreach ($categories as $category)
                            <tbody>
                                <tr>
                                    <td class="px-4">{{$category->id}}</td>
                                    <td class="px-4">{{$category->Category_Name}}</td>
                                    <td class="px-4">{{$category->created_at}}</td>
                                    <td class="px-4">{{$category->updated_at}}</td>
                                    <td class="">
                                        <a onclick="return confirm('Are you sure to Delete This')"
                                            href="{{url('/add_catagory_destoy', $category->id)}}"
                                            class="btn btn-danger rounded text-white">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
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