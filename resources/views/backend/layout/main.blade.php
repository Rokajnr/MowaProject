<!DOCTYPE html>
<html dir="@if (Config::get('app.locale') == 'ar' || $general_setting->is_rtl) {{ 'rtl' }} @endif">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @laravelPWA
    @if (!config('database.connections.saleprosaas_landlord'))
    <link rel="icon" type="image/png" href="{{ url('logo', $general_setting->site_logo) }}" />
    <title>{{ $general_setting->site_title }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="manifest" href="{{ url('manifest.json') }}">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo asset('vendor/bootstrap/css/bootstrap.min.css'); ?>" type="text/css">
    <link rel="preload" href="<?php echo asset('vendor/bootstrap-toggle/css/bootstrap-toggle.min.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('vendor/bootstrap-toggle/css/bootstrap-toggle.min.css'); ?>" rel="stylesheet">
    </noscript>
    <link rel="preload" href="<?php echo asset('vendor/bootstrap/css/bootstrap-datepicker.min.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('vendor/bootstrap/css/bootstrap-datepicker.min.css'); ?>" rel="stylesheet">
    </noscript>
    <link rel="preload" href="<?php echo asset('vendor/jquery-timepicker/jquery.timepicker.min.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('vendor/jquery-timepicker/jquery.timepicker.min.css'); ?>" rel="stylesheet">
    </noscript>
    <link rel="preload" href="<?php echo asset('vendor/bootstrap/css/awesome-bootstrap-checkbox.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('vendor/bootstrap/css/awesome-bootstrap-checkbox.css'); ?>" rel="stylesheet">
    </noscript>
    <link rel="preload" href="<?php echo asset('vendor/bootstrap/css/bootstrap-select.min.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('vendor/bootstrap/css/bootstrap-select.min.css'); ?>" rel="stylesheet">
    </noscript>
    <!-- Font Awesome CSS-->
    <link rel="preload" href="<?php echo asset('vendor/font-awesome/css/font-awesome.min.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('vendor/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
    </noscript>
    <!-- Drip icon font-->
    <link rel="preload" href="<?php echo asset('vendor/dripicons/webfont.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('vendor/dripicons/webfont.css'); ?>" rel="stylesheet">
    </noscript>

    <!-- jQuery Circle-->
    <link rel="preload" href="<?php echo asset('css/grasp_mobile_progress_circle-1.0.0.min.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('css/grasp_mobile_progress_circle-1.0.0.min.css'); ?>" rel="stylesheet">
    </noscript>
    <!-- Custom Scrollbar-->
    <link rel="preload" href="<?php echo asset('vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css'); ?>" rel="stylesheet">
    </noscript>

    @if (Route::current()->getName() != '/')
    <!-- date range stylesheet-->
    <link rel="preload" href="<?php echo asset('vendor/daterange/css/daterangepicker.min.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('vendor/daterange/css/daterangepicker.min.css'); ?>" rel="stylesheet">
    </noscript>
    <!-- table sorter stylesheet-->
    <link rel="preload" href="<?php echo asset('vendor/datatable/dataTables.bootstrap4.min.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('vendor/datatable/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet">
    </noscript>
    <link rel="preload" href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.bootstrap.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    </noscript>
    <link rel="preload" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css" rel="stylesheet">
    </noscript>
    @endif
    <link rel="stylesheet" href="<?php echo asset('css/theme.bundle.css'); ?>">
    <link rel="stylesheet" href="<?php echo asset('css/style.default.css'); ?>" id="theme-stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('css/dropzone.css'); ?>">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo asset('css/custom-' . $general_setting->theme); ?>" type="text/css" id="custom-style">

    @if (Config::get('app.locale') == 'ar' || $general_setting->is_rtl)
    <!-- RTL css -->
    <link rel="stylesheet" href="<?php echo asset('vendor/bootstrap/css/bootstrap-rtl.min.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('css/custom-rtl.css'); ?>" type="text/css" id="custom-style">
    @endif
    @else
    <link rel="icon" type="image/png" href="{{ url('../../logo', $general_setting->site_logo) }}" />
    <title>{{ $general_setting->site_title }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="manifest" href="{{ url('manifest.json') }}">
    <!-- Bootstrap CSS-->
    <link rel="preload" href="<?php echo asset('../../vendor/bootstrap-toggle/css/bootstrap-toggle.min.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('../../vendor/bootstrap-toggle/css/bootstrap-toggle.min.css'); ?>" rel="stylesheet">
    </noscript>
    <link rel="preload" href="<?php echo asset('../../vendor/bootstrap/css/bootstrap-datepicker.min.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('../../vendor/bootstrap/css/bootstrap-datepicker.min.css'); ?>" rel="stylesheet">
    </noscript>
    <link rel="preload" href="<?php echo asset('../../vendor/jquery-timepicker/jquery.timepicker.min.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('../../vendor/jquery-timepicker/jquery.timepicker.min.css'); ?>" rel="stylesheet">
    </noscript>
    <link rel="preload" href="<?php echo asset('../../vendor/bootstrap/css/awesome-bootstrap-checkbox.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('../../vendor/bootstrap/css/awesome-bootstrap-checkbox.css'); ?>" rel="stylesheet">
    </noscript>
    <link rel="preload" href="<?php echo asset('../../vendor/bootstrap/css/bootstrap-select.min.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('../../vendor/bootstrap/css/bootstrap-select.min.css'); ?>" rel="stylesheet">
    </noscript>
    <!-- Font Awesome CSS-->
    <link rel="preload" href="<?php echo asset('../../vendor/font-awesome/css/font-awesome.min.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('../../vendor/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
    </noscript>
    <!-- Drip icon font-->
    <link rel="preload" href="<?php echo asset('../../vendor/dripicons/webfont.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('../../vendor/dripicons/webfont.css'); ?>" rel="stylesheet">
    </noscript>

    <!-- jQuery Circle-->
    <link rel="preload" href="<?php echo asset('../../css/grasp_mobile_progress_circle-1.0.0.min.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('../../css/grasp_mobile_progress_circle-1.0.0.min.css'); ?>" rel="stylesheet">
    </noscript>
    <!-- Custom Scrollbar-->
    <link rel="preload" href="<?php echo asset('../../vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('../../vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css'); ?>" rel="stylesheet">
    </noscript>

    @if (Route::current()->getName() != '/')
    <!-- date range stylesheet-->
    <link rel="preload" href="<?php echo asset('../../vendor/daterange/css/daterangepicker.min.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('../../vendor/daterange/css/daterangepicker.min.css'); ?>" rel="stylesheet">
    </noscript>
    <!-- table sorter stylesheet-->
    <link rel="preload" href="<?php echo asset('../../vendor/datatable/dataTables.bootstrap4.min.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo asset('../../vendor/datatable/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet">
    </noscript>
    <link rel="preload" href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.bootstrap.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    </noscript>
    <link rel="preload" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css" rel="stylesheet">
    </noscript>
    @endif

    <link rel="stylesheet" href="<?php echo asset('../../css/style.default.css'); ?>" id="theme-stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('../../css/dropzone.css'); ?>">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo asset('../../css/custom-' . $general_setting->theme); ?>" type="text/css" id="custom-style">

    @if (Config::get('app.locale') == 'ar' || $general_setting->is_rtl)
    <!-- RTL css -->
    <link rel="stylesheet" href="<?php echo asset('../../vendor/bootstrap/css/bootstrap-rtl.min.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('../../css/custom-rtl.css'); ?>" type="text/css" id="custom-style">
    @endif
    @endif
    <!-- Google fonts - Roboto -->
    <link rel="preload" href="https://fonts.googleapis.com/css?family=Nunito:400,500,700" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,500,700" rel="stylesheet">
    </noscript>
</head>

<body @if ($theme=='dark' ) class="dark-mode dripicons-brightness-low" @else class="scrollbar" @endif onload="myFunction()">
    <div id="loader"></div>
    <!-- Side Navbar -->
    <nav id="mainNavbar" class="side-navbar navbar navbar-vertical navbar-expand-lg bg-white navbar-light">
        <div class="container-fluid px-0">
            <span class=" navbar-brand px-6 py-4">
                @if ($general_setting->site_logo)
                <a href="{{ url('/') }}"><img src="{{ url('public/logo', $general_setting->site_logo) }}" width="115"></a>
                @else
                <a href="{{ url('/') }}">
                    <h1 class="d-inline">{{ $general_setting->site_title }}</h1>
                </a>
                @endif
            </span>
            <div class="navbar-collapse" id="sidenavCollapse">
                <ul class="side-menu side-main-menu navbar-nav mb-lg-7">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">
                            <svg viewBox="0 0 24 24" class="nav-link-icon" height="18" width="18" xmlns="http://www.w3.org/2000/svg"><path d="M3.753,13.944v8.25h6v-6a1.5,1.5,0,0,1,1.5-1.5h1.5a1.5,1.5,0,0,1,1.5,1.5v6h6v-8.25" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path><path d="M.753,12.444,10.942,2.255a1.5,1.5,0,0,1,2.122,0L23.253,12.444" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg>
                            <span>{{ __('file.dashboard') }}</span></a>
                    </li>
                    <?php
                    $role = DB::table('roles')->find(Auth::user()->role_id);
                    $category_permission_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'category'], ['role_id', $role->id]])
                        ->first();

                    $index_permission_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'products-index'], ['role_id', $role->id]])
                        ->first();

                    $print_barcode_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'print_barcode'], ['role_id', $role->id]])
                        ->first();

                    $stock_count_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'stock_count'], ['role_id', $role->id]])
                        ->first();

                    $adjustment_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'adjustment'], ['role_id', $role->id]])
                        ->first();
                    ?>
                    @if ($category_permission_active ||
                    $index_permission_active ||
                    $print_barcode_active ||
                    $stock_count_active ||
                    $adjustment_active)
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#productCollapse" aria-expanded="false" data-bs-toggle="collapse">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="nav-link-icon" height="18" width="18"><defs><style>.a{fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5px;}</style></defs><title>common-file-double-1</title><path class="a" d="M17.25,23.25H3.75a1.5,1.5,0,0,1-1.5-1.5V5.25"></path><rect class="a" x="5.25" y="0.75" width="16.5" height="19.5" rx="1" ry="1"></rect></svg>
                            <span>{{ __('file.product') }}</span><span></a>
                        <div class="collapse" id="productCollapse">
                            <ul class="nav flex-column">
                                @if ($category_permission_active)
                                <li class="nav-item" id="category-menu"><a class="nav-link" href="{{ route('category.index') }}">{{ __('file.category') }}</a>
                                </li>
                                @endif
                                @if ($index_permission_active)
                                <li class="nav-item" id="product-list-menu"><a class="nav-link" href="{{ route('products.index') }}">{{ __('file.product_list') }}</a>
                                </li>
                                <?php
                                $add_permission_active = DB::table('permissions')
                                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                                    ->where([['permissions.name', 'products-add'], ['role_id', $role->id]])
                                    ->first();
                                ?>
                                @if ($add_permission_active)
                                <li class="nav-item" id="product-create-menu"><a class="nav-link" href="{{ route('products.create') }}">{{ __('file.add_product') }}</a>
                                </li>
                                @endif
                                @endif
                                @if ($print_barcode_active)
                                <li class="nav-item" id="printBarcode-menu"><a class="nav-link" href="{{ route('product.printBarcode') }}">{{ __('file.print_barcode') }}</a>
                                </li>
                                @endif
                                @if ($adjustment_active)
                                <li class="nav-item" id="adjustment-list-menu"><a class="nav-link" href="{{ route('qty_adjustment.index') }}">{{ trans('file.Adjustment List') }}</a>
                                </li>
                                <li class="nav-item" id="adjustment-create-menu"><a class="nav-link" href="{{ route('qty_adjustment.create') }}">{{ trans('file.Add Adjustment') }}</a>
                                </li>
                                @endif
                                @if ($stock_count_active)
                                <li class="nav-item" id="stock-count-menu"><a class="nav-link" href="{{ route('stock-count.index') }}">{{ trans('file.Stock Count') }}</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                    @endif
                    <?php
                    $index_permission_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'purchases-index'], ['role_id', $role->id]])
                        ->first();
                    ?>
                    @if ($index_permission_active)
                    <li class="nav-item dropdown"><a class="nav-link" href="#purchaseCollapse" aria-expanded="false" data-bs-toggle="collapse" role="button" aria-controls="purchaseCollapse">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="18" width="18" class="nav-link-icon"><defs><style>.a{fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5px;}</style></defs><title>credit-card-1</title><rect class="a" x="0.75" y="3.75" width="22.5" height="16.5" rx="1.5" ry="1.5"></rect><line class="a" x1="0.75" y1="8.25" x2="23.25" y2="8.25"></line><line class="a" x1="5.25" y1="12.75" x2="13.5" y2="12.75"></line><line class="a" x1="5.25" y1="15.75" x2="10.5" y2="15.75"></line></svg>
                            <span>{{ trans('file.Purchase') }}</span></a>
                        <div class="collapse" id="purchaseCollapse">
                            <ul class="nav flex-column">
                                <li class="nav-item" id="purchase-list-menu">
                                    <a class="nav-link" href="{{ route('purchases.index') }}">{{ trans('file.Purchase List') }}</a>
                                </li>
                                <?php
                                $add_permission = DB::table('permissions')
                                    ->where('name', 'purchases-add')
                                    ->first();
                                $add_permission_active = DB::table('role_has_permissions')
                                    ->where([['permission_id', $add_permission->id], ['role_id', $role->id]])
                                    ->first();
                                ?>
                                @if ($add_permission_active)
                                <li class="nav-item" id="purchase-create-menu"><a class="nav-link" href="{{ route('purchases.create') }}">{{ trans('file.Add Purchase') }}</a>
                                </li>
                                <li class="nav-item" id="purchase-import-menu"><a class="nav-link" href="{{ url('purchases/purchase_by_csv') }}">{{ trans('file.Import Purchase By CSV') }}</a>
                                </li>
                                @endif
                            </ul>

                        </div>
                    </li>
                    @endif
                    <?php
                    $sale_index_permission_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'sales-index'], ['role_id', $role->id]])
                        ->first();

                    $gift_card_permission_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'gift_card'], ['role_id', $role->id]])
                        ->first();

                    $coupon_permission_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'coupon'], ['role_id', $role->id]])
                        ->first();

                    $delivery_permission_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'delivery'], ['role_id', $role->id]])
                        ->first();

                    $sale_add_permission_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'sales-add'], ['role_id', $role->id]])
                        ->first();
                    ?>
                    @if ($sale_index_permission_active ||
                    $gift_card_permission_active ||
                    $coupon_permission_active ||
                    $delivery_permission_active)
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#saleCollapse" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="saleCollapse">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="18" width="18" class="nav-link-icon"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 19.1249H15.921C16.2753 19.125 16.6182 18.9996 16.889 18.7709C17.1597 18.5423 17.3407 18.2253 17.4 17.8759L20.037 2.37593C20.0965 2.02678 20.2776 1.70994 20.5483 1.48153C20.819 1.25311 21.1618 1.12785 21.516 1.12793H22.5"></path><path stroke="currentColor" stroke-width="1.5" d="M7.875 22.125C7.66789 22.125 7.5 21.9571 7.5 21.75C7.5 21.5429 7.66789 21.375 7.875 21.375"></path><path stroke="currentColor" stroke-width="1.5" d="M7.875 22.125C8.08211 22.125 8.25 21.9571 8.25 21.75C8.25 21.5429 8.08211 21.375 7.875 21.375"></path><path stroke="currentColor" stroke-width="1.5" d="M15.375 22.125C15.1679 22.125 15 21.9571 15 21.75C15 21.5429 15.1679 21.375 15.375 21.375"></path><path stroke="currentColor" stroke-width="1.5" d="M15.375 22.125C15.5821 22.125 15.75 21.9571 15.75 21.75C15.75 21.5429 15.5821 21.375 15.375 21.375"></path><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.9529 14.6251H5.88193C5.21301 14.625 4.5633 14.4014 4.03605 13.9897C3.5088 13.5781 3.13425 13.002 2.97193 12.3531L1.52193 6.55309C1.49426 6.44248 1.49218 6.32702 1.51583 6.21548C1.53949 6.10394 1.58827 5.99927 1.65846 5.90941C1.72864 5.81955 1.81839 5.74688 1.92089 5.69692C2.02338 5.64696 2.13591 5.62103 2.24993 5.62109H19.4839"></path></svg>
                            <span>{{ trans('file.Sale') }}</span></a>
                        <div class="collapse" id="saleCollapse">
                            <ul class="nav flex-column">
                                @if ($sale_index_permission_active)
                                <li class="nav-item" id="sale-list-menu"><a class="nav-link" href="{{ route('sales.index') }}">{{ trans('file.Sale List') }}</a>
                                </li>
                                @if ($sale_add_permission_active)
                                <li class="nav-item"><a class="nav-link" href="{{ route('sale.pos') }}">POS</a></li>
                                <li class="nav-item" id="sale-create-menu"><a class="nav-link" href="{{ route('sales.create') }}">{{ trans('file.Add Sale') }}</a>
                                </li>
                                <li class="nav-item" id="sale-import-menu"><a class="nav-link" href="{{ url('sales/sale_by_csv') }}">{{ trans('file.Import Sale By CSV') }}</a>
                                </li>
                                @endif
                                @endif

                                @if ($gift_card_permission_active)
                                <li class="nav-item" id="gift-card-menu"><a class="nav-link" href="{{ route('gift_cards.index') }}">{{ trans('file.Gift Card List') }}</a>
                                </li>
                                @endif
                                @if ($coupon_permission_active)
                                <li class="nav-item" id="coupon-menu"><a class="nav-link" href="{{ route('coupons.index') }}">{{ trans('file.Coupon List') }}</a>
                                </li>
                                @endif
                                @if ($delivery_permission_active)
                                <li class="nav-item" id="delivery-menu"><a class="nav-link" href="{{ route('delivery.index') }}">{{ trans('file.Delivery List') }}</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                    @endif

                    <?php
                    $index_permission_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'expenses-index'], ['role_id', $role->id]])
                        ->first();
                    ?>
                    @if ($index_permission_active)
                    <li class="nav-item dropdown"><a class="nav-link" href="#expenseCollapse" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="expenseCollapse">
                        <svg viewBox="0 0 24 24" height="18" width="18" class="nav-link-icon" xmlns="http://www.w3.org/2000/svg"><path d="M18.75,14.25H16.717a1.342,1.342,0,0,0-.5,2.587l2.064.826a1.342,1.342,0,0,1-.5,2.587H15.75" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path><path d="M17.25 14.25L17.25 13.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path><path d="M17.25 21L17.25 20.25" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path><path d="M11.250 17.250 A6.000 6.000 0 1 0 23.250 17.250 A6.000 6.000 0 1 0 11.250 17.250 Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path><path d="M3.75 14.25L8.25 14.25" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path><path d="M8.25 14.25L8.25 6.75" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path><path d="M11.25 9.75L11.25 8.25" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path><path d="M5.25 14.25L5.25 9.75" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path><path d="M7.5,20.25H2.25a1.43,1.43,0,0,1-1.5-1.415V2.335A1.575,1.575,0,0,1,2.25.75H12.879a1.5,1.5,0,0,1,1.06.439l2.872,2.872a1.5,1.5,0,0,1,.439,1.06V7.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg>
                        <span>{{ trans('file.Expense') }}</span></a>
                        <div class="collapse" id="expenseCollapse">
                            <ul class="nav flex-column">
                                <li class="nav-item" id="exp-cat-menu"><a class="nav-link" href="{{ route('expense_categories.index') }}">{{ trans('file.Expense Category') }}</a>
                                </li>
                                <li class="nav-item" id="exp-list-menu"><a class="nav-link" href="{{ route('expenses.index') }}">{{ trans('file.Expense List') }}</a>
                                </li>
                                <?php
                                $add_permission_active = DB::table('permissions')
                                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                                    ->where([['permissions.name', 'expenses-add'], ['role_id', $role->id]])
                                    ->first();
                                ?>
                                @if ($add_permission_active)
                                <li class="nav-item"><a class="nav-link" id="add-expense" href="">
                                        {{ trans('file.Add Expense') }}</a></li>
                                @endif
                            </ul>
                        </div>
                    </li>
                    @endif
                    <?php
                    $index_permission_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'quotes-index'], ['role_id', $role->id]])
                        ->first();
                    ?>
                    @if ($index_permission_active)
                    <li class="nav-item dropdown"><a class="nav-link" href="#quotationCollapse" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="quotationCollapse">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="nav-link-icon" height="18" width="18"><path d="M22.627 14.87 15 22.5l-3.75.75.75-3.75 7.631-7.63a2.113 2.113 0 0 1 2.991 0l.009.008a2.116 2.116 0 0 1-.004 2.992zM8.246 20.25h-6a1.5 1.5 0 0 1-1.5-1.5V2.25a1.5 1.5 0 0 1 1.5-1.5h15a1.5 1.5 0 0 1 1.5 1.5V9m-10.5-3.75h6m-9 4.5h9m-9 4.5h7.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg>
                        <span>{{ trans('file.Quotation') }}</span><span></a>
                        <div class="collapse" id="quotationCollapse">
                            <ul class="nav flex-column">
                                <li class="nav-item" id="quotation-list-menu"><a class="nav-link" href="{{ route('quotations.index') }}">{{ trans('file.Quotation List') }}</a>
                                </li>
                                <?php
                                $add_permission_active = DB::table('permissions')
                                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                                    ->where([['permissions.name', 'quotes-add'], ['role_id', $role->id]])
                                    ->first();
                                ?>
                                @if ($add_permission_active)
                                <li class="nav-item" id="quotation-create-menu"><a class="nav-link" href="{{ route('quotations.create') }}">{{ trans('file.Add Quotation') }}</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                    @endif
                    <?php
                    $index_permission_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'transfers-index'], ['role_id', $role->id]])
                        ->first();
                    ?>
                    @if ($index_permission_active)
                    <li class="nav-item dropdown"><a class="nav-link" href="#transferCollapse" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="transferCollapse">
                        <svg viewBox="0 0 24 24" height="18" width="18" class="nav-link-icon" xmlns="http://www.w3.org/2000/svg"><path d="M2.759,15.629a1.664,1.664,0,0,1-.882-3.075L20.36,1A1.663,1.663,0,0,1,22.876,2.72l-3.6,19.173a1.664,1.664,0,0,1-2.966.691L11.1,15.629Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path><path d="M11.1,15.629H8.6V20.8a1.663,1.663,0,0,0,2.6,1.374l3.178-2.166Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path><path d="M11.099 15.629L22.179 1.039" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg>
                        <span>{{ trans('file.Transfer') }}</span></a>
                        <div class="collapse" id="transferCollapse">
                            <ul class="nav flex-column">
                                <li class="nav-item" id="transfer-list-menu"><a class="nav-link" href="{{ route('transfers.index') }}">{{ trans('file.Transfer List') }}</a>
                                </li>
                                <?php
                                $add_permission_active = DB::table('permissions')
                                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                                    ->where([['permissions.name', 'transfers-add'], ['role_id', $role->id]])
                                    ->first();
                                ?>
                                @if ($add_permission_active)
                                <li class="nav-item" id="transfer-create-menu"><a class="nav-link" href="{{ route('transfers.create') }}">{{ trans('file.Add Transfer') }}</a>
                                </li>
                                <li class="nav-item" id="transfer-import-menu"><a class="nav-link" href="{{ url('transfers/transfer_by_csv') }}">{{ trans('file.Import Transfer By CSV') }}</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                    @endif

                    <?php
                    $sale_return_index_permission_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'returns-index'], ['role_id', $role->id]])
                        ->first();

                    $purchase_return_index_permission_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'purchase-return-index'], ['role_id', $role->id]])
                        ->first();
                    ?>
                    @if ($sale_return_index_permission_active || $purchase_return_index_permission_active)
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#returnCollapse" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="returnCollapse">
                        <svg viewBox="0 0 24 24" height="18" width="18" class="nav-link-icon" xmlns="http://www.w3.org/2000/svg"><path d="M21.75,5.25H13.5a3,3,0,0,0-3,3V12" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path><path d="M17.25 9.75L21.75 5.25 17.25 0.75" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path><path d="M18.75,14.25v7.5a1.5,1.5,0,0,1-1.5,1.5H3.75a1.5,1.5,0,0,1-1.5-1.5v-12a1.5,1.5,0,0,1,1.5-1.5H6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg>
                        <span>{{ trans('file.return') }}</span></a>
                        <div class="collapse" id="returnCollapse">
                            <ul class="nav flex-column">
                                @if ($sale_return_index_permission_active)
                                <li class="nav-item" id="sale-return-menu"><a class="nav-link" href="{{ route('return-sale.index') }}">{{ trans('file.Sale') }}</a>
                                </li>
                                @endif
                                @if ($purchase_return_index_permission_active)
                                <li class="nav-item" id="purchase-return-menu"><a class="nav-link" href="{{ route('return-purchase.index') }}">{{ trans('file.Purchase') }}</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                    @endif
                    <?php
                    $index_permission_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'account-index'], ['role_id', $role->id]])
                        ->first();

                    $money_transfer_permission_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'money-transfer'], ['role_id', $role->id]])
                        ->first();

                    $balance_sheet_permission_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'balance-sheet'], ['role_id', $role->id]])
                        ->first();

                    $account_statement_permission_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'account-statement'], ['role_id', $role->id]])
                        ->first();

                    ?>
                    @if ($index_permission_active ||
                    $balance_sheet_permission_active ||
                    $account_statement_permission_active ||
                    $money_transfer_permission_active)
                    <li class="nav-item dropdown"><a class="nav-link" href="#accountCollapse" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="accountCollapse">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="18" width="18" class="nav-link-icon"><defs><style>.a{fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5px;}</style></defs><title>cash-briefcase</title><path class="a" d="M9.75,15.937c0,.932,1.007,1.688,2.25,1.688s2.25-.756,2.25-1.688S13.243,14.25,12,14.25s-2.25-.756-2.25-1.688,1.007-1.687,2.25-1.687,2.25.755,2.25,1.687"></path><line class="a" x1="12" y1="9.75" x2="12" y2="10.875"></line><line class="a" x1="12" y1="17.625" x2="12" y2="18.75"></line><rect class="a" x="1.5" y="6.75" width="21" height="15" rx="1.5" ry="1.5"></rect><path class="a" d="M15.342,3.275A1.5,1.5,0,0,0,13.919,2.25H10.081A1.5,1.5,0,0,0,8.658,3.275L7.5,6.75h9Z"></path></svg>
                        <span>{{ trans('file.Accounting') }}</span></a>
                        <div class="collapse" id="accountCollapse">
                            <ul class="nav flex-column">
                                @if ($index_permission_active)
                                <li class="nav-item" id="account-list-menu"><a class="nav-link" href="{{ route('accounts.index') }}">{{ trans('file.Account List') }}</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" id="add-account" href="">{{ trans('file.Add Account') }}</a></li>
                                @endif
                                @if ($money_transfer_permission_active)
                                <li class="nav-item" id="money-transfer-menu"><a class="nav-link" href="{{ route('money-transfers.index') }}">{{ trans('file.Money Transfer') }}</a>
                                </li>
                                @endif
                                @if ($balance_sheet_permission_active)
                                <li class="nav-item" id="balance-sheet-menu"><a class="nav-link" href="{{ route('accounts.balancesheet') }}">{{ trans('file.Balance Sheet') }}</a>
                                </li>
                                @endif
                                @if ($account_statement_permission_active)
                                <li class="nav-item" id="account-statement-menu"><a class="nav-link" id="account-statement" href="">{{ trans('file.Account Statement') }}</a></li>
                                @endif
                            </ul>
                        </div>
                    </li>
                    @endif
                    <?php
                    $department_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'department'], ['role_id', $role->id]])
                        ->first();

                    $index_employee_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'employees-index'], ['role_id', $role->id]])
                        ->first();

                    $attendance_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'attendance'], ['role_id', $role->id]])
                        ->first();

                    $payroll_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'payroll'], ['role_id', $role->id]])
                        ->first();
                    ?>

                    @if (Auth::user()->role_id != 5)
                    <li class="nav-item dropdown"><a class="nav-link" href="#hrmCollapse" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="hrmCollapse">
                        <svg viewBox="0 0 24 24" height="18" width="18" class="nav-link-icon" xmlns="http://www.w3.org/2000/svg"><path d="M2.250 6.000 A2.250 2.250 0 1 0 6.750 6.000 A2.250 2.250 0 1 0 2.250 6.000 Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path><path d="M4.5,9.75A3.75,3.75,0,0,0,.75,13.5v2.25h1.5l.75,6H6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path><path d="M17.250 6.000 A2.250 2.250 0 1 0 21.750 6.000 A2.250 2.250 0 1 0 17.250 6.000 Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path><path d="M19.5,9.75a3.75,3.75,0,0,1,3.75,3.75v2.25h-1.5l-.75,6H18" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path><path d="M9.000 3.750 A3.000 3.000 0 1 0 15.000 3.750 A3.000 3.000 0 1 0 9.000 3.750 Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path><path d="M17.25,13.5a5.25,5.25,0,0,0-10.5,0v2.25H9l.75,7.5h4.5l.75-7.5h2.25Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg>
                        <span>HRM</span></a>
                        <div class="collapse" id="hrmCollapse">
                            <ul class="nav flex-column">
                                @if ($department_active)
                                <li class="nav-item" id="dept-menu"><a class="nav-link" href="{{ route('departments.index') }}">{{ trans('file.Department') }}</a>
                                </li>
                                @endif
                                @if ($index_employee_active)
                                <li class="nav-item" id="employee-menu"><a class="nav-link" href="{{ route('employees.index') }}">{{ trans('file.Employee') }}</a>
                                </li>
                                @endif
                                @if ($attendance_active)
                                <li class="nav-item" id="attendance-menu"><a class="nav-link" href="{{ route('attendance.index') }}">{{ trans('file.Attendance') }}</a>
                                </li>
                                @endif
                                @if ($payroll_active)
                                <li class="nav-item" id="payroll-menu"><a class="nav-link" href="{{ route('payroll.index') }}">{{ trans('file.Payroll') }}</a>
                                </li>
                                @endif
                                <li class="nav-item" id="holiday-menu"><a class="nav-link" href="{{ route('holidays.index') }}">{{ trans('file.Holiday') }}</a></li>
                            </ul>
                        </div>
                    </li>
                    @endif
                    <?php
                    $user_index_permission_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'users-index'], ['role_id', $role->id]])
                        ->first();

                    $customer_index_permission_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'customers-index'], ['role_id', $role->id]])
                        ->first();

                    $biller_index_permission_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'billers-index'], ['role_id', $role->id]])
                        ->first();

                    $supplier_index_permission_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'suppliers-index'], ['role_id', $role->id]])
                        ->first();
                    ?>
                    @if ($user_index_permission_active ||
                    $customer_index_permission_active ||
                    $biller_index_permission_active ||
                    $supplier_index_permission_active)
                    <li class="nav-item dropdown"><a class="nav-link" href="#peopleCollapse" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="peopleCollapse">
                        <svg viewBox="0 0 24 24" height="18" width="18" class="nav-link-icon" xmlns="http://www.w3.org/2000/svg"><path d="M21.476,23.25a10.483,10.483,0,0,0-18.952,0" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path><path d="M12,5.25A5.251,5.251,0,0,1,6.75,10.5a5.25,5.25,0,0,0,10.5,0A5.25,5.25,0,0,1,12,5.25Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path><path d="M17.836,19.027a14.576,14.576,0,0,0,3.391-1.007,1.5,1.5,0,0,0,.763-1.961l-1.376-3.21a4.5,4.5,0,0,1-.364-1.773V9A8.25,8.25,0,0,0,3.75,9v2.076a4.5,4.5,0,0,1-.364,1.773L2.01,16.059a1.5,1.5,0,0,0,.763,1.961,14.576,14.576,0,0,0,3.391,1.007" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg>
                        <span>{{ trans('file.People') }}</span></a>
                        <div class="collapse" id="peopleCollapse">
                            <ul class="nav flex-column">

                                @if ($user_index_permission_active)
                                <li class="nav-item" id="user-list-menu"><a class="nav-link" href="{{ route('user.index') }}">{{ trans('file.User List') }}</a>
                                </li>
                                <?php
                                $user_add_permission_active = DB::table('permissions')
                                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                                    ->where([['permissions.name', 'users-add'], ['role_id', $role->id]])
                                    ->first();
                                ?>
                                @if ($user_add_permission_active)
                                <li class="nav-item" id="user-create-menu"><a class="nav-link" href="{{ route('user.create') }}">{{ trans('file.Add User') }}</a>
                                </li>
                                @endif
                                @endif

                                @if ($customer_index_permission_active)
                                <li class="nav-item" id="customer-list-menu"><a class="nav-link" href="{{ route('customer.index') }}">{{ trans('file.Customer List') }}</a>
                                </li>
                                <?php
                                $customer_add_permission_active = DB::table('permissions')
                                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                                    ->where([['permissions.name', 'customers-add'], ['role_id', $role->id]])
                                    ->first();
                                ?>
                                @if ($customer_add_permission_active)
                                <li class="nav-item" id="customer-create-menu"><a class="nav-link" href="{{ route('customer.create') }}">{{ trans('file.Add Customer') }}</a>
                                </li>
                                @endif
                                @endif

                                @if ($biller_index_permission_active)
                                <li class="nav-item" id="biller-list-menu"><a class="nav-link" href="{{ route('biller.index') }}">{{ trans('file.Biller List') }}</a>
                                </li>
                                <?php
                                $biller_add_permission_active = DB::table('permissions')
                                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                                    ->where([['permissions.name', 'billers-add'], ['role_id', $role->id]])
                                    ->first();
                                ?>
                                @if ($biller_add_permission_active)
                                <li class="nav-item" id="biller-create-menu"><a class="nav-link" href="{{ route('biller.create') }}">{{ trans('file.Add Biller') }}</a>
                                </li>
                                @endif
                                @endif

                                @if ($supplier_index_permission_active)
                                <li class="nav-item" id="supplier-list-menu"><a class="nav-link" href="{{ route('supplier.index') }}">{{ trans('file.Supplier List') }}</a>
                                </li>
                                <?php
                                $supplier_add_permission_active = DB::table('permissions')
                                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                                    ->where([['permissions.name', 'suppliers-add'], ['role_id', $role->id]])
                                    ->first();
                                ?>
                                @if ($supplier_add_permission_active)
                                <li class="nav-item" id="supplier-create-menu"><a class="nav-link" href="{{ route('supplier.create') }}">{{ trans('file.Add Supplier') }}</a>
                                </li>
                                @endif
                                @endif
                            </ul>
                        </div>
                    </li>
                    @endif

                    <?php
                    $profit_loss_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'profit-loss'], ['role_id', $role->id]])
                        ->first();
                    $best_seller_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'best-seller'], ['role_id', $role->id]])
                        ->first();
                    $warehouse_report_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'warehouse-report'], ['role_id', $role->id]])
                        ->first();
                    $warehouse_stock_report_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'warehouse-stock-report'], ['role_id', $role->id]])
                        ->first();
                    $product_report_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'product-report'], ['role_id', $role->id]])
                        ->first();
                    $daily_sale_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'daily-sale'], ['role_id', $role->id]])
                        ->first();
                    $monthly_sale_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'monthly-sale'], ['role_id', $role->id]])
                        ->first();
                    $daily_purchase_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'daily-purchase'], ['role_id', $role->id]])
                        ->first();
                    $monthly_purchase_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'monthly-purchase'], ['role_id', $role->id]])
                        ->first();
                    $purchase_report_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'purchase-report'], ['role_id', $role->id]])
                        ->first();
                    $sale_report_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'sale-report'], ['role_id', $role->id]])
                        ->first();
                    $sale_report_chart_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'sale-report-chart'], ['role_id', $role->id]])
                        ->first();
                    $payment_report_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'payment-report'], ['role_id', $role->id]])
                        ->first();
                    $product_expiry_report_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'product-expiry-report'], ['role_id', $role->id]])
                        ->first();
                    $product_qty_alert_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'product-qty-alert'], ['role_id', $role->id]])
                        ->first();
                    $dso_report_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'dso-report'], ['role_id', $role->id]])
                        ->first();
                    $user_report_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'user-report'], ['role_id', $role->id]])
                        ->first();
                    $customer_report_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'customer-report'], ['role_id', $role->id]])
                        ->first();
                    $supplier_report_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'supplier-report'], ['role_id', $role->id]])
                        ->first();
                    $due_report_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'due-report'], ['role_id', $role->id]])
                        ->first();
                    $supplier_due_report_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'supplier-due-report'], ['role_id', $role->id]])
                        ->first();
                    ?>
                    @if ($profit_loss_active ||
                    $best_seller_active ||
                    $warehouse_report_active ||
                    $warehouse_stock_report_active ||
                    $product_report_active ||
                    $daily_sale_active ||
                    $monthly_sale_active ||
                    $daily_purchase_active ||
                    $monthly_purchase_active ||
                    $purchase_report_active ||
                    $sale_report_active ||
                    $sale_report_chart_active ||
                    $payment_report_active ||
                    $product_expiry_report_active ||
                    $product_qty_alert_active ||
                    $dso_report_active ||
                    $user_report_active ||
                    $customer_report_active ||
                    $supplier_report_active ||
                    $due_report_active ||
                    $supplier_due_report_active)
                    <li class="nav-item dropdown"><a class="nav-link" href="#reportCollapse" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="reportCollapse">
                        <svg viewBox="0 0 24 24" height="18" width="18" class="nav-link-icon" xmlns="http://www.w3.org/2000/svg"><path d="M13.629,23.25H2.25a1.5,1.5,0,0,1-1.5-1.5V2.25A1.5,1.5,0,0,1,2.25.75h19.5a1.5,1.5,0,0,1,1.5,1.5V13.629a1.5,1.5,0,0,1-.439,1.06l-8.122,8.122A1.5,1.5,0,0,1,13.629,23.25Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path><path d="M14.25,23.115V15.75a1.5,1.5,0,0,1,1.5-1.5h7.365" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path><path d="M6.75 6.75L18.75 6.75" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path><path d="M6.75 11.25L12 11.25" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg>
                        <span>{{ trans('file.Reports') }}</span></a>
                        <div class="collapse" id="reportCollapse">
                            <ul class="nav flex-column">
                                @if ($profit_loss_active)
                                <li class="nav-item" id="profit-loss-report-menu">
                                    {!! Form::open(['route' => 'report.profitLoss', 'method' => 'post', 'id' => 'profitLoss-report-form']) !!}
                                    <input type="hidden" name="start_date" value="{{ date('Y-m') . '-' . '01' }}" />
                                    <input type="hidden" name="end_date" value="{{ date('Y-m-d') }}" />
                                    <a class="nav-link" id="profitLoss-link" href="">{{ trans('file.Summary Report') }}</a>
                                    {!! Form::close() !!}
                                </li>
                                @endif
                                @if ($best_seller_active)
                                <li class="nav-item" id="best-seller-report-menu">
                                    <a class="nav-link" href="{{ url('report/best_seller') }}">{{ trans('file.Best Seller') }}</a>
                                </li>
                                @endif
                                @if ($product_report_active)
                                <li class="nav-item" id="product-report-menu">
                                    {!! Form::open(['route' => 'report.product', 'method' => 'get', 'id' => 'product-report-form']) !!}
                                    <input type="hidden" name="start_date" value="{{ date('Y-m') . '-' . '01' }}" />
                                    <input type="hidden" name="end_date" value="{{ date('Y-m-d') }}" />
                                    <input type="hidden" name="warehouse_id" value="0" />
                                    <a class="nav-link" id="report-link" href="">{{ trans('file.Product Report') }}</a>
                                    {!! Form::close() !!}
                                </li>
                                @endif
                                @if ($daily_sale_active)
                                <li class="nav-item" id="daily-sale-report-menu">
                                    <a class="nav-link" href="{{ url('report/daily_sale/' . date('Y') . '/' . date('m')) }}">{{ trans('file.Daily Sale') }}</a>
                                </li>
                                @endif
                                @if ($monthly_sale_active)
                                <li class="nav-item" id="monthly-sale-report-menu">
                                    <a class="nav-link" href="{{ url('report/monthly_sale/' . date('Y')) }}">{{ trans('file.Monthly Sale') }}</a>
                                </li>
                                @endif
                                @if ($daily_purchase_active)
                                <li class="nav-item" id="daily-purchase-report-menu">
                                    <a class="nav-link" href="{{ url('report/daily_purchase/' . date('Y') . '/' . date('m')) }}">{{ trans('file.Daily Purchase') }}</a>
                                </li>
                                @endif
                                @if ($monthly_purchase_active)
                                <li class="nav-item" id="monthly-purchase-report-menu">
                                    <a class="nav-link" href="{{ url('report/monthly_purchase/' . date('Y')) }}">{{ trans('file.Monthly Purchase') }}</a>
                                </li>
                                @endif
                                @if ($sale_report_active)
                                <li class="nav-item" id="sale-report-menu">
                                    {!! Form::open(['route' => 'report.sale', 'method' => 'post', 'id' => 'sale-report-form']) !!}
                                    <input type="hidden" name="start_date" value="{{ date('Y-m') . '-' . '01' }}" />
                                    <input type="hidden" name="end_date" value="{{ date('Y-m-d') }}" />
                                    <input type="hidden" name="warehouse_id" value="0" />
                                    <a class="nav-link" id="sale-report-link" href="">{{ trans('file.Sale Report') }}</a>
                                    {!! Form::close() !!}
                                </li>
                                @endif
                                @if ($sale_report_chart_active)
                                <li class="nav-item" id="sale-report-chart-menu">
                                    {!! Form::open(['route' => 'report.saleChart', 'method' => 'post', 'id' => 'sale-report-chart-form']) !!}
                                    <input type="hidden" name="start_date" value="{{ date('Y-m') . '-' . '01' }}" />
                                    <input type="hidden" name="end_date" value="{{ date('Y-m-d') }}" />
                                    <input type="hidden" name="warehouse_id" value="0" />
                                    <input type="hidden" name="time_period" value="weekly" />
                                    <a class="nav-link" id="sale-report-chart-link" href="">{{ trans('file.Sale Report Chart') }}</a>
                                    {!! Form::close() !!}
                                </li>
                                @endif
                                @if ($payment_report_active)
                                <li class="nav-item" id="payment-report-menu">
                                    {!! Form::open(['route' => 'report.paymentByDate', 'method' => 'post', 'id' => 'payment-report-form']) !!}
                                    <input type="hidden" name="start_date" value="{{ date('Y-m') . '-' . '01' }}" />
                                    <input type="hidden" name="end_date" value="{{ date('Y-m-d') }}" />
                                    <a class="nav-link" id="payment-report-link" href="">{{ trans('file.Payment Report') }}</a>
                                    {!! Form::close() !!}
                                </li>
                                @endif
                                @if ($purchase_report_active)
                                <li class="nav-item" id="purchase-report-menu">
                                    {!! Form::open(['route' => 'report.purchase', 'method' => 'post', 'id' => 'purchase-report-form']) !!}
                                    <input type="hidden" name="start_date" value="{{ date('Y-m') . '-' . '01' }}" />
                                    <input type="hidden" name="end_date" value="{{ date('Y-m-d') }}" />
                                    <input type="hidden" name="warehouse_id" value="0" />
                                    <a class="nav-link" id="purchase-report-link" href="">{{ trans('file.Purchase Report') }}</a>
                                    {!! Form::close() !!}
                                </li>
                                @endif
                                @if ($customer_report_active)
                                <li class="nav-item" id="customer-report-menu">
                                    <a class="nav-link" id="customer-report-link" href="">{{ trans('file.Customer Report') }}</a>
                                </li>
                                @endif
                                @if ($due_report_active)
                                <li class="nav-item" id="due-report-menu">
                                    {!! Form::open(['route' => 'report.customerDueByDate', 'method' => 'post', 'id' => 'customer-due-report-form']) !!}
                                    <input type="hidden" name="start_date" value="{{ date('Y-m-d', strtotime('-1 year')) }}" />
                                    <input type="hidden" name="end_date" value="{{ date('Y-m-d') }}" />
                                    <a class="nav-link" id="due-report-link" href="">{{ trans('file.Customer Due Report') }}</a>
                                    {!! Form::close() !!}
                                </li>
                                @endif
                                @if ($supplier_report_active)
                                <li class="nav-item" id="supplier-report-menu">
                                    <a class="nav-link" id="supplier-report-link" href="">{{ trans('file.Supplier Report') }}</a>
                                </li>
                                @endif
                                @if ($supplier_due_report_active)
                                <li class="nav-item" id="supplier-due-report-menu">
                                    {!! Form::open(['route' => 'report.supplierDueByDate', 'method' => 'post', 'id' => 'supplier-due-report-form']) !!}
                                    <input type="hidden" name="start_date" value="{{ date('Y-m-d', strtotime('-1 year')) }}" />
                                    <input type="hidden" name="end_date" value="{{ date('Y-m-d') }}" />
                                    <a class="nav-link" id="supplier-due-report-link" href="">{{ trans('file.Supplier Due Report') }}</a>
                                    {!! Form::close() !!}
                                </li>
                                @endif
                                @if ($warehouse_report_active)
                                <li class="nav-item" id="warehouse-report-menu">
                                    <a class="nav-link" id="warehouse-report-link" href="">{{ trans('file.Warehouse Report') }}</a>
                                </li>
                                @endif
                                @if ($warehouse_stock_report_active)
                                <li class="nav-item" id="warehouse-stock-report-menu">
                                    <a class="nav-link" href="{{ route('report.warehouseStock') }}">{{ trans('file.Warehouse Stock Chart') }}</a>
                                </li>
                                @endif
                                @if ($product_expiry_report_active)
                                <li class="nav-item" id="productExpiry-report-menu">
                                    <a class="nav-link" href="{{ route('report.productExpiry') }}">{{ trans('file.Product Expiry Report') }}</a>
                                </li>
                                @endif
                                @if ($product_qty_alert_active)
                                <li class="nav-item" id="qtyAlert-report-menu">
                                    <a class="nav-link" href="{{ route('report.qtyAlert') }}">{{ trans('file.Product Quantity Alert') }}</a>
                                </li>
                                @endif
                                @if ($dso_report_active)
                                <li class="nav-item" id="daily-sale-objective-menu">
                                    <a class="nav-link" href="{{ route('report.dailySaleObjective') }}">{{ trans('file.Daily Sale Objective Report') }}</a>
                                </li>
                                @endif
                                @if ($user_report_active)
                                <li class="nav-item" id="user-report-menu">
                                    <a class="nav-link" id="user-report-link" href="">{{ trans('file.User Report') }}</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                    @endif

                    <li class="nav-item dropdown"><a class="nav-link" href="#settingCollapse" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="settingCollapse">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="nav-link-icon" height="18" width="18"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7.77069 9.50524C7.60364 9.43126 7.45391 9.32316 7.33112 9.18788L6.70112 8.48788C6.5212 8.28484 6.28225 8.14317 6.01778 8.08272C5.7533 8.02228 5.47654 8.0461 5.22627 8.15083C4.97601 8.25557 4.76478 8.43598 4.62219 8.66678C4.4796 8.89758 4.41279 9.16721 4.43112 9.43788V10.3679C4.44125 10.5505 4.41275 10.7331 4.34748 10.9039C4.28221 11.0747 4.18165 11.2298 4.05235 11.3591C3.92306 11.4884 3.76795 11.589 3.59714 11.6542C3.42634 11.7195 3.24369 11.748 3.06112 11.7379L2.12112 11.6879C1.85153 11.6753 1.58463 11.7463 1.35691 11.8911C1.12919 12.036 0.951762 12.2476 0.848892 12.4971C0.746023 12.7467 0.72273 13.0219 0.782196 13.2851C0.841663 13.5484 0.980987 13.7868 1.18112 13.9679L1.88112 14.5879C2.01927 14.7148 2.129 14.8695 2.20311 15.0419C2.27722 15.2142 2.31403 15.4003 2.31112 15.5879C2.31532 15.7757 2.2791 15.9621 2.2049 16.1347C2.13071 16.3072 2.02029 16.4618 1.88112 16.5879L1.18112 17.2179C0.981519 17.3992 0.842717 17.6376 0.783657 17.9007C0.724597 18.1638 0.748157 18.4387 0.85112 18.6879C0.954125 18.9362 1.13156 19.1464 1.359 19.2897C1.58644 19.433 1.8527 19.5022 2.12112 19.4879H3.06112C3.24369 19.4778 3.42634 19.5063 3.59714 19.5715C3.76795 19.6368 3.92306 19.7374 4.05235 19.8666C4.18165 19.9959 4.28221 20.1511 4.34748 20.3219C4.41275 20.4927 4.44125 20.6753 4.43112 20.8579V21.7879C4.4151 22.0577 4.48357 22.3258 4.62702 22.5549C4.77046 22.784 4.98174 22.9626 5.23147 23.066C5.48119 23.1694 5.75693 23.1925 6.02034 23.1318C6.28374 23.0712 6.5217 22.93 6.70112 22.7279L7.33112 22.0379C7.45391 21.9026 7.60364 21.7945 7.77069 21.7205C7.93775 21.6466 8.11842 21.6083 8.30112 21.6083C8.48382 21.6083 8.6645 21.6466 8.83155 21.7205C8.9986 21.7945 9.14833 21.9026 9.27112 22.0379L9.90112 22.7279C10.0805 22.93 10.3185 23.0712 10.5819 23.1318C10.8453 23.1925 11.1211 23.1694 11.3708 23.066C11.6205 22.9626 11.8318 22.784 11.9752 22.5549C12.1187 22.3258 12.1871 22.0577 12.1711 21.7879V20.8579C12.161 20.6753 12.1895 20.4927 12.2548 20.3219C12.32 20.1511 12.4206 19.9959 12.5499 19.8666C12.6792 19.7374 12.8343 19.6368 13.0051 19.5715C13.1759 19.5063 13.3586 19.4778 13.5411 19.4879H14.4811C14.7495 19.5022 15.0158 19.433 15.2432 19.2897C15.4707 19.1464 15.6481 18.9362 15.7511 18.6879C15.8541 18.4387 15.8776 18.1638 15.8186 17.9007C15.7595 17.6376 15.6207 17.3992 15.4211 17.2179L14.7211 16.5879C14.582 16.4618 14.4715 16.3072 14.3973 16.1347C14.3231 15.9621 14.2869 15.7757 14.2911 15.5879C14.2882 15.4003 14.325 15.2142 14.3991 15.0419C14.4732 14.8695 14.583 14.7148 14.7211 14.5879L15.4211 13.9679C15.6213 13.7868 15.7606 13.5484 15.82 13.2851C15.8795 13.0219 15.8562 12.7467 15.7533 12.4971C15.6505 12.2476 15.4731 12.036 15.2453 11.8911C15.0176 11.7463 14.7507 11.6753 14.4811 11.6879L13.5411 11.7379C13.3586 11.748 13.1759 11.7195 13.0051 11.6542C12.8343 11.589 12.6792 11.4884 12.5499 11.3591C12.4206 11.2298 12.32 11.0747 12.2548 10.9039C12.1895 10.7331 12.161 10.5505 12.1711 10.3679V9.43788C12.1895 9.16721 12.1226 8.89758 11.98 8.66678C11.8375 8.43598 11.6262 8.25557 11.376 8.15083C11.1257 8.0461 10.8489 8.02228 10.5845 8.08272C10.32 8.14317 10.081 8.28484 9.90112 8.48788L9.27112 9.18788C9.14833 9.32316 8.9986 9.43126 8.83155 9.50524C8.6645 9.57922 8.48382 9.61743 8.30112 9.61743C8.11842 9.61743 7.93775 9.57922 7.77069 9.50524Z"></path><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.30114 17.4379C9.33944 17.4379 10.1811 16.5962 10.1811 15.5579C10.1811 14.5196 9.33944 13.6779 8.30114 13.6779C7.26285 13.6779 6.42114 14.5196 6.42114 15.5579C6.42114 16.5962 7.26285 17.4379 8.30114 17.4379Z"></path><path stroke="currentColor" stroke-width="1.5" d="M18.1565 6.23828C17.8804 6.23828 17.6565 6.01442 17.6565 5.73828C17.6565 5.46214 17.8804 5.23828 18.1565 5.23828"></path><path stroke="currentColor" stroke-width="1.5" d="M18.1565 6.23828C18.4326 6.23828 18.6565 6.01442 18.6565 5.73828C18.6565 5.46214 18.4326 5.23828 18.1565 5.23828"></path><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16.1347 1.83506C16.1409 1.62338 16.2152 1.41935 16.3466 1.25325C16.478 1.08716 16.6594 0.967851 16.8639 0.91304C17.0685 0.85823 17.2853 0.870838 17.4821 0.948992C17.6789 1.02715 17.8453 1.16668 17.9565 1.34689L18.551 2.30113C18.6493 2.45959 18.8042 2.57479 18.9842 2.62343C19.1643 2.67207 19.3561 2.65052 19.5209 2.56313L20.508 2.03729C20.6955 1.93854 20.9096 1.90249 21.1191 1.93443C21.3285 1.96638 21.5222 2.06463 21.6716 2.21476C21.8211 2.3649 21.9185 2.559 21.9495 2.76857C21.9805 2.97814 21.9435 3.19214 21.8439 3.37912L21.3171 4.37019C21.2295 4.53545 21.2077 4.72774 21.2561 4.90841C21.3045 5.08907 21.4195 5.24471 21.578 5.34404L22.5273 5.9411C22.7071 6.05324 22.8461 6.22006 22.924 6.41706C23.002 6.61406 23.0147 6.83085 22.9603 7.03561C22.9059 7.24036 22.7873 7.42229 22.6219 7.55467C22.4565 7.68705 22.253 7.7629 22.0413 7.7711L20.9235 7.80929C20.7371 7.816 20.5602 7.89324 20.4286 8.02539C20.297 8.15754 20.2205 8.33473 20.2145 8.52115L20.179 9.64113C20.1727 9.85281 20.0984 10.0568 19.967 10.2229C19.8357 10.389 19.6542 10.5083 19.4497 10.5631C19.2451 10.618 19.0284 10.6053 18.8315 10.5272C18.6347 10.449 18.4683 10.3095 18.3571 10.1293L17.762 9.17525C17.6638 9.0168 17.509 8.90157 17.3291 8.85289C17.1492 8.80422 16.9575 8.82572 16.7928 8.91305L15.8049 9.43908C15.6175 9.53784 15.4033 9.57389 15.1939 9.54194C14.9844 9.51 14.7908 9.41175 14.6413 9.26161C14.4918 9.11148 14.3944 8.91737 14.3634 8.7078C14.3324 8.49823 14.3694 8.28424 14.469 8.09725L14.9933 7.10534C15.0809 6.94007 15.1027 6.74778 15.0543 6.56712C15.0059 6.38645 14.8909 6.23081 14.7324 6.13148L13.7831 5.53748C13.6034 5.42533 13.4643 5.25851 13.3864 5.06151C13.3085 4.86452 13.2958 4.64772 13.3501 4.44296C13.4045 4.23821 13.5231 4.05628 13.6885 3.92391C13.8539 3.79153 14.0574 3.71567 14.2691 3.70748L15.3877 3.66909C15.5739 3.66238 15.7507 3.58515 15.8822 3.45302C16.0137 3.32089 16.0901 3.14374 16.0959 2.95743L16.1347 1.83506Z"></path></svg>
                        <span>{{ trans('file.settings') }}</span></a>
                        <div class="collapse" id="settingCollapse">
                            <ul class="nav flex-column">
                                <?php
                                $all_notification_permission_active = DB::table('permissions')
                                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                                    ->where([['permissions.name', 'all_notification'], ['role_id', $role->id]])
                                    ->first();

                                $send_notification_permission_active = DB::table('permissions')
                                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                                    ->where([['permissions.name', 'send_notification'], ['role_id', $role->id]])
                                    ->first();

                                $warehouse_permission_active = DB::table('permissions')
                                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                                    ->where([['permissions.name', 'warehouse'], ['role_id', $role->id]])
                                    ->first();

                                $customer_group_permission_active = DB::table('permissions')
                                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                                    ->where([['permissions.name', 'customer_group'], ['role_id', $role->id]])
                                    ->first();

                                $brand_permission_active = DB::table('permissions')
                                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                                    ->where([['permissions.name', 'brand'], ['role_id', $role->id]])
                                    ->first();

                                $unit_permission_active = DB::table('permissions')
                                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                                    ->where([['permissions.name', 'unit'], ['role_id', $role->id]])
                                    ->first();

                                $currency_permission_active = DB::table('permissions')
                                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                                    ->where([['permissions.name', 'currency'], ['role_id', $role->id]])
                                    ->first();

                                $tax_permission_active = DB::table('permissions')
                                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                                    ->where([['permissions.name', 'tax'], ['role_id', $role->id]])
                                    ->first();

                                $general_setting_permission_active = DB::table('permissions')
                                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                                    ->where([['permissions.name', 'general_setting'], ['role_id', $role->id]])
                                    ->first();

                                $backup_database_permission_active = DB::table('permissions')
                                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                                    ->where([['permissions.name', 'backup_database'], ['role_id', $role->id]])
                                    ->first();

                                $mail_setting_permission_active = DB::table('permissions')
                                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                                    ->where([['permissions.name', 'mail_setting'], ['role_id', $role->id]])
                                    ->first();

                                $sms_setting_permission_active = DB::table('permissions')
                                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                                    ->where([['permissions.name', 'sms_setting'], ['role_id', $role->id]])
                                    ->first();

                                $create_sms_permission_active = DB::table('permissions')
                                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                                    ->where([['permissions.name', 'create_sms'], ['role_id', $role->id]])
                                    ->first();

                                $pos_setting_permission_active = DB::table('permissions')
                                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                                    ->where([['permissions.name', 'pos_setting'], ['role_id', $role->id]])
                                    ->first();

                                $hrm_setting_permission_active = DB::table('permissions')
                                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                                    ->where([['permissions.name', 'hrm_setting'], ['role_id', $role->id]])
                                    ->first();

                                $reward_point_setting_permission_active = DB::table('permissions')
                                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                                    ->where([['permissions.name', 'reward_point_setting'], ['role_id', $role->id]])
                                    ->first();

                                $discount_plan_permission_active = DB::table('permissions')
                                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                                    ->where([['permissions.name', 'discount_plan'], ['role_id', $role->id]])
                                    ->first();

                                $discount_permission_active = DB::table('permissions')
                                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                                    ->where([['permissions.name', 'discount'], ['role_id', $role->id]])
                                    ->first();
                                ?>
                                @if ($role->id <= 2) <li class="nav-item" id="role-menu"><a class="nav-link" href="{{ route('role.index') }}">{{ trans('file.Role Permission') }}</a>
                    </li>
                    @endif
                    @if ($discount_plan_permission_active)
                    <li class="nav-item" id="discount-plan-list-menu"><a class="nav-link" href="{{ route('discount-plans.index') }}">{{ trans('file.Discount Plan') }}</a>
                    </li>
                    @endif
                    @if ($discount_permission_active)
                    <li class="nav-item" id="discount-list-menu"><a class="nav-link" href="{{ route('discounts.index') }}">{{ trans('file.Discount') }}</a>
                    </li>
                    @endif
                    @if ($all_notification_permission_active)
                    <li class="nav-item" id="notification-list-menu">
                        <a class="nav-link" href="{{ route('notifications.index') }}">{{ trans('file.All Notification') }}</a>
                    </li>
                    @endif
                    @if ($send_notification_permission_active)
                    <li class="nav-item" id="notification-menu">
                        <a class="nav-link" href="" id="send-notification">{{ trans('file.Send Notification') }}</a>
                    </li>
                    @endif
                    @if ($warehouse_permission_active)
                    <li class="nav-item" id="warehouse-menu"><a class="nav-link" href="{{ route('warehouse.index') }}">{{ trans('file.Warehouse') }}</a>
                    </li>
                    @endif
                    @if ($customer_group_permission_active)
                    <li class="nav-item" id="customer-group-menu"><a class="nav-link" href="{{ route('customer_group.index') }}">{{ trans('file.Customer Group') }}</a>
                    </li>
                    @endif
                    @if ($brand_permission_active)
                    <li class="nav-item" id="brand-menu"><a class="nav-link" href="{{ route('brand.index') }}">{{ trans('file.Brand') }}</a>
                    </li>
                    @endif
                    @if ($unit_permission_active)
                    <li class="nav-item" id="unit-menu"><a class="nav-link" href="{{ route('unit.index') }}">{{ trans('file.Unit') }}</a>
                    </li>
                    @endif
                    @if ($currency_permission_active)
                    <li class="nav-item" id="currency-menu"><a class="nav-link" href="{{ route('currency.index') }}">{{ trans('file.Currency') }}</a>
                    </li>
                    @endif
                    @if ($tax_permission_active)
                    <li class="nav-item" id="tax-menu"><a class="nav-link" href="{{ route('tax.index') }}">{{ trans('file.Tax') }}</a></li>
                    @endif
                    <li class="nav-item" id="user-menu"><a class="nav-link" href="{{ route('user.profile', ['id' => Auth::id()]) }}">{{ trans('file.User Profile') }}</a>
                    </li>
                    @if ($create_sms_permission_active)
                    <li class="nav-item" id="create-sms-menu"><a class="nav-link" href="{{ route('setting.createSms') }}">{{ trans('file.Create SMS') }}</a>
                    </li>
                    @endif
                    @if ($backup_database_permission_active)
                    <li class="nav-item"><a class="nav-link" href="{{ route('setting.backup') }}">{{ trans('file.Backup Database') }}</a>
                    </li>
                    @endif
                    @if ($general_setting_permission_active)
                    <li class="nav-item" id="general-setting-menu"><a class="nav-link" href="{{ route('setting.general') }}">{{ trans('file.General Setting') }}</a>
                    </li>
                    @endif
                    @if ($mail_setting_permission_active)
                    <li class="nav-item" id="mail-setting-menu"><a class="nav-link" href="{{ route('setting.mail') }}">{{ trans('file.Mail Setting') }}</a>
                    </li>
                    @endif
                    @if ($reward_point_setting_permission_active)
                    <li class="nav-item" id="reward-point-setting-menu"><a class="nav-link" href="{{ route('setting.rewardPoint') }}">{{ trans('file.Reward Point Setting') }}</a>
                    </li>
                    @endif
                    @if ($sms_setting_permission_active)
                    <li class="nav-item" id="sms-setting-menu"><a class="nav-link" href="{{ route('setting.sms') }}">{{ trans('file.SMS Setting') }}</a>
                    </li>
                    @endif
                    @if ($pos_setting_permission_active)
                    <li class="nav-item" id="pos-setting-menu"><a class="nav-link" href="{{ route('setting.pos') }}">POS
                            {{ trans('file.settings') }}</a></li>
                    @endif
                    @if ($hrm_setting_permission_active)
                    <li class="nav-item" id="hrm-setting-menu"><a class="nav-link" href="{{ route('setting.hrm') }}">
                            {{ trans('file.HRM Setting') }}</a></li>
                    @endif
                </ul>
            </div>
            </li>
            @if (Auth::user()->role_id != 5)
            {{-- <li><a target="_blank" href="{{url('public/read_me')}}"> <i class="dripicons-information"></i><span>{{trans('file.Documentation')}}</span></a></li> --}}
            @endif
            </ul>

        </div>


        </div>
    </nav>
