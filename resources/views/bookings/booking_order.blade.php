@extends('layouts.app', ['title' => __('Booking Orders')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Booking Orders'),
        'class' => 'col-lg-7'
    ])
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-0 col-md-12 col-sm-12 order-xl-1">
                <div class="card bg-secondary shadow">
                  <div class="card">
              @if($message = Session::get('error'))
              <div class="col-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
                  <span class="alert-text"><strong>Oopss!</strong> {{$message}}</span>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
              </div>
              @endif
              <div class="container table-responsive py-4">
                <table class="table table-flush" id="datatable-buttons">
                  <thead class="thead-light">
                    <tr>
                      <th>Order #</th>
                      <th>Customer Name</th>
                      <th>Total Amount</th>
                      <th>Order Status</th>
                      <th>Payment Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  @if(isset($bookings) && !empty($bookings))
                  @foreach ($bookings as $key => $value)
                  @php
                    $detail_url = url('/order/detail/'.$value->id);
                  @endphp
                    <tr>
                      <td><div class="btn badge badge-success badge-pill">#{{$value->id}}</div></td>
                      <td>{{$value->full_name}}</td>
                      <td>${{$value->order_total}}</td>
                      <td>
                        <span class="badge badge-dot mr-4 current_status">
                        @if($value->order_status == 'received')
                        <i class="bg-warning"></i>
                        <span class="status badge badge-warning badge-pill">Received</span>
                        @elseif($value->order_status == 'accepted')
                        <i class="bg-info"></i>
                        <span class="status badge badge-info badge-pill">Accepted</span>
                        @elseif($value->order_status == 'assigned')
                        <i class="bg-warning"></i>
                        <span class="status badge badge-warning badge-pill">Assigned</span>
                        @elseif($value->order_status == 'delivered')
                        <i class="bg-success"></i>
                        <span class="status badge badge-success badge-pill">Delivered</span>
                        @elseif($value->order_status == 'rejected')
                        <i class="bg-danger"></i>
                        <span class="status badge badge-danger badge-pill">Rejected</span>
                        @endif
                      </span>
                    </td>
                      <td>
                        <span class="badge badge-dot mr-4 current_status">
                        @if($value->payment_status == 1)
                        <i class="bg-success"></i>
                        <span class="status badge badge-success badge-pill">Paid</span>
                        @else
                        <i class="bg-danger"></i>
                        <span class="status badge badge-danger badge-pill">Unpaid</span>
                        @endif
                      </span>
                    </td>
                    <td class="text-center">
                        <a href="{{ $detail_url }}">
                            <button class="btn btn-sm btn-icon btn-success" type="button">
                               <span class="btn-inner--text">See Details</span>
                            </button>
                          </a>
                    </td>
                    </tr>
                @endforeach
                @endif
                  </tbody>
                </table>
              </div>
            </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
