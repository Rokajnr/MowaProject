<!DOCTYPE html>
<html dir="@if (Config::get('app.locale') == 'ar' || $general_setting->is_rtl) {{ 'rtl' }} @endif">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
    <link rel="stylesheet" href="<?php echo asset('../../vendor/bootstrap/css/bootstrap.min.css'); ?>" type="text/css">
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

<body @if ($theme=='dark' ) class="dark-mode dripicons-brightness-low" @else class="" @endif onload="myFunction()">
    <div id="loader"></div>
    <!-- Side Navbar -->
    <nav id="mainNavbar" class="side-navbar navbar navbar-vertical navbar-expand-lg scrollbar bg-white navbar-light">
        <div class="container-fluid">
            <span class=" navbar-brand">
                @if ($general_setting->site_logo)
                <a href="{{ url('/') }}"><img src="{{ url('public/logo', $general_setting->site_logo) }}" width="115"></a>
                @else
                <a href="{{ url('/') }}">
                    <h1 class="d-inline">{{ $general_setting->site_title }}</h1>
                </a>
                @endif
            </span>
            <div class="navbar-collapse" id="sidenavCollapse">
                <ul class="navbar-nav mb-lg-7">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/') }}"> <i class="fa-light fa-house"></i><span>{{ __('file.dashboard') }}</span></a>
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
                            <i class="dripicons-list nav-link-icon"></i><span>{{ __('file.product') }}</span><span></a>
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
                            <i class="dripicons-card nav-link-icon"></i><span>{{ trans('file.Purchase') }}</span></a>
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
                            <i class="dripicons-cart nav-link-icon"></i><span>{{ trans('file.Sale') }}</span></a>
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
                    <li class="nav-item dropdown"><a class="nav-link" href="#expenseCollapse" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="expenseCollapse"> <i class="dripicons-wallet nav-link-icon"></i><span>{{ trans('file.Expense') }}</span></a>
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
                    <li class="nav-item dropdown"><a class="nav-link" href="#quotationCollapse" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="quotationCollapse"> <i class="dripicons-document nav-link-icon"></i><span>{{ trans('file.Quotation') }}</span><span></a>
                        <div class="collapse" id="quotationCollapse">
                            <ul class="nav flex-colum">
                                <li id="quotation-list-menu"><a href="{{ route('quotations.index') }}">{{ trans('file.Quotation List') }}</a>
                                </li>
                                <?php
                                $add_permission_active = DB::table('permissions')
                                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                                    ->where([['permissions.name', 'quotes-add'], ['role_id', $role->id]])
                                    ->first();
                                ?>
                                @if ($add_permission_active)
                                <li id="quotation-create-menu"><a href="{{ route('quotations.create') }}">{{ trans('file.Add Quotation') }}</a>
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
                    <li class="nav-item dropdown"><a class="nav-link" href="#transferCollapse" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="transferCollapse"> <i class="dripicons-export nav-link-icon"></i><span>{{ trans('file.Transfer') }}</span></a>
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
                    <li class="nav-item dropdown"><a class="nav-link" href="#returnCollapse" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="returnCollapse"> <i class="dripicons-return nav-link-icon"></i><span>{{ trans('file.return') }}</span></a>
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
                    <li class="nav-item dropdown"><a class="nav-link" href="#accountCollapse" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="accountCollapse"> <i class="dripicons-briefcase nav-link-icon"></i><span>{{ trans('file.Accounting') }}</span></a>
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
                    <li class="nav-item dropdown"><a class="nav-link" href="#hrmCollapse" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="hrmCollapse"> <i class="dripicons-user-group nav-link-icon"></i><span>HRM</span></a>
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
                    <li class="nav-item dropdown"><a class="nav-link" href="#peopleCollapse" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="peopleCollapse"> <i class="dripicons-user nav-link-icon"></i><span>{{ trans('file.People') }}</span></a>
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
                    <li class="nav-item dropdown"><a class="nav-link" href="#reportCollapse" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="reportCollapse"> <i class="dripicons-document-remove nav-link-icon"></i><span>{{ trans('file.Reports') }}</span></a>
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

                    <li class="nav-item dropdown"><a class="nav-link" href="#settingCollapse" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="settingCollapse"> <i class="dripicons-gear nav-link-icon"></i><span>{{ trans('file.settings') }}</span></a>
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


        <header class="container-fluid">
            <nav class="navbar">
                <a id="toggle-btn" href="#" class="menu-btn"><i class="fa fa-bars"> </i></a>


                <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                    <?php
                    $empty_database_permission_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'empty_database'], ['role_id', $role->id]])
                        ->first();
                    ?>
                    @if ($sale_add_permission_active)
                    <li class="nav-item"><a class="dropdown-item btn-pos btn-sm" href="{{ route('sale.pos') }}"><i class="dripicons-shopping-bag"></i><span>
                                POS</span></a></li>
                    @endif
                    <li class="nav-item"><a id="switch-theme" data-toggle="tooltip" title="{{ trans('file.Switch Theme') }}"><i class="dripicons-brightness-max"></i></a>
                    </li>
                    <li class="nav-item"><a id="btnFullscreen" data-toggle="tooltip" title="{{ trans('file.Full Screen') }}"><i class="dripicons-expand"></i></a></li>
                    @if (\Auth::user()->role_id <= 2) <li class="nav-item"><a href="{{ route('cashRegister.index') }}" data-toggle="tooltip" title="{{ trans('file.Cash Register List') }}"><i class="dripicons-archive"></i></a>
                        </li>
                        @endif
                        @if ($product_qty_alert_active &&
                        $alert_product + $dso_alert_product_no + count(\Auth::user()->unreadNotifications) > 0)
                        <li class="nav-item" id="notification-icon">
                            <a rel="nofollow" data-toggle="tooltip" title="{{ __('Notifications') }}" class="nav-link dropdown-item"><i class="dripicons-bell"></i><span class="badge badge-danger notification-number">{{ $alert_product + $dso_alert_product_no + count(\Auth::user()->unreadNotifications) }}</span>
                            </a>
                            <ul class="right-sidebar">
                                <li class="notifications">
                                    <a href="{{ route('report.qtyAlert') }}" class="btn btn-link">
                                        {{ $alert_product }} product exceeds alert quantity</a>
                                </li>
                                @if ($dso_alert_product_no)
                                <li class="notifications">
                                    <a href="{{ route('report.dailySaleObjective') }}" class="btn btn-link">
                                        {{ $dso_alert_product_no }} product could not fulfill daily sale
                                        objective</a>
                                </li>
                                @endif
                                @foreach (\Auth::user()->unreadNotifications as $key => $notification)
                                <li class="notifications">
                                    @if ($notification->data['document_name'])
                                    <a target="_blank" href="{{ url('public/documents/notification', $notification->data['document_name']) }}" class="btn btn-link">{{ $notification->data['message'] }}</a>
                                    @else
                                    <a href="#" class="btn btn-link">{{ $notification->data['message'] }}</a>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        @endif
                        @if (count(\Auth::user()->unreadNotifications) > 0)
                        <li class="nav-item" id="notification-icon">
                            <a rel="nofollow" data-toggle="tooltip" title="{{ __('Notifications') }}" class="nav-link dropdown-item"><i class="dripicons-bell"></i><span class="badge badge-danger notification-number">{{ count(\Auth::user()->unreadNotifications) }}</span>
                            </a>
                            <ul class="right-sidebar">
                                @foreach (\Auth::user()->unreadNotifications as $key => $notification)
                                <li class="notifications">
                                    @if ($notification->data['document_name'])
                                    <a target="_blank" href="{{ url('public/documents/notification', $notification->data['document_name']) }}" class="btn btn-link">{{ $notification->data['message'] }}</a>
                                    @else
                                    <a href="#" class="btn btn-link">{{ $notification->data['message'] }}</a>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a rel="nofollow" data-toggle="tooltip" class="nav-link dropdown-item"><i class="dripicons-user"></i> <span>{{ ucfirst(Auth::user()->name) }}</span> <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="right-sidebar">
                                <li>
                                    <a href="{{ route('user.profile', ['id' => Auth::id()]) }}"><i class="dripicons-user"></i> {{ trans('file.profile') }}</a>
                                </li>
                                @if ($general_setting_permission_active)
                                <li>
                                    <a href="{{ route('setting.general') }}"><i class="dripicons-gear"></i>
                                        {{ trans('file.settings') }}</a>
                                </li>
                                @endif
                                <li>
                                    <a href="{{ url('my-transactions/' . date('Y') . '/' . date('m')) }}"><i class="dripicons-swap"></i> {{ trans('file.My Transaction') }}</a>
                                </li>
                                @if (Auth::user()->role_id != 5)
                                <li>
                                    <a href="{{ url('holidays/my-holiday/' . date('Y') . '/' . date('m')) }}"><i class="dripicons-vibrate"></i> {{ trans('file.My Holiday') }}</a>
                                </li>
                                @endif
                                @if ($empty_database_permission_active)
                                <li>
                                    <a onclick="return confirm('Are you sure want to delete? If you do this all of your data will be lost.')" href="{{ route('setting.emptyDatabase') }}"><i class="dripicons-stack"></i>
                                        {{ trans('file.Empty Database') }}</a>
                                </li>
                                @endif
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"><i class="dripicons-power"></i>
                                        {{ trans('file.logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                </ul>
            </nav>
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
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/salepro/service-worker.js').then(function(registration) {
                    // Registration was successful
                    console.log('ServiceWorker registration successful with scope: ', registration.scope);
                }, function(err) {
                    // registration failed :(
                    console.log('ServiceWorker registration failed: ', err);
                });
            });
        }
    </script>
    <script type="text/javascript">
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
