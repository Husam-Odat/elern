<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title></title>
    <!-- theme meta -->
    <meta name="theme-name" content="mono" />
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
    <link href="{{ asset('plugins/material/css/materialdesignicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/simplebar/simplebar.css') }}" rel="stylesheet" />
    <!-- PLUGINS CSS STYLE -->
    <link href="{{ asset('plugins/nprogress/nprogress.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/prism/prism.css') }}" rel="stylesheet" />
    <link href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"
        rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{ asset('plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="{{ asset('plugins/toaster/toastr.min.css') }}" rel="stylesheet" />
    <!-- MONO CSS -->
    <link id="main-css-href" rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <!-- FAVICON -->
    <link href="{{ asset('images/favicon.png') }}" rel="shortcut icon" />
    <script src="{{ asset('plugins/nprogress/nprogress.js') }}"></script>
</head>

<body class="navbar-fixed sidebar-fixed" id="body">

    <!-- ====================================
    ——— WRAPPER
    ===================================== -->
    <div class="wrapper">

        <!-- ====================================
      ——— PAGE WRAPPER
      ===================================== -->
        <div class="page-wrapper">
            @include('layoutss.header')

            @yield('content')

            @include('layoutss.footer')
        </div>
    </div>
    <!-- Card Offcanvas -->
    <div class="card card-offcanvas" id="contact-off">
        <div class="card-header">
            <h2>Contacts</h2>
            <a href="#" class="btn btn-primary btn-pill px-4">Add New</a>
        </div>
        <div class="card-body">
            <div class="mb-4">
                <input type="text" class="form-control form-control-lg form-control-secondary rounded-0"
                    placeholder="Search contacts...">
            </div>
            <div class="media media-sm">
                <div class="media-sm-wrapper">
                    <a href="user-profile.html">
                        <img src="{{ asset('images/user/user-sm-01.jpg') }}" alt="User Image">
                        <span class="active bg-primary"></span>
                    </a>
                </div>
                <div class="media-body">
                    <a href="user-profile.html">
                        <span class="title">Selena Wagner</span>
                        <span class="discribe">Designer</span>
                    </a>
                </div>
            </div>
            <div class="media media-sm">
                <div class="media-sm-wrapper">
                    <a href="user-profile.html">
                        <img src="{{ asset('images/user/user-sm-02.jpg') }}" alt="User Image">
                        <span class="active bg-primary"></span>
                    </a>
                </div>
                <div class="media-body">
                    <a href="user-profile.html">
                        <span class="title">Walter Reuter</span>
                        <span>Developer</span>
                    </a>
                </div>
            </div>
            <div class="media media-sm">
                <div class="media-sm-wrapper">
                    <a href="user-profile.html">
                        <img src="{{ asset('images/user/user-sm-03.jpg') }}" alt="User Image">
                    </a>
                </div>
                <div class="media-body">
                    <a href="user-profile.html">
                        <span class="title">Larissa Gebhardt</span>
                        <span>Cyber Punk</span>
                    </a>
                </div>
            </div>
            <div class="media media-sm">
                <div class="media-sm-wrapper">
                    <a href="user-profile.html">
                        <img src="{{ asset('images/user/user-sm-04.jpg') }}" alt="User Image">
                    </a>

                </div>
                <div class="media-body">
                    <a href="user-profile.html">
                        <span class="title">Albrecht Straub</span>
                        <span>Photographer</span>
                    </a>
                </div>
            </div>
            <div class="media media-sm">
                <div class="media-sm-wrapper">
                    <a href="user-profile.html">
                        <img src="{{ asset('images/user/user-sm-05.jpg') }}" alt="User Image">
                        <span class="active bg-danger"></span>
                    </a>
                </div>
                <div class="media-body">
                    <a href="user-profile.html">
                        <span class="title">Leopold Ebert</span>
                        <span>Fashion Designer</span>
                    </a>
                </div>
            </div>
            <div class="media media-sm">
                <div class="media-sm-wrapper">
                    <a href="user-profile.html">
                        <img src="{{ asset('images/user/user-sm-06.jpg') }}" alt="User Image">
                        <span class="active bg-primary"></span>
                    </a>
                </div>
                <div class="media-body">
                    <a href="user-profile.html">
                        <span class="title">Selena Wagner</span>
                        <span>Photographer</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/simplebar/simplebar.min.js') }}"></script>
    <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>
    <script src="{{ asset('plugins/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('plugins/prism/prism.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
    <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
    <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-us-aea.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script>
        jQuery(document).ready(function() {
            jQuery('input[name="dateRange"]').daterangepicker({
                autoUpdateInput: false,
                singleDatePicker: true,
                locale: {
                    cancelLabel: 'Clear'
                }
            });
            jQuery('input[name="dateRange"]').on('apply.daterangepicker', function(ev, picker) {
                jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
            });
            jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function(ev, picker) {
                jQuery(this).val('');
            });
        });
    </script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="{{ asset('plugins/toaster/toastr.min.js') }}"></script>
    <script src="{{ asset('js/mono.js') }}"></script>
    <script src="{{ asset('js/chart.js') }}"></script>
    <script src="{{ asset('js/map.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="https://kit.fontawesome.com/09ce849ccf.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('click', '.delete-item', function(event) {
                event.preventDefault()
                let deleteUrl = $(this).attr('href');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#9e6de0',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            type: 'DELETE',
                            url: deleteUrl,
                            success: function(data) {
                                if (data.status == 'success') {
                                    Swal.fire(
                                        'Deleted!',
                                        data.message,
                                        'success'
                                    )
                                    window.location.reload()
                                } else if (data.status == 'error') {
                                    Swal.fire(
                                        'Cant Delete!',
                                        data.message,
                                        'error'
                                    )
                                }

                            },
                            error: function(xhr, status, error) {
                                console.log(error);
                            }
                        })


                    }
                })
            })
        })
    </script>
    @stack('scripts')
</body>

</html>