<main>
        <!-- navbar-->
        <header class="navbar-header dashly container-fluid d-flex py-6 mb-4">
            <?php
            $empty_database_permission_active = DB::table('permissions')
                ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                ->where([
                    ['permissions.name', 'empty_database'],
                    ['role_id', $role->id]
            ])->first();
        ?>

            <!-- Search -->
            {{-- <form class="d-none d-md-inline-block me-auto">
                <div class="input-group input-group-merge">

                    <!-- Input -->
                    <input type="text" class="form-control bg-light-green border-light-green w-250px" placeholder="Search..." aria-label="Search for any term">

                    <!-- Button -->
                    <span class="input-group-text bg-light-green border-light-green p-0">

                        <!-- Button -->
                        <button class="btn btn-primary rounded-2 w-30px h-30px p-0 mx-1" type="button" aria-label="Search button">
                            <svg viewBox="0 0 24 24" height="16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M0.750 9.812 A9.063 9.063 0 1 0 18.876 9.812 A9.063 9.063 0 1 0 0.750 9.812 Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" transform="translate(-3.056 4.62) rotate(-23.025)"></path><path d="M16.221 16.22L23.25 23.25" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg>
                        </button>
                    </span>
                  </div>
            </form> --}}

            <!-- Top buttons -->
            <div class="d-flex align-items-center ms-auto me-n1 me-lg-n2">
                <!-- Dropdown -->
                <a id="btnFullscreen" data-toggle="tooltip" title="Full Screen"><i
                        class="dripicons-expand no-arrow d-flex align-items-center justify-content-center bg-white rounded-circle shadow-sm mx-1 mx-lg-2 w-40px h-40px link-secondary"></i></a>

                <!-- Separator -->
                @if ($sale_add_permission_active)
                            <div class="vr bg-gray-700 mx-2 mx-lg-3"></div>
                            <a href="{{ route('sale.pos') }}" class="btn btn-primary position-relative">

                                POS
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                  <i class="dripicons-shopping-bag"></i>
                                  <span class="visually-hidden">unread messages</span>
                                </span>
                              </a>
                @endif



                @if (\Auth::user()->role_id <= 2)
                <a class="d-flex align-items-center justify-content-center bg-white rounded-circle shadow-sm mx-1 mx-lg-2 w-40px h-40px link-secondary" href="{{ route('cashRegister.index') }}" data-toggle="tooltip" title="{{ trans('file.Cash Register List') }}"><i class="dripicons-archive"></i></a>
                @endif

                @if ($alert_product + count(\Auth::user()->unreadNotifications) > 0)
                    <div class="dropdown">
                        <a class="dropdown-toggle no-arrow d-flex align-items-center justify-content-center bg-white rounded-circle shadow-sm mx-1 mx-lg-2 w-40px h-40px link-secondary"
                            href="#" title="{{ __('Notifications') }}" id="notification-icon"
                            title="{{ __('Notifications') }}" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <svg viewBox="0 0 24 24" height="18" width="18"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M10,21.75a2.087,2.087,0,0,0,4.005,0" fill="none"
                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5"></path>
                                <path d="M12 3L12 0.75" fill="none" stroke="currentColor"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
                                <path
                                    d="M12,3a7.5,7.5,0,0,1,7.5,7.5c0,7.046,1.5,8.25,1.5,8.25H3s1.5-1.916,1.5-8.25A7.5,7.5,0,0,1,12,3Z"
                                    fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="1.5"></path>
                            </svg><span
                                class="badge badge-danger notification-number">{{ $alert_product + count(\Auth::user()->unreadNotifications) }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="notification-icon">
                            <li><a href="{{ route('report.qtyAlert') }}" class="dropdown-item"><span
                                        class="green-badge"></span> {{ $alert_product }} Products are running
                                    low in stock</a>
                            </li>
                            @foreach (\Auth::user()->unreadNotifications as $key => $notification)
                                <li> <a href="#"
                                        class="dropdown-item">{{ $notification->data['message'] }}</a>
                                </li>
                            @endforeach
                        </div>
                    </div>

                @endif
                <!-- Separator -->
                <div class="vr bg-gray-700 mx-2 mx-lg-3"></div>
                <div class="dropdown"><a id="toggle-btn" href="#"
                        class="menu-btn no-arrow d-flex align-items-center justify-content-center bg-white rounded-circle shadow-sm mx-1 mx-lg-2 w-40px h-40px link-secondary"><i
                            class="fa fa-bars"> </i></a></div>

                <div class="dropdown">
                    <span class="dropdown-toggle no-arrow" href="#" id="adminDropDownMenu"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i
                            class="fa-regular fa-user no-arrow d-flex align-items-center justify-content-center bg-white rounded-circle shadow-sm mx-1 mx-lg-2 w-40px h-40px link-secondary"></i>
                        {{ ucfirst(Auth::user()->name) }}
                    </span>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="adminDropDownMenu">
                        <li><a class="dropdown-item"
                                href="{{ route('user.profile', ['id' => Auth::id()]) }}"><i
                                    class="dripicons-user"></i> {{ trans('file.profile') }}</a>
                        </li>
                        @if ($general_setting_permission_active)
                            <li> <a class="dropdown-item" href="{{ route('setting.general') }}"><i
                                        class="dripicons-gear"></i> {{ trans('file.settings') }}</a>
                            </li>
                        @endif
                        @if($empty_database_permission_active)
                        <li>
                        <a class="dropdown-item" onclick="return confirm('Are you sure want to delete? If you do this all of your data will be lost.')" href="{{route('setting.emptyDatabase')}}"><i class="dripicons-stack"></i> {{trans('file.Empty Database')}}</a>
                        </li>
                        @endif
                        <li><a class="dropdown-item"
                                href="{{ url('my-transactions/' . date('Y') . '/' . date('m')) }}"><i
                                    class="dripicons-swap"></i> {{ trans('file.My Transaction') }}</a>
                        </li>
                        @if (Auth::user()->role_id != 5)
                            <li> <a class="dropdown-item"
                                    href="{{ url('holidays/my-holiday/' . date('Y') . '/' . date('m')) }}"><i
                                        class="dripicons-vibrate"></i> {{ trans('file.My Holiday') }}</a>
                            </li>
                        @endif
                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                    class="dripicons-power"></i>
                                {{ trans('file.logout') }}
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </header>
        <!-- notification modal -->
        <div id="notification-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="exampleModalLabel" class="modal-title">{{ trans('file.Send Notification') }}</h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                    </div>
                    <div class="modal-body">
                        <p class="italic">
                            <small>{{ trans('file.The field labels marked with * are required input fields') }}.</small>
                        </p>
                        {!! Form::open(['route' => 'notifications.store', 'method' => 'post', 'files' => true]) !!}
                        <div class="row">
                            <?php
                            $lims_user_list = DB::table('users')
                                ->where([['is_active', true], ['id', '!=', \Auth::user()->id]])
                                ->get();
                            ?>
                            <div class="col-md-6 form-group">
                                <input type="hidden" name="sender_id" value="{{ \Auth::id() }}">
                                <label>{{ trans('file.User') }} *</label>
                                <select name="receiver_id" class="selectpicker form-control" required data-live-search="true" data-live-search-style="begins" title="Select user...">
                                    @foreach ($lims_user_list as $user)
                                    <option value="{{ $user->id }}">
                                        {{ $user->name . ' (' . $user->email . ')' }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>{{ trans('file.Attach Document') }}</label>
                                <input type="file" name="document" class="form-control">
                            </div>
                            <div class="col-md-12 form-group">
                                <label>{{ trans('file.Message') }} *</label>
                                <textarea rows="5" name="message" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ trans('file.submit') }}</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- end notification modal -->

        <!-- expense modal -->
        <div id="expense-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="exampleModalLabel" class="modal-title">{{ trans('file.Add Expense') }}</h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                    </div>
                    <div class="modal-body">
                        <p class="italic">
                            <small>{{ trans('file.The field labels marked with * are required input fields') }}.</small>
                        </p>
                        {!! Form::open(['route' => 'expenses.store', 'method' => 'post']) !!}
                        <?php
                        $lims_expense_category_list = DB::table('expense_categories')
                            ->where('is_active', true)
                            ->get();
                        if (Auth::user()->role_id > 2) {
                            $lims_warehouse_list = DB::table('warehouses')
                                ->where([['is_active', true], ['id', Auth::user()->warehouse_id]])
                                ->get();
                        } else {
                            $lims_warehouse_list = DB::table('warehouses')
                                ->where('is_active', true)
                                ->get();
                        }
                        $lims_account_list = \App\Account::where('is_active', true)->get();
                        ?>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>{{ trans('file.Date') }}</label>
                                <input type="text" name="created_at" class="form-control date" placeholder="Choose date" />
                            </div>
                            <div class="col-md-6 form-group">
                                <label>{{ trans('file.Expense Category') }} *</label>
                                <select name="expense_category_id" class="selectpicker form-control" required data-live-search="true" data-live-search-style="begins" title="Select Expense Category...">
                                    @foreach ($lims_expense_category_list as $expense_category)
                                    <option value="{{ $expense_category->id }}">
                                        {{ $expense_category->name . ' (' . $expense_category->code . ')' }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>{{ trans('file.Warehouse') }} *</label>
                                <select name="warehouse_id" class="selectpicker form-control" required data-live-search="true" data-live-search-style="begins" title="Select Outlet...">
                                    @foreach ($lims_warehouse_list as $warehouse)
                                    <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>{{ trans('file.Amount') }} *</label>
                                <input type="number" name="amount" step="any" required class="form-control">
                            </div>
                            <div class="col-md-6 form-group">
                                <label> {{ trans('file.Account') }}</label>
                                <select class="form-control selectpicker" name="account_id">
                                    @foreach ($lims_account_list as $account)
                                    @if ($account->is_default)
                                    <option selected value="{{ $account->id }}">{{ $account->name }}
                                        [{{ $account->account_no }}]</option>
                                    @else
                                    <option value="{{ $account->id }}">{{ $account->name }}
                                        [{{ $account->account_no }}]</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('file.Note') }}</label>
                            <textarea name="note" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ trans('file.submit') }}</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- end expense modal -->

        <!-- account modal -->
        <div id="account-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="exampleModalLabel" class="modal-title">{{ trans('file.Add Account') }}</h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                    </div>
                    <div class="modal-body">
                        <p class="italic">
                            <small>{{ trans('file.The field labels marked with * are required input fields') }}.</small>
                        </p>
                        {!! Form::open(['route' => 'accounts.store', 'method' => 'post']) !!}
                        <div class="form-group">
                            <label>{{ trans('file.Account No') }} *</label>
                            <input type="text" name="account_no" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label>{{ trans('file.name') }} *</label>
                            <input type="text" name="name" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label>{{ trans('file.Initial Balance') }}</label>
                            <input type="number" name="initial_balance" step="any" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>{{ trans('file.Note') }}</label>
                            <textarea name="note" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ trans('file.submit') }}</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- end account modal -->

        <!-- account statement modal -->
        <div id="account-statement-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="exampleModalLabel" class="modal-title">{{ trans('file.Account Statement') }}</h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                    </div>
                    <div class="modal-body">
                        <p class="italic">
                            <small>{{ trans('file.The field labels marked with * are required input fields') }}.</small>
                        </p>
                        {!! Form::open(['route' => 'accounts.statement', 'method' => 'post']) !!}
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label> {{ trans('file.Account') }}</label>
                                <select class="form-control selectpicker" name="account_id">
                                    @foreach ($lims_account_list as $account)
                                    <option value="{{ $account->id }}">{{ $account->name }}
                                        [{{ $account->account_no }}]</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label> {{ trans('file.Type') }}</label>
                                <select class="form-control selectpicker" name="type">
                                    <option value="0">{{ trans('file.All') }}</option>
                                    <option value="1">{{ trans('file.Debit') }}</option>
                                    <option value="2">{{ trans('file.Credit') }}</option>
                                </select>
                            </div>
                            <div class="col-md-12 form-group">
                                <label>{{ trans('file.Choose Your Date') }}</label>
                                <div class="input-group">
                                    <input type="text" class="account-statement-daterangepicker-field form-control" required />
                                    <input type="hidden" name="start_date" />
                                    <input type="hidden" name="end_date" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ trans('file.submit') }}</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- end account statement modal -->

        <!-- warehouse modal -->
        <div id="warehouse-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="exampleModalLabel" class="modal-title">{{ trans('file.Warehouse Report') }}</h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                    </div>
                    <div class="modal-body">
                        <p class="italic">
                            <small>{{ trans('file.The field labels marked with * are required input fields') }}.</small>
                        </p>
                        {!! Form::open(['route' => 'report.warehouse', 'method' => 'post']) !!}

                        <div class="form-group">
                            <label>{{ trans('file.Warehouse') }} *</label>
                            <select name="warehouse_id" class="selectpicker form-control" required data-live-search="true" id="warehouse-id" data-live-search-style="begins" title="Select outlet...">
                                @foreach ($lims_warehouse_list as $warehouse)
                                <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <input type="hidden" name="start_date" value="{{ date('Y-m') . '-' . '01' }}" />
                        <input type="hidden" name="end_date" value="{{ date('Y-m-d') }}" />

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ trans('file.submit') }}</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- end warehouse modal -->

        <!-- user modal -->
        <div id="user-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="exampleModalLabel" class="modal-title">{{ trans('file.User Report') }}</h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                    </div>
                    <div class="modal-body">
                        <p class="italic">
                            <small>{{ trans('file.The field labels marked with * are required input fields') }}.</small>
                        </p>
                        {!! Form::open(['route' => 'report.user', 'method' => 'post']) !!}
                        <?php
                        $lims_user_list = DB::table('users')
                            ->where('is_active', true)
                            ->get();
                        ?>
                        <div class="form-group">
                            <label>{{ trans('file.User') }} *</label>
                            <select name="user_id" class="selectpicker form-control" required data-live-search="true" id="user-id" data-live-search-style="begins" title="Select user...">
                                @foreach ($lims_user_list as $user)
                                <option value="{{ $user->id }}">
                                    {{ $user->name . ' (' . $user->phone . ')' }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <input type="hidden" name="start_date" value="{{ date('Y-m') . '-' . '01' }}" />
                        <input type="hidden" name="end_date" value="{{ date('Y-m-d') }}" />

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ trans('file.submit') }}</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- end user modal -->

        <!-- customer modal -->
        <div id="customer-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="exampleModalLabel" class="modal-title">{{ trans('file.Customer Report') }}</h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                    </div>
                    <div class="modal-body">
                        <p class="italic">
                            <small>{{ trans('file.The field labels marked with * are required input fields') }}.</small>
                        </p>
                        {!! Form::open(['route' => 'report.customer', 'method' => 'post']) !!}
                        <?php
                        $lims_customer_list = DB::table('customers')
                            ->where('is_active', true)
                            ->get();
                        ?>
                        <div class="form-group">
                            <label>{{ trans('file.customer') }} *</label>
                            <select name="customer_id" class="selectpicker form-control" required data-live-search="true" id="customer-id" data-live-search-style="begins" title="Select customer...">
                                @foreach ($lims_customer_list as $customer)
                                <option value="{{ $customer->id }}">
                                    {{ $customer->name . ' (' . $customer->phone_number . ')' }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <input type="hidden" name="start_date" value="{{ date('Y-m') . '-' . '01' }}" />
                        <input type="hidden" name="end_date" value="{{ date('Y-m-d') }}" />

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ trans('file.submit') }}</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- end customer modal -->

        <!-- supplier modal -->
        <div id="supplier-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="exampleModalLabel" class="modal-title">{{ trans('file.Supplier Report') }}</h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                    </div>
                    <div class="modal-body">
                        <p class="italic">
                            <small>{{ trans('file.The field labels marked with * are required input fields') }}.</small>
                        </p>
                        {!! Form::open(['route' => 'report.supplier', 'method' => 'post']) !!}
                        <?php
                        $lims_supplier_list = DB::table('suppliers')
                            ->where('is_active', true)
                            ->get();
                        ?>
                        <div class="form-group">
                            <label>{{ trans('file.Supplier') }} *</label>
                            <select name="supplier_id" class="selectpicker form-control" required data-live-search="true" id="supplier-id" data-live-search-style="begins" title="Select Supplier...">
                                @foreach ($lims_supplier_list as $supplier)
                                <option value="{{ $supplier->id }}">
                                    {{ $supplier->name . ' (' . $supplier->phone_number . ')' }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <input type="hidden" name="start_date" value="{{ date('Y-m') . '-' . '01' }}" />
                        <input type="hidden" name="end_date" value="{{ date('Y-m-d') }}" />

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ trans('file.submit') }}</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- end supplier modal -->

        <div style="display:none" id="content" class="animate-bottom">
            @yield('content')
        </div>

        <footer class="main-footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <p>&copy; {{ $general_setting->site_title }} | {{ trans('file.Developed') }}
                            {{ trans('file.By') }} <span class="external">{{ $general_setting->developed_by }}</span> | V 3.8
                        </p>
                    </div>
                </div>
            </div>
        </footer>

