<link rel="preconnect" href="https://fonts.googleapis.com/">
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
    rel="stylesheet">
<link rel="stylesheet"
      href="{{ asset('assets/vendor/fonts/tabler-iconsea04.css?id=6ad8bc28559d005d792d577cf02a2116')}}"/>
<link rel="stylesheet"
      href="{{ asset('assets/vendor/fonts/fontawesome8a69.css?id=a2997cb6a1c98cc3c85f4c99cdea95b5')}}"/>
<link rel="stylesheet"
      href="{{ asset('assets/vendor/fonts/flag-icons80a8.css?id=121bcc3078c6c2f608037fb9ca8bce8d')}}"/>
<link rel="stylesheet" href="{{ asset('assets/css/demof1ed.css?id=ddd2feb83a604f9e432cdcb29815ed44')}}"/>
<link rel="stylesheet"
      href="{{ asset('assets/vendor/libs/node-waves/node-wavesd178.css?id=aa72fb97dfa8e932ba88c8a3c04641bc')}}"/>
<link rel="stylesheet"
      href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar7358.css?id=280196ccb54c8ae7e29ea06932c9a4b6')}}"/>
<link rel="stylesheet"
      href="{{ asset('assets/vendor/libs/typeahead-js/typeaheadb5e1.css?id=2603197f6b29a6654cb700bd9367e2a3')}}"/>
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css')}}"/>
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/swiper/swiper.css')}}"/>
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}"/>
<link rel="stylesheet"
      href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}"/>
<link rel="stylesheet"
      href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}"/>
<link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/cards-advance.css')}}">
<script src="{{ asset('assets/vendor/js/helpers.js')}}"></script>
<script src="{{ asset('assets/js/config.js')}}"></script>
<link rel="stylesheet"
      href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css')}}"/>
<link rel="stylesheet"
      href="{{ asset('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css')}}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}"/>
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css')}}"/>
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css')}}"/>
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/dropzone/dropzone.css')}}"/>
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css')}}"/>
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}"/>
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/toastr/toastr.css')}}"/>
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css')}}"/>

<script>
    window.templateCustomizer = new TemplateCustomizer({
        cssPath: '',
        themesPath: '',
        defaultStyle: "light",
        defaultShowDropdownOnHover: "true", // true/false (for horizontal layout only)
        displayCustomizer: "true",
        lang: 'en',
        pathResolver: function (path) {
            const resolvedPaths = {
                // Core stylesheets
                'core.css': 'https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/css/rtl/core.css?id=9dd8321ea008145745a7d78e072a6e36',
                'core-dark.css': 'https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/css/rtl/core-dark.css?id=d661bae1d0ada9f7e9e3685a3e1f427e',

                // Themes
                'theme-default.css': 'https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-default.css?id=a4539ede8fbe0ee4ea3a81f2c89f07d9',
                'theme-default-dark.css':
                    'https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-default-dark.css?id=ce86d777a4c5030f51d0f609f202bcc5',
                'theme-bordered.css': 'https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-bordered.css?id=786794ca0c68d96058e8ceeb20f4e7c5',
                'theme-bordered-dark.css':
                    'https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-bordered-dark.css?id=e7122ef6338b22f7cea9eaff5a96aa8b',
                'theme-semi-dark.css': 'https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-semi-dark.css?id=a0a317e88e943fdd62d514e00deebb22',
                'theme-semi-dark-dark.css':
                    'https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-semi-dark-dark.css?id=e9a2f7cd6ace727264936f6bf93ab1e2',
            };
            return resolvedPaths[path] || path;
        },
        'controls': ["rtl", "style", "headerType", "contentLayout", "layoutCollapsed", "layoutNavbarOptions", "themes"],
    });
</script>
<style>
    input[type="number"]::-webkit-inner-spin-button{
        display: none;
    }

    input[type="number"]{
        -moz-appearance: textfield;
    }
</style>
