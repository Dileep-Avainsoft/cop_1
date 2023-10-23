<x-app-layout>

    @include('admin.partial.header')
    @include('admin.partial.loader')
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        {{-- @include('admin.partial.topbar') --}}
        <!-- Page Header Ends-->
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            @include('admin.partial.sidebar')
            <!-- Page Sidebar Ends-->






            <!-- footer start-->
            @include('admin.partial.footer')
        </div>
    </div>
    @include('admin.partial.scripts')
    <!-- Plugins JS start-->
    <script src="{{ asset('assets/js/clock.js')}}"></script>
    <script src="{{ asset('assets/js/chart/apex-chart/moment.min.js')}}"></script>
    {{-- <script src="{{ asset('assets/js/notify/bootstrap-notify.min.js')}}"></script> --}}
    <script src="{{ asset('assets/js/dashboard/default.js')}}"></script>
    <script src="{{ asset('assets/js/notify/index.js')}}"></script>
    <script src="{{ asset('assets/js/typeahead/handlebars.js')}}"></script>
    <script src="{{ asset('assets/js/typeahead/typeahead.bundle.js')}}"></script>
    <script src="{{ asset('assets/js/typeahead/typeahead.custom.js')}}"></script>
    <script src="{{ asset('assets/js/typeahead-search/handlebars.js')}}"></script>
    <script src="{{ asset('assets/js/typeahead-search/typeahead-custom.js')}}"></script>
    <script src="{{ asset('assets/js/height-equal.js')}}"></script>
    <script src="{{ asset('assets/js/animation/wow/wow.min.js')}}"></script>
    <!-- Plugins JS Ends-->
    {{--<script>--}}
    {{--  new WOW().init();--}}
    {{--</script>--}}
    {{--@include('admin.partial.footer-end')--}}

</x-app-layout>
