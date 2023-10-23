<x-app-layout>
    @include('admin.partial.header')
    {{-- @include('admin.partial.header') --}}
    {{-- @include('admin.partial.loader') --}}
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        {{-- @include('admin.partial.topbar') --}}
        <!-- Page Header Ends-->
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            @include('admin.partial.sidebar')


            <div class="page-body">

                <!-- Container-fluid starts-->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header" style="display: flex; justify-content: space-between;">
                                    <h5>Brand Entry</h5>
                                    <a href=" " class="btn btn-primary"> View Brand</a>
                                </div>

                                <form class="form theme-form" action="{{ route('brand.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">

                                                <div class="mb-3">
                                                    <label class="form-label" for="exampleFormControlSelect17">Select
                                                        Car Stage</label>
                                                    <select style="width: 500px"
                                                        class="form-select input-air-primary digits"
                                                        id="exampleFormControlSelect17" name="car_stage_id" required>
                                                        <option selected disabled>Select
                                                            Car Stage</option>
                                                            @foreach ($CarStage_name as $data )
                                <option value="{{ $data->car_stage_id}}" >{{ $data->car_stage_name}}</option>
                                               @endforeach


                                                    </select>
                                                </div>


                                                <div class="mb-3">
                                                    <label class="form-label" for="exampleInputPassword16">Brand Name
                                                        :</label>
                                                    <input style="width: 500px" class="form-control input-air-primary"
                                                        name="brand_name" id="exampleInputPassword16" type="text"
                                                        placeholder="Enter Brand Name">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="exampleInputPassword16">Brand Logo
                                                        :</label>
                                                    <input style="width: 500px" class="form-control input-air-primary"
                                                        name="brand_logo" accept="image/png, image/jpeg" id="submitdata"
                                                        placeholder="Enter Brand Logo URL" type="file">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="media mb-2">
                                                <label class="col-form-label m-r-10">Brand Status</label>

                                                <div class="media-body text-end icon-state switch-outline">
                                                    <label class="switch">
                                                        <input type="checkbox" checked="" name="status"><span
                                                            class="switch-state bg-primary"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button class="btn btn-primary" name="submit"
                                                    type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid Ends-->
            </div>



        </div>
    </div>
    @include('admin.partial.scripts')
    <!-- Plugins JS start-->
    {{-- <script src="assets/js/clock.js"></script> --}}
    {{-- <script src="assets/js/chart/apex-chart/moment.min.js"></script> --}}
    <script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/default.js') }}"></script>
    <script src="{{ asset('assets/js/notify/index.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/handlebars.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/typeahead.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/typeahead.custom.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead-search/handlebars.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead-search/typeahead-custom.js') }}"></script>
    <script src="{{ asset('assets/js/height-equal.js') }}"></script>
    <script src="{{ asset('assets/js/animation/wow/wow.min.js') }}"></script>
    <!-- Plugins JS Ends-->
    {{-- <script> --}}
    {{--  new WOW().init(); --}}
    {{-- </script> --}}
    {{-- @include('admin.partial.footer-end') --}}



</x-app-layout>