</main>
    @if (!config('database.connections.saleprosaas_landlord'))
    <script type="text/javascript" src="<?php echo asset('vendor/jquery/jquery.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/jquery/jquery-ui.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/jquery/bootstrap-datepicker.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/jquery/jquery.timepicker.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/popper.js/umd/popper.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('js/theme.bundle.js'); ?>"></script>

    <script type="text/javascript" src="<?php echo asset('vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/bootstrap-toggle/js/bootstrap-toggle.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/bootstrap/js/bootstrap-select.min.js'); ?>"></script>

    <script type="text/javascript" src="<?php echo asset('js/grasp_mobile_progress_circle-1.0.0.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/jquery.cookie/jquery.cookie.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/chart.js/Chart.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('js/charts-custom.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/jquery-validation/jquery.validate.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js'); ?>"></script>
    @if (Config::get('app.locale') == 'ar' || $general_setting->is_rtl)
    <script type="text/javascript" src="<?php echo asset('js/front_rtl.js'); ?>"></script>
    @else
    <script type="text/javascript" src="<?php echo asset('js/front.js'); ?>"></script>
    @endif

    @if (Route::current()->getName() != '/')
    <script type="text/javascript" src="<?php echo asset('vendor/daterange/js/moment.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/daterange/js/knockout-3.4.2.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/daterange/js/daterangepicker.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/tinymce/js/tinymce/tinymce.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('js/dropzone.js'); ?>"></script>

    <!-- table sorter js-->
    @if (Config::get('app.locale') == 'ar')
    <script type="text/javascript" src="<?php echo asset('vendor/datatable/pdfmake_arabic.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/datatable/vfs_fonts_arabic.js'); ?>"></script>
    @else
    <script type="text/javascript" src="<?php echo asset('vendor/datatable/pdfmake.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/datatable/vfs_fonts.js'); ?>"></script>
    @endif
    <script type="text/javascript" src="<?php echo asset('vendor/datatable/jquery.dataTables.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/datatable/dataTables.bootstrap4.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/datatable/dataTables.buttons.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/datatable/jszip.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/datatable/buttons.bootstrap4.min.js'); ?>">
        ">
    </script>
    <script type="text/javascript" src="<?php echo asset('vendor/datatable/buttons.colVis.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/datatable/buttons.html5.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/datatable/buttons.printnew.js'); ?>"></script>

    <script type="text/javascript" src="<?php echo asset('vendor/datatable/sum().js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/datatable/dataTables.checkboxes.min.js'); ?>"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js">
    </script>
    @endif
    @else
    <script type="text/javascript" src="<?php echo asset('../../vendor/jquery/jquery.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/jquery/jquery-ui.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/jquery/bootstrap-datepicker.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/jquery/jquery.timepicker.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/popper.js/umd/popper.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/bootstrap-toggle/js/bootstrap-toggle.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/bootstrap/js/bootstrap-select.min.js'); ?>"></script>

    <script type="text/javascript" src="<?php echo asset('../../js/grasp_mobile_progress_circle-1.0.0.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/jquery.cookie/jquery.cookie.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/chart.js/Chart.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('../../js/charts-custom.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/jquery-validation/jquery.validate.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js'); ?>"></script>
    @if (Config::get('app.locale') == 'ar' || $general_setting->is_rtl)
    <script type="text/javascript" src="<?php echo asset('../../js/front_rtl.js'); ?>"></script>
    @else
    <script type="text/javascript" src="<?php echo asset('../../js/front.js'); ?>"></script>
    @endif

    @if (Route::current()->getName() != '/')
    <script type="text/javascript" src="<?php echo asset('../../vendor/daterange/js/moment.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/daterange/js/knockout-3.4.2.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/daterange/js/daterangepicker.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/tinymce/js/tinymce/tinymce.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('../../js/dropzone.js'); ?>"></script>

    <!-- table sorter js-->
    @if (Config::get('app.locale') == 'ar')
    <script type="text/javascript" src="<?php echo asset('../../vendor/datatable/pdfmake_arabic.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/datatable/vfs_fonts_arabic.js'); ?>"></script>
    @else
    <script type="text/javascript" src="<?php echo asset('../../vendor/datatable/pdfmake.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/datatable/vfs_fonts.js'); ?>"></script>
    @endif
    <script type="text/javascript" src="<?php echo asset('../../vendor/datatable/jquery.dataTables.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/datatable/dataTables.bootstrap4.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/datatable/dataTables.buttons.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/datatable/buttons.bootstrap4.min.js'); ?>">
        ">
    </script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/datatable/buttons.colVis.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/datatable/buttons.html5.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/datatable/buttons.printnew.js'); ?>"></script>

    <script type="text/javascript" src="<?php echo asset('../../vendor/datatable/sum().js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('../../vendor/datatable/dataTables.checkboxes.min.js'); ?>"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js">
    </script>
    @endif
    @endif
    @stack('scripts')
      <script type="text/javascript">
    $(function(){
    var current = location.pathname;
    $('.nav-item a').each(function(){
        var $this = $(this);
        // if the current path is like this link, make it active
        if($this.attr('href').indexOf(current) !== -1){
            $this.addClass('active');
            $this.closest('li a').addClass('active');
        };

    })
})


        var theme = <?php echo json_encode($theme); ?>;
        if (theme == 'dark') {
            $('body').addClass('dark-mode');
            $('#switch-theme i').addClass('dripicons-brightness-low');
        } else {
            $('body').removeClass('dark-mode');
            $('#switch-theme i').addClass('dripicons-brightness-max');
        }
            $('#switch-theme').click(function() {
            if (theme == 'light') {
                theme = 'dark';
                var url = <?php echo json_encode(route('switchTheme', 'dark')); ?>;
                $('body').addClass('dark-mode');
                $('#switch-theme i').addClass('dripicons-brightness-low');
            } else {
                theme = 'light';
                var url = <?php echo json_encode(route('switchTheme', 'light')); ?>;
                $('body').removeClass('dark-mode');
                $('#switch-theme i').addClass('dripicons-brightness-max');
            }

            $.get(url, function(data) {
                console.log('theme changed to ' + theme);
            });
        });

        var alert_product = <?php echo json_encode($alert_product); ?>;

        if ($(window).outerWidth() > 1199) {
            $('nav.side-navbar').removeClass('shrink');
        }

        function myFunction() {
            setTimeout(showPage, 100);
        }

        function showPage() {
            document.getElementById("loader").style.display = "none";
            document.getElementById("content").style.display = "block";
        }

        $("div.alert").delay(4000).slideUp(800);

        function confirmDelete() {
            if (confirm("Are you sure want to delete?")) {
                return true;
            }
            return false;
        }

        $("li#notification-icon").on("click", function(argument) {
            $.get('notifications/mark-as-read', function(data) {
                $("span.notification-number").text(alert_product);
            });
        });

        $("a#add-expense").click(function(e) {
            e.preventDefault();
            $('#expense-modal').modal();
        });

        $("a#send-notification").click(function(e) {
            e.preventDefault();
            $('#notification-modal').modal();
        });

        $("a#add-account").click(function(e) {
            e.preventDefault();
            $('#account-modal').modal();
        });

        $("a#account-statement").click(function(e) {
            e.preventDefault();
            $('#account-statement-modal').modal();
        });

        $("a#profitLoss-link").click(function(e) {
            e.preventDefault();
            $("#profitLoss-report-form").submit();
        });

        $("a#report-link").click(function(e) {
            e.preventDefault();
            $("#product-report-form").submit();
        });

        $("a#purchase-report-link").click(function(e) {
            e.preventDefault();
            $("#purchase-report-form").submit();
        });

        $("a#sale-report-link").click(function(e) {
            e.preventDefault();
            $("#sale-report-form").submit();
        });
        $("a#sale-report-chart-link").click(function(e) {
            e.preventDefault();
            $("#sale-report-chart-form").submit();
        });

        $("a#payment-report-link").click(function(e) {
            e.preventDefault();
            $("#payment-report-form").submit();
        });

        $("a#warehouse-report-link").click(function(e) {
            e.preventDefault();
            $('#warehouse-modal').modal();
        });

        $("a#user-report-link").click(function(e) {
            e.preventDefault();
            $('#user-modal').modal();
        });

        $("a#customer-report-link").click(function(e) {
            e.preventDefault();
            $('#customer-modal').modal();
        });

        $("a#supplier-report-link").click(function(e) {
            e.preventDefault();
            $('#supplier-modal').modal();
        });

        $("a#due-report-link").click(function(e) {
            e.preventDefault();
            $("#customer-due-report-form").submit();
        });

        $("a#supplier-due-report-link").click(function(e) {
            e.preventDefault();
            $("#supplier-due-report-form").submit();
        });

        $(".account-statement-daterangepicker-field").daterangepicker({
            callback: function(startDate, endDate, period) {
                var start_date = startDate.format('YYYY-MM-DD');
                var end_date = endDate.format('YYYY-MM-DD');
                var title = start_date + ' To ' + end_date;
                $(this).val(title);
                $('#account-statement-modal input[name="start_date"]').val(start_date);
                $('#account-statement-modal input[name="end_date"]').val(end_date);
            }
        });

        $('.date').datepicker({
            format: "dd-mm-yyyy",
            autoclose: true,
            todayHighlight: true
        });

        $('.selectpicker').selectpicker({
            style: 'btn-link',
        });
    </script>
</body>

</html>
