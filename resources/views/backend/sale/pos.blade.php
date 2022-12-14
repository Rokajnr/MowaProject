@extends('backend.layout.top-head')
@section('content')
    @if ($errors->has('phone_number'))
        <div class="alert alert-danger alert-dismissible text-center">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>{{ $errors->first('phone_number') }}
        </div>
    @endif
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible text-center">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>{!! session()->get('message') !!}
        </div>
    @endif
    @if (session()->has('not_permitted'))
        <div class="alert alert-danger alert-dismissible text-center">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>{{ session()->get('not_permitted') }}
        </div>
    @endif
    <!-- Side Navbar -->
    <nav class="side-navbar">
        <span class="brand-big">
            @if ($general_setting->site_logo)
                <a href="{{ url('/') }}"><img src="{{ url('public/logo', $general_setting->site_logo) }}"
                        width="115"></a>
            @else
                <a href="{{ url('/') }}">
                    <h1 class="d-inline">{{ $general_setting->site_title }}</h1>
                </a>
            @endif
        </span>

        <ul id="side-main-menu" class="side-menu list-unstyled">
            <li><a href="{{ url('/') }}"> <i class="dripicons-meter"></i><span>{{ __('file.dashboard') }}</span></a>
            </li>
            <?php
            $role = DB::table('roles')->find(Auth::user()->role_id);
            $index_permission = DB::table('permissions')
                ->where('name', 'products-index')
                ->first();
            $index_permission_active = DB::table('role_has_permissions')
                ->where([['permission_id', $index_permission->id], ['role_id', $role->id]])
                ->first();

            $print_barcode = DB::table('permissions')
                ->where('name', 'print_barcode')
                ->first();
            $print_barcode_active = DB::table('role_has_permissions')
                ->where([['permission_id', $print_barcode->id], ['role_id', $role->id]])
                ->first();

            $stock_count = DB::table('permissions')
                ->where('name', 'stock_count')
                ->first();
            $stock_count_active = DB::table('role_has_permissions')
                ->where([['permission_id', $stock_count->id], ['role_id', $role->id]])
                ->first();

            $adjustment = DB::table('permissions')
                ->where('name', 'adjustment')
                ->first();
            $adjustment_active = DB::table('role_has_permissions')
                ->where([['permission_id', $adjustment->id], ['role_id', $role->id]])
                ->first();
            ?>

            <li><a href="#product" aria-expanded="false" data-toggle="collapse"> <i
                        class="dripicons-list"></i><span>{{ __('file.product') }}</span><span></a>
                <ul id="product" class="collapse list-unstyled ">
                    <li id="category-menu"><a href="{{ route('category.index') }}">{{ __('file.category') }}</a></li>
                    @if ($index_permission_active)
                        <li id="product-list-menu"><a
                                href="{{ route('products.index') }}">{{ __('file.product_list') }}</a>
                        </li>
                        <?php
                        $add_permission = DB::table('permissions')
                            ->where('name', 'products-add')
                            ->first();
                        $add_permission_active = DB::table('role_has_permissions')
                            ->where([['permission_id', $add_permission->id], ['role_id', $role->id]])
                            ->first();
                        ?>
                        @if ($add_permission_active)
                            <li id="product-create-menu"><a
                                    href="{{ route('products.create') }}">{{ __('file.add_product') }}</a></li>
                        @endif
                    @endif
                    @if ($print_barcode_active)
                        <li id="printBarcode-menu"><a
                                href="{{ route('product.printBarcode') }}">{{ __('file.print_barcode') }}</a></li>
                    @endif
                    @if ($adjustment_active)
                        <li id="adjustment-list-menu"><a
                                href="{{ route('qty_adjustment.index') }}">{{ trans('file.Adjustment List') }}</a></li>
                        <li id="adjustment-create-menu"><a
                                href="{{ route('qty_adjustment.create') }}">{{ trans('file.Add Adjustment') }}</a></li>
                    @endif
                    @if ($stock_count_active)
                        <li id="stock-count-menu"><a
                                href="{{ route('stock-count.index') }}">{{ trans('file.Stock Count') }}</a></li>
                    @endif
                </ul>
            </li>
            <?php
            $index_permission = DB::table('permissions')
                ->where('name', 'purchases-index')
                ->first();
            $index_permission_active = DB::table('role_has_permissions')
                ->where([['permission_id', $index_permission->id], ['role_id', $role->id]])
                ->first();
            ?>
            @if ($index_permission_active)
                <li><a href="#purchase" aria-expanded="false" data-toggle="collapse"> <i
                            class="dripicons-card"></i><span>{{ trans('file.Purchase') }}</span></a>
                    <ul id="purchase" class="collapse list-unstyled ">
                        <li id="purchase-list-menu"><a
                                href="{{ route('purchases.index') }}">{{ trans('file.Purchase List') }}</a></li>
                        <?php
                        $add_permission = DB::table('permissions')
                            ->where('name', 'purchases-add')
                            ->first();
                        $add_permission_active = DB::table('role_has_permissions')
                            ->where([['permission_id', $add_permission->id], ['role_id', $role->id]])
                            ->first();
                        ?>
                        @if ($add_permission_active)
                            <li id="purchase-create-menu"><a
                                    href="{{ route('purchases.create') }}">{{ trans('file.Add Purchase') }}</a></li>
                            <li id="purchase-import-menu"><a
                                    href="{{ url('purchases/purchase_by_csv') }}">{{ trans('file.Import Purchase By CSV') }}</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
            <?php
            $index_permission = DB::table('permissions')
                ->where('name', 'sales-index')
                ->first();
            $index_permission_active = DB::table('role_has_permissions')
                ->where([['permission_id', $index_permission->id], ['role_id', $role->id]])
                ->first();

            $gift_card_permission = DB::table('permissions')
                ->where('name', 'gift_card')
                ->first();
            $gift_card_permission_active = DB::table('role_has_permissions')
                ->where([['permission_id', $gift_card_permission->id], ['role_id', $role->id]])
                ->first();

            $coupon_permission = DB::table('permissions')
                ->where('name', 'coupon')
                ->first();
            $coupon_permission_active = DB::table('role_has_permissions')
                ->where([['permission_id', $coupon_permission->id], ['role_id', $role->id]])
                ->first();
            ?>

            <li><a href="#sale" aria-expanded="false" data-toggle="collapse"> <i
                        class="dripicons-cart"></i><span>{{ trans('file.Sale') }}</span></a>
                <ul id="sale" class="collapse list-unstyled ">
                    @if ($index_permission_active)
                        <li id="sale-list-menu"><a href="{{ route('sales.index') }}">{{ trans('file.Sale List') }}</a>
                        </li>
                        <?php
                        $add_permission = DB::table('permissions')
                            ->where('name', 'sales-add')
                            ->first();
                        $add_permission_active = DB::table('role_has_permissions')
                            ->where([['permission_id', $add_permission->id], ['role_id', $role->id]])
                            ->first();
                        ?>
                        @if ($add_permission_active)
                            <li><a href="{{ route('sale.pos') }}">POS</a></li>
                            <li id="sale-create-menu"><a
                                    href="{{ route('sales.create') }}">{{ trans('file.Add Sale') }}</a>
                            </li>
                            <li id="sale-import-menu"><a
                                    href="{{ url('sales/sale_by_csv') }}">{{ trans('file.Import Sale By CSV') }}</a></li>
                        @endif
                    @endif
                    @if ($gift_card_permission_active)
                        <li id="gift-card-menu"><a
                                href="{{ route('gift_cards.index') }}">{{ trans('file.Gift Card List') }}</a></li>
                    @endif
                    @if ($coupon_permission_active)
                        <li id="coupon-menu"><a href="{{ route('coupons.index') }}">{{ trans('file.Coupon List') }}</a>
                        </li>
                    @endif
                    <li id="delivery-menu"><a href="{{ route('delivery.index') }}">{{ trans('file.Delivery List') }}</a>
                    </li>
                </ul>
            </li>
            <?php
            $index_permission = DB::table('permissions')
                ->where('name', 'expenses-index')
                ->first();
            $index_permission_active = DB::table('role_has_permissions')
                ->where([['permission_id', $index_permission->id], ['role_id', $role->id]])
                ->first();
            ?>
            @if ($index_permission_active)
                <li><a href="#expense" aria-expanded="false" data-toggle="collapse"> <i
                            class="dripicons-wallet"></i><span>{{ trans('file.Expense') }}</span></a>
                    <ul id="expense" class="collapse list-unstyled ">
                        <li id="exp-cat-menu"><a
                                href="{{ route('expense_categories.index') }}">{{ trans('file.Expense Category') }}</a>
                        </li>
                        <li id="exp-list-menu"><a
                                href="{{ route('expenses.index') }}">{{ trans('file.Expense List') }}</a>
                        </li>
                        <?php
                        $add_permission = DB::table('permissions')
                            ->where('name', 'expenses-add')
                            ->first();
                        $add_permission_active = DB::table('role_has_permissions')
                            ->where([['permission_id', $add_permission->id], ['role_id', $role->id]])
                            ->first();
                        ?>
                        @if ($add_permission_active)
                            <li><a id="add-expense" href=""> {{ trans('file.Add Expense') }}</a></li>
                        @endif
                    </ul>
                </li>
            @endif
            <?php
            $index_permission = DB::table('permissions')
                ->where('name', 'quotes-index')
                ->first();
            $index_permission_active = DB::table('role_has_permissions')
                ->where([['permission_id', $index_permission->id], ['role_id', $role->id]])
                ->first();
            ?>
            @if ($index_permission_active)
                <li><a href="#quotation" aria-expanded="false" data-toggle="collapse"> <i
                            class="dripicons-document"></i><span>{{ trans('file.Quotation') }}</span><span></a>
                    <ul id="quotation" class="collapse list-unstyled ">
                        <li id="quotation-list-menu"><a
                                href="{{ route('quotations.index') }}">{{ trans('file.Quotation List') }}</a></li>
                        <?php
                        $add_permission = DB::table('permissions')
                            ->where('name', 'quotes-add')
                            ->first();
                        $add_permission_active = DB::table('role_has_permissions')
                            ->where([['permission_id', $add_permission->id], ['role_id', $role->id]])
                            ->first();
                        ?>
                        @if ($add_permission_active)
                            <li id="quotation-create-menu"><a
                                    href="{{ route('quotations.create') }}">{{ trans('file.Add Quotation') }}</a></li>
                        @endif
                    </ul>
                </li>
            @endif
            <?php
            $index_permission = DB::table('permissions')
                ->where('name', 'transfers-index')
                ->first();
            $index_permission_active = DB::table('role_has_permissions')
                ->where([['permission_id', $index_permission->id], ['role_id', $role->id]])
                ->first();
            ?>
            @if ($index_permission_active)
                <li><a href="#transfer" aria-expanded="false" data-toggle="collapse"> <i
                            class="dripicons-export"></i><span>{{ trans('file.Transfer') }}</span></a>
                    <ul id="transfer" class="collapse list-unstyled ">
                        <li id="transfer-list-menu"><a
                                href="{{ route('transfers.index') }}">{{ trans('file.Transfer List') }}</a></li>
                        <?php
                        $add_permission = DB::table('permissions')
                            ->where('name', 'transfers-add')
                            ->first();
                        $add_permission_active = DB::table('role_has_permissions')
                            ->where([['permission_id', $add_permission->id], ['role_id', $role->id]])
                            ->first();
                        ?>
                        @if ($add_permission_active)
                            <li id="transfer-create-menu"><a
                                    href="{{ route('transfers.create') }}">{{ trans('file.Add Transfer') }}</a></li>
                            <li id="transfer-import-menu"><a
                                    href="{{ url('transfers/transfer_by_csv') }}">{{ trans('file.Import Transfer By CSV') }}</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            <li><a href="#return" aria-expanded="false" data-toggle="collapse"> <i
                        class="dripicons-return"></i><span>{{ trans('file.return') }}</span></a>
                <ul id="return" class="collapse list-unstyled ">
                    <?php
                    $index_permission = DB::table('permissions')
                        ->where('name', 'returns-index')
                        ->first();
                    $index_permission_active = DB::table('role_has_permissions')
                        ->where([['permission_id', $index_permission->id], ['role_id', $role->id]])
                        ->first();
                    ?>
                    @if ($index_permission_active)
                        <li id="sale-return-menu"><a
                                href="{{ route('return-sale.index') }}">{{ trans('file.Sale') }}</a>
                        </li>
                    @endif
                    <?php
                    $index_permission = DB::table('permissions')
                        ->where('name', 'purchase-return-index')
                        ->first();
                    $index_permission_active = DB::table('role_has_permissions')
                        ->where([['permission_id', $index_permission->id], ['role_id', $role->id]])
                        ->first();
                    ?>
                    @if ($index_permission_active)
                        <li id="purchase-return-menu"><a
                                href="{{ route('return-purchase.index') }}">{{ trans('file.Purchase') }}</a></li>
                    @endif
                </ul>
            </li>
            <?php
            $index_permission = DB::table('permissions')
                ->where('name', 'account-index')
                ->first();
            $index_permission_active = DB::table('role_has_permissions')
                ->where([['permission_id', $index_permission->id], ['role_id', $role->id]])
                ->first();

            $money_transfer_permission = DB::table('permissions')
                ->where('name', 'money-transfer')
                ->first();
            $money_transfer_permission_active = DB::table('role_has_permissions')
                ->where([['permission_id', $money_transfer_permission->id], ['role_id', $role->id]])
                ->first();

            $balance_sheet_permission = DB::table('permissions')
                ->where('name', 'balance-sheet')
                ->first();
            $balance_sheet_permission_active = DB::table('role_has_permissions')
                ->where([['permission_id', $balance_sheet_permission->id], ['role_id', $role->id]])
                ->first();

            $account_statement_permission = DB::table('permissions')
                ->where('name', 'account-statement')
                ->first();
            $account_statement_permission_active = DB::table('role_has_permissions')
                ->where([['permission_id', $account_statement_permission->id], ['role_id', $role->id]])
                ->first();

            ?>
            @if ($index_permission_active || $balance_sheet_permission_active || $account_statement_permission_active)
                <li class=""><a href="#account" aria-expanded="false" data-toggle="collapse"> <i
                            class="dripicons-briefcase"></i><span>{{ trans('file.Accounting') }}</span></a>
                    <ul id="account" class="collapse list-unstyled ">
                        @if ($index_permission_active)
                            <li id="account-list-menu"><a
                                    href="{{ route('accounts.index') }}">{{ trans('file.Account List') }}</a></li>
                            <li><a id="add-account" href="">{{ trans('file.Add Account') }}</a></li>
                        @endif
                        @if ($money_transfer_permission_active)
                            <li id="money-transfer-menu"><a
                                    href="{{ route('money-transfers.index') }}">{{ trans('file.Money Transfer') }}</a>
                            </li>
                        @endif
                        @if ($balance_sheet_permission_active)
                            <li id="balance-sheet-menu"><a
                                    href="{{ route('accounts.balancesheet') }}">{{ trans('file.Balance Sheet') }}</a>
                            </li>
                        @endif
                        @if ($account_statement_permission_active)
                            <li id="account-statement-menu"><a id="account-statement"
                                    href="">{{ trans('file.Account Statement') }}</a></li>
                        @endif
                    </ul>
                </li>
            @endif
            <?php
            $department = DB::table('permissions')
                ->where('name', 'department')
                ->first();
            $department_active = DB::table('role_has_permissions')
                ->where([['permission_id', $department->id], ['role_id', $role->id]])
                ->first();
            $index_employee = DB::table('permissions')
                ->where('name', 'employees-index')
                ->first();
            $index_employee_active = DB::table('role_has_permissions')
                ->where([['permission_id', $index_employee->id], ['role_id', $role->id]])
                ->first();
            $attendance = DB::table('permissions')
                ->where('name', 'attendance')
                ->first();
            $attendance_active = DB::table('role_has_permissions')
                ->where([['permission_id', $attendance->id], ['role_id', $role->id]])
                ->first();
            $payroll = DB::table('permissions')
                ->where('name', 'payroll')
                ->first();
            $payroll_active = DB::table('role_has_permissions')
                ->where([['permission_id', $payroll->id], ['role_id', $role->id]])
                ->first();
            ?>

            <li class=""><a href="#hrm" aria-expanded="false" data-toggle="collapse"> <i
                        class="dripicons-user-group"></i><span>HRM</span></a>
                <ul id="hrm" class="collapse list-unstyled ">
                    @if ($department_active)
                        <li id="dept-menu"><a href="{{ route('departments.index') }}">{{ trans('file.Department') }}</a>
                        </li>
                    @endif
                    @if ($index_employee_active)
                        <li id="employee-menu"><a href="{{ route('employees.index') }}">{{ trans('file.Employee') }}</a>
                        </li>
                    @endif
                    @if ($attendance_active)
                        <li id="attendance-menu"><a
                                href="{{ route('attendance.index') }}">{{ trans('file.Attendance') }}</a></li>
                    @endif
                    @if ($payroll_active)
                        <li id="payroll-menu"><a href="{{ route('payroll.index') }}">{{ trans('file.Payroll') }}</a>
                        </li>
                    @endif
                    <li id="holiday-menu"><a href="{{ route('holidays.index') }}">{{ trans('file.Holiday') }}</a></li>
                </ul>
            </li>

            <li><a href="#people" aria-expanded="false" data-toggle="collapse"> <i
                        class="dripicons-user"></i><span>{{ trans('file.People') }}</span></a>
                <ul id="people" class="collapse list-unstyled ">
                    <?php $index_permission_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'users-index'], ['role_id', $role->id]])
                        ->first();
                    ?>
                    @if ($index_permission_active)
                        <li id="user-list-menu"><a href="{{ route('user.index') }}">{{ trans('file.User List') }}</a>
                        </li>
                        <?php $add_permission_active = DB::table('permissions')
                            ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                            ->where([['permissions.name', 'users-add'], ['role_id', $role->id]])
                            ->first();
                        ?>
                        @if ($add_permission_active)
                            <li id="user-create-menu"><a
                                    href="{{ route('user.create') }}">{{ trans('file.Add User') }}</a>
                            </li>
                        @endif
                    @endif
                    <?php
                    $index_permission = DB::table('permissions')
                        ->where('name', 'customers-index')
                        ->first();
                    $index_permission_active = DB::table('role_has_permissions')
                        ->where([['permission_id', $index_permission->id], ['role_id', $role->id]])
                        ->first();
                    ?>
                    @if ($index_permission_active)
                        <li id="customer-list-menu"><a
                                href="{{ route('customer.index') }}">{{ trans('file.Customer List') }}</a></li>
                        <?php
                        $add_permission = DB::table('permissions')
                            ->where('name', 'customers-add')
                            ->first();
                        $add_permission_active = DB::table('role_has_permissions')
                            ->where([['permission_id', $add_permission->id], ['role_id', $role->id]])
                            ->first();
                        ?>
                        @if ($add_permission_active)
                            <li id="customer-create-menu"><a
                                    href="{{ route('customer.create') }}">{{ trans('file.Add Customer') }}</a></li>
                        @endif
                    @endif
                    <?php
                    $index_permission = DB::table('permissions')
                        ->where('name', 'billers-index')
                        ->first();
                    $index_permission_active = DB::table('role_has_permissions')
                        ->where([['permission_id', $index_permission->id], ['role_id', $role->id]])
                        ->first();
                    ?>
                    @if ($index_permission_active)
                        <li id="biller-list-menu"><a
                                href="{{ route('biller.index') }}">{{ trans('file.Biller List') }}</a>
                        </li>
                        <?php
                        $add_permission = DB::table('permissions')
                            ->where('name', 'billers-add')
                            ->first();
                        $add_permission_active = DB::table('role_has_permissions')
                            ->where([['permission_id', $add_permission->id], ['role_id', $role->id]])
                            ->first();
                        ?>
                        @if ($add_permission_active)
                            <li id="biller-create-menu"><a
                                    href="{{ route('biller.create') }}">{{ trans('file.Add Biller') }}</a></li>
                        @endif
                    @endif
                    <?php
                    $index_permission = DB::table('permissions')
                        ->where('name', 'suppliers-index')
                        ->first();
                    $index_permission_active = DB::table('role_has_permissions')
                        ->where([['permission_id', $index_permission->id], ['role_id', $role->id]])
                        ->first();
                    ?>
                    @if ($index_permission_active)
                        <li id="supplier-list-menu"><a
                                href="{{ route('supplier.index') }}">{{ trans('file.Supplier List') }}</a></li>
                        <?php
                        $add_permission = DB::table('permissions')
                            ->where('name', 'suppliers-add')
                            ->first();
                        $add_permission_active = DB::table('role_has_permissions')
                            ->where([['permission_id', $add_permission->id], ['role_id', $role->id]])
                            ->first();
                        ?>
                        @if ($add_permission_active)
                            <li id="supplier-create-menu"><a
                                    href="{{ route('supplier.create') }}">{{ trans('file.Add Supplier') }}</a></li>
                        @endif
                    @endif
                </ul>
            </li>
            <li><a href="#report" aria-expanded="false" data-toggle="collapse"> <i
                        class="dripicons-document-remove"></i><span>{{ trans('file.Reports') }}</span></a>
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
                <ul id="report" class="collapse list-unstyled ">
                    @if ($profit_loss_active)
                        <li id="profit-loss-report-menu">
                            {!! Form::open(['route' => 'report.profitLoss', 'method' => 'post', 'id' => 'profitLoss-report-form']) !!}
                            <input type="hidden" name="start_date" value="{{ date('Y-m') . '-' . '01' }}" />
                            <input type="hidden" name="end_date" value="{{ date('Y-m-d') }}" />
                            <a id="profitLoss-link" href="">{{ trans('file.Summary Report') }}</a>
                            {!! Form::close() !!}
                        </li>
                    @endif
                    @if ($best_seller_active)
                        <li id="best-seller-report-menu">
                            <a href="{{ url('report/best_seller') }}">{{ trans('file.Best Seller') }}</a>
                        </li>
                    @endif
                    @if ($product_report_active)
                        <li id="product-report-menu">
                            {!! Form::open(['route' => 'report.product', 'method' => 'get', 'id' => 'product-report-form']) !!}
                            <input type="hidden" name="start_date" value="{{ date('Y-m') . '-' . '01' }}" />
                            <input type="hidden" name="end_date" value="{{ date('Y-m-d') }}" />
                            <input type="hidden" name="warehouse_id" value="0" />
                            <a id="report-link" href="">{{ trans('file.Product Report') }}</a>
                            {!! Form::close() !!}
                        </li>
                    @endif
                    @if ($daily_sale_active)
                        <li id="daily-sale-report-menu">
                            <a
                                href="{{ url('report/daily_sale/' . date('Y') . '/' . date('m')) }}">{{ trans('file.Daily Sale') }}</a>
                        </li>
                    @endif
                    @if ($monthly_sale_active)
                        <li id="monthly-sale-report-menu">
                            <a
                                href="{{ url('report/monthly_sale/' . date('Y')) }}">{{ trans('file.Monthly Sale') }}</a>
                        </li>
                    @endif
                    @if ($daily_purchase_active)
                        <li id="daily-purchase-report-menu">
                            <a
                                href="{{ url('report/daily_purchase/' . date('Y') . '/' . date('m')) }}">{{ trans('file.Daily Purchase') }}</a>
                        </li>
                    @endif
                    @if ($monthly_purchase_active)
                        <li id="monthly-purchase-report-menu">
                            <a
                                href="{{ url('report/monthly_purchase/' . date('Y')) }}">{{ trans('file.Monthly Purchase') }}</a>
                        </li>
                    @endif
                    @if ($sale_report_active)
                        <li id="sale-report-menu">
                            {!! Form::open(['route' => 'report.sale', 'method' => 'post', 'id' => 'sale-report-form']) !!}
                            <input type="hidden" name="start_date" value="{{ date('Y-m') . '-' . '01' }}" />
                            <input type="hidden" name="end_date" value="{{ date('Y-m-d') }}" />
                            <input type="hidden" name="warehouse_id" value="0" />
                            <a id="sale-report-link" href="">{{ trans('file.Sale Report') }}</a>
                            {!! Form::close() !!}
                        </li>
                    @endif
                    @if ($sale_report_chart_active)
                        <li id="sale-report-chart-menu">
                            {!! Form::open(['route' => 'report.saleChart', 'method' => 'post', 'id' => 'sale-report-chart-form']) !!}
                            <input type="hidden" name="start_date" value="{{ date('Y-m') . '-' . '01' }}" />
                            <input type="hidden" name="end_date" value="{{ date('Y-m-d') }}" />
                            <input type="hidden" name="warehouse_id" value="0" />
                            <input type="hidden" name="time_period" value="weekly" />
                            <a id="sale-report-chart-link" href="">{{ trans('file.Sale Report Chart') }}</a>
                            {!! Form::close() !!}
                        </li>
                    @endif
                    @if ($payment_report_active)
                        <li id="payment-report-menu">
                            {!! Form::open(['route' => 'report.paymentByDate', 'method' => 'post', 'id' => 'payment-report-form']) !!}
                            <input type="hidden" name="start_date" value="{{ date('Y-m') . '-' . '01' }}" />
                            <input type="hidden" name="end_date" value="{{ date('Y-m-d') }}" />
                            <a id="payment-report-link" href="">{{ trans('file.Payment Report') }}</a>
                            {!! Form::close() !!}
                        </li>
                    @endif
                    @if ($purchase_report_active)
                        <li id="purchase-report-menu">
                            {!! Form::open(['route' => 'report.purchase', 'method' => 'post', 'id' => 'purchase-report-form']) !!}
                            <input type="hidden" name="start_date" value="{{ date('Y-m') . '-' . '01' }}" />
                            <input type="hidden" name="end_date" value="{{ date('Y-m-d') }}" />
                            <input type="hidden" name="warehouse_id" value="0" />
                            <a id="purchase-report-link" href="">{{ trans('file.Purchase Report') }}</a>
                            {!! Form::close() !!}
                        </li>
                    @endif
                    @if ($customer_report_active)
                        <li id="customer-report-menu">
                            <a id="customer-report-link" href="">{{ trans('file.Customer Report') }}</a>
                        </li>
                    @endif
                    @if ($due_report_active)
                        <li id="due-report-menu">
                            {!! Form::open(['route' => 'report.customerDueByDate', 'method' => 'post', 'id' => 'customer-due-report-form']) !!}
                            <input type="hidden" name="start_date"
                                value="{{ date('Y-m-d', strtotime('-1 year')) }}" />
                            <input type="hidden" name="end_date" value="{{ date('Y-m-d') }}" />
                            <a id="due-report-link" href="">{{ trans('file.Customer Due Report') }}</a>
                            {!! Form::close() !!}
                        </li>
                    @endif
                    @if ($supplier_report_active)
                        <li id="supplier-report-menu">
                            <a id="supplier-report-link" href="">{{ trans('file.Supplier Report') }}</a>
                        </li>
                    @endif
                    @if ($supplier_due_report_active)
                        <li id="supplier-due-report-menu">
                            {!! Form::open(['route' => 'report.supplierDueByDate', 'method' => 'post', 'id' => 'supplier-due-report-form']) !!}
                            <input type="hidden" name="start_date"
                                value="{{ date('Y-m-d', strtotime('-1 year')) }}" />
                            <input type="hidden" name="end_date" value="{{ date('Y-m-d') }}" />
                            <a id="supplier-due-report-link" href="">{{ trans('file.Supplier Due Report') }}</a>
                            {!! Form::close() !!}
                        </li>
                    @endif
                    @if ($warehouse_report_active)
                        <li id="warehouse-report-menu">
                            <a id="warehouse-report-link" href="">{{ trans('file.Warehouse Report') }}</a>
                        </li>
                    @endif
                    @if ($warehouse_stock_report_active)
                        <li id="warehouse-stock-report-menu">
                            <a
                                href="{{ route('report.warehouseStock') }}">{{ trans('file.Warehouse Stock Chart') }}</a>
                        </li>
                    @endif
                    @if ($product_qty_alert_active)
                        <li id="qtyAlert-report-menu">
                            <a href="{{ route('report.qtyAlert') }}">{{ trans('file.Product Quantity Alert') }}</a>
                        </li>
                    @endif
                    @if ($dso_report_active)
                        <li id="daily-sale-objective-menu">
                            <a
                                href="{{ route('report.dailySaleObjective') }}">{{ trans('file.Daily Sale Objective Report') }}</a>
                        </li>
                    @endif
                    @if ($user_report_active)
                        <li id="user-report-menu">
                            <a id="user-report-link" href="">{{ trans('file.User Report') }}</a>
                        </li>
                    @endif
                </ul>
            </li>
            <li><a href="#setting" aria-expanded="false" data-toggle="collapse"> <i
                        class="dripicons-gear"></i><span>{{ trans('file.settings') }}</span></a>
                <ul id="setting" class="collapse list-unstyled ">
                    <?php
                    $all_notification_permission_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'all_notification'], ['role_id', $role->id]])
                        ->first();
                    $send_notification_permission_active = DB::table('permissions')
                        ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where([['permissions.name', 'send_notification'], ['role_id', $role->id]])
                        ->first();
                    $warehouse_permission = DB::table('permissions')
                        ->where('name', 'warehouse')
                        ->first();
                    $warehouse_permission_active = DB::table('role_has_permissions')
                        ->where([['permission_id', $warehouse_permission->id], ['role_id', $role->id]])
                        ->first();

                    $customer_group_permission = DB::table('permissions')
                        ->where('name', 'customer_group')
                        ->first();
                    $customer_group_permission_active = DB::table('role_has_permissions')
                        ->where([['permission_id', $customer_group_permission->id], ['role_id', $role->id]])
                        ->first();

                    $brand_permission = DB::table('permissions')
                        ->where('name', 'brand')
                        ->first();
                    $brand_permission_active = DB::table('role_has_permissions')
                        ->where([['permission_id', $brand_permission->id], ['role_id', $role->id]])
                        ->first();

                    $unit_permission = DB::table('permissions')
                        ->where('name', 'unit')
                        ->first();
                    $unit_permission_active = DB::table('role_has_permissions')
                        ->where([['permission_id', $unit_permission->id], ['role_id', $role->id]])
                        ->first();

                    $tax_permission = DB::table('permissions')
                        ->where('name', 'tax')
                        ->first();
                    $tax_permission_active = DB::table('role_has_permissions')
                        ->where([['permission_id', $tax_permission->id], ['role_id', $role->id]])
                        ->first();

                    $general_setting_permission = DB::table('permissions')
                        ->where('name', 'general_setting')
                        ->first();
                    $general_setting_permission_active = DB::table('role_has_permissions')
                        ->where([['permission_id', $general_setting_permission->id], ['role_id', $role->id]])
                        ->first();

                    $mail_setting_permission = DB::table('permissions')
                        ->where('name', 'mail_setting')
                        ->first();
                    $mail_setting_permission_active = DB::table('role_has_permissions')
                        ->where([['permission_id', $mail_setting_permission->id], ['role_id', $role->id]])
                        ->first();

                    $sms_setting_permission = DB::table('permissions')
                        ->where('name', 'sms_setting')
                        ->first();
                    $sms_setting_permission_active = DB::table('role_has_permissions')
                        ->where([['permission_id', $sms_setting_permission->id], ['role_id', $role->id]])
                        ->first();

                    $create_sms_permission = DB::table('permissions')
                        ->where('name', 'create_sms')
                        ->first();
                    $create_sms_permission_active = DB::table('role_has_permissions')
                        ->where([['permission_id', $create_sms_permission->id], ['role_id', $role->id]])
                        ->first();

                    $pos_setting_permission = DB::table('permissions')
                        ->where('name', 'pos_setting')
                        ->first();
                    $pos_setting_permission_active = DB::table('role_has_permissions')
                        ->where([['permission_id', $pos_setting_permission->id], ['role_id', $role->id]])
                        ->first();

                    $hrm_setting_permission = DB::table('permissions')
                        ->where('name', 'hrm_setting')
                        ->first();
                    $hrm_setting_permission_active = DB::table('role_has_permissions')
                        ->where([['permission_id', $hrm_setting_permission->id], ['role_id', $role->id]])
                        ->first();

                    $reward_point_setting_permission = DB::table('permissions')
                        ->where('name', 'reward_point_setting')
                        ->first();
                    $reward_point_setting_permission_active = DB::table('role_has_permissions')
                        ->where([['permission_id', $reward_point_setting_permission->id], ['role_id', $role->id]])
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
                    @if ($role->id <= 2)
                        <li id="role-menu"><a href="{{ route('role.index') }}">{{ trans('file.Role Permission') }}</a>
                        </li>
                    @endif
                    @if ($discount_plan_permission_active)
                        <li id="discount-plan-list-menu"><a
                                href="{{ route('discount-plans.index') }}">{{ trans('file.Discount Plan') }}</a></li>
                    @endif
                    @if ($discount_permission_active)
                        <li id="discount-list-menu"><a
                                href="{{ route('discounts.index') }}">{{ trans('file.Discount') }}</a></li>
                    @endif
                    @if ($all_notification_permission_active)
                        <li id="notification-list-menu">
                            <a href="{{ route('notifications.index') }}">{{ trans('file.All Notification') }}</a>
                        </li>
                    @endif
                    @if ($send_notification_permission_active)
                        <li id="notification-menu">
                            <a href="" id="send-notification">{{ trans('file.Send Notification') }}</a>
                        </li>
                    @endif
                    @if ($warehouse_permission_active)
                        <li id="warehouse-menu"><a
                                href="{{ route('warehouse.index') }}">{{ trans('file.Warehouse') }}</a>
                        </li>
                    @endif
                    @if ($customer_group_permission_active)
                        <li id="customer-group-menu"><a
                                href="{{ route('customer_group.index') }}">{{ trans('file.Customer Group') }}</a></li>
                    @endif
                    @if ($brand_permission_active)
                        <li id="brand-menu"><a href="{{ route('brand.index') }}">{{ trans('file.Brand') }}</a></li>
                    @endif
                    @if ($unit_permission_active)
                        <li id="unit-menu"><a href="{{ route('unit.index') }}">{{ trans('file.Unit') }}</a></li>
                    @endif
                    @if ($tax_permission_active)
                        <li id="tax-menu"><a href="{{ route('tax.index') }}">{{ trans('file.Tax') }}</a></li>
                    @endif
                    <li id="user-menu"><a
                            href="{{ route('user.profile', ['id' => Auth::id()]) }}">{{ trans('file.User Profile') }}</a>
                    </li>
                    @if ($create_sms_permission_active)
                        <li id="create-sms-menu"><a
                                href="{{ route('setting.createSms') }}">{{ trans('file.Create SMS') }}</a></li>
                    @endif
                    @if ($general_setting_permission_active)
                        <li id="general-setting-menu"><a
                                href="{{ route('setting.general') }}">{{ trans('file.General Setting') }}</a></li>
                    @endif
                    @if ($mail_setting_permission_active)
                        <li id="mail-setting-menu"><a
                                href="{{ route('setting.mail') }}">{{ trans('file.Mail Setting') }}</a></li>
                    @endif
                    @if ($reward_point_setting_permission_active)
                        <li id="reward-point-setting-menu"><a
                                href="{{ route('setting.rewardPoint') }}">{{ trans('file.Reward Point Setting') }}</a>
                        </li>
                    @endif
                    @if ($sms_setting_permission_active)
                        <li id="sms-setting-menu"><a
                                href="{{ route('setting.sms') }}">{{ trans('file.SMS Setting') }}</a>
                        </li>
                    @endif
                    @if ($pos_setting_permission_active)
                        <li id="pos-setting-menu"><a href="{{ route('setting.pos') }}">POS
                                {{ trans('file.settings') }}</a>
                        </li>
                    @endif
                    @if ($hrm_setting_permission_active)
                        <li id="hrm-setting-menu"><a href="{{ route('setting.hrm') }}">
                                {{ trans('file.HRM Setting') }}</a>
                        </li>
                    @endif
                </ul>
            </li>
            @if (Auth::user()->role_id != 5)
                {{-- <li><a href="{{url('public/read_me')}}"> <i class="dripicons-information"></i><span>{{trans('file.Documentation')}}</span></a></li> --}}
            @endif
        </ul>
    </nav>
    <section class="forms pos-section">
        <div class="container-fluid">
            <div class="row">
                <audio id="mysoundclip1" preload="auto">
                    <source src="{{ url('public/beep/beep-timber.mp3') }}">
                </audio>
                <audio id="mysoundclip2" preload="auto">
                    <source src="{{ url('public/beep/beep-07.mp3') }}">
                </audio>
                <div class="col-md-12 header-nav-section">
                    <!-- navbar-->
                    <header class="navbar-header dashly container-fluid d-flex py-6 mb-4">

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
                        <div class="bills-toggle d-none d-md-block d-sm-none d-xl-none d-lg-block">
                            <span class="" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBills" aria-controls="offcanvasScrolling">
                                <i class="fa-light fa-clipboard-list-check d-flex fs-2 align-items-center justify-content-center bg-white rounded-circle shadow-sm mx-1 mx-lg-2 w-40px h-40px"></i>
                            </span>
                        </div>



                        <!-- Top buttons -->
                        <div class="d-flex align-items-center ms-auto me-n1 me-lg-n2">
                            <!-- Dropdown -->
                            <a id="btnFullscreen" data-toggle="tooltip" title="Full Screen"><i
                                    class="dripicons-expand no-arrow d-flex align-items-center justify-content-center bg-white rounded-circle shadow-sm mx-1 mx-lg-2 w-40px h-40px link-secondary"></i></a>

                            <!-- Separator -->
                            <div class="vr bg-gray-700 mx-2 mx-lg-3"></div>
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
                                                    class="green-badge"></span> {{ $alert_product }} Products are running low in stock</a>
                                        </li>
                                        @foreach (\Auth::user()->unreadNotifications as $key => $notification)
                                            <li> <a href="#"
                                                    class="dropdown-item">{{ $notification->data['message'] }}</a>
                                            </li>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a class="dropdown-toggle no-arrow d-flex align-items-center justify-content-center bg-white rounded-circle shadow-sm mx-1 mx-lg-2 w-40px h-40px link-secondary"
                                        href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            height="18" width="18">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="1.5"
                                                d="M7.77069 9.50524C7.60364 9.43126 7.45391 9.32316 7.33112 9.18788L6.70112 8.48788C6.5212 8.28484 6.28225 8.14317 6.01778 8.08272C5.7533 8.02228 5.47654 8.0461 5.22627 8.15083C4.97601 8.25557 4.76478 8.43598 4.62219 8.66678C4.4796 8.89758 4.41279 9.16721 4.43112 9.43788V10.3679C4.44125 10.5505 4.41275 10.7331 4.34748 10.9039C4.28221 11.0747 4.18165 11.2298 4.05235 11.3591C3.92306 11.4884 3.76795 11.589 3.59714 11.6542C3.42634 11.7195 3.24369 11.748 3.06112 11.7379L2.12112 11.6879C1.85153 11.6753 1.58463 11.7463 1.35691 11.8911C1.12919 12.036 0.951762 12.2476 0.848892 12.4971C0.746023 12.7467 0.72273 13.0219 0.782196 13.2851C0.841663 13.5484 0.980987 13.7868 1.18112 13.9679L1.88112 14.5879C2.01927 14.7148 2.129 14.8695 2.20311 15.0419C2.27722 15.2142 2.31403 15.4003 2.31112 15.5879C2.31532 15.7757 2.2791 15.9621 2.2049 16.1347C2.13071 16.3072 2.02029 16.4618 1.88112 16.5879L1.18112 17.2179C0.981519 17.3992 0.842717 17.6376 0.783657 17.9007C0.724597 18.1638 0.748157 18.4387 0.85112 18.6879C0.954125 18.9362 1.13156 19.1464 1.359 19.2897C1.58644 19.433 1.8527 19.5022 2.12112 19.4879H3.06112C3.24369 19.4778 3.42634 19.5063 3.59714 19.5715C3.76795 19.6368 3.92306 19.7374 4.05235 19.8666C4.18165 19.9959 4.28221 20.1511 4.34748 20.3219C4.41275 20.4927 4.44125 20.6753 4.43112 20.8579V21.7879C4.4151 22.0577 4.48357 22.3258 4.62702 22.5549C4.77046 22.784 4.98174 22.9626 5.23147 23.066C5.48119 23.1694 5.75693 23.1925 6.02034 23.1318C6.28374 23.0712 6.5217 22.93 6.70112 22.7279L7.33112 22.0379C7.45391 21.9026 7.60364 21.7945 7.77069 21.7205C7.93775 21.6466 8.11842 21.6083 8.30112 21.6083C8.48382 21.6083 8.6645 21.6466 8.83155 21.7205C8.9986 21.7945 9.14833 21.9026 9.27112 22.0379L9.90112 22.7279C10.0805 22.93 10.3185 23.0712 10.5819 23.1318C10.8453 23.1925 11.1211 23.1694 11.3708 23.066C11.6205 22.9626 11.8318 22.784 11.9752 22.5549C12.1187 22.3258 12.1871 22.0577 12.1711 21.7879V20.8579C12.161 20.6753 12.1895 20.4927 12.2548 20.3219C12.32 20.1511 12.4206 19.9959 12.5499 19.8666C12.6792 19.7374 12.8343 19.6368 13.0051 19.5715C13.1759 19.5063 13.3586 19.4778 13.5411 19.4879H14.4811C14.7495 19.5022 15.0158 19.433 15.2432 19.2897C15.4707 19.1464 15.6481 18.9362 15.7511 18.6879C15.8541 18.4387 15.8776 18.1638 15.8186 17.9007C15.7595 17.6376 15.6207 17.3992 15.4211 17.2179L14.7211 16.5879C14.582 16.4618 14.4715 16.3072 14.3973 16.1347C14.3231 15.9621 14.2869 15.7757 14.2911 15.5879C14.2882 15.4003 14.325 15.2142 14.3991 15.0419C14.4732 14.8695 14.583 14.7148 14.7211 14.5879L15.4211 13.9679C15.6213 13.7868 15.7606 13.5484 15.82 13.2851C15.8795 13.0219 15.8562 12.7467 15.7533 12.4971C15.6505 12.2476 15.4731 12.036 15.2453 11.8911C15.0176 11.7463 14.7507 11.6753 14.4811 11.6879L13.5411 11.7379C13.3586 11.748 13.1759 11.7195 13.0051 11.6542C12.8343 11.589 12.6792 11.4884 12.5499 11.3591C12.4206 11.2298 12.32 11.0747 12.2548 10.9039C12.1895 10.7331 12.161 10.5505 12.1711 10.3679V9.43788C12.1895 9.16721 12.1226 8.89758 11.98 8.66678C11.8375 8.43598 11.6262 8.25557 11.376 8.15083C11.1257 8.0461 10.8489 8.02228 10.5845 8.08272C10.32 8.14317 10.081 8.28484 9.90112 8.48788L9.27112 9.18788C9.14833 9.32316 8.9986 9.43126 8.83155 9.50524C8.6645 9.57922 8.48382 9.61743 8.30112 9.61743C8.11842 9.61743 7.93775 9.57922 7.77069 9.50524Z">
                                            </path>
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="1.5"
                                                d="M8.30114 17.4379C9.33944 17.4379 10.1811 16.5962 10.1811 15.5579C10.1811 14.5196 9.33944 13.6779 8.30114 13.6779C7.26285 13.6779 6.42114 14.5196 6.42114 15.5579C6.42114 16.5962 7.26285 17.4379 8.30114 17.4379Z">
                                            </path>
                                            <path stroke="currentColor" stroke-width="1.5"
                                                d="M18.1565 6.23828C17.8804 6.23828 17.6565 6.01442 17.6565 5.73828C17.6565 5.46214 17.8804 5.23828 18.1565 5.23828">
                                            </path>
                                            <path stroke="currentColor" stroke-width="1.5"
                                                d="M18.1565 6.23828C18.4326 6.23828 18.6565 6.01442 18.6565 5.73828C18.6565 5.46214 18.4326 5.23828 18.1565 5.23828">
                                            </path>
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="1.5"
                                                d="M16.1347 1.83506C16.1409 1.62338 16.2152 1.41935 16.3466 1.25325C16.478 1.08716 16.6594 0.967851 16.8639 0.91304C17.0685 0.85823 17.2853 0.870838 17.4821 0.948992C17.6789 1.02715 17.8453 1.16668 17.9565 1.34689L18.551 2.30113C18.6493 2.45959 18.8042 2.57479 18.9842 2.62343C19.1643 2.67207 19.3561 2.65052 19.5209 2.56313L20.508 2.03729C20.6955 1.93854 20.9096 1.90249 21.1191 1.93443C21.3285 1.96638 21.5222 2.06463 21.6716 2.21476C21.8211 2.3649 21.9185 2.559 21.9495 2.76857C21.9805 2.97814 21.9435 3.19214 21.8439 3.37912L21.3171 4.37019C21.2295 4.53545 21.2077 4.72774 21.2561 4.90841C21.3045 5.08907 21.4195 5.24471 21.578 5.34404L22.5273 5.9411C22.7071 6.05324 22.8461 6.22006 22.924 6.41706C23.002 6.61406 23.0147 6.83085 22.9603 7.03561C22.9059 7.24036 22.7873 7.42229 22.6219 7.55467C22.4565 7.68705 22.253 7.7629 22.0413 7.7711L20.9235 7.80929C20.7371 7.816 20.5602 7.89324 20.4286 8.02539C20.297 8.15754 20.2205 8.33473 20.2145 8.52115L20.179 9.64113C20.1727 9.85281 20.0984 10.0568 19.967 10.2229C19.8357 10.389 19.6542 10.5083 19.4497 10.5631C19.2451 10.618 19.0284 10.6053 18.8315 10.5272C18.6347 10.449 18.4683 10.3095 18.3571 10.1293L17.762 9.17525C17.6638 9.0168 17.509 8.90157 17.3291 8.85289C17.1492 8.80422 16.9575 8.82572 16.7928 8.91305L15.8049 9.43908C15.6175 9.53784 15.4033 9.57389 15.1939 9.54194C14.9844 9.51 14.7908 9.41175 14.6413 9.26161C14.4918 9.11148 14.3944 8.91737 14.3634 8.7078C14.3324 8.49823 14.3694 8.28424 14.469 8.09725L14.9933 7.10534C15.0809 6.94007 15.1027 6.74778 15.0543 6.56712C15.0059 6.38645 14.8909 6.23081 14.7324 6.13148L13.7831 5.53748C13.6034 5.42533 13.4643 5.25851 13.3864 5.06151C13.3085 4.86452 13.2958 4.64772 13.3501 4.44296C13.4045 4.23821 13.5231 4.05628 13.6885 3.92391C13.8539 3.79153 14.0574 3.71567 14.2691 3.70748L15.3877 3.66909C15.5739 3.66238 15.7507 3.58515 15.8822 3.45302C16.0137 3.32089 16.0901 3.14374 16.0959 2.95743L16.1347 1.83506Z">
                                            </path>
                                        </svg>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                        <?php
                                        $general_setting_permission = DB::table('permissions')
                                            ->where('name', 'general_setting')
                                            ->first();
                                        $general_setting_permission_active = DB::table('role_has_permissions')
                                            ->where([['permission_id', $general_setting_permission->id], ['role_id', Auth::user()->role_id]])
                                            ->first();

                                        $pos_setting_permission = DB::table('permissions')
                                            ->where('name', 'pos_setting')
                                            ->first();

                                        $pos_setting_permission_active = DB::table('role_has_permissions')
                                            ->where([['permission_id', $pos_setting_permission->id], ['role_id', Auth::user()->role_id]])
                                            ->first();
                                        ?>
                                        @if ($pos_setting_permission_active)
                                            <li><a class="dropdown-item" href="{{ route('setting.pos') }}"
                                                    title="{{ trans('file.POS Setting') }}"><i
                                                        class="dripicons-gear"></i> Pos Settings</a>
                                            </li>
                                        @endif
                                        <li><a class="dropdown-item" href="{{ route('sales.printLastReciept') }}"
                                                title="{{ trans('file.Print Last Reciept') }}"><i
                                                    class="dripicons-print"></i> Print Last Receipt</a>
                                        </li>
                                        <li><a class="dropdown-item" href="" id="register-details-btn"
                                                data-toggle="tooltip"
                                                title="{{ trans('file.Cash Register Details') }}"><i
                                                    class="dripicons-briefcase"></i> Cash Register Details</a>
                                        </li>
                                        <li><a class="dropdown-item" href="" data-toggle="modal"
                                                data-target="#recentTransaction"
                                                title="{{ trans('file.Recent Transaction') }}">
                                                {{ trans('file.Recent Transaction') }}</a>
                                        </li>
                                        <?php
                                        $today_sale_permission = DB::table('permissions')
                                            ->where('name', 'today_sale')
                                            ->first();
                                        $today_sale_permission_active = DB::table('role_has_permissions')
                                            ->where([['permission_id', $today_sale_permission->id], ['role_id', Auth::user()->role_id]])
                                            ->first();

                                        $today_profit_permission = DB::table('permissions')
                                            ->where('name', 'today_profit')
                                            ->first();
                                        $today_profit_permission_active = DB::table('role_has_permissions')
                                            ->where([['permission_id', $today_profit_permission->id], ['role_id', Auth::user()->role_id]])
                                            ->first();
                                        ?>

                                        @if ($today_sale_permission_active)
                                            <li><a class="dropdown-item" href="" id="today-sale-btn"
                                                    data-toggle="tooltip" title="{{ trans('file.Today Sale') }}"><i
                                                        class="dripicons-shopping-bag"></i> Today's Sales</a></li>
                                        @endif
                                        @if ($today_profit_permission_active)
                                            <li><a class="dropdown-item" href="" id="today-profit-btn"
                                                    data-toggle="tooltip" title="{{ trans('file.Today Profit') }}"><i
                                                        class="dripicons-graph-line"></i> Today's Profit</a></li>
                                        @endif
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

                </div>
                <div class="col-md-2 bills-tab hidden-on-mobile hidden-on-tablet hidden-on-sm-laptop">
                    <div class="bills-header">
                        <div class="row">
                            <h3 class="col-10 title">Bills</h3>
                            <div class="col-2 add-bill-draft">
                                <i class="fa-light fa-clipboard-list-check"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bills list-group mCustomScrollbar">
                        @foreach ($recent_draft as $draft)
                            <?php $customer = DB::table('customers')->find($draft->customer_id); ?>
                            <div class="bill-item list-group-item list-group-item-action">
                                <div class="row d-flex justify-content-center align-items-center">
                                    <div class="square-abrv col-3 ps-4">
                                        <h1 class="cc_1 text-truncate text-center rounded-1"><span class="w-100 p-0 text-truncate truncate-1" style="letter-spacing: 20px;">{{ $customer->name }}</span></h1>
                                    </div>
                                    <div class="col-9">
                                        @if (in_array('sales-edit', $all_permission))
                                            <a href="{{ url('sales/' . $draft->id . '/create') }}" class=""
                                                title="Edit Bill">
                                                <div class="bill-customer-name">
                                                    <h4>{{ $customer->name }}</h4>
                                                </div>
                                            </a>
                                        @endif
                                        <div class="delete-bill">
                                            @if (in_array('sales-delete', $all_permission))
                                                {{ Form::open(['route' => ['sales.destroy', $draft->id], 'method' => 'DELETE']) }}
                                                <a type="submit" class="btn btn-sm" onclick="return confirmDelete()"
                                                    title="Delete"><i class="fa-light fa-trash"></i></a>
                                                {{ Form::close() }}
                                            @endif

                                        </div>
                                        <div class="bill-date">
                                            <h5><i class="fa-light fa-calendar-check"
                                                    style="padding-right: 4px;color: #03a9f4;font-size: 16px;"></i>
                                                {{ date('d-m-Y', strtotime($draft->created_at)) }}
                                            </h5>
                                        </div>
                                        <div class="vr bg-gray-700 mx-2 mx-lg-1"></div>
                                        <div class="bill-total">
                                            <h5 class="badge text-bg-success-soft px-1 py-1 fs-5">MWK {{ $draft->grand_total }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>


                </div>
                <div class="offcanvas offcanvas-start" data-bs-scroll="false" data-bs-backdrop="true" tabindex="-1" id="offcanvasBills" aria-labelledby="offcanvasScrollingLabel" style="z-index: 9999">
                    <div class="offcanvas-header">
                      <h5 class="offcanvas-title" id="offcanvasScrollingLabel"></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <div class="bills-header">
                            <div class="row">
                                <h3 class="col-10 title">Bills</h3>
                                <div class="col-2 add-bill-draft">
                                    <i class="fa-light fa-clipboard-list-check"></i>
                                </div>
                            </div>
                        </div>
                        <div class="bills list-group mCustomScrollbar">
                            @foreach ($recent_draft as $draft)
                                <?php $customer = DB::table('customers')->find($draft->customer_id); ?>
                                <div class="bill-item list-group-item list-group-item-action">
                                    <div class="row d-flex justify-content-center align-items-center">
                                        <div class="square-abrv col-3 ps-4">
                                            <h1 class="cc_1 text-truncate text-center rounded-1"><span class="w-100 p-0 text-truncate truncate-1" style="letter-spacing: 20px;">{{ $customer->name }}</span></h1>
                                        </div>
                                        <div class="col-9">
                                            @if (in_array('sales-edit', $all_permission))
                                                <a href="{{ url('sales/' . $draft->id . '/create') }}" class=""
                                                    title="Edit Bill">
                                                    <div class="bill-customer-name">
                                                        <h4>{{ $customer->name }}</h4>
                                                    </div>
                                                </a>
                                            @endif
                                            <div class="delete-bill">
                                                @if (in_array('sales-delete', $all_permission))
                                                    {{ Form::open(['route' => ['sales.destroy', $draft->id], 'method' => 'DELETE']) }}
                                                    <a type="submit" class="btn btn-sm" onclick="return confirmDelete()"
                                                        title="Delete"><i class="fa-light fa-trash"></i></a>
                                                    {{ Form::close() }}
                                                @endif

                                            </div>
                                            <div class="bill-date">
                                                <h5><i class="fa-light fa-calendar-check"
                                                        style="padding-right: 4px;color: #03a9f4;font-size: 16px;"></i>
                                                    {{ date('d-m-Y', strtotime($draft->created_at)) }}
                                                </h5>
                                            </div>
                                            <div class="vr bg-gray-700 mx-2 mx-lg-1"></div>
                                            <div class="bill-total">
                                                <h5 class="badge text-bg-success-soft px-1 py-1 fs-5">MWK {{ $draft->grand_total }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                  </div>
                <div class="col-sm-7 col-lg-8 col-xl-7 col-xxl-7 hidden-on-mobile">
                    <div class="filter-window mCustomScrollbar">
                        <div class="category mt-3">
                            <div class="row ml-2 mr-2 px-2">
                                <div class="col-7">Choose category</div>
                                <div class="col-5 text-right">
                                    <span class="btn btn-default btn-sm">
                                        <i class="dripicons-cross"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="row ml-2 mt-3">
                                @foreach ($lims_category_list as $category)
                                <div class="col-2 mowa-card brand-img" data-category="{{ $category->id }}">
                                    <div class="card cc_4">
                                        <a class="btn btn-link">
                                            <div class="card-body">
                                                <h5 class="card-title"> {{ $category->name }}</h5>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="brand mt-3">
                            <div class="row ml-2 mr-2 px-2">
                                <div class="col-7">Choose brand</div>
                                <div class="col-5 text-right">
                                    <span class="btn btn-default btn-sm">
                                        <i class="dripicons-cross"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="row ml-2 mt-3">
                                @foreach ($lims_brand_list as $brand)
                                    <div class="col-2 mowa-card brand-img" data-brand="{{ $brand->id }}">
                                        <div class="card cc_8">
                                            <a class="btn btn-link">
                                                <div class="card-body">
                                                    <h5 class="card-title"> {{ $brand->title }}</h5>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row main-cards scrollbar ms-1 pe-0">
                            <div class="col-sm-4 col-lg-3 mowa-card px-1">
                                <div class="card cc_7">
                                    <a class="btn btn-link" id="category-filter">
                                        <div class="card-body">
                                            <h5 class="card-title"> {{ trans('file.category') }}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg-3 mowa-card px-1">
                                <div class="card cc_2">
                                    <a class="btn btn-link" id="brand-filter">
                                        <div class="card-body">
                                            <h5 class="card-title"> {{ trans('file.Brand') }}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg-3 mowa-card px-1">
                                <div class="card cc_5">
                                    <a class="btn btn-link" id="featured-filter">
                                        <div class="card-body">
                                            <h5 class="card-title"> {{ trans('file.Featured') }}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @foreach ($lims_category_list as $category)
                                <div class="col-sm-4 col-lg-3 mowa-card px-1 category-img" data-category="{{ $category->id }}">
                                    <div class="card cc_8">
                                        <a class="btn btn-link">
                                            <div class="card-body">
                                                <h5 class="card-title"> {{ $category->name }}</h5>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-12 mt-1 table-container">
                            <table id="product-table" class="table table-responsive no-shadow product-list">
                                <thead class="d-none">
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < ceil($product_number / 5); $i++)
                                        <tr>
                                            <td class="listed-product-wrapper product-img sound-btn"
                                                title="{{ $lims_product_list[0 + $i * 5]->name }}"
                                                data-product="{{ $lims_product_list[0 + $i * 5]->code . ' (' . $lims_product_list[0 + $i * 5]->name . ')' }}">
                                                <div class="listed-product-content">
                                                    <button type="button" class="btn btn-default plus"
                                                        style="    border: 1px solid #ccc;
                                                padding: 4px 8px;
                                                float: right;
                                                background: transparent;"><i
                                                            class="dripicons-plus"></i></button>
                                                    <img src="{{ url('public/images/product', $lims_product_list[0 + $i * 5]->base_image) }}"
                                                        width="100%" />
                                                    <p>{{ $lims_product_list[0 + $i * 5]->name }}</p>
                                                </div>

                                            </td>
                                            @if (!empty($lims_product_list[1 + $i * 5]))
                                                <td class="listed-product-wrapper product-img sound-btn"
                                                    title="{{ $lims_product_list[1 + $i * 5]->name }}"
                                                    data-product="{{ $lims_product_list[1 + $i * 5]->code . ' (' . $lims_product_list[1 + $i * 5]->name . ')' }}">
                                                    <div class="listed-product-content">
                                                        <button type="button" class="btn btn-default plus"
                                                            style="    border: 1px solid #ccc;
                                                    padding: 4px 8px;
                                                    float: right;
                                                    background: transparent;"><i
                                                                class="dripicons-plus"></i></button>
                                                        <img src="{{ url('public/images/product', $lims_product_list[1 + $i * 5]->base_image) }}"
                                                            width="100%" />
                                                        <p>{{ $lims_product_list[1 + $i * 5]->name }}</p>
                                                    </div>

                                                </td>
                                            @else
                                                <td class="listed-product-wrapper product-img sound-btn"
                                                    style="border:none;">
                                                </td>
                                            @endif
                                            @if (!empty($lims_product_list[2 + $i * 5]))
                                                <td class="listed-product-wrapper product-img sound-btn"
                                                    title="{{ $lims_product_list[2 + $i * 5]->name }}"
                                                    data-product="{{ $lims_product_list[2 + $i * 5]->code . ' (' . $lims_product_list[2 + $i * 5]->name . ')' }}">
                                                    <div class="listed-product-content">
                                                        <button type="button" class="btn btn-default plus"
                                                            style="    border: 1px solid #ccc;
                                                    padding: 4px 8px;
                                                    float: right;
                                                    background: transparent;"><i
                                                                class="dripicons-plus"></i></button>
                                                        <img src="{{ url('public/images/product', $lims_product_list[2 + $i * 5]->base_image) }}"
                                                            width="100%" />
                                                        <p>{{ $lims_product_list[2 + $i * 5]->name }}</p>
                                                    </div>

                                                </td>
                                            @else
                                                <td class="listed-product-wrapper product-img sound-btn"
                                                    style="border:none;">
                                                </td>
                                            @endif
                                            @if (!empty($lims_product_list[3 + $i * 5]))
                                                <td class="listed-product-wrapper product-img sound-btn"
                                                    title="{{ $lims_product_list[3 + $i * 5]->name }}"
                                                    data-product="{{ $lims_product_list[3 + $i * 5]->code . ' (' . $lims_product_list[3 + $i * 5]->name . ')' }}">
                                                    <div class="listed-product-content">
                                                        <button type="button" class="btn btn-default plus"
                                                            style="    border: 1px solid #ccc;
                                                    padding: 4px 8px;
                                                    float: right;
                                                    background: transparent;"><i
                                                                class="dripicons-plus"></i></button>
                                                        <img src="{{ url('public/images/product', $lims_product_list[3 + $i * 5]->base_image) }}"
                                                            width="100%" />
                                                        <p>{{ $lims_product_list[3 + $i * 5]->name }}</p>
                                                    </div>

                                                </td>
                                            @else
                                                <td class="listed-product-wrapper product-img sound-btn"
                                                    style="border:none;">
                                                </td>
                                            @endif
                                            @if (!empty($lims_product_list[4 + $i * 5]))
                                                <td class="listed-product-wrapper product-img sound-btn"
                                                    title="{{ $lims_product_list[4 + $i * 5]->name }}"
                                                    data-product="{{ $lims_product_list[4 + $i * 5]->code . ' (' . $lims_product_list[4 + $i * 5]->name . ')' }}">
                                                    <div class="listed-product-content">
                                                        <button type="button" class="btn btn-default plus"
                                                            style="    border: 1px solid #ccc;
                                                    padding: 4px 8px;
                                                    float: right;
                                                    background: transparent;"><i
                                                                class="dripicons-plus"></i></button>
                                                        <img src="{{ url('public/images/product', $lims_product_list[4 + $i * 5]->base_image) }}"
                                                            width="100%" />
                                                        <p>{{ $lims_product_list[4 + $i * 5]->name }}</p>
                                                    </div>

                                                </td>
                                            @else
                                                <td class="listed-product-wrapper product-img sound-btn"
                                                    style="border:none;">
                                                </td>
                                            @endif
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="sales-highlights" class="col-md-3 sales-highlights-wrapper">
                    <div class="row bg-highlight-1">
                        <div class="welcome-text col">
                            <h2><strong> Welcome Back! {{ ucfirst(Auth::user()->name) }} </strong></h2>
                        </div>
                    </div>
                    <div class="col-md-12 sales-highlights">
                        <div class="card">
                            <div class="card-body align-items-center">
                                <div class="highlight-heading">
                                    <h2>Today's Sales</h2>
                                </div>
                                <div class="row cash-in-hand">
                                    <div class="col-4">
                                        <span class="sales-icon">
                                            <img src="{{ url('public/images/icons/cash-in-hand.png') }}" alt="">
                                        </span>
                                        <h6 class="text-muted text-uppercase">Cash In Hand
                                            {{-- <br><span class="text-lowercase text-primary">For current shift</span> --}}
                                        </h6>

                                    </div>
                                    <div class="col-8">
                                        <h5 class="card-title"><span id="cash_in_hand" class="badge text-bg-success-soft"></span></h5>
                                    </div>
                                </div>
                                <div class="row profits">
                                    <div class="col-4">
                                        <span class="sales-icon">
                                            <img src="{{ url('public/images/icons/profits.png') }}" alt="">
                                        </span>
                                        <h6 class="text-muted text-uppercase">Profits</h6>
                                    </div>
                                    <div class="col-8">
                                        <h5 class="card-title"><span class="today_profit badge text-bg-success-soft">0</span></h5>
                                    </div>
                                </div>
                                <div class="row sales">
                                    <div class="col-4">
                                        <span class="sales-icon">
                                            <img src="{{ url('public/images/icons/cash-payments.png') }}" alt="">
                                        </span>
                                        <h6 class="text-muted text-uppercase">Cash Sales</h6>
                                    </div>
                                    <div class="col-8">
                                        <h5 class="card-title"><span class="cash_payment badge text-bg-success-soft">0</span></h5>
                                    </div>
                                </div>
                                <div class="row cash">
                                    <div class="col-4">
                                        <h6 class="text-muted text-uppercase">Total Sales</h6>
                                    </div>
                                    <div class="col-8">
                                        <h5 class="card-title"><span class="total_sale_amount badge text-bg-success-soft">0</span></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row bg-highlight-2"></div>
                </div>
                <div id="purchase-totals" class="col-xs-12 col-sm-auto col-md-5 col-lg-4 col-xl-3 col-xxl-3">
                    <div class="card purchase-totals">
                        <div class="card-body" style="padding-bottom: 0">
                            {!! Form::open(['route' => 'sales.store', 'method' => 'post', 'files' => true, 'class' => 'payment-form']) !!}
                            @php
                                if ($lims_pos_setting_data) {
                                    $keybord_active = $lims_pos_setting_data->keybord_active;
                                } else {
                                    $keybord_active = 0;
                                }

                                $customer_active = DB::table('permissions')
                                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                                    ->where([['permissions.name', 'customers-add'], ['role_id', Auth::user()->role_id]])
                                    ->first();
                            @endphp
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="row select-group">
                                        <div class="col-md-12">
                                            <div class="input-group input-group-merge mb-3">
                                                <span class="input-group-text" id="basic-addon1-merged"><i
                                                        class="fa-light fa-search"></i></span>
                                                <input type="text" name="product_code_name"
                                                    class="form-control form-control-lg" id="lims_productcodeSearch"
                                                    placeholder="Scan/Search product by name/code" aria-label="Search"
                                                    aria-describedby="basic-addon1-merged">
                                            </div>

                                        </div>
                                        <div class="col-md-6 pe-md-1">
                                            <div class="input-group input-group-merge mb-3">
                                                <span class="input-group-text" id="datepicker-icon"><i
                                                        class="fa-light fa-calendar"></i></span>
                                                <input type="text" name="created_at" class="form-control date"
                                                    placeholder="Choose date" aria-describedby="datepicker-icon"
                                                    onkeyup='saveValue(this);' />
                                            </div>
                                        </div>
                                        <div class="col-md-6 ps-md-0">
                                            <div class="input-group input-group-merge mb-3">
                                                <span class="input-group-text" id="reference-num"><i
                                                        class="fa-light fa-hashtag"></i></span>
                                                <input type="text" id="reference-no" name="reference_no"
                                                    class="form-control reference-id" placeholder="Reference number"
                                                    aria-describedby="reference-no" onkeyup='saveValue(this);' />
                                            </div>
                                            @if ($errors->has('reference_no'))
                                                <span>
                                                    <strong>{{ $errors->first('reference_no') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-6 pe-md-1">
                                            <div class="input-group input-group-merge mb-3">
                                                @if ($lims_pos_setting_data)
                                                    <span class="input-group-text" id="warehouse-icon"><i
                                                            class="fa-light fa-shop"></i></span>
                                                    <input type="hidden" class="form-control warehouse-select"
                                                        name="warehouse_id_hidden" aria-describedby="warehouse-icon"
                                                        value="{{ $lims_pos_setting_data->warehouse_id }}">
                                                @endif
                                                <select required id="warehouse_id" name="warehouse_id"
                                                    class="selectpicker form-control" data-live-search="true"
                                                    data-live-search-style="begins" title="Select outlet..."
                                                    aria-describedby="warehouse-icon">
                                                    @foreach ($lims_warehouse_list as $warehouse)
                                                        <option value="{{ $warehouse->id }}">{{ $warehouse->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 ps-md-0">
                                            <div class="input-group input-group-merge mb-3{{--  biller-info --}}">
                                                @if ($lims_pos_setting_data)
                                                    <span class="input-group-text" id="biller-icon"><i
                                                            class="fa-light fa-user-tag"></i></span>
                                                    <input type="hidden" name="biller_id_hidden"
                                                        aria-describedby="biller-icon"
                                                        value="{{ $lims_pos_setting_data->biller_id }}">
                                                @endif
                                                <select required id="biller_id" name="biller_id"
                                                    class="selectpicker form-control" data-live-search="true"
                                                    data-live-search-style="begins" title="Select Biller...">
                                                    @foreach ($lims_biller_list as $biller)
                                                        <option value="{{ $biller->id }}">
                                                            {{ $biller->name . ' (' . $biller->company_name . ')' }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                @if ($lims_pos_setting_data)
                                                    <input type="hidden" name="customer_id_hidden"
                                                        value="{{ $lims_pos_setting_data->customer_id }}">
                                                @endif
                                                <div class="input-group input-group-merge mb-3 pos customer-options">
                                                    <span class="input-group-text" id="biller-icon"><i
                                                            class="fa-light fa-user-tag"></i></span>
                                                    @if ($customer_active)
                                                        <select required name="customer_id" id="customer_id"
                                                            class="selectpicker form-control" data-live-search="true"
                                                            title="Select customer..." style="width: 100px">
                                                            <?php
                                                            $deposit = [];
                                                            $points = [];
                                                            ?>
                                                            @foreach ($lims_customer_list as $customer)
                                                                @php
                                                                    $deposit[$customer->id] = $customer->deposit - $customer->expense;

                                                                    $points[$customer->id] = $customer->points;
                                                                @endphp
                                                                <option value="{{ $customer->id }}">
                                                                    {{ $customer->name . ' (' . $customer->phone_number . ')' }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <button type="button"
                                                            class="add-customer-btn btn btn-default btn-sm"
                                                            data-toggle="modal" data-target="#addCustomer"><i
                                                                class="fa-light fa-user-plus"></i></button>
                                                    @else
                                                        <?php
                                                        $deposit = [];
                                                        $points = [];
                                                        ?>
                                                        <select required name="customer_id" id="customer_id"
                                                            class="selectpicker form-control" data-live-search="true"
                                                            title="Select customer...">
                                                            @foreach ($lims_customer_list as $customer)
                                                                @php
                                                                    $deposit[$customer->id] = $customer->deposit - $customer->expense;

                                                                    $points[$customer->id] = $customer->points;
                                                                @endphp
                                                                <option value="{{ $customer->id }}">
                                                                    {{ $customer->name . ' (' . $customer->phone_number . ')' }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="input-group">
                                        <div class="table-responsive transaction-list">
                                            <table id="myTable"
                                                class="table table-hover table-striped order-list table-fixed">
                                                <thead class="transaction-list-items-head">
                                                    <tr>
                                                        <th class="col-sm-2">{{ trans('file.product') }}</th>
                                                        <th class="col-sm-2">{{ trans('file.Batch No') }}</th>
                                                        <th class="col-sm-2">{{ trans('file.Price') }}</th>
                                                        <th class="col-sm-3">{{ trans('file.Quantity') }}</th>
                                                        <th class="col-sm-3">{{ trans('file.Subtotal') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody-id" class="transaction-list-items">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row" style="display: none;">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="hidden" name="total_qty" />
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="hidden" name="total_discount" value="0.00" />
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="hidden" name="total_tax" value="0.00" />
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="hidden" name="total_price" />
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="hidden" name="item" />
                                                <input type="hidden" name="order_tax" />
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="hidden" name="grand_total" />
                                                <input type="hidden" name="used_points" />
                                                <input type="hidden" name="coupon_discount" />
                                                <input type="hidden" name="sale_status" value="1" />
                                                <input type="hidden" name="coupon_active">
                                                <input type="hidden" name="coupon_id">
                                                <input type="hidden" name="coupon_discount" />

                                                <input type="hidden" name="pos" value="1" />
                                                <input type="hidden" name="draft" value="0" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 totals" style="padding-top: 10px;">
                                        <div class="row">
                                            <div class="col-6 text-bg-success-soft discount-btn">
                                                <span class="totals-title"><span type="button" class="btn-sm"
                                                        data-toggle="modal" data-target="#order-discount-modal"><i
                                                            class="dripicons-document-edit"></i>{{ trans('file.Discount') }}
                                                    </span></span><span id="discount">0.00</span>
                                            </div>
                                            <div class="col-6 text-bg-warning-soft tax-btn">
                                                <span class="totals-title"><span type="button" class="btn-sm"
                                                        data-toggle="modal" data-target="#order-tax"><i
                                                            class="dripicons-document-edit"></i> {{ trans('file.Tax') }}
                                                    </span></span><span id="tax">0.00</span>
                                            </div>

                                            <div class="col-9">
                                                <div class="totals-title">{{ trans('file.Items') }}</div>
                                            </div>
                                            <div class="col-3">
                                                <div id="item">0</div>
                                            </div>
                                            <div class="col-9">
                                                <div class="totals-title" style="font-weight: 800">
                                                    {{ trans('file.Total') }}</div>
                                            </div>
                                            <div class="col-3">
                                                <div id="subtotal" style="font-weight: 800">0.00</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="payment-amount">
                            <a class="btn payment-btn" data-toggle="modal" data-target="#add-payment" id="cash-btn">
                                <h2 class="fw-bold">Pay <span id="grand-total">0.00</span></h2>
                            </a>
                            <span class="dropup" style="vertical-align: middle;">
                                <span type="button" class="payment-option dropdown-toggle no-arrow"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa-thin fa-credit-card"></i>
                                </span>
                                <div
                                    class="dropdown-menu dropdown-menu-right bottom-0 end-0 {
                                    inset: auto auto 8px -4px !important;">
                                    <!-- Dropdown menu links -->
                                    <span class="payment-option-heading">
                                        <h4>Payment Methods</h4>
                                    </span>
                                    <div class="row">

                                        <div class="col-6">
                                            <div class="dropdown-item">
                                                <span type="button" class="payment-btn" data-toggle="modal"
                                                    data-target="#add-payment" id="cash-btn">
                                                    <i class="fa-light fa-wallet"></i> Pay Using Cash</span>

                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="dropdown-item">
                                                <span type="button" class="" href="#">
                                                    <i class="fa-light fa-mobile"></i>Airtel Money</span>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="dropdown-item">
                                                <span type="button" class="" href="#"><i
                                                        class="fa-regular fa-landmark"></i>Bank</span>
                                            </div>
                                        </div>


                                        <div class="col-6">
                                            <div class="dropdown-item">
                                                <span type="button" class="" id="draft-btn"><i
                                                        class="fa-light fa-pen-to-square"></i>Create Bill/Draft
                                                </span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </span>
                        </div>
                    </div>
                    <div class="hidden payment-options">
                        <div class="column-5 hidden">
                            <button style="background: #0984e3" type="button" class="btn btn-custom payment-btn"
                                data-toggle="modal" data-target="#add-payment" id="credit-card-btn"><i
                                    class="fa fa-credit-card"></i> {{ trans('file.Card') }}</button>
                        </div>
                        <div class="column-5">
                            <button style="background: #00cec9" type="button" class="btn btn-custom payment-btn"
                                data-toggle="modal" data-target="#add-payment" id="cash-btn"><i
                                    class="fa fa-money"></i> {{ trans('file.Cash') }}</button>
                        </div>
                        <div class="column-5 hidden">
                            <button style="background-color: #213170" type="button" class="btn btn-custom payment-btn"
                                data-toggle="modal" data-target="#add-payment" id="paypal-btn"><i
                                    class="fa fa-paypal"></i> {{ trans('file.PayPal') }}</button>
                        </div>
                        <div class="column-5">
                            <button style="background-color: #e28d02" type="button" class="btn btn-custom"
                                id="draft-btn"><i class="dripicons-flag"></i> {{ trans('file.Draft') }}</button>
                        </div>
                        <div class="column-5 hidden">
                            <button style="background-color: #fd7272" type="button" class="btn btn-custom payment-btn"
                                data-toggle="modal" data-target="#add-payment" id="cheque-btn"><i
                                    class="fa fa-money"></i> {{ trans('file.Cheque') }}</button>
                        </div>
                        <div class="column-5 hidden">
                            <button style="background-color: #5f27cd" type="button" class="btn btn-custom payment-btn"
                                data-toggle="modal" data-target="#add-payment" id="gift-card-btn"><i
                                    class="fa fa-credit-card-alt"></i> {{ trans('file.Gift Card') }}</button>
                        </div>
                        <div class="column-5 hidden">
                            <button style="background-color: #b33771" type="button" class="btn btn-custom payment-btn"
                                data-toggle="modal" data-target="#add-payment" id="deposit-btn"><i
                                    class="fa fa-university"></i> {{ trans('file.Deposit') }}</button>
                        </div>
                        @if ($lims_reward_point_setting_data->is_active)
                            <div class="column-5 hidden">
                                <button style="background-color: #319398" type="button"
                                    class="btn btn-custom payment-btn" data-toggle="modal" data-target="#add-payment"
                                    id="point-btn"><i class="dripicons-rocket"></i> {{ trans('file.Points') }}</button>
                            </div>
                        @endif
                        <div class="column-5">
                            <button style="background-color: #d63031;" type="button" class="btn btn-custom"
                                id="cancel-btn" onclick="return confirmCancel()"><i class="fa fa-close"></i>
                                {{ trans('file.Cancel') }}</button>
                        </div>
                        <div class="column-5">
                            <button style="background-color: #ffc107;" type="button" class="btn btn-custom"
                                data-toggle="modal" data-target="#recentTransaction"><i class="dripicons-clock"></i>
                                {{ trans('file.Recent Transaction') }}</button>
                        </div>
                    </div>
                </div>

            </div>



            <div class="row">
                <div class="mobile-menu-nav nav-tabs" id="myTab" role="tablist">
                    <div class="container">
                        <div class="row justify-content-around navigation-items">
                            <div class="col-3 navigation-item">
                                <span type="button" role="tab" class="btn" aria-controls="itemsListTab"
                                    aria-selected="true">
                                    <span class="menu-icon"> <img
                                            src="{{ url('public/images/icons/streamlinehq-receipt-register-1-shopping-ecommerce-48.png') }}" /></span>
                                    <div class="menu-title">POS</div>
                                </span>
                            </div>
                            <div class="col-3 navigation-item">
                                <span type="button" class="btn"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasBills" aria-controls="offcanvasScrolling">
                                    <span class="menu-icon"> <img
                                            src="{{ url('public/images/icons/streamlinehq-receipt-dollar-shopping-ecommerce-48.png') }}" /></span>
                                    <div class="menu-title">Bills</div>
                                </span>
                            </div>

                            <div class="col-3 navigation-item">
                                <span type="button" class="btn" data-bs-toggle="offcanvas"
                                    href="#offcanvasNotifications" role="button"
                                    aria-controls="offcanvasNotifications">
                                    <span class="menu-icon"> <img
                                            src="{{ url('public/images/icons/streamlinehq-spirits-glass-food-drinks-48.png') }}" /></span>
                                    <div class="menu-title">Product</div>
                                </span>
                            </div>
                            <div class="col-3 navigation-item">
                                <span type="button" class="btn" data-bs-toggle="modal"
                                    data-bs-target="#recentSalesMobileView">
                                    <span class="menu-icon"> <img
                                            src="{{ url('public/images/icons/streamlinehq-performance-money-increase-business-products-48.png') }}" /></span>
                                    <div class="menu-title">Sales</div>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="offcanvas add-product offcanvas-end" tabindex="-1" id="offcanvasNotifications"
                    aria-labelledby="offcanvasNotificationsLabel" aria-modal="true" role="dialog"
                    style="z-index: 9990;">
                    <div class="offcanvas-header px-5">
                        <h3 class="offcanvas-title" id="offcanvasNotificationsLabel">Add Product</h3>

                        <div class="d-flex align-items-start">
                            <div class="dropdown">
                                <a href="javascript: void(0);"
                                    class="dropdown-toggle no-arrow w-20px h-20px me-2 text-body" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="16"
                                        width="16">
                                        <g>
                                            <circle cx="3.25" cy="12" r="3.25"
                                                style="fill: currentColor"></circle>
                                            <circle cx="12" cy="12" r="3.25"
                                                style="fill: currentColor"></circle>
                                            <circle cx="20.75" cy="12" r="3.25"
                                                style="fill: currentColor"></circle>
                                        </g>
                                    </svg>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                class="me-2 text-secondary" height="14" width="14">
                                                <g>
                                                    <path
                                                        d="M23.22,2.06a1.49,1.49,0,0,0-2,.59l-8.5,15.43L6.46,11.29a1.5,1.5,0,1,0-2.21,2l7.64,8.34a1.52,1.52,0,0,0,2.42-.29L23.81,4.1A1.5,1.5,0,0,0,23.22,2.06Z"
                                                        style="fill: currentColor"></path>
                                                    <path
                                                        d="M2.61,14.63a1.5,1.5,0,0,0-2.22,2l4.59,5a1.52,1.52,0,0,0,2.11.09,1.49,1.49,0,0,0,.1-2.12Z"
                                                        style="fill: currentColor"></path>
                                                    <path
                                                        d="M10.3,13a1.41,1.41,0,0,0,2-.54L16.89,4.1a1.5,1.5,0,1,0-2.62-1.45L9.68,11A1.41,1.41,0,0,0,10.3,13Z"
                                                        style="fill: currentColor"></path>
                                                </g>
                                            </svg>
                                            Mark as all read
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                class="me-2 text-secondary" height="14" width="14">
                                                <g>
                                                    <path
                                                        d="M21.5,2.5H2.5a2,2,0,0,0-2,2v3a1,1,0,0,0,1,1h21a1,1,0,0,0,1-1v-3A2,2,0,0,0,21.5,2.5Z"
                                                        style="fill: currentColor"></path>
                                                    <path
                                                        d="M21.5,10H2.5a1,1,0,0,0-1,1v8.5a2,2,0,0,0,2,2h17a2,2,0,0,0,2-2V11A1,1,0,0,0,21.5,10Zm-6.25,3.5A1.25,1.25,0,0,1,14,14.75H10a1.25,1.25,0,0,1,0-2.5h4A1.25,1.25,0,0,1,15.25,13.5Z"
                                                        style="fill: currentColor"></path>
                                                </g>
                                            </svg>
                                            Archive all
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                class="me-2 text-secondary" height="14" width="14">
                                                <g>
                                                    <path
                                                        d="M21,19.5a1,1,0,0,0,0-2A1.5,1.5,0,0,1,19.5,16V11.14a8.65,8.65,0,0,0-.4-2.62l-11,11Z"
                                                        style="fill: currentColor"></path>
                                                    <path
                                                        d="M14.24,21H9.76a.25.25,0,0,0-.24.22,2.64,2.64,0,0,0,0,.28,2.5,2.5,0,0,0,5,0,2.64,2.64,0,0,0,0-.28A.25.25,0,0,0,14.24,21Z"
                                                        style="fill: currentColor"></path>
                                                    <path
                                                        d="M1,24a1,1,0,0,0,.71-.28l22-22a1,1,0,0,0,0-1.42,1,1,0,0,0-1.42,0l-5,5A7.31,7.31,0,0,0,13,3.07V1a1,1,0,0,0-2,0V3.07a8,8,0,0,0-6.5,8.07V16A1.5,1.5,0,0,1,3,17.5a1,1,0,0,0,0,2h.09L.29,22.29a1,1,0,0,0,0,1.42A1,1,0,0,0,1,24Z"
                                                        style="fill: currentColor"></path>
                                                </g>
                                            </svg>
                                            Disable notifications
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript: void(0);">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                class="me-2 text-secondary" height="14" width="14">
                                                <g>
                                                    <rect x="4.25" y="4.5" width="5.75"
                                                        height="7.25" rx="1.25" style="fill: currentColor">
                                                    </rect>
                                                    <path
                                                        d="M24,10a3,3,0,0,0-3-3H19V2.5a2,2,0,0,0-2-2H2a2,2,0,0,0-2,2V20a3.5,3.5,0,0,0,3.5,3.5h17A3.5,3.5,0,0,0,24,20ZM3.5,21.5A1.5,1.5,0,0,1,2,20V3a.5.5,0,0,1,.5-.5h14A.5.5,0,0,1,17,3V20a3.51,3.51,0,0,0,.11.87.5.5,0,0,1-.09.44.49.49,0,0,1-.39.19ZM22,20a1.5,1.5,0,0,1-3,0V9.5a.5.5,0,0,1,.5-.5H21a1,1,0,0,1,1,1Z"
                                                        style="fill: currentColor"></path>
                                                    <rect x="12" y="6.05" width="3.5"
                                                        height="2" rx="0.75" style="fill: currentColor">
                                                    </rect>
                                                    <rect x="12" y="10.05" width="3.5"
                                                        height="2" rx="0.75" style="fill: currentColor">
                                                    </rect>
                                                    <rect x="4" y="14.05" width="11.5"
                                                        height="2" rx="0.75" style="fill: currentColor">
                                                    </rect>
                                                    <rect x="4" y="18.05" width="9"
                                                        height="2" rx="0.75" style="fill: currentColor">
                                                    </rect>
                                                </g>
                                            </svg>
                                            What's new?
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <!-- Button -->
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                    </div>

                    <div class="offcanvas-body p-0">
                        <div class="col-12">
                            <div class="filter-window">
                                <div class="category mt-3">
                                    <div class="row ml-2 mr-2 px-2">
                                        <div class="col-7">Choose category</div>
                                        <div class="col-5 text-right">
                                            <span class="btn btn-default btn-sm">
                                                <i class="dripicons-cross"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row ml-2 mt-3">
                                        @foreach ($lims_category_list as $category)
                                        <div class="col-2 mowa-card brand-img" data-category="{{ $category->id }}">
                                            <div class="card cc_4">
                                                <a class="btn btn-link">
                                                    <div class="card-body">
                                                        <h5 class="card-title"> {{ $category->name }}</h5>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                            {{-- <div class="col-md-3 category-img text-center"
                                                data-category="{{ $category->id }}">
                                                @if ($category->image)
                                                    <img src="{{ url('public/images/category', $category->image) }}" />
                                                @else
                                                    <img src="{{ url('public/images/product/zummXD2dvAtI.png') }}" />
                                                @endif
                                                <p class="text-center">{{ $category->name }}</p>
                                            </div> --}}
                                        @endforeach
                                    </div>
                                </div>
                                <div class="brand mt-3">
                                    <div class="row ml-2 mr-2 px-2">
                                        <div class="col-7">Choose brand</div>
                                        <div class="col-5 text-right">
                                            <span class="btn btn-default btn-sm">
                                                <i class="dripicons-cross"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row ml-2 mt-3">
                                        @foreach ($lims_brand_list as $brand)
                                            <div class="col-3 mowa-card brand-img" data-brand="{{ $brand->id }}">
                                                <div class="card cc_2">
                                                    <a class="btn btn-link">
                                                        <div class="card-body">
                                                            <h5 class="card-title"> {{ $brand->title }}</h5>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3 mowa-card">
                                    <div class="card cc_7">
                                        <a class="btn btn-link" id="category-filter">
                                            <div class="card-body">
                                                <h5 class="card-title"> {{ trans('file.category') }}</h5>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-3 mowa-card">
                                    <div class="card cc_2">
                                        <a class="btn btn-link" id="brand-filter">
                                            <div class="card-body">
                                                <h5 class="card-title"> {{ trans('file.Brand') }}</h5>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-3 mowa-card">
                                    <div class="card cc_5">
                                        <a class="btn btn-link" id="featured-filter">
                                            <div class="card-body">
                                                <h5 class="card-title"> {{ trans('file.Featured') }}</h5>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                @foreach ($lims_category_list as $category)
                                    <div class="col-3 mowa-card category-img" data-category="{{ $category->id }}">
                                        <div class="card cc_8">
                                            <a class="btn btn-link">
                                                <div class="card-body">
                                                    <h5 class="card-title"> {{ $category->name }}</h5>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-3 category-img text-center" data-category="{{$category->id}}">
                                @if ($category->image)
                                <img src="{{url('public/images/category', $category->image)}}" />
                                @else
                                <img src="{{url('public/images/product/zummXD2dvAtI.png')}}" />
                                @endif
                                <p class="text-center">{{$category->name}}</p>
                            </div> --}}
                                @endforeach

                                <div class="col-md-12 mt-1 table-container">
                                    <table id="product-table" class="table mCustomScrollbar no-shadow product-list">
                                        <thead class="d-none">
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @for ($i = 0; $i < ceil($product_number / 5); $i++)
                                                <tr>
                                                    <td class="listed-product-wrapper product-img sound-btn"
                                                        title="{{ $lims_product_list[0 + $i * 5]->name }}"
                                                        data-product="{{ $lims_product_list[0 + $i * 5]->code . ' (' . $lims_product_list[0 + $i * 5]->name . ')' }}">
                                                        <div class="listed-product-content">
                                                            <button type="button" class="btn btn-default plus"
                                                                style="    border: 1px solid #ccc;
                                                        padding: 4px 8px;
                                                        float: right;
                                                        background: transparent;"><i
                                                                    class="dripicons-plus"></i></button>
                                                            </span><img
                                                                src="{{ url('public/images/product', $lims_product_list[0 + $i * 5]->base_image) }}"
                                                                width="100%" />
                                                            <p>{{ $lims_product_list[0 + $i * 5]->name }}</p>
                                                        </div>

                                                    </td>
                                                    @if (!empty($lims_product_list[1 + $i * 5]))
                                                        <td class="listed-product-wrapper product-img sound-btn"
                                                            title="{{ $lims_product_list[1 + $i * 5]->name }}"
                                                            data-product="{{ $lims_product_list[1 + $i * 5]->code . ' (' . $lims_product_list[1 + $i * 5]->name . ')' }}">
                                                            <div class="listed-product-content">
                                                                <button type="button" class="btn btn-default plus"
                                                                    style="    border: 1px solid #ccc;
                                                            padding: 4px 8px;
                                                            float: right;
                                                            background: transparent;"><i
                                                                        class="dripicons-plus"></i></button>
                                                                <img src="{{ url('public/images/product', $lims_product_list[1 + $i * 5]->base_image) }}"
                                                                    width="100%" />
                                                                <p>{{ $lims_product_list[1 + $i * 5]->name }}</p>
                                                            </div>

                                                        </td>
                                                    @else
                                                        <td class="listed-product-wrapper product-img sound-btn"
                                                            style="border:none;">
                                                        </td>
                                                    @endif
                                                    @if (!empty($lims_product_list[2 + $i * 5]))
                                                        <td class="listed-product-wrapper product-img sound-btn"
                                                            title="{{ $lims_product_list[2 + $i * 5]->name }}"
                                                            data-product="{{ $lims_product_list[2 + $i * 5]->code . ' (' . $lims_product_list[2 + $i * 5]->name . ')' }}">
                                                            <div class="listed-product-content">
                                                                <button type="button" class="btn btn-default plus"
                                                                    style="    border: 1px solid #ccc;
                                                            padding: 4px 8px;
                                                            float: right;
                                                            background: transparent;"><i
                                                                        class="dripicons-plus"></i></button>
                                                                <img src="{{ url('public/images/product', $lims_product_list[2 + $i * 5]->base_image) }}"
                                                                    width="100%" />
                                                                <p>{{ $lims_product_list[2 + $i * 5]->name }}</p>
                                                            </div>

                                                        </td>
                                                    @else
                                                        <td class="listed-product-wrapper product-img sound-btn"
                                                            style="border:none;">
                                                        </td>
                                                    @endif
                                                    @if (!empty($lims_product_list[3 + $i * 5]))
                                                        <td class="listed-product-wrapper product-img sound-btn"
                                                            title="{{ $lims_product_list[3 + $i * 5]->name }}"
                                                            data-product="{{ $lims_product_list[3 + $i * 5]->code . ' (' . $lims_product_list[3 + $i * 5]->name . ')' }}">
                                                            <div class="listed-product-content">
                                                                <button type="button" class="btn btn-default plus"
                                                                    style="    border: 1px solid #ccc;
                                                            padding: 4px 8px;
                                                            float: right;
                                                            background: transparent;"><i
                                                                        class="dripicons-plus"></i></button>
                                                                <img src="{{ url('public/images/product', $lims_product_list[3 + $i * 5]->base_image) }}"
                                                                    width="100%" />
                                                                <p>{{ $lims_product_list[3 + $i * 5]->name }}</p>
                                                            </div>

                                                        </td>
                                                    @else
                                                        <td class="listed-product-wrapper product-img sound-btn"
                                                            style="border:none;">
                                                        </td>
                                                    @endif
                                                    @if (!empty($lims_product_list[4 + $i * 5]))
                                                        <td class="listed-product-wrapper product-img sound-btn"
                                                            title="{{ $lims_product_list[4 + $i * 5]->name }}"
                                                            data-product="{{ $lims_product_list[4 + $i * 5]->code . ' (' . $lims_product_list[4 + $i * 5]->name . ')' }}">
                                                            <div class="listed-product-content">
                                                                <button type="button" class="btn btn-default plus"
                                                                    style="    border: 1px solid #ccc;
                                                            padding: 4px 8px;
                                                            float: right;
                                                            background: transparent;"><i
                                                                        class="dripicons-plus"></i></button>
                                                                <img src="{{ url('public/images/product', $lims_product_list[4 + $i * 5]->base_image) }}"
                                                                    width="100%" />
                                                                <p>{{ $lims_product_list[4 + $i * 5]->name }}</p>
                                                            </div>

                                                        </td>
                                                    @else
                                                        <td class="listed-product-wrapper product-img sound-btn"
                                                            style="border:none;">
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endfor
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- payment modal -->
                <div id="add-payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" class="modal payment-modal fade text-left">
                    <div role="document" class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                {{-- <h5 id="exampleModalLabel" class="modal-title">{{ trans('file.Finalize Sale') }}</h5> --}}
                                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                        aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                            </div>
                            <div class="row no-gutters">
                                <div class="col-md-6 px-0 d-flex">
                                    <div class="modal-body p-5 img d-flex color-1 text-center d-flex justify-content-center align-items-center">
                                        {{-- <h2 class="modal-title">{{ trans('file.Finalize Sale') }}</h2> --}}
                                        <div class="receipt-icon-long ">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="width: 140px;fill: #4aa4c6;text-align: center;" xml:space="preserve" id="Capa_1" enable-background="new 0 0 60 60" version="1.1" viewBox="0 0 60 60"><path d="M60,4.293c0-2.206-1.794-4-4-4H4c-2.206,0-4,1.794-4,4c0,1.859,1.28,3.411,3,3.858v48.556l3-3l6,6l6-6l6,6l6-6l6,6l6-6l6,6 l6-6l3,3V8.151C58.72,7.704,60,6.152,60,4.293z M55,51.879l-1-1l-6,6l-6-6l-6,6l-6-6l-6,6l-6-6l-6,6l-6-6l-1,1V8.293v-3h50v3 V51.879z M57,6.024V3.293H3v2.731C2.403,5.679,2,5.032,2,4.293c0-1.103,0.897-2,2-2h52c1.103,0,2,0.897,2,2 C58,5.032,57.597,5.679,57,6.024z"/><path d="M44 40.293H29c-.552 0-1 .447-1 1s.448 1 1 1h15c.552 0 1-.447 1-1S44.552 40.293 44 40.293zM48.29 40.583c-.18.189-.29.439-.29.71 0 .26.11.52.29.71.19.18.45.29.71.29.26 0 .52-.11.71-.29.18-.19.29-.45.29-.71 0-.271-.11-.521-.29-.71C49.33 40.213 48.67 40.213 48.29 40.583zM49 26.293H34c-.552 0-1 .447-1 1s.448 1 1 1h15c.552 0 1-.447 1-1S49.552 26.293 49 26.293zM49 33.293H39c-.552 0-1 .447-1 1s.448 1 1 1h10c.552 0 1-.447 1-1S49.552 33.293 49 33.293zM28 34.293c0 .553.448 1 1 1h2c.552 0 1-.447 1-1s-.448-1-1-1h-2C28.448 33.293 28 33.74 28 34.293zM45 20.293c0-.553-.448-1-1-1H29c-.552 0-1 .447-1 1s.448 1 1 1h15C44.552 21.293 45 20.846 45 20.293zM48.29 19.583c-.18.189-.29.439-.29.71 0 .26.11.52.29.71.19.18.45.29.71.29.27 0 .52-.11.71-.29.18-.19.29-.45.29-.71s-.11-.521-.29-.71C49.34 19.213 48.66 19.213 48.29 19.583zM30.71 28.003c.18-.19.29-.44.29-.71 0-.271-.11-.521-.29-.71-.37-.37-1.04-.37-1.42 0-.18.189-.29.439-.29.71 0 .27.11.52.29.71.19.18.45.29.71.29C30.26 28.293 30.52 28.183 30.71 28.003zM35.71 35.003c.18-.19.29-.44.29-.71 0-.271-.11-.53-.29-.71-.37-.37-1.04-.37-1.42 0-.18.189-.29.45-.29.71s.11.52.29.71c.19.18.45.29.71.29C35.26 35.293 35.52 35.183 35.71 35.003zM17 21.394v-1.101c0-.553-.448-1-1-1s-1 .447-1 1v1.104c-1.091.222-2.085.801-2.818 1.668-.611.722-.894 1.646-.794 2.603.102.979.606 1.887 1.383 2.491L15 29.893v5.438c-1.161-.414-2-1.514-2-2.816 0-.553-.448-1-1-1s-1 .447-1 1c0 2.414 1.721 4.434 4 4.899v.878c0 .553.448 1 1 1s1-.447 1-1v-.882c1.091-.222 2.085-.801 2.819-1.668.611-.724.893-1.648.793-2.605-.103-.978-.606-1.885-1.383-2.488L17 28.916v-5.438c1.161.414 2 1.514 2 2.816 0 .553.448 1 1 1s1-.447 1-1C21 23.879 19.279 21.859 17 21.394zM18.001 32.228c.349.271.576.68.622 1.118.043.41-.075.803-.331 1.105-.348.411-.798.699-1.292.875v-3.878L18.001 32.228zM13.999 26.581c-.35-.272-.576-.681-.622-1.12-.042-.409.075-.801.331-1.104.348-.411.798-.699 1.292-.875v3.877L13.999 26.581z"/><circle cx="40" cy="11.293" r="1"/><circle cx="36" cy="11.293" r="1"/><circle cx="44" cy="11.293" r="1"/><circle cx="32" cy="11.293" r="1"/><circle cx="48" cy="11.293" r="1"/><circle cx="20" cy="11.293" r="1"/><circle cx="24" cy="11.293" r="1"/><circle cx="28" cy="11.293" r="1"/><circle cx="52" cy="11.293" r="1"/><circle cx="16" cy="11.293" r="1"/><circle cx="12" cy="11.293" r="1"/><circle cx="8" cy="11.293" r="1"/></svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 px-0 d-flex">
                                    <div class="modal-body p-5 img align-items-center color-2">
                                        <div class="col-md-12">
                                            <div class="col-md-12 mt-1">
                                                <label class="text-uppercase">{{ trans('file.Recieved Amount') }} *</label>
                                                <input type="text" name="paying_amount" class="form-control form-lg-text form-control-lg numkey"
                                                    required step="any">
                                            </div>
                                            <div class="col-md-12 mt-1">
                                                <label class="text-uppercase">{{ trans('file.Paying Amount') }} *</label>
                                                <input type="text" name="paid_amount" class="form-control form-lg-text form-control-lg numkey"
                                                    step="any">
                                            </div>
                                            <div class="col-md-12 mt-1">
                                                <label class="text-uppercase">{{ trans('file.Change') }} : </label>
                                                <p id="change" class="ml-2">0.00</p>
                                            </div>
                                            <div class="col-md-12 mt-1">
                                                <input type="hidden" name="paid_by_id">
                                                <label>{{ trans('file.Paid By') }}</label>
                                                <select name="paid_by_id_select" class="form-control selectpicker">
                                                    <option value="1">Cash</option>
                                                    <option value="2">Gift Card</option>
                                                    <option value="3">Credit Card</option>
                                                    <option value="4">Cheque</option>
                                                    <option value="5">Paypal</option>
                                                    <option value="6">Deposit</option>
                                                    @if ($lims_reward_point_setting_data->is_active)
                                                        <option value="7">Points</option>
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12 mt-3">
                                                <div class="card-element form-control">
                                                </div>
                                                <div class="card-errors" role="alert"></div>
                                            </div>
                                            <div class="form-group col-md-12 gift-card">
                                                <label> {{ trans('file.Gift Card') }} *</label>
                                                <input type="hidden" name="gift_card_id">
                                                <select id="gift_card_id_select" name="gift_card_id_select"
                                                    class="selectpicker form-control" data-live-search="true"
                                                    data-live-search-style="begins"
                                                    title="Select Gift Card..."></select>
                                            </div>
                                            <div class="form-group col-md-12 cheque">
                                                <label>{{ trans('file.Cheque Number') }} *</label>
                                                <input type="text" name="cheque_no" class="form-control">
                                            </div>

                                        </div>
                                        <div class="col-md-12">
                                            <p>
                                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                                    Add Note
                                                </button>
                                            </p>

                                            <div class="collapse" id="collapseExample">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label>{{ trans('file.Payment Note') }}</label>
                                                            <textarea id="payment_note" rows="2" class="form-control" name="payment_note"></textarea>
                                                        </div>
                                                        <div class="col-md-6 form-group">
                                                            <label>{{ trans('file.Sale Note') }}</label>
                                                            <textarea rows="3" class="form-control" name="sale_note"></textarea>
                                                        </div>
                                                        <div class="col-md-6 form-group">
                                                            <label>{{ trans('file.Staff Note') }}</label>
                                                            <textarea rows="3" class="form-control" name="staff_note"></textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <button id="submit-btn" type="button"
                                                class="btn btn-primary">Process Payment</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-6 mt-1">
                                                <label>{{ trans('file.Recieved Amount') }} *</label>
                                                <input type="text" name="paying_amount" class="form-control numkey"
                                                    required step="any">
                                            </div>
                                            <div class="col-md-6 mt-1">
                                                <label>{{ trans('file.Paying Amount') }} *</label>
                                                <input type="text" name="paid_amount" class="form-control numkey"
                                                    step="any">
                                            </div>
                                            <div class="col-md-6 mt-1">
                                                <label>{{ trans('file.Change') }} : </label>
                                                <p id="change" class="ml-2">0.00</p>
                                            </div>
                                            <div class="col-md-6 mt-1">
                                                <input type="hidden" name="paid_by_id">
                                                <label>{{ trans('file.Paid By') }}</label>
                                                <select name="paid_by_id_select" class="form-control selectpicker">
                                                    <option value="1">Cash</option>
                                                    <option value="2">Gift Card</option>
                                                    <option value="3">Credit Card</option>
                                                    <option value="4">Cheque</option>
                                                    <option value="5">Paypal</option>
                                                    <option value="6">Deposit</option>
                                                    @if ($lims_reward_point_setting_data->is_active)
                                                        <option value="7">Points</option>
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12 mt-3">
                                                <div class="card-element form-control">
                                                </div>
                                                <div class="card-errors" role="alert"></div>
                                            </div>
                                            <div class="form-group col-md-12 gift-card">
                                                <label> {{ trans('file.Gift Card') }} *</label>
                                                <input type="hidden" name="gift_card_id">
                                                <select id="gift_card_id_select" name="gift_card_id_select"
                                                    class="selectpicker form-control" data-live-search="true"
                                                    data-live-search-style="begins"
                                                    title="Select Gift Card..."></select>
                                            </div>
                                            <div class="form-group col-md-12 cheque">
                                                <label>{{ trans('file.Cheque Number') }} *</label>
                                                <input type="text" name="cheque_no" class="form-control">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>{{ trans('file.Payment Note') }}</label>
                                                <textarea id="payment_note" rows="2" class="form-control" name="payment_note"></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label>{{ trans('file.Sale Note') }}</label>
                                                <textarea rows="3" class="form-control" name="sale_note"></textarea>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>{{ trans('file.Staff Note') }}</label>
                                                <textarea rows="3" class="form-control" name="staff_note"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-2 qc" data-initial="1">
                                        <h4><strong>{{ trans('file.Quick Cash') }}</strong></h4>
                                        <button class="btn btn-block btn-primary qc-btn sound-btn" data-amount="10"
                                            type="button">10
                                        </button>
                                        <button class="btn btn-block btn-primary qc-btn sound-btn" data-amount="20"
                                            type="button">20
                                        </button>
                                        <button class="btn btn-block btn-primary qc-btn sound-btn" data-amount="50"
                                            type="button">50
                                        </button>
                                        <button class="btn btn-block btn-primary qc-btn sound-btn" data-amount="100"
                                            type="button">100
                                        </button>
                                        <button class="btn btn-block btn-primary qc-btn sound-btn" data-amount="500"
                                            type="button">500
                                        </button>
                                        <button class="btn btn-block btn-primary qc-btn sound-btn" data-amount="1000"
                                            type="button">1000
                                        </button>
                                        <button class="btn btn-block btn-danger qc-btn sound-btn" data-amount="0"
                                            type="button">{{ trans('file.Clear') }}</button>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <!-- order_discount modal -->
                <div id="order-discount-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ trans('file.Order Discount') }}</h5>
                                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                        aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>{{ trans('file.Order Discount Type') }}</label>
                                        <select id="order-discount-type" name="order_discount_type_select"
                                            class="form-control">
                                            <option value="Flat">{{ trans('file.Flat') }}</option>
                                            <option value="Percentage">{{ trans('file.Percentage') }}</option>
                                        </select>
                                        <input type="hidden" name="order_discount_type">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>{{ trans('file.Value') }}</label>
                                        <input type="text" name="order_discount_value" class="form-control numkey"
                                            id="order-discount-val" onkeyup='saveValue(this);'>
                                        <input type="hidden" name="order_discount" class="form-control"
                                            id="order-discount" onkeyup='saveValue(this);'>
                                    </div>
                                </div>
                                <button type="button" name="order_discount_btn" class="btn btn-primary"
                                    data-dismiss="modal">{{ trans('file.submit') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- coupon modal -->
                <div id="coupon-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ trans('file.Coupon Code') }}</h5>
                                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                        aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="text" id="coupon-code" class="form-control"
                                        placeholder="Type Coupon Code...">
                                </div>
                                <button type="button" class="btn btn-primary coupon-check"
                                    data-dismiss="modal">{{ trans('file.submit') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- order_tax modal -->
                <div id="order-tax" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ trans('file.Order Tax') }}</h5>
                                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                        aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="hidden" name="order_tax_rate">
                                    <select class="form-control" name="order_tax_rate_select"
                                        id="order-tax-rate-select">
                                        <option value="0">No Tax</option>
                                        @foreach ($lims_tax_list as $tax)
                                            <option value="{{ $tax->rate }}">{{ $tax->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="button" name="order_tax_btn" class="btn btn-primary"
                                    data-dismiss="modal">{{ trans('file.submit') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- shipping_cost modal -->
                <div id="shipping-cost-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ trans('file.Shipping Cost') }}</h5>
                                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                        aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="text" name="shipping_cost" class="form-control numkey"
                                        id="shipping-cost-val" step="any" onkeyup='saveValue(this);'>
                                </div>
                                <button type="button" name="shipping_cost_btn" class="btn btn-primary"
                                    data-dismiss="modal">{{ trans('file.submit') }}</button>
                            </div>
                        </div>
                    </div>
                </div>

                {!! Form::close() !!} {{-- Highlight Here --}}
                <!-- product list -->

                <!-- product edit modal -->
                <div id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 id="modal_header" class="modal-title"></h5>
                                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                        aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="row modal-element">
                                        <div class="col-md-4 form-group">
                                            <label>{{ trans('file.Quantity') }}</label>
                                            <input type="text" name="edit_qty" class="form-control numkey">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>{{ trans('file.Unit Discount') }}</label>
                                            <input type="text" name="edit_discount" class="form-control numkey">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>{{ trans('file.Unit Price') }}</label>
                                            <input type="text" name="edit_unit_price" class="form-control numkey"
                                                step="any">
                                        </div>
                                        <?php
                                        $tax_name_all[] = 'No Tax';
                                        $tax_rate_all[] = 0;
                                        foreach ($lims_tax_list as $tax) {
                                            $tax_name_all[] = $tax->name;
                                            $tax_rate_all[] = $tax->rate;
                                        }
                                        ?>
                                        <div class="col-md-4 form-group">
                                            <label>{{ trans('file.Tax Rate') }}</label>
                                            <select name="edit_tax_rate" class="form-control selectpicker">
                                                @foreach ($tax_name_all as $key => $name)
                                                    <option value="{{ $key }}">{{ $name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div id="edit_unit" class="col-md-4 form-group">
                                            <label>{{ trans('file.Product Unit') }}</label>
                                            <select name="edit_unit" class="form-control selectpicker">
                                            </select>
                                        </div>
                                    </div>
                                    <button type="button" name="update_btn"
                                        class="btn btn-primary">{{ trans('file.update') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- add customer modal -->
                <div id="addCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                        <div class="modal-content">
                            {!! Form::open(['route' => 'customer.store', 'method' => 'post', 'files' => true]) !!}
                            <div class="modal-header">
                                <h5 id="exampleModalLabel" class="modal-title">{{ trans('file.Add Customer') }}</h5>
                                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                        aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                            </div>
                            <div class="modal-body">
                                <p class="italic">
                                    <small>{{ trans('file.The field labels marked with * are required input fields') }}
                                        .</small>
                                </p>
                                <div class="form-group">
                                    <label>{{ trans('file.Customer Group') }} *</strong> </label>
                                    <select required class="form-control selectpicker" name="customer_group_id">
                                        @foreach ($lims_customer_group_all as $customer_group)
                                            <option value="{{ $customer_group->id }}">{{ $customer_group->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('file.name') }} *</strong> </label>
                                    <input type="text" name="customer_name" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('file.Email') }}</label>
                                    <input type="text" name="email" placeholder="example@example.com"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('file.Phone Number') }} *</label>
                                    <input type="text" name="phone_number" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('file.Address') }} *</label>
                                    <input type="text" name="address" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('file.City') }} *</label>
                                    <input type="text" name="city" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="pos" value="1">
                                    <input type="submit" value="{{ trans('file.submit') }}"
                                        class="btn btn-primary">
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>

                {{-- Bills Mobile View Modal --}}
                <div class="modal fade" id="billsMobileView" tabindex="-1" role="dialog"
                    aria-labelledby="billsMobileViewTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body px-2">
                                <div class="bills-tab">
                                    <div class="bills-header">
                                        <div class="row">
                                            <h3 class="col-10 title">Bills</h3>
                                            <div class="col-2 add-bill-draft">
                                                <i class="fa-light fa-clipboard-list-check"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bills" style="max-height: 100% !important;">
                                        @foreach ($recent_draft as $draft)
                                            <?php $customer = DB::table('customers')->find($draft->customer_id); ?>
                                            <div class="bill-item">
                                                <div class="row">
                                                    <div class="square-abrv col-3">
                                                        <h1 class="text-bg-primary-soft">A</h1>
                                                    </div>
                                                    <div class="col-9">
                                                        @if (in_array('sales-edit', $all_permission))
                                                            <a href="{{ url('sales/' . $draft->id . '/create') }}"
                                                                class="" title="Edit Bill">
                                                                <div class="bill-customer-name">
                                                                    <h4>{{ $customer->name }}</h4>
                                                                </div>
                                                            </a>
                                                        @endif
                                                        <div class="delete-bill">
                                                            @if (in_array('sales-delete', $all_permission))
                                                                {{ Form::open(['route' => ['sales.destroy', $draft->id], 'method' => 'DELETE']) }}
                                                                <a type="submit" class="btn btn-sm"
                                                                    onclick="return confirmDelete()" title="Delete"><i
                                                                        class="fa-light fa-trash"></i></a>
                                                                {{ Form::close() }}
                                                            @endif

                                                        </div>
                                                        <div class="bill-date">
                                                            <h5><i class="fa-light fa-calendar-check"
                                                                    style="padding-right: 4px;color: #03a9f4;font-size: 16px;"></i>
                                                                {{ date('d-m-Y', strtotime($draft->created_at)) }}
                                                            </h5>
                                                        </div>
                                                        <div class="arrow-right"><i
                                                                class="fa-light fa-arrow-right-long"></i></div>
                                                        <div class="bill-total">
                                                            <h5>MWK {{ $draft->grand_total }}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>


                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="recentSalesMobileView" tabindex="-1" role="dialog"
                    aria-labelledby="recentSalesMobileViewTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="recentSalesMobileViewTitle">Recent Sales
                                    <span class="badge text-bg-info-soft ms-2"> {{ trans('file.latest') }} 10</span>
                                </h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table class="table table-sm table-nowrap">
                                        <thead class="thead-light text-uppercase">
                                            <tr class="table-primary fw-bold">
                                                <th class="fs-6 fw-bold">{{ trans('file.date') }}</th>
                                                {{-- <th class="fs-6 fw-bold">{{ trans('file.reference') }}</th> --}}
                                                <th class="fs-6 fw-bold">{{ trans('file.customer') }}</th>
                                                <th class="fs-6 fw-bold">{{ trans('file.grand total') }}</th>
                                                <th class="fs-6 fw-bold">{{ trans('file.action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($recent_sale as $sale)
                                                <?php $customer = DB::table('customers')->find($sale->customer_id); ?>
                                                <tr>
                                                    <td class="fw-bold">{{ date('d-m-Y', strtotime($sale->created_at)) }}</td>
                                                    {{-- <td>{{ $sale->reference_no }}</td> --}}
                                                    <td>{{ $customer->name }}</td>
                                                    <td><span class="badge text-bg-success-soft fs-4"><i class="fa-solid fa-check me-3"></i>{{ $sale->grand_total }}</span></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a class="btn text-bg-secondary-soft dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                More
                                                            </a>

                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <span class="dropdown-item">
                                                                        <div class="col-md-12 label"><h5 class="fs-4 fw-bold">Sale Reference Number</h5></div>
                                                                    </span>
                                                                </li>
                                                                <li>
                                                                    <span class="dropdown-item">
                                                                        <div class="col-md-12">{{ $sale->reference_no }}</div>
                                                                    </span>
                                                                </li>
                                                                <li>
                                                                    @if (in_array('sales-edit', $all_permission))
                                                                    <a href="{{ route('sales.edit', $sale->id) }}"
                                                                        class="dropdown-item text-bg-success-soft"
                                                                        title="Edit">
                                                                        <i class="fa-light fa-edit fs-4 me-3"></i>
                                                                        Edit</a>
                                                                @endif
                                                                @if (in_array('sales-delete', $all_permission))
                                                                    {{ Form::open(['route' => ['sales.destroy', $sale->id], 'method' => 'DELETE']) }}
                                                                <li>
                                                                    <a type="submit"
                                                                        class="dropdown-item text-bg-danger-soft"
                                                                        onclick="return confirmDelete()"
                                                                        title="Delete">
                                                                        <i class="fa-light fa-trash fs-4 me-3"></i>
                                                                        Delete

                                                                    </a>
                                                                    {{ Form::close() }}
                                                                </li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- recent transaction modal -->
                <div id="recentTransaction" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
                    class="modal fade text-left">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 id="exampleModalLabel" class="modal-title">{{ trans('file.Recent Transaction') }}
                                    <div class="badge badge-primary">{{ trans('file.latest') }} 10</div>
                                </h5>
                                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                        aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                            </div>
                            <div class="modal-body scrollbar">
                                <div class="btn-group">
                                    <ul class="nav nav-pills mb-2" role="tablist">
                                        <li class="nav-item text-bg-success-soft">
                                            <a class="nav-link active" href="#sale-latest" role="tab"
                                                data-toggle="tab">{{ trans('file.Sale') }}</a>
                                        </li>
                                        <li class="nav-item text-bg-info-soft">
                                            <a class="nav-link" href="#draft-latest" role="tab"
                                                data-toggle="tab">Bills/Drafts</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane show active" id="sale-latest">
                                        <div class="table-responsive">
                                            <table class="table table-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>{{ trans('file.date') }}</th>
                                                        <th>{{ trans('file.reference') }}</th>
                                                        <th>{{ trans('file.customer') }}</th>
                                                        <th>{{ trans('file.grand total') }}</th>
                                                        <th>{{ trans('file.action') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($recent_sale as $sale)
                                                        <?php $customer = DB::table('customers')->find($sale->customer_id); ?>
                                                        <tr>
                                                            <td class="fw-bold">{{ date('d-m-Y', strtotime($sale->created_at)) }}</td>
                                                            <td>{{ $sale->reference_no }}</td>
                                                            <td>{{ $customer->name }}</td>
                                                            <td><span class="badge text-bg-success-soft fs-4"><i class="fa-solid fa-check me-3"></i>{{ $sale->grand_total }}</span></td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <a class="btn text-bg-secondary-soft dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        More
                                                                    </a>

                                                                    <ul class="dropdown-menu">
                                                                        <li>
                                                                            @if (in_array('sales-edit', $all_permission))
                                                                            <a href="{{ route('sales.edit', $sale->id) }}"
                                                                                class="dropdown-item text-bg-success-soft"
                                                                                title="Edit">
                                                                                <i class="fa-light fa-edit fs-4 me-3"></i>
                                                                                Edit</a>
                                                                        @endif
                                                                        @if (in_array('sales-delete', $all_permission))
                                                                            {{ Form::open(['route' => ['sales.destroy', $sale->id], 'method' => 'DELETE']) }}
                                                                        <li>
                                                                            <a type="submit"
                                                                                class="dropdown-item text-bg-danger-soft"
                                                                                onclick="return confirmDelete()"
                                                                                title="Delete">
                                                                                <i class="fa-light fa-trash fs-4 me-3"></i>
                                                                                Delete

                                                                            </a>
                                                                            {{ Form::close() }}
                                                                        </li>
                                                                        @endif
                                                                    </ul>
                                                                </div>
                                                                {{-- <div class="btn-group">
                                                                    @if (in_array('sales-edit', $all_permission))
                                                                        <a href="{{ route('sales.edit', $sale->id) }}"
                                                                            class="btn btn-success btn-sm"
                                                                            title="Edit"><i
                                                                                class="dripicons-document-edit"></i></a>&nbsp;
                                                                    @endif
                                                                    @if (in_array('sales-delete', $all_permission))
                                                                        {{ Form::open(['route' => ['sales.destroy', $sale->id], 'method' => 'DELETE']) }}
                                                                        <button type="submit"
                                                                            class="btn btn-danger btn-sm"
                                                                            onclick="return confirmDelete()"
                                                                            title="Delete">
                                                                            <i class="dripicons-trash"></i></button>
                                                                        {{ Form::close() }}
                                                                    @endif
                                                                </div> --}}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="draft-latest">
                                        <div class="table-responsive">
                                            <table class="table table-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>{{ trans('file.date') }}</th>
                                                        <th>{{ trans('file.reference') }}</th>
                                                        <th>{{ trans('file.customer') }}</th>
                                                        <th>{{ trans('file.grand total') }}</th>
                                                        <th>{{ trans('file.action') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($recent_draft as $draft)
                                                        <?php $customer = DB::table('customers')->find($draft->customer_id); ?>
                                                        <tr>
                                                            <td class="fw-bold">{{ date('d-m-Y', strtotime($draft->created_at)) }}</td>
                                                            <td>{{ $draft->reference_no }}</td>
                                                            <td>{{ $customer->name }}</td>
                                                            <td>{{ $draft->grand_total }}</td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <a class="btn text-bg-secondary-soft dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        More
                                                                    </a>

                                                                    <ul class="dropdown-menu">
                                                                        <li>
                                                                            @if (in_array('sales-edit', $all_permission))
                                                                            <a href="{{ url('sales/' . $draft->id . '/create') }}"
                                                                                class="dropdown-item text-bg-success-soft"
                                                                                title="Edit">
                                                                                <i class="fa-light fa-edit fs-4 me-3"></i>
                                                                                Pay Bill</a>
                                                                        @endif
                                                                        @if (in_array('sales-delete', $all_permission))
                                                                            {{ Form::open(['route' => ['sales.destroy', $draft->id], 'method' => 'DELETE']) }}
                                                                        <li>
                                                                            <a type="submit"
                                                                                class="dropdown-item text-bg-danger-soft"
                                                                                onclick="return confirmDelete()"
                                                                                title="Delete">
                                                                                <i class="fa-light fa-trash fs-4 me-3"></i>
                                                                                Delete

                                                                            </a>
                                                                            {{ Form::close() }}
                                                                        </li>
                                                                        @endif
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn text-bg-success-soft"
                                    data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- add cash register modal -->
                <div id="cash-register-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                        <div class="modal-content">
                            {!! Form::open(['route' => 'cashRegister.store', 'method' => 'post']) !!}
                            <div class="modal-header">
                                <h5 id="exampleModalLabel" class="modal-title">{{ trans('file.Add Cash Register') }}
                                </h5>
                                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                        aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                            </div>
                            <div class="modal-body">
                                <p class="italic">
                                    <small>{{ trans('file.The field labels marked with * are required input fields') }}
                                        .</small>
                                </p>
                                <div class="row">
                                    <div class="col-md-6 form-group warehouse-section">
                                        <label>{{ trans('file.Warehouse') }} *</strong> </label>
                                        <select required name="warehouse_id" class="selectpicker form-control"
                                            data-live-search="true" data-live-search-style="begins"
                                            title="Select outlet...">
                                            @foreach ($lims_warehouse_list as $warehouse)
                                                <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>{{ trans('file.Cash in Hand') }} *</strong> </label>
                                        <input type="number" name="cash_in_hand" required class="form-control">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <button type="submit"
                                            class="btn btn-primary">{{ trans('file.submit') }}</button>
                                    </div>
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
                <!-- cash register details modal -->
                <div id="register-details-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 id="exampleModalLabel" class="modal-title">
                                    {{ trans('file.Cash Register Details') }}
                                </h5>
                                <button type="button" data-bs-dismiss="modal" aria-label="Close"
                                    class="close"><span aria-hidden="true"><i
                                            class="dripicons-cross"></i></span></button>
                            </div>
                            <div class="modal-body">
                                <p>{{ trans('file.Please review the transaction and payments.') }}</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-hover">
                                            <tbody>
                                                <tr>
                                                    <td>{{ trans('file.Cash in Hand') }}:</td>
                                                    <td id="cash_in_hand" class="text-right">0</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ trans('file.Total Sale Amount') }}:</td>
                                                    <td id="total_sale_amount" class="text-right"></td>
                                                </tr>
                                                <tr>
                                                    <td>{{ trans('file.Total Payment') }}:</td>
                                                    <td id="total_payment" class="text-right"></td>
                                                </tr>
                                                <tr>
                                                    <td>{{ trans('file.Cash Payment') }}:</td>
                                                    <td id="cash_payment" class="text-right"></td>
                                                </tr>
                                                <tr>
                                                    <td>{{ trans('file.Credit Card Payment') }}:</td>
                                                    <td id="credit_card_payment" class="text-right"></td>
                                                </tr>
                                                <tr>
                                                    <td>{{ trans('file.Cheque Payment') }}:</td>
                                                    <td id="cheque_payment" class="text-right"></td>
                                                </tr>
                                                <tr>
                                                    <td>{{ trans('file.Gift Card Payment') }}:</td>
                                                    <td id="gift_card_payment" class="text-right"></td>
                                                </tr>
                                                <tr>
                                                    <td>{{ trans('file.Deposit Payment') }}:</td>
                                                    <td id="deposit_payment" class="text-right"></td>
                                                </tr>
                                                <tr>
                                                    <td>{{ trans('file.Paypal Payment') }}:</td>
                                                    <td id="paypal_payment" class="text-right"></td>
                                                </tr>
                                                <tr>
                                                    <td>{{ trans('file.Total Sale Return') }}:</td>
                                                    <td id="total_sale_return" class="text-right"></td>
                                                </tr>
                                                <tr>
                                                    <td>{{ trans('file.Total Expense') }}:</td>
                                                    <td id="total_expense" class="text-right"></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>{{ trans('file.Total Cash') }}:</strong></td>
                                                    <td id="total_cash" class="text-right"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-6" id="closing-section">
                                        <form action="{{ route('cashRegister.close') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="cash_register_id">
                                            <button type="submit"
                                                class="btn btn-primary">{{ trans('file.Close Register') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- today sale modal -->
                <div id="today-sale-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 id="exampleModalLabel" class="modal-title">{{ trans('file.Today Sale') }}</h5>
                                <button type="button" data-bs-dismiss="modal" aria-label="Close"
                                    class="close"><span aria-hidden="true"><i
                                            class="dripicons-cross"></i></span></button>
                            </div>
                            <div class="modal-body">
                                <p>{{ trans('file.Please review the transaction and payments.') }}</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-hover">
                                            <tbody>
                                                <tr>
                                                    <td>{{ trans('file.Total Sale Amount') }}:</td>
                                                    <td class="total_sale_amount text-right"></td>
                                                </tr>
                                                <tr>
                                                    <td>{{ trans('file.Cash Payment') }}:</td>
                                                    <td class="cash_payment text-right"></td>
                                                </tr>
                                                <tr>
                                                    <td>{{ trans('file.Credit Card Payment') }}:</td>
                                                    <td class="credit_card_payment text-right"></td>
                                                </tr>
                                                <tr>
                                                    <td>{{ trans('file.Cheque Payment') }}:</td>
                                                    <td class="cheque_payment text-right"></td>
                                                </tr>
                                                <tr>
                                                    <td>{{ trans('file.Gift Card Payment') }}:</td>
                                                    <td class="gift_card_payment text-right"></td>
                                                </tr>
                                                <tr>
                                                    <td>{{ trans('file.Deposit Payment') }}:</td>
                                                    <td class="deposit_payment text-right"></td>
                                                </tr>
                                                <tr>
                                                    <td>{{ trans('file.Paypal Payment') }}:</td>
                                                    <td class="paypal_payment text-right"></td>
                                                </tr>
                                                <tr>
                                                    <td>{{ trans('file.Total Payment') }}:</td>
                                                    <td class="total_payment text-right"></td>
                                                </tr>
                                                <tr>
                                                    <td>{{ trans('file.Total Sale Return') }}:</td>
                                                    <td class="total_sale_return text-right"></td>
                                                </tr>
                                                <tr>
                                                    <td>{{ trans('file.Total Expense') }}:</td>
                                                    <td class="total_expense text-right"></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>{{ trans('file.Total Cash') }}:</strong></td>
                                                    <td class="total_cash text-right"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- today profit modal -->
                <div id="today-profit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 id="exampleModalLabel" class="modal-title">{{ trans('file.Today Profit') }}</h5>
                                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                        aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select required name="warehouseId" class="form-control">
                                            <option value="0">{{ trans('file.All Warehouse') }}</option>
                                            @foreach ($lims_warehouse_list as $warehouse)
                                                <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <table class="table table-hover">
                                            <tbody>
                                                <tr>
                                                    <td>{{ trans('file.Product Revenue') }}:</td>
                                                    <td class="product_revenue text-right"></td>
                                                </tr>
                                                <tr>
                                                    <td>{{ trans('file.Product Cost') }}:</td>
                                                    <td class="product_cost text-right"></td>
                                                </tr>
                                                <tr>
                                                    <td>{{ trans('file.Expense') }}:</td>
                                                    <td class="expense_amount text-right"></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>{{ trans('file.Profit') }}:</strong></td>
                                                    <td class="profit text-right"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Toast Alert Messages --}}
        <div aria-live="polite" aria-atomic="true">
            <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999 !important">
                <div id="addProductToast" class="toast text-bg-danger-soft fade" role="alert" aria-live="assertive"
                    data-bs-autohide="true" aria-atomic="true">
                    <div class="toast-header">
                        <i class="fa-light fa-triangle-exclamation text-bg-warning-soft me-2"></i><strong
                            class="me-auto">Add Product</strong><small>just Now</small>
                        <button class="btn-close" type="button" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                    <div class="toast-body">This product is not available in stock</div>
                </div>
                <div id="selectCustomerToast" class="toast text-bg-danger-soft fade" role="alert"
                    aria-live="assertive" data-bs-autohide="true" aria-atomic="true">
                    <div class="toast-header">
                        <i class="fa-light fa-triangle-exclamation text-bg-warning-soft me-2"></i>
                        <span class="legend-circle bg-info"></span><strong class="me-auto">Alert</strong><small>just
                            Now</small>
                        <button class="btn-close" type="button" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                    <div class="toast-body">Please select Customer!</div>
                </div>
                <div id="selectWarehouseToast" class="toast text-bg-danger-soft fade" role="alert"
                    aria-live="assertive" data-bs-autohide="true" aria-atomic="true">
                    <div class="toast-header">
                        <i class="fa-light fa-triangle-exclamation text-bg-warning-soft me-2"></i>
                        <span class="legend-circle bg-info"></span><strong class="me-auto">Alert</strong><small>just
                            Now</small>
                        <button class="btn-close" type="button" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                    <div class="toast-body">This product is not available in stock</div>
                </div>
                <div id="changeQuantityToast" class="toast text-bg-danger-soft fade" role="alert"
                    aria-live="assertive" data-bs-autohide="true" aria-atomic="true">
                    <div class="toast-header">
                        <i class="fa-light fa-triangle-exclamation text-bg-warning-soft me-2"></i>
                        <span class="legend-circle bg-info"></span><strong class="me-auto">Alert</strong><small>just
                            Now</small>
                        <button class="btn-close" type="button" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                    <div class="toast-body">Quantity can't be less than 0</div>
                </div>
                <div id="changeQuantity1Toast" class="toast text-bg-danger-soft fade" role="alert"
                    aria-live="assertive" data-bs-autohide="true" aria-atomic="true">
                    <div class="toast-header">
                        <span class="legend-circle bg-info"></span><strong class="me-auto">Alert</strong><small>just
                            Now</small>
                        <button class="btn-close" type="button" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                    <div class="toast-body">Quantity can't be less than 1</div>
                </div>
                <div id="insertProductToast" class="toast text-bg-danger-soft fade" role="alert"
                    aria-live="assertive" data-bs-autohide="true" aria-atomic="true">
                    <div class="toast-header">
                        <i class="fa-light fa-triangle-exclamation text-bg-warning-soft me-2"></i>
                        <span class="legend-circle bg-info"></span><strong class="me-auto">Alert</strong><small>just
                            Now</small>
                        <button class="btn-close" type="button" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                    <div class="toast-body">Please insert product to order table!</div>
                </div>
                <div id="payingAmountBiggerToast" class="toast text-bg-danger-soft fade" role="alert"
                    aria-live="assertive" data-bs-autohide="true" aria-atomic="true">
                    <div class="toast-header">
                        <i class="fa-light fa-triangle-exclamation text-bg-warning-soft me-2"></i>
                        <span class="legend-circle bg-info"></span><strong class="me-auto">Alert</strong><small>just
                            Now</small>
                        <button class="btn-close" type="button" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                    <div class="toast-body">Paying amount cannot be bigger than recieved amount</div>
                </div>
                <div id="payingAmountTotalToast" class="toast text-bg-danger-soft fade" role="alert"
                    aria-live="assertive" data-bs-autohide="true" aria-atomic="true">
                    <div class="toast-header">
                        <i class="fa-light fa-triangle-exclamation text-bg-warning-soft me-2"></i>
                        <span class="legend-circle bg-info"></span><strong class="me-auto">Alert</strong><small>just
                            Now</small>
                        <button class="btn-close" type="button" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                    <div class="toast-body">Paying amount cannot be bigger than grand total</div>
                </div>
                <div id="payingAmountDepositToast" class="toast text-bg-danger-soft fade" role="alert"
                    aria-live="assertive" data-bs-autohide="true" aria-atomic="true">
                    <div class="toast-header">
                        <span class="legend-circle bg-info"></span><strong class="me-auto">Alert</strong><small>just
                            Now</small>
                        <button class="btn-close" type="button" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                    <div class="toast-body">Amount exceeds customer deposit! Customer deposit</div>
                </div>
                <div id="exceedsStockQuantityToast" class="toast text-bg-danger-soft fade" role="alert"
                    aria-live="assertive" data-bs-autohide="true" aria-atomic="true">
                    <div class="toast-header">
                        <i class="fa-light fa-triangle-exclamation text-bg-warning-soft me-2"></i>
                        <span class="legend-circle bg-info"></span><strong class="me-auto">Alert</strong><small>just
                            Now</small>
                        <button class="btn-close" type="button" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                    <div class="toast-body">Quantity exceeds stock quantity!</div>
                </div>
            </div>
        </div>

    </section>

@endsection


@push('scripts')
    <script type="text/javascript">
        $("ul#sale").siblings('a').attr('aria-expanded', 'true');
        $("ul#sale").addClass("show");
        $("ul#sale #sale-pos-menu").addClass("active");

        var public_key = <?php echo json_encode($lims_pos_setting_data->stripe_public_key); ?>;
        var alert_product = <?php echo json_encode($alert_product); ?>;
        var currency = <?php echo json_encode($currency); ?>;
        var valid;

        // array data depend on warehouse
        var lims_product_array = [];
        var product_code = [];
        var product_name = [];
        var product_qty = [];
        var product_type = [];
        var product_id = [];
        var product_list = [];
        var qty_list = [];

        // array data with selection
        var product_price = [];
        var product_discount = [];
        var tax_rate = [];
        var tax_name = [];
        var tax_method = [];
        var unit_name = [];
        var unit_operator = [];
        var unit_operation_value = [];
        var is_imei = [];
        var is_variant = [];
        var gift_card_amount = [];
        var gift_card_expense = [];

        // temporary array
        var temp_unit_name = [];
        var temp_unit_operator = [];
        var temp_unit_operation_value = [];

        var deposit = <?php echo json_encode($deposit); ?>;
        var points = <?php echo json_encode($points); ?>;
        var reward_point_setting = <?php echo json_encode($lims_reward_point_setting_data); ?>;

        var product_row_number = <?php echo json_encode($lims_pos_setting_data->product_number); ?>;
        var rowindex;
        var customer_group_rate;
        var row_product_price;
        var pos;
        var keyboard_active = <?php echo json_encode($keybord_active); ?>;
        var role_id = <?php echo json_encode(Auth::user()->role_id); ?>;
        var warehouse_id = <?php echo json_encode(Auth::user()->warehouse_id); ?>;
        var biller_id = <?php echo json_encode(Auth::user()->biller_id); ?>;
        var coupon_list = <?php echo json_encode($lims_coupon_list); ?>;
        var currency = <?php echo json_encode($currency); ?>;

        var localStorageQty = [];
        var localStorageProductId = [];
        var localStorageProductDiscount = [];
        var localStorageTaxRate = [];
        var localStorageNetUnitPrice = [];
        var localStorageTaxValue = [];
        var localStorageTaxName = [];
        var localStorageTaxMethod = [];
        var localStorageSubTotalUnit = [];
        var localStorageSubTotal = [];
        var localStorageProductCode = [];
        var localStorageSaleUnit = [];
        var localStorageTempUnitName = [];
        var localStorageSaleUnitOperator = [];
        var localStorageSaleUnitOperationValue = [];

        $("#reference-no").val(getSavedValue("reference-no"));
        $("#order-discount").val(getSavedValue("order-discount"));
        $("#order-discount-val").val(getSavedValue("order-discount-val"));
        $("#order-discount-type").val(getSavedValue("order-discount-type"));
        $("#order-tax-rate-select").val(getSavedValue("order-tax-rate-select"));


        $("#shipping-cost-val").val(getSavedValue("shipping-cost-val"));

        if (localStorage.getItem("tbody-id")) {
            $("#tbody-id").html(localStorage.getItem("tbody-id"));
        }

        function saveValue(e) {
            var id = e.id; // get the sender's id to save it.
            var val = e.value; // get the value.
            localStorage.setItem(id, val); // Every time user writing something, the localStorage's value will override.
        }

        //get the saved value function - return the value of "v" from localStorage.
        function getSavedValue(v) {
            if (!localStorage.getItem(v)) {
                return ""; // You can change this to your defualt value.
            }
            return localStorage.getItem(v);
        }

        if (getSavedValue("localStorageQty")) {
            localStorageQty = getSavedValue("localStorageQty").split(",");
            localStorageProductDiscount = getSavedValue("localStorageProductDiscount").split(",");
            localStorageTaxRate = getSavedValue("localStorageTaxRate").split(",");
            localStorageNetUnitPrice = getSavedValue("localStorageNetUnitPrice").split(",");
            localStorageTaxValue = getSavedValue("localStorageTaxValue").split(",");
            localStorageTaxName = getSavedValue("localStorageTaxName").split(",");
            localStorageTaxMethod = getSavedValue("localStorageTaxMethod").split(",");
            localStorageSubTotalUnit = getSavedValue("localStorageSubTotalUnit").split(",");
            localStorageSubTotal = getSavedValue("localStorageSubTotal").split(",");
            localStorageProductId = getSavedValue("localStorageProductId").split(",");
            localStorageProductCode = getSavedValue("localStorageProductCode").split(",");
            localStorageSaleUnit = getSavedValue("localStorageSaleUnit").split(",");
            localStorageTempUnitName = getSavedValue("localStorageTempUnitName").split(",,");
            localStorageSaleUnitOperator = getSavedValue("localStorageSaleUnitOperator").split(",,");
            localStorageSaleUnitOperationValue = getSavedValue("localStorageSaleUnitOperationValue").split(",,");
            /*localStorageQty.pop();
            localStorage.setItem("localStorageQty", localStorageQty);*/
            for (var i = 0; i < localStorageQty.length; i++) {
                $('table.order-list tbody tr:nth-child(' + (i + 1) + ') .qty').val(localStorageQty[i]);
                $('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.discount-value').val(
                    localStorageProductDiscount[i]);
                $('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.tax-rate').val(localStorageTaxRate[i]);
                $('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.net_unit_price').val(
                    localStorageNetUnitPrice[i]);
                $('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.tax-value').val(localStorageTaxValue[i]);
                $('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.tax-name').val(localStorageTaxName[i]);
                $('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.tax-method').val(localStorageTaxMethod[i]);
                $('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.product-price').text(
                    localStorageSubTotalUnit[i]);
                $('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.sub-total').text(localStorageSubTotal[i]);
                $('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.subtotal-value').val(localStorageSubTotal[
                    i]);
                $('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.product-id').val(localStorageProductId[i]);
                $('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.product-code').val(localStorageProductCode[
                    i]);
                $('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.sale-unit').val(localStorageSaleUnit[i]);
                if (i == 0) {
                    localStorageTempUnitName[i] += ',';
                    localStorageSaleUnitOperator[i] += ',';
                    localStorageSaleUnitOperationValue[i] += ',';
                }
                $('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.sale-unit-operator').val(
                    localStorageSaleUnitOperator[i]);
                $('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.sale-unit-operation-value').val(
                    localStorageSaleUnitOperationValue[i]);

                product_price.push(parseFloat($('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find(
                    '.product_price').val()));
                var quantity = parseFloat($('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.qty').val());
                product_discount.push(parseFloat(localStorageProductDiscount[i] / localStorageQty[i]).toFixed(2));
                tax_rate.push(parseFloat($('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.tax-rate')
                    .val()));
                tax_name.push($('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.tax-name').val());
                tax_method.push($('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.tax-method').val());
                temp_unit_name = $('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.sale-unit').val().split(
                    ',');
                unit_name.push(localStorageTempUnitName[i]);
                unit_operator.push($('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.sale-unit-operator')
                    .val());
                unit_operation_value.push($('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find(
                    '.sale-unit-operation-value').val());
                $('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.sale-unit').val(temp_unit_name[0]);
                calculateTotal();
                //calculateRowProductData(localStorageQty[i]);
            }
        }


        $('.selectpicker').selectpicker({
            style: 'btn-link',
        });

        if (keyboard_active == 1) {

            $("input.numkey:text").keyboard({
                usePreview: false,
                layout: 'custom',
                display: {
                    'accept': '&#10004;',
                    'cancel': '&#10006;'
                },
                customLayout: {
                    'normal': ['1 2 3', '4 5 6', '7 8 9', '0 {dec} {bksp}', '{clear} {cancel} {accept}']
                },
                restrictInput: true, // Prevent keys not in the displayed keyboard from being typed in
                preventPaste: true, // prevent ctrl-v and right click
                autoAccept: true,
                css: {
                    // input & preview
                    // keyboard container
                    container: 'center-block dropdown-menu', // jumbotron
                    // default state
                    buttonDefault: 'btn btn-default',
                    // hovered button
                    buttonHover: 'btn-primary',
                    // Action keys (e.g. Accept, Cancel, Tab, etc);
                    // this replaces "actionClass" option
                    buttonAction: 'active'
                },
            });

            $('input[type="text"]').keyboard({
                usePreview: false,
                autoAccept: true,
                autoAcceptOnEsc: true,
                css: {
                    // input & preview
                    // keyboard container
                    container: 'center-block dropdown-menu', // jumbotron
                    // default state
                    buttonDefault: 'btn btn-default',
                    // hovered button
                    buttonHover: 'btn-primary',
                    // Action keys (e.g. Accept, Cancel, Tab, etc);
                    // this replaces "actionClass" option
                    buttonAction: 'active',
                    // used when disabling the decimal button {dec}
                    // when a decimal exists in the input area
                    buttonDisabled: 'disabled'
                },
                change: function(e, keyboard) {
                    keyboard.$el.val(keyboard.$preview.val())
                    keyboard.$el.trigger('propertychange')
                }
            });

            $('textarea').keyboard({
                usePreview: false,
                autoAccept: true,
                autoAcceptOnEsc: true,
                css: {
                    // input & preview
                    // keyboard container
                    container: 'center-block dropdown-menu', // jumbotron
                    // default state
                    buttonDefault: 'btn btn-default',
                    // hovered button
                    buttonHover: 'btn-primary',
                    // Action keys (e.g. Accept, Cancel, Tab, etc);
                    // this replaces "actionClass" option
                    buttonAction: 'active',
                    // used when disabling the decimal button {dec}
                    // when a decimal exists in the input area
                    buttonDisabled: 'disabled'
                },
                change: function(e, keyboard) {
                    keyboard.$el.val(keyboard.$preview.val())
                    keyboard.$el.trigger('propertychange')
                }
            });

            $('#lims_productcodeSearch').keyboard().autocomplete().addAutocomplete({
                // add autocomplete window positioning
                // options here (using position utility)
                position: {
                    of: '#lims_productcodeSearch',
                    my: 'top+18px',
                    at: 'center',
                    collision: 'flip'
                }
            });
        }

        $("li#notification-icon").on("click", function(argument) {
            $.get('notifications/mark-as-read', function(data) {
                $("span.notification-number").text(alert_product);
            });
        });

        $("#register-details-btn").on("click", function(e) {
            e.preventDefault();
            $.ajax({
                url: 'cash-register/showDetails/' + warehouse_id,
                type: "GET",
                success: function(data) {
                    $('#register-details-modal #cash_in_hand').text(data['cash_in_hand']);
                    $('#register-details-modal #total_sale_amount').text(data['total_sale_amount']);
                    $('#register-details-modal #total_payment').text(data['total_payment']);
                    $('#register-details-modal #cash_payment').text(data['cash_payment']);
                    $('#register-details-modal #credit_card_payment').text(data['credit_card_payment']);
                    $('#register-details-modal #cheque_payment').text(data['cheque_payment']);
                    $('#register-details-modal #gift_card_payment').text(data['gift_card_payment']);
                    $('#register-details-modal #deposit_payment').text(data['deposit_payment']);
                    $('#register-details-modal #paypal_payment').text(data['paypal_payment']);
                    $('#register-details-modal #total_sale_return').text(data['total_sale_return']);
                    $('#register-details-modal #total_expense').text(data['total_expense']);
                    $('#register-details-modal #total_cash').text(data['total_cash']);
                    $('#register-details-modal input[name=cash_register_id]').val(data['id']);
                }
            });
            $('#register-details-modal').modal('show');

        });
        // Sales Highlight Data
        $(document).ready(function() {
            $.ajax({
                url: 'cash-register/showDetails/' + warehouse_id,
                type: "GET",
                success: function(data) {
                    $('#sales-highlights #cash_in_hand').text(data['cash_in_hand']);

                }
            });
            $.ajax({
                url: 'sales/today-sale/',
                type: "GET",
                success: function(data) {
                    $('#sales-highlights .total_sale_amount').text(data['total_sale_amount']);
                    $('#sales-highlights .cash_payment').text(data['cash_payment']);
                    //     $('#today-sale-modal .credit_card_payment').text(data['credit_card_payment']);
                    //     $('#today-sale-modal .cheque_payment').text(data['cheque_payment']);
                    //     $('#today-sale-modal .gift_card_payment').text(data['gift_card_payment']);
                    //     $('#today-sale-modal .deposit_payment').text(data['deposit_payment']);
                    //     $('#today-sale-modal .paypal_payment').text(data['paypal_payment']);
                    //     $('#today-sale-modal .total_sale_return').text(data['total_sale_return']);
                    //     $('#today-sale-modal .total_expense').text(data['total_expense']);
                    //     $('#today-sale-modal .total_cash').text(data['total_cash']);
                }

            });
            $.ajax({
                url: 'sales/today-profit/' + warehouse_id,
                type: "GET",
                success: function(data) {
                    // $('#today-profit-modal .product_revenue').text(data['product_revenue']);
                    // $('#today-profit-modal .product_cost').text(data['product_cost']);
                    // $('#today-profit-modal .expense_amount').text(data['expense_amount']);
                    $('#sales-highlights .today_profit').text(data['profit']);
                }
            });

        });
        $("#today-sale-btn").on("click", function(e) {
            e.preventDefault();
            $.ajax({
                url: 'sales/today-sale/',
                type: "GET",
                success: function(data) {
                    $('#today-sale-modal .total_sale_amount').text(data['total_sale_amount']);
                    $('#today-sale-modal .total_payment').text(data['total_payment']);
                    $('#today-sale-modal .cash_payment').text(data['cash_payment']);
                    $('#today-sale-modal .credit_card_payment').text(data['credit_card_payment']);
                    $('#today-sale-modal .cheque_payment').text(data['cheque_payment']);
                    $('#today-sale-modal .gift_card_payment').text(data['gift_card_payment']);
                    $('#today-sale-modal .deposit_payment').text(data['deposit_payment']);
                    $('#today-sale-modal .paypal_payment').text(data['paypal_payment']);
                    $('#today-sale-modal .total_sale_return').text(data['total_sale_return']);
                    $('#today-sale-modal .total_expense').text(data['total_expense']);
                    $('#today-sale-modal .total_cash').text(data['total_cash']);
                }

            });
            $('#today-sale-modal').modal('show');

        });

        $("#today-profit-btn").on("click", function(e) {
            e.preventDefault();
            calculateTodayProfit(0);
        });

        $("#today-profit-modal select[name=warehouseId]").on("change", function() {
            calculateTodayProfit($(this).val());
        });

        function calculateTodayProfit(warehouse_id) {
            $.ajax({
                url: 'sales/today-profit/' + warehouse_id,
                type: "GET",
                success: function(data) {
                    $('#today-profit-modal .product_revenue').text(data['product_revenue']);
                    $('#today-profit-modal .product_cost').text(data['product_cost']);
                    $('#today-profit-modal .expense_amount').text(data['expense_amount']);
                    $('#today-profit-modal .profit').text(data['profit']);
                }
            });
            $('#today-profit-modal').modal('show');
        }

        if (role_id > 2) {
            $('#biller_id').addClass('d-none');
            $('#warehouse_id').addClass('d-none');
            $('select[name=warehouse_id]').val(warehouse_id);
            $('select[name=biller_id]').val(biller_id);
            isCashRegisterAvailable(warehouse_id);
        } else {
            if (getSavedValue("warehouse_id")) {
                warehouse_id = getSavedValue("warehouse_id");
            } else {
                warehouse_id = $("input[name='warehouse_id_hidden']").val();
            }

            if (getSavedValue("biller_id")) {
                biller_id = getSavedValue("biller_id");
            } else {
                biller_id = $("input[name='biller_id_hidden']").val();
            }
            $('select[name=warehouse_id]').val(warehouse_id);
            $('select[name=biller_id]').val(biller_id);
        }

        if (getSavedValue("biller_id")) {
            $('select[name=customer_id]').val(getSavedValue("customer_id"));
        } else {
            $('select[name=customer_id]').val($("input[name='customer_id_hidden']").val());
        }

        $('.selectpicker').selectpicker('refresh');

        var id = $("#customer_id").val();
        $.get('sales/getcustomergroup/' + id, function(data) {
            customer_group_rate = (data / 100);
        });

        var id = $("#warehouse_id").val();
        $.get('sales/getproduct/' + id, function(data) {
            lims_product_array = [];
            product_code = data[0];
            product_name = data[1];
            product_qty = data[2];
            product_type = data[3];
            product_id = data[4];
            product_list = data[5];
            qty_list = data[6];
            product_warehouse_price = data[7];
            batch_no = data[8];
            product_batch_id = data[9];
            is_embeded = data[11];
            $.each(product_code, function(index) {
                if (is_embeded[index])
                    lims_product_array.push(product_code[index] + ' (' + product_name[index] + ')|' +
                        is_embeded[index]);
                else
                    lims_product_array.push(product_code[index] + ' (' + product_name[index] + ')');
            });
        });

        isCashRegisterAvailable(id);

        function isCashRegisterAvailable(warehouse_id) {
            $.ajax({
                url: 'cash-register/check-availability/' + warehouse_id,
                type: "GET",
                success: function(data) {
                    if (data == 'false') {
                        $("#register-details-btn").addClass('d-none');
                        $('#cash-register-modal select[name=warehouse_id]').val(warehouse_id);

                        if (role_id <= 2)
                            $("#cash-register-modal .warehouse-section").removeClass('d-none');
                        else
                            $("#cash-register-modal .warehouse-section").addClass('d-none');

                        $('.selectpicker').selectpicker('refresh');
                        $("#cash-register-modal").modal('show');
                    } else
                        $("#register-details-btn").removeClass('d-none');
                }
            });
        }

        if (keyboard_active == 1) {
            $('#lims_productcodeSearch').bind('keyboardChange', function(e, keyboard, el) {
                var customer_id = $('#customer_id').val();
                var warehouse_id = $('select[name="warehouse_id"]').val();
                temp_data = $('#lims_productcodeSearch').val();
                if (!customer_id) {
                    $('#lims_productcodeSearch').val(temp_data.substring(0, temp_data.length - 1));
                    $("#selectCustomerToast").toast("show");
                } else if (!warehouse_id) {
                    $('#lims_productcodeSearch').val(temp_data.substring(0, temp_data.length - 1));
                    $("#selectWarehouseToast").toast("show");
                }
            });
        } else {
            $('#lims_productcodeSearch').on('input', function() {
                var customer_id = $('#customer_id').val();
                var warehouse_id = $('#warehouse_id').val();
                temp_data = $('#lims_productcodeSearch').val();
                if (!customer_id) {
                    $('#lims_productcodeSearch').val(temp_data.substring(0, temp_data.length - 1));
                    $("#selectCustomerToast").toast("show");
                } else if (!warehouse_id) {
                    $('#lims_productcodeSearch').val(temp_data.substring(0, temp_data.length - 1));
                    $("#selectWarehouseToast").toast("show");
                }

            });
        }

        $("#print-btn").on("click", function() {
            var divToPrint = document.getElementById('sale-details');
            var newWin = window.open('', 'Print-Window');
            newWin.document.open();
            newWin.document.write(
                '<link rel="stylesheet" href="<?php echo asset('vendor/bootstrap/css/bootstrap.min.css'); ?>" type="text/css"><style type="text/css">@media print {.modal-dialog { max-width: 1000px;} }</style><body onload="window.print()">' +
                divToPrint.innerHTML + '</body>');
            newWin.document.close();
            setTimeout(function() {
                newWin.close();
            }, 10);
        });

        $('body').on('click', function(e) {
            $('.filter-window').hide('slide', {
                direction: 'right'
            }, 'fast');
        });

        $('#category-filter').on('click', function(e) {
            e.stopPropagation();
            $('.filter-window').show('slide', {
                direction: 'right'
            }, 'fast');
            $('.category').show();
            $('.brand').hide();
        });

        $('.category-img').on('click', function() {
            var category_id = $(this).data('category');
            var brand_id = 0;

            $(".table-container").children().remove();
            $.get('sales/getproduct/' + category_id + '/' + brand_id, function(data) {
                populateProduct(data);
            });
        });

        $('#brand-filter').on('click', function(e) {
            e.stopPropagation();
            $('.filter-window').show('slide', {
                direction: 'right'
            }, 'fast');
            $('.brand').show();
            $('.category').hide();
        });

        $('.brand-img').on('click', function() {
            var brand_id = $(this).data('brand');
            var category_id = 0;

            $(".table-container").children().remove();
            $.get('sales/getproduct/' + category_id + '/' + brand_id, function(data) {
                populateProduct(data);
            });
        });

        $('#featured-filter').on('click', function() {
            $(".table-container").children().remove();
            $.get('sales/getfeatured', function(data) {
                populateProduct(data);
            });
        });

        function populateProduct(data) {
            var tableData =
                '<table id="product-table" class="table no-shadow product-list"> <thead class="d-none"> <tr> <th></th> <th></th> <th></th> <th></th> <th></th> </tr></thead> <tbody><tr>';

            if (Object.keys(data).length != 0) {
                $.each(data['name'], function(index) {
                    var product_info = data['code'][index] + ' (' + data['name'][index] + ')';
                    if (index % 5 == 0 && index != 0)
                        tableData += '</tr><tr><td class="listed-product-wrapper product-img sound-btn" title="' +
                        data['name'][index] +
                        '" data-product = "' + product_info +
                        '"><div class="listed-product-content"><button type="button" class="btn btn-default plus" style="border: 1px solid #ccc; padding: 4px 8px;float: right; background: transparent;"><i class="dripicons-plus"></i></button><img  src="public/images/product/' +
                        data['image'][
                            index
                        ] + '" width="100%" /><p>' + data['name'][index] + '</p></div><span>' + data['code'][
                            index
                        ] +
                        '</span></td>';
                    else
                        tableData += '<td class="listed-product-wrapper product-img sound-btn" title="' + data[
                            'name'][index] +
                        '" data-product = "' + product_info +
                        '"><div class="listed-product-content"><button type="button" class="btn btn-default plus" style="border: 1px solid #ccc; padding: 4px 8px;float: right; background: transparent;"><i class="dripicons-plus"></i></button><img  src="public/images/product/' +
                        data['image'][
                            index
                        ] + '" width="100%" /><p>' + data['name'][index] + '</p></div><span>' + data['code'][
                            index
                        ] +
                        '</span></td>';
                });

                if (data['name'].length % 5) {
                    var number = 5 - (data['name'].length % 5);
                    while (number > 0) {
                        tableData += '<td class="listed-product-wrapper product-img sound-btn" style="border:none;"></td>';
                        number--;
                    }
                }

                tableData += '</tr></tbody></table>';
                $(".table-container").html(tableData);
                $('#product-table').DataTable({
                    "order": [],
                    'pageLength': product_row_number,
                    'language': {
                        'paginate': {
                            'previous': '<i class="fa fa-angle-left"></i>',
                            'next': '<i class="fa fa-angle-right"></i>'
                        }
                    },
                    dom: 'tp'
                });
                $('table.product-list').hide();
                $('table.product-list').show(500);
            } else {
                tableData += '<td class="text-center">Products not available </td></tr></tbody></table>'
                $(".table-container").html(tableData);
            }
        }

        $('select[name="customer_id"]').on('change', function() {
            saveValue(this);
            var id = $(this).val();
            $.get('sales/getcustomergroup/' + id, function(data) {
                customer_group_rate = (data / 100);
            });
        });

        $('select[name="biller_id"]').on('change', function() {
            saveValue(this);
        });

        $('select[name="warehouse_id"]').on('change', function() {
            saveValue(this);
            warehouse_id = $(this).val();
            $.get('sales/getproduct/' + warehouse_id, function(data) {
                lims_product_array = [];
                product_code = data[0];
                product_name = data[1];
                product_qty = data[2];
                product_type = data[3];
                product_id = data[4];
                product_list = data[5];
                qty_list = data[6];
                product_warehouse_price = data[7];
                batch_no = data[8];
                product_batch_id = data[9];
                is_embeded = data[11];
                $.each(product_code, function(index) {
                    if (is_embeded[index])
                        lims_product_array.push(product_code[index] + ' (' + product_name[index] +
                            ')|' + is_embeded[index]);
                    else
                        lims_product_array.push(product_code[index] + ' (' + product_name[index] +
                            ')');
                });
            });

            isCashRegisterAvailable(warehouse_id);
        });

        var lims_productcodeSearch = $('#lims_productcodeSearch');

        lims_productcodeSearch.autocomplete({
            source: function(request, response) {
                var matcher = new RegExp(".?" + $.ui.autocomplete.escapeRegex(request.term), "i");
                response($.grep(lims_product_array, function(item) {
                    return matcher.test(item);
                }));
            },
            response: function(event, ui) {
                if (ui.content.length == 1) {
                    var data = ui.content[0].value;
                    $(this).autocomplete("close");
                    productSearch(data);
                } else if (ui.content.length == 0 && $('#lims_productcodeSearch').val().length == 13) {
                    productSearch($('#lims_productcodeSearch').val() + '|' + 1);
                }
            },
            select: function(event, ui) {
                var data = ui.item.value;
                productSearch(data);
            },
        });

        $('#myTable').keyboard({
            accepted: function(event, keyboard, el) {
                checkQuantity(el.value, true);
            }
        });

        $("#myTable").on('click', '.plus', function() {
            rowindex = $(this).closest('tr').index();
            var qty = $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ') .qty').val();
            if (!qty)
                qty = 1;
            else
                qty = parseFloat(qty) + 1;
            if (is_variant[rowindex])
                checkQuantity(String(qty), true);
            else
                checkDiscount(qty, true);
        });

        $("#myTable").on('click', '.minus', function() {
            rowindex = $(this).closest('tr').index();
            var qty = parseFloat($('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ') .qty').val()) - 1;
            if (qty > 0) {
                $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ') .qty').val(qty);
            } else {
                qty = 1;
            }
            if (is_variant[rowindex])
                checkQuantity(String(qty), true);
            else
                checkDiscount(qty, true);
        });

        $("#myTable").on("change", ".batch-no", function() {
            rowindex = $(this).closest('tr').index();
            var product_id = $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.product-id')
                .val();
            var warehouse_id = $('#warehouse_id').val();
            $.get('check-batch-availability/' + product_id + '/' + $(this).val() + '/' + warehouse_id, function(
                data) {
                if (data['message'] != 'ok') {
                    alert(data['message']);
                    $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.batch-no').val(
                        '');
                    $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find(
                        '.product-batch-id').val('');
                } else {
                    $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find(
                        '.product-batch-id').val(data['product_batch_id']);
                    code = $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find(
                        '.product-code').val();
                    pos = product_code.indexOf(code);
                    product_qty[pos] = data['qty'];
                }
            });
        });

        //Change quantity
        $("#myTable").on('input', '.qty', function() {
            rowindex = $(this).closest('tr').index();
            if ($(this).val() < 0 && $(this).val() != '') {
                $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ') .qty').val(1);
                $("#changeQuantityToast").toast("show");
            }
            if (is_variant[rowindex])
                checkQuantity($(this).val(), true);
            else
                checkDiscount($(this).val(), true);
        });

        $("#myTable").on('click', '.qty', function() {
            rowindex = $(this).closest('tr').index();
        });

        $(document).on('click', '.sound-btn', function() {
            var audio = $("#mysoundclip1")[0];
            audio.play();
        });

        $(document).on('click', '.product-img', function() {
            var customer_id = $('#customer_id').val();
            var warehouse_id = $('select[name="warehouse_id"]').val();
            if (!customer_id)
                $("#selectCustomerToast").toast("show");
            else if (!warehouse_id)
                $("#selectWarehouseToast").toast("show");
            else {
                var data = $(this).data('product');
                product_info = data.split(" ");
                pos = product_code.indexOf(product_info[0]);
                if (pos < 0)
                    $("#addProductToast").toast("show");
                else {
                    productSearch(data);
                }
            }
        });
        //Delete product
        $("table.order-list tbody").on("click", ".ibtnDel", function(event) {
            var audio = $("#mysoundclip2")[0];
            audio.play();
            rowindex = $(this).closest('tr').index();
            product_price.splice(rowindex, 1);
            product_discount.splice(rowindex, 1);
            tax_rate.splice(rowindex, 1);
            tax_name.splice(rowindex, 1);
            tax_method.splice(rowindex, 1);
            unit_name.splice(rowindex, 1);
            unit_operator.splice(rowindex, 1);
            unit_operation_value.splice(rowindex, 1);

            localStorageProductId.splice(rowindex, 1);
            localStorageQty.splice(rowindex, 1);
            localStorageSaleUnit.splice(rowindex, 1);
            localStorageProductDiscount.splice(rowindex, 1);
            localStorageTaxRate.splice(rowindex, 1);
            localStorageNetUnitPrice.splice(rowindex, 1);
            localStorageTaxValue.splice(rowindex, 1);
            localStorageSubTotalUnit.splice(rowindex, 1);
            localStorageSubTotal.splice(rowindex, 1);
            localStorageProductCode.splice(rowindex, 1);

            localStorageTaxName.splice(rowindex, 1);
            localStorageTaxMethod.splice(rowindex, 1);
            localStorageTempUnitName.splice(rowindex, 1);
            localStorageSaleUnitOperator.splice(rowindex, 1);
            localStorageSaleUnitOperationValue.splice(rowindex, 1);

            localStorage.setItem("localStorageProductId", localStorageProductId);
            localStorage.setItem("localStorageQty", localStorageQty);
            localStorage.setItem("localStorageSaleUnit", localStorageSaleUnit);
            localStorage.setItem("localStorageProductCode", localStorageProductCode);
            localStorage.setItem("localStorageProductDiscount", localStorageProductDiscount);
            localStorage.setItem("localStorageTaxRate", localStorageTaxRate);
            localStorage.setItem("localStorageTaxName", localStorageTaxName);
            localStorage.setItem("localStorageTaxMethod", localStorageTaxMethod);
            localStorage.setItem("localStorageTempUnitName", localStorageTempUnitName);
            localStorage.setItem("localStorageSaleUnitOperator", localStorageSaleUnitOperator);
            localStorage.setItem("localStorageSaleUnitOperationValue", localStorageSaleUnitOperationValue);
            localStorage.setItem("localStorageNetUnitPrice", localStorageNetUnitPrice);
            localStorage.setItem("localStorageTaxValue", localStorageTaxValue);
            localStorage.setItem("localStorageSubTotalUnit", localStorageSubTotalUnit);
            localStorage.setItem("localStorageSubTotal", localStorageSubTotal);

            $(this).closest("tr").remove();
            localStorage.setItem("tbody-id", $("table.order-list tbody").html());
            calculateTotal();
        });

        //Edit product
        $("table.order-list").on("click", ".edit-product", function() {
            rowindex = $(this).closest('tr').index();
            edit();
        });

        //Update product
        $('button[name="update_btn"]').on("click", function() {
            if (is_imei[rowindex]) {
                var imeiNumbers = $("#editModal input[name=imei_numbers]").val();
                $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.imei-number').val(
                    imeiNumbers);
            }

            var edit_discount = $('input[name="edit_discount"]').val();
            var edit_qty = $('input[name="edit_qty"]').val();
            var edit_unit_price = $('input[name="edit_unit_price"]').val();

            if (parseFloat(edit_discount) > parseFloat(edit_unit_price)) {
                alert('Invalid Discount Input!');
                return;
            }

            if (edit_qty < 1) {
                $('input[name="edit_qty"]').val(1);
                edit_qty = 1;
                $("#changeQuantity1Toast").toast("show");
            }

            var tax_rate_all = <?php echo json_encode($tax_rate_all); ?>;

            tax_rate[rowindex] = localStorageTaxRate[rowindex] = parseFloat(tax_rate_all[$(
                'select[name="edit_tax_rate"]').val()]);
            tax_name[rowindex] = localStorageTaxName[rowindex] = $('select[name="edit_tax_rate"] option:selected')
                .text();

            product_discount[rowindex] = $('input[name="edit_discount"]').val();
            if (product_type[pos] == 'standard') {
                var row_unit_operator = unit_operator[rowindex].slice(0, unit_operator[rowindex].indexOf(","));
                var row_unit_operation_value = unit_operation_value[rowindex].slice(0, unit_operation_value[
                    rowindex].indexOf(","));
                if (row_unit_operator == '*') {
                    product_price[rowindex] = $('input[name="edit_unit_price"]').val() / row_unit_operation_value;
                } else {
                    product_price[rowindex] = $('input[name="edit_unit_price"]').val() * row_unit_operation_value;
                }
                var position = $('select[name="edit_unit"]').val();
                var temp_operator = temp_unit_operator[position];
                var temp_operation_value = temp_unit_operation_value[position];
                $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.sale-unit').val(
                    temp_unit_name[position]);
                temp_unit_name.splice(position, 1);
                temp_unit_operator.splice(position, 1);
                temp_unit_operation_value.splice(position, 1);

                temp_unit_name.unshift($('select[name="edit_unit"] option:selected').text());
                temp_unit_operator.unshift(temp_operator);
                temp_unit_operation_value.unshift(temp_operation_value);

                unit_name[rowindex] = localStorageTempUnitName[rowindex] = temp_unit_name.toString() + ',';
                unit_operator[rowindex] = localStorageSaleUnitOperator[rowindex] = temp_unit_operator.toString() +
                    ',';
                unit_operation_value[rowindex] = localStorageSaleUnitOperationValue[rowindex] =
                    temp_unit_operation_value.toString() + ',';

                localStorage.setItem("localStorageTaxRate", localStorageTaxRate);
                localStorage.setItem("localStorageTaxName", localStorageTaxName);
                localStorage.setItem("localStorageTempUnitName", localStorageTempUnitName);
                localStorage.setItem("localStorageSaleUnitOperator", localStorageSaleUnitOperator);
                localStorage.setItem("localStorageSaleUnitOperationValue", localStorageSaleUnitOperationValue);
            } else {
                product_price[rowindex] = $('input[name="edit_unit_price"]').val();
            }
            checkDiscount(edit_qty, false);
        });

        $('button[name="order_discount_btn"]').on("click", function() {
            calculateGrandTotal();
        });

        $('button[name="shipping_cost_btn"]').on("click", function() {
            calculateGrandTotal();
        });

        $('button[name="order_tax_btn"]').on("click", function() {
            calculateGrandTotal();
        });

        $(".coupon-check").on("click", function() {
            couponDiscount();
        });

        $(".payment-btn").on("click", function() {
            var audio = $("#mysoundclip2")[0];
            audio.play();
            $('input[name="paid_amount"]').val($("#grand-total").text());
            $('input[name="paying_amount"]').val($("#grand-total").text());
            $('.qc').data('initial', 1);
        });

        $("#draft-btn").on("click", function() {
            var audio = $("#mysoundclip2")[0];
            audio.play();
            $('input[name="sale_status"]').val(3);
            $('input[name="paying_amount"]').prop('required', false);
            $('input[name="paid_amount"]').prop('required', false);
            var rownumber = $('table.order-list tbody tr:last').index();
            if (rownumber < 0) {
                $("#insertProductToast").toast("show");
            } else
                $('.payment-form').submit();
        });

        $("#submit-btn").on("click", function() {
            $('.payment-form').submit();
        });

        $("#gift-card-btn").on("click", function() {
            $('select[name="paid_by_id_select"]').val(2);
            $('.selectpicker').selectpicker('refresh');
            $('div.qc').hide();
            giftCard();
        });

        $("#credit-card-btn").on("click", function() {
            $('select[name="paid_by_id_select"]').val(3);
            $('.selectpicker').selectpicker('refresh');
            $('div.qc').hide();
            creditCard();
        });

        $("#cheque-btn").on("click", function() {
            $('select[name="paid_by_id_select"]').val(4);
            $('.selectpicker').selectpicker('refresh');
            $('div.qc').hide();
            cheque();
        });

        $("#cash-btn").on("click", function() {
            $('select[name="paid_by_id_select"]').val(1);
            $('.selectpicker').selectpicker('refresh');
            $('div.qc').show();
            hide();
        });

        $("#paypal-btn").on("click", function() {
            $('select[name="paid_by_id_select"]').val(5);
            $('.selectpicker').selectpicker('refresh');
            $('div.qc').hide();
            hide();
        });

        $("#deposit-btn").on("click", function() {
            $('select[name="paid_by_id_select"]').val(6);
            $('.selectpicker').selectpicker('refresh');
            $('div.qc').hide();
            hide();
            deposits();
        });

        $("#point-btn").on("click", function() {
            $('select[name="paid_by_id_select"]').val(7);
            $('.selectpicker').selectpicker('refresh');
            $('div.qc').hide();
            hide();
            pointCalculation();
        });

        $('select[name="paid_by_id_select"]').on("change", function() {
            var id = $(this).val();
            $(".payment-form").off("submit");
            if (id == 2) {
                $('div.qc').hide();
                giftCard();
            } else if (id == 3) {
                $('div.qc').hide();
                creditCard();
            } else if (id == 4) {
                $('div.qc').hide();
                cheque();
            } else {
                hide();
                if (id == 1)
                    $('div.qc').show();
                else if (id == 6) {
                    $('div.qc').hide();
                    deposits();
                } else if (id == 7) {
                    $('div.qc').hide();
                    pointCalculation();
                }
            }
        });

        $('#add-payment select[name="gift_card_id_select"]').on("change", function() {
            var balance = gift_card_amount[$(this).val()] - gift_card_expense[$(this).val()];
            $('#add-payment input[name="gift_card_id"]').val($(this).val());
            if ($('input[name="paid_amount"]').val() > balance) {
                alert('Amount exceeds card balance! Gift Card balance: ' + balance);
            }
        });

        $('#add-payment input[name="paying_amount"]').on("input", function() {
            change($(this).val(), $('input[name="paid_amount"]').val());
        });

        $('input[name="paid_amount"]').on("input", function() {
            if ($(this).val() > parseFloat($('input[name="paying_amount"]').val())) {
                $("#payingAmountBiggerToast").toast("show");
                $(this).val('');
            } else if ($(this).val() > parseFloat($('#grand-total').text())) {
                $("#payingAmountTotalToast").toast("show");
                $(this).val('');
            }

            change($('input[name="paying_amount"]').val(), $(this).val());
            var id = $('select[name="paid_by_id_select"]').val();
            if (id == 2) {
                var balance = gift_card_amount[$("#gift_card_id_select").val()] - gift_card_expense[$(
                    "#gift_card_id_select").val()];
                if ($(this).val() > balance)
                    alert('Amount exceeds card balance! Gift Card balance: ' + balance);
            } else if (id == 6) {
                if ($('input[name="paid_amount"]').val() > deposit[$('#customer_id').val()])
                    alert('Amount exceeds customer deposit! Customer deposit : ' + deposit[$('#customer_id')
                        .val()]);
            }
        });

        $('.transaction-btn-plus').on("click", function() {
            $(this).addClass('d-none');
            $('.transaction-btn-close').removeClass('d-none');
        });

        $('.transaction-btn-close').on("click", function() {
            $(this).addClass('d-none');
            $('.transaction-btn-plus').removeClass('d-none');
        });

        $('.coupon-btn-plus').on("click", function() {
            $(this).addClass('d-none');
            $('.coupon-btn-close').removeClass('d-none');
        });

        $('.coupon-btn-close').on("click", function() {
            $(this).addClass('d-none');
            $('.coupon-btn-plus').removeClass('d-none');
        });

        $(document).on('click', '.qc-btn', function(e) {
            if ($(this).data('amount')) {
                if ($('.qc').data('initial')) {
                    $('input[name="paying_amount"]').val($(this).data('amount').toFixed(2));
                    $('.qc').data('initial', 0);
                } else {
                    $('input[name="paying_amount"]').val((parseFloat($('input[name="paying_amount"]').val()) + $(
                        this).data('amount')).toFixed(2));
                }
            } else
                $('input[name="paying_amount"]').val('0.00');
            change($('input[name="paying_amount"]').val(), $('input[name="paid_amount"]').val());
        });

        function change(paying_amount, paid_amount) {
            $("#change").text(parseFloat(paying_amount - paid_amount).toFixed(2));
        }

        function confirmDelete() {
            if (confirm("Are you sure want to delete?")) {
                return true;
            }
            return false;
        }

        function productSearch(data) {
            var product_info = data.split(" ");
            var product_code = product_info[0];
            var pre_qty = 0;
            $(".product-code").each(function(i) {
                if ($(this).val() == product_code) {
                    rowindex = i;
                    pre_qty = $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ') .qty').val();
                }
            });
            data += '?' + $('#customer_id').val() + '?' + (parseFloat(pre_qty) + 1);
            $.ajax({
                type: 'GET',
                url: 'sales/lims_product_search',
                data: {
                    data: data
                },
                success: function(data) {
                    console.log(pre_qty);
                    var flag = 1;
                    if (pre_qty > 0) {
                        /*if(pre_qty)
                            var qty = parseFloat(pre_qty) + data[15];
                        else*/
                        var qty = data[15];
                        $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ') .qty').val(qty);
                        pos = product_code.indexOf(data[1]);
                        if (!data[11] && product_warehouse_price[pos]) {
                            product_price[rowindex] = parseFloat(product_warehouse_price[pos] * currency[
                                'exchange_rate']) + parseFloat(product_warehouse_price[pos] * currency[
                                'exchange_rate'] * customer_group_rate);
                        } else {
                            product_price[rowindex] = parseFloat(data[2] * currency['exchange_rate']) +
                                parseFloat(data[2] * currency['exchange_rate'] * customer_group_rate);
                        }
                        flag = 0;
                        checkQuantity(String(qty), true);
                        flag = 0;
                        localStorage.setItem("tbody-id", $("table.order-list tbody").html());
                    }
                    $("input[name='product_code_name']").val('');
                    if (flag) {
                        addNewProduct(data);
                    }
                }
            });
        }

        function addNewProduct(data) {
            var newRow = $('<tr class="d-flex">');
            var cols = '';
            temp_unit_name = (data[6]).split(',');
            pos = product_code.indexOf(data[1]);
            cols +=
                '<td class="col-2 item-quantity"><input type="text" name="qty[]" class="form-control qty numkey input-number p-md-0" step="any" value="' +
                data[15] + '" required></td>'
            cols +=
                '<td class="col-4 product-title"><button type="button" class="edit-product btn btn-link" data-toggle="modal" data-target="#editModal"><strong><span class="product-name text-start">' +
                data[0] + '</span></strong></button><br>' + '<p>In Stock: <span class="in-stock"></span></p></td>';
            if (data[12]) {
                cols += '<td class="hidden col-sm-2"><input type="text" class="form-control batch-no" value="' + batch_no[
                        pos] +
                    '" required/> <input type="hidden" class="product-batch-id" name="product_batch_id[]" value="' +
                    product_batch_id[pos] + '"/> </td>';
            } else {
                cols +=
                    '<td class="hidden col-sm-2"><input type="text" class="form-control batch-no" disabled/> <input type="hidden" class="product-batch-id" name="product_batch_id[]"/> </td>';
            }
            cols += '<td class="hidden col-sm-2 product-price"></td>';
            cols += '<td class="col-4"><span class="sub-total badge text-bg-secondary-soft fs-4"></span> </td>';
            cols +=
                '<td class="hidden col-sm-3"><div class="input-group"><span class="input-group-btn"><span class="input-group-btn"><button type="button" class="btn btn-default plus"><span class="dripicons-plus"></span></button></span><button type="button" class="btn btn-default minus"><span class="dripicons-minus"></span></button></span></div></td>';

            cols +=
                '<td class="col-2"><button type="button" class="ibtnDel btn btn-sm"><i class="dripicons-cross"></i></button></td>';
            cols += '<input type="hidden" class="product-code" name="product_code[]" value="' + data[1] + '"/>';
            cols += '<input type="hidden" class="product-id" name="product_id[]" value="' + data[9] + '"/>';
            cols += '<input type="hidden" class="product_price" />';
            cols += '<input type="hidden" class="sale-unit" name="sale_unit[]" value="' + temp_unit_name[0] + '"/>';
            cols += '<input type="hidden" class="net_unit_price" name="net_unit_price[]" />';
            cols += '<input type="hidden" class="discount-value" name="discount[]" />';
            cols += '<input type="hidden" class="tax-rate" name="tax_rate[]" value="' + data[3] + '"/>';
            cols += '<input type="hidden" class="tax-value" name="tax[]" />';
            cols += '<input type="hidden" class="tax-name" value="' + data[4] + '" />';
            cols += '<input type="hidden" class="tax-method" value="' + data[5] + '" />';
            cols += '<input type="hidden" class="sale-unit-operator" value="' + data[7] + '" />';
            cols += '<input type="hidden" class="sale-unit-operation-value" value="' + data[8] + '" />';
            cols += '<input type="hidden" class="subtotal-value" name="subtotal[]" />';
            cols += '<input type="hidden" class="imei-number" name="imei_number[]" />';

            newRow.append(cols);
            if (keyboard_active == 1) {
                $("table.order-list tbody").prepend(newRow).find('.qty').keyboard({
                    usePreview: false,
                    layout: 'custom',
                    display: {
                        'accept': '&#10004;',
                        'cancel': '&#10006;'
                    },
                    customLayout: {
                        'normal': ['1 2 3', '4 5 6', '7 8 9', '0 {dec} {bksp}', '{clear} {cancel} {accept}']
                    },
                    restrictInput: true,
                    preventPaste: true,
                    autoAccept: true,
                    css: {
                        container: 'center-block dropdown-menu',
                        buttonDefault: 'btn btn-default',
                        buttonHover: 'btn-primary',
                        buttonAction: 'active',
                        buttonDisabled: 'disabled'
                    },
                });
            } else
                $("table.order-list tbody").prepend(newRow);

            rowindex = newRow.index();

            if (!data[11] && product_warehouse_price[pos]) {
                product_price.splice(rowindex, 0, parseFloat(product_warehouse_price[pos] * currency['exchange_rate']) +
                    parseFloat(product_warehouse_price[pos] * currency['exchange_rate'] * customer_group_rate));
            } else {
                product_price.splice(rowindex, 0, parseFloat(data[2] * currency['exchange_rate']) + parseFloat(data[2] *
                    currency['exchange_rate'] * customer_group_rate));
            }
            product_discount.splice(rowindex, 0, '0.00');
            tax_rate.splice(rowindex, 0, parseFloat(data[3]));
            tax_name.splice(rowindex, 0, data[4]);
            tax_method.splice(rowindex, 0, data[5]);
            unit_name.splice(rowindex, 0, data[6]);
            unit_operator.splice(rowindex, 0, data[7]);
            unit_operation_value.splice(rowindex, 0, data[8]);
            is_imei.splice(rowindex, 0, data[13]);
            is_variant.splice(rowindex, 0, data[14]);
            $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.product_price').val(product_price[
                rowindex]);
            localStorageQty.splice(rowindex, 0, data[15]);
            localStorageProductId.splice(rowindex, 0, data[9]);
            localStorageProductCode.splice(rowindex, 0, data[1]);
            localStorageSaleUnit.splice(rowindex, 0, temp_unit_name[0]);
            localStorageProductDiscount.splice(rowindex, 0, product_discount[rowindex]);
            localStorageTaxRate.splice(rowindex, 0, tax_rate[rowindex].toFixed(2));
            localStorageTaxName.splice(rowindex, 0, data[4]);
            localStorageTaxMethod.splice(rowindex, 0, data[5]);
            localStorageTempUnitName.splice(rowindex, 0, data[6]);
            localStorageSaleUnitOperator.splice(rowindex, 0, data[7]);
            localStorageSaleUnitOperationValue.splice(rowindex, 0, data[8]);
            //put some dummy value
            localStorageNetUnitPrice.splice(rowindex, 0, '0.00');
            localStorageTaxValue.splice(rowindex, 0, '0.00');
            localStorageSubTotalUnit.splice(rowindex, 0, '0.00');
            localStorageSubTotal.splice(rowindex, 0, '0.00');

            localStorage.setItem("localStorageProductId", localStorageProductId);
            localStorage.setItem("localStorageSaleUnit", localStorageSaleUnit);
            localStorage.setItem("localStorageProductCode", localStorageProductCode);
            localStorage.setItem("localStorageTaxName", localStorageTaxName);
            localStorage.setItem("localStorageTaxMethod", localStorageTaxMethod);
            localStorage.setItem("localStorageTempUnitName", localStorageTempUnitName);
            localStorage.setItem("localStorageSaleUnitOperator", localStorageSaleUnitOperator);
            localStorage.setItem("localStorageSaleUnitOperationValue", localStorageSaleUnitOperationValue);
            checkQuantity(data[15], true);
            localStorage.setItem("tbody-id", $("table.order-list tbody").html());
            if (data[13]) {
                $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.edit-product').click();
            }
        }

        function edit() {
            $(".imei-section").remove();
            if (is_imei[rowindex]) {
                var imeiNumbers = $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.imei-number')
                    .val();

                htmlText =
                    '<div class="col-md-12 form-group imei-section"><label>IMEI or Serial Numbers</label><input type="text" name="imei_numbers" value="' +
                    imeiNumbers +
                    '" class="form-control imei_number" placeholder="Type imei or serial numbers and separate them by comma. Example:1001,2001" step="any"></div>';
                $("#editModal .modal-element").append(htmlText);
            }

            var row_product_name_code = $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find(
                '.product-name').text();
            $('#modal_header').text(row_product_name_code);

            var qty = $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.qty').val();
            $('input[name="edit_qty"]').val(qty);

            $('input[name="edit_discount"]').val(parseFloat(product_discount[rowindex]).toFixed(2));

            var tax_name_all = <?php echo json_encode($tax_name_all); ?>;
            pos = tax_name_all.indexOf(tax_name[rowindex]);
            $('select[name="edit_tax_rate"]').val(pos);

            var row_product_code = $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.product-code')
                .val();
            pos = product_code.indexOf(row_product_code);
            if (product_type[pos] == 'standard') {
                unitConversion();
                temp_unit_name = (unit_name[rowindex]).split(',');
                temp_unit_name.pop();
                temp_unit_operator = (unit_operator[rowindex]).split(',');
                temp_unit_operator.pop();
                temp_unit_operation_value = (unit_operation_value[rowindex]).split(',');
                temp_unit_operation_value.pop();
                $('select[name="edit_unit"]').empty();
                $.each(temp_unit_name, function(key, value) {
                    $('select[name="edit_unit"]').append('<option value="' + key + '">' + value + '</option>');
                });
                $("#edit_unit").show();
            } else {
                row_product_price = product_price[rowindex];
                $("#edit_unit").hide();
            }
            $('input[name="edit_unit_price"]').val(row_product_price.toFixed(2));
            $('.selectpicker').selectpicker('refresh');
        }

        function couponDiscount() {
            var rownumber = $('table.order-list tbody tr:last').index();
            if (rownumber < 0) {
                $("#insertProductToast").toast("show");
            } else if ($("#coupon-code").val() != '') {
                valid = 0;
                $.each(coupon_list, function(key, value) {
                    if ($("#coupon-code").val() == value['code']) {
                        valid = 1;
                        todyDate = <?php echo json_encode(date('Y-m-d')); ?>;
                        if (parseFloat(value['quantity']) <= parseFloat(value['used']))
                            alert('This Coupon is no longer available');
                        else if (todyDate > value['expired_date'])
                            alert('This Coupon has expired!');
                        else if (value['type'] == 'fixed') {
                            if (parseFloat($('input[name="grand_total"]').val()) >= value['minimum_amount']) {
                                $('input[name="grand_total"]').val($('input[name="grand_total"]').val() - value[
                                    'amount']);
                                $('#grand-total').text(parseFloat($('input[name="grand_total"]').val()).toFixed(2));
                                if (!$('input[name="coupon_active"]').val())
                                    alert('Congratulation! You got ' + value['amount'] + ' ' + currency +
                                        ' discount');
                                $(".coupon-check").prop("disabled", true);
                                $("#coupon-code").prop("disabled", true);
                                $('input[name="coupon_active"]').val(1);
                                $("#coupon-modal").modal('hide');
                                $('input[name="coupon_id"]').val(value['id']);
                                $('input[name="coupon_discount"]').val(value['amount']);
                                $('#coupon-text').text(parseFloat(value['amount']).toFixed(2));
                            } else
                                alert('Grand Total is not sufficient for discount! Required ' + value[
                                    'minimum_amount'] + ' ' + currency);
                        } else {
                            var grand_total = $('input[name="grand_total"]').val();
                            var coupon_discount = grand_total * (value['amount'] / 100);
                            grand_total = grand_total - coupon_discount;
                            $('input[name="grand_total"]').val(grand_total);
                            $('#grand-total').text(parseFloat(grand_total).toFixed(2));
                            if (!$('input[name="coupon_active"]').val())
                                alert('Congratulation! You got ' + value['amount'] + '% discount');
                            $(".coupon-check").prop("disabled", true);
                            $("#coupon-code").prop("disabled", true);
                            $('input[name="coupon_active"]').val(1);
                            $("#coupon-modal").modal('hide');
                            $('input[name="coupon_id"]').val(value['id']);
                            $('input[name="coupon_discount"]').val(coupon_discount);
                            $('#coupon-text').text(parseFloat(coupon_discount).toFixed(2));
                        }
                    }
                });
                if (!valid)
                    alert('Invalid coupon code!');
            }
        }

        function checkDiscount(qty, flag) {
            var customer_id = $('#customer_id').val();
            var product_id = $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ') .product-id').val();
            if (flag) {
                $.ajax({
                    type: 'GET',
                    async: false,
                    url: 'sales/check-discount?qty=' + qty + '&customer_id=' + customer_id + '&product_id=' +
                        product_id,
                    success: function(data) {
                        //console.log(data);
                        pos = product_code.indexOf($('table.order-list tbody tr:nth-child(' + (rowindex + 1) +
                            ') .product-code').val());
                        product_price[rowindex] = parseFloat(data[0] * currency['exchange_rate']) + parseFloat(
                            data[0] * currency['exchange_rate'] * customer_group_rate);
                    }
                });
            }
            $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ') .qty').val(qty);
            checkQuantity(String(qty), flag);
            localStorage.setItem("tbody-id", $("table.order-list tbody").html());
        }

        function checkQuantity(sale_qty, flag) {
            var row_product_code = $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.product-code')
                .val();
            pos = product_code.indexOf(row_product_code);
            $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.in-stock').text(product_qty[pos]);
            localStorageQty[rowindex] = sale_qty;
            localStorage.setItem("localStorageQty", localStorageQty);
            if (product_type[pos] == 'standard') {
                var operator = unit_operator[rowindex].split(',');
                var operation_value = unit_operation_value[rowindex].split(',');
                if (operator[0] == '*')
                    total_qty = sale_qty * operation_value[0];
                else if (operator[0] == '/')
                    total_qty = sale_qty / operation_value[0];
                if (total_qty > parseFloat(product_qty[pos])) {
                    $("#exceedsStockQuantityToast").toast("show");
                    if (flag) {
                        sale_qty = sale_qty.substring(0, sale_qty.length - 1);
                        localStorageQty[rowindex] = sale_qty;
                        localStorage.setItem("localStorageQty", localStorageQty);
                        checkQuantity(sale_qty, true);
                    } else {
                        localStorageQty[rowindex] = sale_qty;
                        localStorage.setItem("localStorageQty", localStorageQty);
                        edit();
                        return;
                    }
                }
                $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.qty').val(sale_qty);
            } else if (product_type[pos] == 'combo') {
                child_id = product_list[pos].split(',');
                child_qty = qty_list[pos].split(',');
                $(child_id).each(function(index) {
                    var position = product_id.indexOf(parseInt(child_id[index]));
                    if (parseFloat(sale_qty * child_qty[index]) > product_qty[position]) {
                        $("#exceedsStockQuantityToast").toast("show");
                        if (flag) {
                            sale_qty = sale_qty.substring(0, sale_qty.length - 1);
                            $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.qty').val(
                                sale_qty);
                        } else {
                            edit();
                            flag = true;
                            return false;
                        }
                    }
                });
            }

            if (!flag) {
                $('#editModal').modal('hide');
                $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.qty').val(sale_qty);
            }
            calculateRowProductData(sale_qty);
        }

        function unitConversion() {
            var row_unit_operator = unit_operator[rowindex].slice(0, unit_operator[rowindex].indexOf(","));
            var row_unit_operation_value = unit_operation_value[rowindex].slice(0, unit_operation_value[rowindex].indexOf(
                ","));

            if (row_unit_operator == '*') {
                row_product_price = product_price[rowindex] * row_unit_operation_value;
            } else {
                row_product_price = product_price[rowindex] / row_unit_operation_value;
            }
        }

        function calculateRowProductData(quantity) {
            if (product_type[pos] == 'standard')
                unitConversion();
            else
                row_product_price = product_price[rowindex];
            if (tax_method[rowindex] == 1) {
                var net_unit_price = row_product_price - product_discount[rowindex];
                var tax = net_unit_price * quantity * (tax_rate[rowindex] / 100);
                var sub_total = (net_unit_price * quantity) + tax;

                if (parseFloat(quantity))
                    var sub_total_unit = sub_total / quantity;
                else
                    var sub_total_unit = sub_total;
            } else {
                var sub_total_unit = row_product_price - product_discount[rowindex];
                var net_unit_price = (100 / (100 + tax_rate[rowindex])) * sub_total_unit;
                var tax = (sub_total_unit - net_unit_price) * quantity;
                var sub_total = sub_total_unit * quantity;
            }

            $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.discount-value').val((product_discount[
                rowindex] * quantity).toFixed(2));
            $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.tax-rate').val(tax_rate[rowindex]
                .toFixed(2));
            $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.net_unit_price').val(net_unit_price
                .toFixed(2));
            $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.tax-value').val(tax.toFixed(2));
            $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.product-price').text(sub_total_unit
                .toFixed(2));
            $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.sub-total').text(sub_total.toFixed(2));
            $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.subtotal-value').val(sub_total.toFixed(
                2));

            localStorageProductDiscount.splice(rowindex, 1, (product_discount[rowindex] * quantity).toFixed(2));
            localStorageTaxRate.splice(rowindex, 1, tax_rate[rowindex].toFixed(2));
            localStorageNetUnitPrice.splice(rowindex, 1, net_unit_price.toFixed(2));
            localStorageTaxValue.splice(rowindex, 1, tax.toFixed(2));
            localStorageSubTotalUnit.splice(rowindex, 1, sub_total_unit.toFixed(2));
            localStorageSubTotal.splice(rowindex, 1, sub_total.toFixed(2));
            localStorage.setItem("localStorageProductDiscount", localStorageProductDiscount);
            localStorage.setItem("localStorageTaxRate", localStorageTaxRate);
            localStorage.setItem("localStorageNetUnitPrice", localStorageNetUnitPrice);
            localStorage.setItem("localStorageTaxValue", localStorageTaxValue);
            localStorage.setItem("localStorageSubTotalUnit", localStorageSubTotalUnit);
            localStorage.setItem("localStorageSubTotal", localStorageSubTotal);

            calculateTotal();
        }

        function calculateTotal() {
            //Sum of quantity
            var total_qty = 0;
            $("table.order-list tbody .qty").each(function(index) {
                if ($(this).val() == '') {
                    total_qty += 0;
                } else {
                    total_qty += parseFloat($(this).val());
                }
            });
            $('input[name="total_qty"]').val(total_qty);

            //Sum of discount
            var total_discount = 0;
            $("table.order-list tbody .discount-value").each(function() {
                total_discount += parseFloat($(this).val());
            });

            $('input[name="total_discount"]').val(total_discount.toFixed(2));

            //Sum of tax
            var total_tax = 0;
            $(".tax-value").each(function() {
                total_tax += parseFloat($(this).val());
            });

            $('input[name="total_tax"]').val(total_tax.toFixed(2));

            //Sum of subtotal
            var total = 0;
            $(".sub-total").each(function() {
                total += parseFloat($(this).text());
            });
            $('input[name="total_price"]').val(total.toFixed(2));

            calculateGrandTotal();
        }

        function calculateGrandTotal() {
            var item = $('table.order-list tbody tr:last').index();
            var total_qty = parseFloat($('input[name="total_qty"]').val());
            var subtotal = parseFloat($('input[name="total_price"]').val());
            var order_tax = parseFloat($('select[name="order_tax_rate_select"]').val());
            var order_discount_type = $('select[name="order_discount_type_select"]').val();
            var order_discount_value = parseFloat($('input[name="order_discount_value"]').val());

            if (!order_discount_value)
                order_discount_value = 0.00;

            if (order_discount_type == 'Flat')
                var order_discount = parseFloat(order_discount_value);
            else
                var order_discount = parseFloat(subtotal * (order_discount_value / 100));

            localStorage.setItem("order-tax-rate-select", order_tax);
            localStorage.setItem("order-discount-type", order_discount_type);
            $("#discount").text(order_discount.toFixed(2));
            $('input[name="order_discount"]').val(order_discount);
            $('input[name="order_discount_type"]').val(order_discount_type);

            var shipping_cost = parseFloat($('input[name="shipping_cost"]').val());
            if (!shipping_cost)
                shipping_cost = 0.00;

            item = ++item + '(' + total_qty + ')';
            order_tax = (subtotal - order_discount) * (order_tax / 100);
            var grand_total = (subtotal + order_tax + shipping_cost) - order_discount;
            $('input[name="grand_total"]').val(grand_total.toFixed(2));

            couponDiscount();
            var coupon_discount = parseFloat($('input[name="coupon_discount"]').val());
            if (!coupon_discount)
                coupon_discount = 0.00;
            grand_total -= coupon_discount;

            $('#item').text(item);
            $('input[name="item"]').val($('table.order-list tbody tr:last').index() + 1);
            $('#subtotal').text(subtotal.toFixed(2));
            $('#tax').text(order_tax.toFixed(2));
            $('input[name="order_tax"]').val(order_tax.toFixed(2));
            $('#shipping-cost').text(shipping_cost.toFixed(2));
            $('#grand-total').text(grand_total.toFixed(2));
            $('input[name="grand_total"]').val(grand_total.toFixed(2));
        }

        function hide() {
            $(".card-element").hide();
            $(".card-errors").hide();
            $(".cheque").hide();
            $(".gift-card").hide();
            $('input[name="cheque_no"]').attr('required', false);
        }

        function giftCard() {
            $(".gift-card").show();
            $.ajax({
                url: 'sales/get_gift_card',
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('#add-payment select[name="gift_card_id_select"]').empty();
                    $.each(data, function(index) {
                        gift_card_amount[data[index]['id']] = data[index]['amount'];
                        gift_card_expense[data[index]['id']] = data[index]['expense'];
                        $('#add-payment select[name="gift_card_id_select"]').append('<option value="' +
                            data[index]['id'] + '">' + data[index]['card_no'] + '</option>');
                    });
                    $('.selectpicker').selectpicker('refresh');
                    $('.selectpicker').selectpicker();
                }
            });
            $(".card-element").hide();
            $(".card-errors").hide();
            $(".cheque").hide();
            $('input[name="cheque_no"]').attr('required', false);
        }

        function cheque() {
            $(".cheque").show();
            $('input[name="cheque_no"]').attr('required', true);
            $(".card-element").hide();
            $(".card-errors").hide();
            $(".gift-card").hide();
        }

        function creditCard() {
            $.getScript("public/vendor/stripe/checkout.js");
            $(".card-element").show();
            $(".card-errors").show();
            $(".cheque").hide();
            $(".gift-card").hide();
            $('input[name="cheque_no"]').attr('required', false);
        }

        function deposits() {
            if ($('input[name="paid_amount"]').val() > deposit[$('#customer_id').val()]) {
                alert('Amount exceeds customer deposit! Customer deposit : ' + deposit[$('#customer_id').val()]);
            }
            $('input[name="cheque_no"]').attr('required', false);
            $('#add-payment select[name="gift_card_id_select"]').attr('required', false);
        }

        function pointCalculation() {
            paid_amount = $('input[name=paid_amount]').val();
            required_point = Math.ceil(paid_amount / reward_point_setting['per_point_amount']);
            if (required_point > points[$('#customer_id').val()]) {
                alert('Customer does not have sufficient points. Available points: ' + points[$('#customer_id').val()]);
            } else {
                $("input[name=used_points]").val(required_point);
            }
        }

        function cancel(rownumber) {
            while (rownumber >= 0) {
                product_price.pop();
                product_discount.pop();
                tax_rate.pop();
                tax_name.pop();
                tax_method.pop();
                unit_name.pop();
                unit_operator.pop();
                unit_operation_value.pop();
                $('table.order-list tbody tr:last').remove();
                rownumber--;
            }
            $('input[name="shipping_cost"]').val('');
            $('input[name="order_discount"]').val('');
            $('select[name="order_tax_rate_select"]').val(0);
            calculateTotal();
        }

        function confirmCancel() {
            var audio = $("#mysoundclip2")[0];
            audio.play();
            if (confirm("Are you sure want to cancel?")) {
                cancel($('table.order-list tbody tr:last').index());
            }
            return false;
        }

        $(document).on('submit', '.payment-form', function(e) {
            var rownumber = $('table.order-list tbody tr:last').index();
            if (rownumber < 0) {
                $("#insertProductToast").toast("show");
                e.preventDefault();
            } else if (parseFloat($('input[name="paying_amount"]').val()) < parseFloat($(
                    'input[name="paid_amount"]').val())) {
                $("#payingAmountBiggerToast").toast("show");
                e.preventDefault();
            } else {
                $("#submit-button").prop('disabled', true);
            }
            $('input[name="paid_by_id"]').val($('select[name="paid_by_id_select"]').val());
            $('input[name="order_tax_rate"]').val($('select[name="order_tax_rate_select"]').val());

        });

        $('#product-table').DataTable({
            "order": [],
            'pageLength': product_row_number,
            'language': {
                'paginate': {
                    'previous': '<i class="fa fa-angle-left"></i>',
                    'next': '<i class="fa fa-angle-right"></i>'
                }
            },
            dom: 'tp'
        });
    </script>
@endpush
