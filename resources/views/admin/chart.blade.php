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
                    hello how ara you chart box
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