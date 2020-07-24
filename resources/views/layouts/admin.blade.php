<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>@yield('title', 'Dashboard')</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/summernote/summernote-bs4.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/backend/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('styles')

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include('layouts.partials.admin.header')

        @include('layouts.partials.admin.side_nav')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->

        @include('layouts.partials.admin.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('assets/backend/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    {{-- Extra plugins --}}
    <script src="{{ asset('assets/backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        (function($) {
        $(document).ready(function() {
            $('.textarea').summernote({
                height: 300,
                toolbar: [
                    ['style', ['style', 'bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['view', ['fullscreen', 'codeview']],
                ],
                styleTags: [
                    'p', { title: 'Blockquote', tag: 'blockquote', className: 'blockquote', value: 'blockquote' }, 'pre', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'
                ],
             })
        })
    })(jQuery)
    </script>


    <!-- AdminLTE App -->
    <script src="{{ asset('assets/backend/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        @if(Session::has('success'))
            swtoaster('success', "{{ Session::get('success') }}");
        @endif
        @if(Session::has('error'))
            swtoaster('error', "{{ Session::get('error') }}");
        @endif
        @if(Session::has('warning'))
            swtoaster('warning', "{{ Session::get('warning') }}");
        @endif
        @if(Session::has('info'))
            swtoaster('info', "{{ Session::get('info') }}");
        @endif
        @if(Session::has('question'))
            swtoaster('question', "{{ Session::get('question') }}");
        @endif
    </script>
    <script>
        (function($) {
        $(document).ready(function() {
            $(document).on('click', '.delete', function(e) {
                e.preventDefault();
                var swal_link = $(this).attr('href');
                Swal.fire({
                    title: "Are you sure to delete?",
                    text: "This will delete your data permanently!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        axios.post(swal_link, {_method: 'DELETE'})
                          .then( res => {
                            Swal.fire({
                                title: "Deleted!",
                                text: 'You data has been deleted.',
                                icon: 'success',
                                timer: 2000,
                                timerProgressBar: true,
                                onClose: function() {
                                    window.location.href = window.location.href
                                }
                            })
                            
                          })
                          .catch(err => {
                            Swal.fire({
                                title: "Uhh!",
                                text: 'Something went wrong.',
                                icon: 'error',
                                timer: 2000,
                                timerProgressBar: true,
                            })
                          })
                        
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire ({
                            title: 'Cancelled!',
                            text: 'You have chosen to keep data.',
                            icon: 'success',
                            timer: 2000,
                            timerProgressBar: true,
                        })
                    }
                })
            })
        });
    })(jQuery);

    flatpickr(".datetimepicker", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        minDate: "today",
    });
    </script>
    @yield('scripts')
</body>

</html>