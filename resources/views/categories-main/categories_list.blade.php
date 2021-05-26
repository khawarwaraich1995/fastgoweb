@extends('layouts.app', ['title' => __('Categories')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Categories'),
        'class' => 'col-lg-7'
    ])
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-0 col-md-12 col-sm-12 order-xl-1">
                <div class="card bg-secondary shadow">
                  <div class="card">
              <!-- Card header -->
              <div class="card-header text-right">
              <!-- <button class="btn btn-sm btn-icon btn-success" data-toggle="modal" data-target="#exampleModalMessage" type="button">
                     <span class="btn-inner--icon"><i class="ni ni-cloud-upload-96"></i></span>
                     <span class="btn-inner--text">Import CSV</span>
                </button>
                <button class="btn btn-sm btn-icon btn-warning" data-toggle="modal" data-target="#excelModalMessage" type="button">
                     <span class="btn-inner--icon"><i class="ni ni-cloud-upload-96"></i></span>
                     <span class="btn-inner--text">Import Excel</span>
                </button> -->
                <a href="{{ url('/categories-main/create') }}">
                  <button class="btn btn-sm btn-icon btn-warning" type="button">
                     <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                     <span class="btn-inner--text">Add New Category</span>
                  </button>
                </a>
              </div>
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
                      <th>Sr.no</th>
                      <th>Name</th>
                      <th>Image</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  @php
                    $i = 0;
                  @endphp
                  @if(isset($categories) && !empty($categories))
                  @foreach ($categories as $key => $value)
                  @php
                    $i = $i + 1;
                    $edit_url = url('/categories-main/edit/'.$value->id);
                    $delete_url = url('/categories-main/destroy/'.$value->id);
                  @endphp
                    <tr>
                      <td><div class="btn badge badge-success badge-pill">#{{$i}}</div></td>
                      <td>{{$value->name}}</td>
                      <td>
                      @php
                      $path = BASE_URL.SMALL_IMAGE_PATH_CATEGORIES.$value->image;
                      $check_exist = File::exists(public_path().SMALL_IMAGE_PATH_CATEGORIES.$value->image);
                      if($check_exist == 1 && $value->image != '')
                      {
                        $image = $path;
                      }else{
                        $image = NO_IMAGE;
                      }
                      @endphp
                      <img class="rounded" src="{{$image}}" width="50px" height="50px">
                      </td>
                      <td>
                        <span class="badge badge-dot mr-4 current_status">
                        @if($value->status == 1)
                        <i class="bg-success"></i>
                        <span class="status badge badge-success badge-pill">Active</span>
                        @else
                        <i class="bg-danger"></i>
                        <span class="status badge badge-danger badge-pill">Inactive</span>
                        @endif
                      </span>
                    </td>
                    <td class="text-center">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" x-placement="bottom-end" style="position: absolute;will-change: transform;top: 0px;left: 0px;transform: translate3d(-160px, 32px, 0px);">

                            <a class="dropdown-item" href="{{$edit_url}}">Edit</a>


                            @if($value->status == 1)
                              <a class="dropdown-item status-change" href="javascript:void(0);"  rel="{{$value->status}}" data-cat-id="{{$value->id}}">Deactivate</a>
                            @else
                              <a class="dropdown-item status-change" href="javascript:void(0);"  rel="{{$value->status}}" data-cat-id="{{$value->id}}">Activate</a>
                            @endif



                            <a class="dropdown-item" href="{{$delete_url}}">Delete</a>

                        </div>
                      </div>
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
    <script defer type="text/javascript">
          $('.status-change').on('click', function(){
              var status = $(this).attr('rel');
              var cat_id = $(this).attr('data-cat-id');
              $.ajax({
              type:'POST',
              url:'{{ url("/categories-main/status") }}',
              data:{'status': status, 'cat_id': cat_id, '_token': "{{ csrf_token() }}"},
              success:function(response) {
                 var status = response.status;
                 var message = response.message;
                 var current_status = response.current_status;
                 if(status == true)
                 {
                  toastr.success(message);
                  location.reload();
                 }else
                 {
                  toastr.error(message);
                 }
              }
           });
          });
    </script>
@endsection
