<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="asset-path" content="{{ asset('/') }}">
<title>Vouchain - Blockchain Evoucher Solution</title>
<!-- Custom fonts for this template-->
<link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<!-- Custom styles for this template-->
<link href="{{ asset('resources/root/sb-admin-2.css') }}" rel="stylesheet">
<link href="{{ asset('vendor/fullscreen-loader/css/jquery.loadingModal.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendor/datatables/select.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendor/lobibox/css/LobiBox.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendor/select2/css/select2.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendor/select2/css/select2-bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendor/multi-step-modal/MultiStep.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendor/multi-step-modal/MultiStep-theme.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendor/datepicker/css/bootstrap-datepicker3.css') }}" rel="stylesheet">
@yield('css')   