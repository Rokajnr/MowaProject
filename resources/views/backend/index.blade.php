@extends('backend.layout.main')
@section('content')

@if(session()->has('not_permitted'))
  <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('not_permitted') }}</div>
@endif
@if(session()->has('message'))
  <div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('message') }}</div>
@endif
      @php
        if($general_setting->theme == 'default.css'){
          $color = '#733686';
          $color_rgba = 'rgba(115, 54, 134, 0.8)';
        }
        elseif($general_setting->theme == 'green.css'){
            $color = '#2ecc71';
            $color_rgba = 'rgba(46, 204, 113, 0.8)';
        }
        elseif($general_setting->theme == 'blue.css'){
            $color = '#3498db';
            $color_rgba = 'rgba(52, 152, 219, 0.8)';
        }
        elseif($general_setting->theme == 'dark.css'){
            $color = '#34495e';
            $color_rgba = 'rgba(52, 73, 94, 0.8)';
        }
      @endphp
      <div class="row">
        <div class="container-fluid">
          <div class="col-md-12">
            <div class="brand-text float-left mt-4">
                <h3>{{trans('file.welcome')}} <span>{{Auth::user()->name}}</span> </h3>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        @if(in_array("revenue_profit_summary", $all_permission))
        <div class="row">
            <div class="col-lg-6 col-xxl-3 d-flex">

                <!-- Card -->
                <div class="card border-0 flex-fill w-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">

                                <!-- Title -->
                                <h5 class="text-uppercase text-muted fw-semibold mb-2">
                                    Revenue This </br>Month
                                </h5>

                                <!-- Subtitle -->
                                <h2 class="mb-0 revenue-data-monthly">
                                    MWK {{number_format((float)$revenue, 2, '.', '')}}
                                </h2>
                            </div>
                            <div class="col-auto">

                                <!-- Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="30" width="30" class="text-primary"><defs><style>.a{fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5px;}</style></defs><title>monitor-graph-line</title><polygon class="a" points="15 23.253 9 23.253 9.75 18.753 14.25 18.753 15 23.253"></polygon><line class="a" x1="6.75" y1="23.253" x2="17.25" y2="23.253"></line><rect class="a" x="0.75" y="0.753" width="22.5" height="18" rx="3" ry="3"></rect><path class="a" d="M18.75,5.253H16.717a1.342,1.342,0,0,0-.5,2.588l2.064.825a1.342,1.342,0,0,1-.5,2.587H15.75"></path><line class="a" x1="17.25" y1="5.253" x2="17.25" y2="4.503"></line><line class="a" x1="17.25" y1="12.003" x2="17.25" y2="11.253"></line><path class="a" d="M.75,11.253,4.72,7.284a.749.749,0,0,1,1.06,0L7.72,9.223a.749.749,0,0,0,1.06,0l3.97-3.97"></path><line class="a" x1="0.75" y1="15.753" x2="23.25" y2="15.753"></line></svg>                            </div>
                        </div> <!-- / .row -->
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-between">
                            <div class="col-auto">

                                <!-- Label -->
                                <p class="fs-6 text-muted text-uppercase mb-0">
                                    Today Revenue
                                </p>

                                <!-- Comment -->
                                <p class="fs-5 fw-bold mb-0 revenue-data-today">
                                    {{number_format((float)$revenue, 2, '.', '')}}
                                </p>
                            </div>
                            <div class="col text-end text-truncate">

                                <!-- Label -->
                                <p class="fs-6 text-muted text-uppercase mb-0">
                                    Last 7 Days
                                </p>

                                <!-- Comment -->
                                <p class="fs-5 fw-bold mb-0 revenue-data-last7days">
                                    {{number_format((float)$revenue, 2, '.', '')}}
                                </p>
                            </div>
                        </div> <!-- / .row -->
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xxl-3 d-flex">

                <!-- Card -->
                <div class="card border-0 flex-fill w-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">

                                <!-- Title -->
                                <h5 class="text-uppercase text-muted fw-semibold mb-2">
                                    Sale Returns This </br>Month
                                </h5>

                                <!-- Subtitle -->
                                <h2 class="mb-0 return-data-monthly">
                                    MWK {{number_format((float)$return, 2, '.', '')}}
                                </h2>
                            </div>
                            <div class="col-auto">

                                <!-- Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="30" width="30" class="text-primary"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 19.1249H15.921C16.2753 19.125 16.6182 18.9996 16.889 18.7709C17.1597 18.5423 17.3407 18.2253 17.4 17.8759L20.037 2.37593C20.0965 2.02678 20.2776 1.70994 20.5483 1.48153C20.819 1.25311 21.1618 1.12785 21.516 1.12793H22.5"></path><path stroke="currentColor" stroke-width="1.5" d="M7.875 22.125C7.66789 22.125 7.5 21.9571 7.5 21.75C7.5 21.5429 7.66789 21.375 7.875 21.375"></path><path stroke="currentColor" stroke-width="1.5" d="M7.875 22.125C8.08211 22.125 8.25 21.9571 8.25 21.75C8.25 21.5429 8.08211 21.375 7.875 21.375"></path><path stroke="currentColor" stroke-width="1.5" d="M15.375 22.125C15.1679 22.125 15 21.9571 15 21.75C15 21.5429 15.1679 21.375 15.375 21.375"></path><path stroke="currentColor" stroke-width="1.5" d="M15.375 22.125C15.5821 22.125 15.75 21.9571 15.75 21.75C15.75 21.5429 15.5821 21.375 15.375 21.375"></path><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.9529 14.6251H5.88193C5.21301 14.625 4.5633 14.4014 4.03605 13.9897C3.5088 13.5781 3.13425 13.002 2.97193 12.3531L1.52193 6.55309C1.49426 6.44248 1.49218 6.32702 1.51583 6.21548C1.53949 6.10394 1.58827 5.99927 1.65846 5.90941C1.72864 5.81955 1.81839 5.74688 1.92089 5.69692C2.02338 5.64696 2.13591 5.62103 2.24993 5.62109H19.4839"></path></svg>
                            </div>
                        </div> <!-- / .row -->
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-between">
                            <div class="col-auto">

                                <!-- Label -->
                                <p class="fs-6 text-muted text-uppercase mb-0">
                                    Today Returns
                                </p>

                                <!-- Comment -->
                                <p class="fs-5 fw-bold mb-0 return-data-today">
                                    {{number_format((float)$return, 2, '.', '')}}
                                </p>
                            </div>
                            <div class="col text-end text-truncate">

                                <!-- Label -->
                                <p class="fs-6 text-muted text-uppercase mb-0">
                                    Last 7 Days
                                </p>

                                <!-- Comment -->
                                <p class="fs-5 fw-bold mb-0 return-data-last7days">
                                    {{number_format((float)$return, 2, '.', '')}}
                                </p>
                            </div>
                        </div> <!-- / .row -->
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xxl-3 d-flex">

                <!-- Card -->
                <div class="card border-0 flex-fill w-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">

                                <!-- Title -->
                                <h5 class="text-uppercase text-muted fw-semibold mb-2">
                                    Purchase Returns </br>This Month
                                </h5>

                                <!-- Subtitle -->
                                <h2 class="mb-0 purchase-return-data-monthly">MWK {{number_format((float)$purchase_return, 2, '.', '')}}
                                </h2>
                            </div>
                            <div class="col-auto">

                                <!-- Icon -->
                                <svg viewBox="0 0 24 24" class="text-primary" height="30" width="30" xmlns="http://www.w3.org/2000/svg"><path d="M20.25,9.75v-3a1.5,1.5,0,0,0-1.5-1.5H8.25V3.75a1.5,1.5,0,0,0-1.5-1.5H2.25a1.5,1.5,0,0,0-1.5,1.5v16.3a1.7,1.7,0,0,0,3.336.438l2.351-9.657A1.5,1.5,0,0,1,7.879,9.75H21.75A1.5,1.5,0,0,1,23.2,11.636l-2.2,9A1.5,1.5,0,0,1,19.55,21.75H2.447" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg>
                            </div>
                        </div> <!-- / .row -->
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-between">
                            <div class="col-auto">

                                <!-- Label -->
                                <p class="fs-6 text-muted text-uppercase mb-0">
                                    Today
                                </p>

                                <!-- Comment -->
                                <p class="fs-5 fw-bold mb-0 purchase-return-data-today">
                                    {{number_format((float)$purchase_return, 2, '.', '')}}
                                </p>
                            </div>
                            <div class="col text-end text-truncate">

                                <!-- Label -->
                                <p class="fs-6 text-muted text-uppercase mb-0">
                                    Last 7 Days
                                </p>

                                <!-- Comment -->
                                <p class="fs-5 fw-bold mb-0 purchase-return-data-last7days">
                                    {{number_format((float)$purchase_return, 2, '.', '')}}
                                </p>
                            </div>
                        </div> <!-- / .row -->
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xxl-3 d-flex">

                <!-- Card -->
                <div class="card border-0 text-bg-primary-soft flex-fill w-100">
                    <div class="card-body">

                        <!-- Title -->
                        <h4 class="text-uppercase fw-semibold mb-2">
                            Profits This </br>Month
                        </h4>

                        <!-- Subtitle -->
                        <h2 class="mb-0 profit-data">MWK {{number_format((float)$profit, 2, '.', '')}}
                        </h2>

                        <!-- Chart -->
                        <div class="chart-container h-70px">
                            <canvas id="currentBalanceChart"></canvas>
                        </div>
                    </div>
                    <div class="card-footer text-bg-primary-soft">
                        <div class="row justify-content-between">
                            <div class="col-auto">

                                <!-- Label -->
                                <p class="fs-6 text-whitw text-uppercase mb-0">
                                    Today
                                </p>

                                <!-- Comment -->
                                <p class="fs-5 fw-bold mb-0 profits-data-today">
                                    {{number_format((float)$profit, 2, '.', '')}}
                                </p>
                            </div>
                            <div class="col text-end text-truncate">

                                <!-- Label -->
                                <p class="fs-6 text-uppercase mb-0">
                                    Last 7 Days
                                </p>

                                <!-- Comment -->
                                <p class="fs-5 fw-bold mb-0 profits-data-last7days">
                                    {{number_format((float)$profit, 2, '.', '')}}
                                </p>
                            </div>
                        </div> <!-- / .row -->
                    </div>
                </div>
            </div>

        </div>
        @endif
    </div>
      <!-- Counts Section -->
      <section class="dashboard-counts">
        <div class="container-fluid">
          <div class="row">
            @if(in_array("revenue_profit_summary", $all_permission))
            <div class="col-md-12 form-group">
            </div>
            @endif
            @if(in_array("cash_flow", $all_permission))
            <div class="col-md-7 mt-4">
              <div class="card line-chart-example">
                <div class="card-header d-flex align-items-center">
                  <h4>{{trans('file.Cash Flow')}}</h4>
                </div>
                <div class="card-body">
                  <canvas id="cashFlow" data-color = "{{$color}}" data-color_rgba = "{{$color_rgba}}" data-recieved = "{{json_encode($payment_recieved)}}" data-sent = "{{json_encode($payment_sent)}}" data-month = "{{json_encode($month)}}" data-label1="{{trans('file.Payment Recieved')}}" data-label2="{{trans('file.Payment Sent')}}"></canvas>
                </div>
              </div>
            </div>
            @endif
            @if(in_array("monthly_summary", $all_permission))
            <div class="col-md-5 mt-4">
              <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h4>{{date('F')}} {{date('Y')}}</h4>
                </div>
                <div class="pie-chart mb-2">
                    <canvas id="transactionChart" data-color = "{{$color}}" data-color_rgba = "{{$color_rgba}}" data-revenue={{$revenue}} data-purchase={{$purchase}} data-expense={{$expense}} data-label1="{{trans('file.Purchase')}}" data-label2="{{trans('file.revenue')}}" data-label3="{{trans('file.Expense')}}" width="100" height="95"> </canvas>
                </div>
              </div>
            </div>
            @endif
          </div>
        </div>

        <div class="container-fluid">
          <div class="row">
            @if(in_array("yearly_report", $all_permission))
            <div class="col-md-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>{{trans('file.yearly report')}}</h4>
                </div>
                <div class="card-body">
                  <canvas id="saleChart" data-sale_chart_value = "{{json_encode($yearly_sale_amount)}}" data-purchase_chart_value = "{{json_encode($yearly_purchase_amount)}}" data-label1="{{trans('file.Purchased Amount')}}" data-label2="{{trans('file.Sold Amount')}}"></canvas>
                </div>
              </div>
            </div>
            @endif
            <div class="col-md-7">
              <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h4>{{trans('file.Recent Transaction')}}</h4>
                  <div class="right-column">
                    <div class="badge badge-primary">{{trans('file.latest')}} 5</div>
                  </div>
                </div>
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" href="#sale-latest" role="tab" data-toggle="tab">{{trans('file.Sale')}}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#purchase-latest" role="tab" data-toggle="tab">{{trans('file.Purchase')}}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#quotation-latest" role="tab" data-toggle="tab">{{trans('file.Quotation')}}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#payment-latest" role="tab" data-toggle="tab">{{trans('file.Payment')}}</a>
                  </li>
                </ul>

                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade show active" id="sale-latest">
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>{{trans('file.date')}}</th>
                              <th>{{trans('file.reference')}}</th>
                              <th>{{trans('file.customer')}}</th>
                              <th>{{trans('file.status')}}</th>
                              <th>{{trans('file.grand total')}}</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($recent_sale as $sale)
                            <tr>
                              <td>{{ date($general_setting->date_format, strtotime($sale->created_at->toDateString())) }}</td>
                              <td>{{$sale->reference_no}}</td>
                              <td>{{$sale->customer->name}}</td>
                              @if($sale->sale_status == 1)
                              <td><div class="badge badge-success">{{trans('file.Completed')}}</div></td>
                              @elseif($sale->sale_status == 2)
                              <td><div class="badge badge-danger">{{trans('file.Pending')}}</div></td>
                              @else
                              <td><div class="badge badge-warning">{{trans('file.Draft')}}</div></td>
                              @endif
                              <td>{{$sale->grand_total}}</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="purchase-latest">
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>{{trans('file.date')}}</th>
                              <th>{{trans('file.reference')}}</th>
                              <th>{{trans('file.Supplier')}}</th>
                              <th>{{trans('file.status')}}</th>
                              <th>{{trans('file.grand total')}}</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($recent_purchase as $purchase)
                            <tr>
                              <td>{{date($general_setting->date_format, strtotime($purchase->created_at->toDateString())) }}</td>
                              <td>{{$purchase->reference_no}}</td>
                              @if($purchase->supplier)
                                <td>{{$purchase->supplier->name}}</td>
                              @else
                                <td>N/A</td>
                              @endif
                              @if($purchase->status == 1)
                              <td><div class="badge badge-success">Recieved</div></td>
                              @elseif($purchase->status == 2)
                              <td><div class="badge badge-success">Partial</div></td>
                              @elseif($purchase->status == 3)
                              <td><div class="badge badge-danger">Pending</div></td>
                              @else
                              <td><div class="badge badge-danger">Ordered</div></td>
                              @endif
                              <td>{{$purchase->grand_total}}</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="quotation-latest">
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>{{trans('file.date')}}</th>
                              <th>{{trans('file.reference')}}</th>
                              <th>{{trans('file.customer')}}</th>
                              <th>{{trans('file.status')}}</th>
                              <th>{{trans('file.grand total')}}</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($recent_quotation as $quotation)
                            <tr>
                              <td>{{date($general_setting->date_format, strtotime($quotation->created_at->toDateString())) }}</td>
                              <td>{{$quotation->reference_no}}</td>
                              <td>{{$quotation->customer->name}}</td>
                              @if($quotation->quotation_status == 1)
                              <td><div class="badge badge-danger">Pending</div></td>
                              @else
                              <td><div class="badge badge-success">Sent</div></td>
                              @endif
                              <td>{{$quotation->grand_total}}</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="payment-latest">
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>{{trans('file.date')}}</th>
                              <th>{{trans('file.reference')}}</th>
                              <th>{{trans('file.Amount')}}</th>
                              <th>{{trans('file.Paid By')}}</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($recent_payment as $payment)
                            <tr>
                              <td>{{date($general_setting->date_format, strtotime($payment->created_at->toDateString())) }}</td>
                              <td>{{$payment->payment_reference}}</td>
                              <td>{{$payment->amount}}</td>
                              <td>{{$payment->paying_method}}</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-5">
              <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h4>{{trans('file.Best Seller').' '.date('F')}}</h4>
                  <div class="right-column">
                    <div class="badge badge-primary">{{trans('file.top')}} 5</div>
                  </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>{{trans('file.Product Details')}}</th>
                          <th>{{trans('file.qty')}}</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($best_selling_qty as $key=>$sale)
                        <?php $images = explode(",", $sale->product_images)?>
                        <tr>
                          <td><img src="{{url('public/images/product', $images[0])}}" height="25" width="30"> {{$sale->product_name}} [{{$sale->product_code}}]</td>
                          <td>{{$sale->sold_qty}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h4>{{trans('file.Best Seller').' '.date('Y'). '('.trans('file.qty').')'}}</h4>
                  <div class="right-column">
                    <div class="badge badge-primary">{{trans('file.top')}} 5</div>
                  </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>{{trans('file.Product Details')}}</th>
                          <th>{{trans('file.qty')}}</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($yearly_best_selling_qty as $key => $sale)
                        <?php $images = explode(",", $sale->product_images)?>
                        <tr>
                          <td><img src="{{url('public/images/product', $images[0])}}" height="25" width="30"> {{$sale->product_name}} [{{$sale->product_code}}]</td>
                          <td>{{$sale->sold_qty}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h4>{{trans('file.Best Seller').' '.date('Y') . '('.trans('file.price').')'}}</h4>
                  <div class="right-column">
                    <div class="badge badge-primary">{{trans('file.top')}} 5</div>
                  </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>{{trans('file.Product Details')}}</th>
                          <th>{{trans('file.grand total')}}</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($yearly_best_selling_price as $key => $sale)
                        <?php $images = explode(",", $sale->product_images)?>
                        <tr>
                          <td><img src="{{url('public/images/product', $images[0])}}" height="25" width="30"> {{$sale->product_name}} [{{$sale->product_code}}]</td>
                          <td>{{number_format((float)$sale->total_price, 2, '.', '')}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </section>


@endsection

@push('scripts')
<script type="text/javascript">

    // Show and hide color-switcher
    $(".color-switcher .switcher-button").on('click', function() {
        $(".color-switcher").toggleClass("show-color-switcher", "hide-color-switcher", 300);
    });

    // Color Skins
    $('a.color').on('click', function() {
        /*var title = $(this).attr('title');
        $('#style-colors').attr('href', 'css/skin-' + title + '.css');
        return false;*/
        $.get('setting/general_setting/change-theme/' + $(this).data('color'), function(data) {
        });
        var style_link= $('#custom-style').attr('href').replace(/([^-]*)$/, $(this).data('color') );
        $('#custom-style').attr('href', style_link);
    });

    $(".date-btn").on("click", function() {
        $(".date-btn").removeClass("active");
        $(this).addClass("active");
        var start_date = $(this).data('start_date');
        var end_date = $(this).data('end_date');
        $.get('dashboard-filter/' + start_date + '/' + end_date, function(data) {
            dashboardFilter(data);
        });
    });


    function dashboardFilter(data){
        $('.revenue-data').hide();
        $('.revenue-data').html(parseFloat(data[0]).toFixed(2));
        $('.revenue-data').show(500);

        $('.return-data').hide();
        $('.return-data').html(parseFloat(data[1]).toFixed(2));
        $('.return-data').show(500);

        $('.profit-data').hide();
        $('.profit-data').html(parseFloat(data[2]).toFixed(2));
        $('.profit-data').show(500);

        $('.purchase_return-data').hide();
        $('.purchase_return-data').html(parseFloat(data[3]).toFixed(2));
        $('.purchase_return-data').show(500);
    }
    $(document).ready(function() {
        var start_date_today = "{{ date('Y-m-d') }}";
        var start_date_7days = "{{date('Y-m-d', strtotime(' -7 day'))}}";
        var start_date_month = "{{date('Y').'-01'.'-01'}}";
        // var end_date_year = "{{date('Y').'-12'.'-31'}}";
        var end_date = "{{date('Y-m-d')}}";
        $.get('dashboard-filter/' + start_date_today + '/' + end_date, function(data) {
            today(data);
        });
        $.get('dashboard-filter/' + start_date_7days + '/' + end_date, function(data) {
            last7days(data);
        });

    });

    function today(data){
        $('.revenue-data-today').hide();
        $('.revenue-data-today').html(parseFloat(data[0]).toFixed(2));
        $('.revenue-data-today').show(500);

        $('.return-data-today').hide();
        $('.return-data-today').html(parseFloat(data[1]).toFixed(2));
        $('.return-data-today').show(500);

        $('.profits-data-today').hide();
        $('.profits-data-today').html(parseFloat(data[2]).toFixed(2));
        $('.profits-data-today').show(500);

        $('.purchase-return-data-today').hide();
        $('.purchase-return-data-today').html(parseFloat(data[3]).toFixed(2));
        $('.purchase-return-data-today').show(500);

    }
    function last7days(data){
        $('.revenue-data-last7days').hide();
        $('.revenue-data-last7days').html(parseFloat(data[0]).toFixed(2));
        $('.revenue-data-last7days').show(500);

        $('.return-data-last7days').hide();
        $('.return-data-last7days').html(parseFloat(data[1]).toFixed(2));
        $('.return-data-last7days').show(500);

        $('.profits-data-last7days').hide();
        $('.profits-data-last7days').html(parseFloat(data[2]).toFixed(2));
        $('.profits-data-last7days').show(500);

        $('.purchase-return-data-last7days').hide();
        $('.purchase-return-data-last7days').html(parseFloat(data[3]).toFixed(2));
        $('.purchase-return-data-last7days').show(500);


    }

    // function thismonth(data){
    //     $('.revenue-data-monthly').hide();
    //     $('.revenue-data-monthly').html(parseFloat(data[0]).toFixed(2));
    //     $('.revenue-data-monthly').show(500);

    //     $('.return-data-monthly').hide();
    //     $('.return-data-monthly').html(parseFloat(data[1]).toFixed(2));
    //     $('.return-data-monthly').show(500);

    //     $('.purchase-return-data-monthly').hide();
    //     $('.purchase-return-data-monthly').html(parseFloat(data[3]).toFixed(2));
    //     $('.purchase-return-data-monthly').show(500);
    // }


</script>
@endpush
