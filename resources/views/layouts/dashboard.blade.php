<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
    @include('partials.dashboardstyle')
  </head>
  <body>
    @include('partials.svg')

    @include('partials.header')

    <body class="">
        @yield('dashboard')
    </body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>
    <script src="{{ asset('dropiyf/dist/js/dropify.js') }}"></script>
    <script src="{{ asset('dropiyf/dist/js/dropify.min.js') }}"></script>
    <script>
        $('.dropify').dropify();
    </script>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script><script src="dashboard.js"></script></body>
</html>
