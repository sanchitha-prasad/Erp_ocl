@extends('layouts.app')
@section('content')
    <style>
        .role p {
            padding: 5px;
            border-radius: 25px;
            text-align: center;
            color: white;

        }

    </style>
    <div id="container-wrapper">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" style="color:blue">{{ __('message.Dashboard') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="color:black;font-weight:bold">
                    {{ __('message.User') }}</li>
            </ol>

            <div>
                <button class="btn btn-success" data-toggle="modal" data-target="#departmentadd">{{ __('message.add') }}
                    {{ __('message.user') }}</button>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($datas as $data)
                                <tr>
                                    <td class="id">{{ $data->id }}</td>
                                    <td class="name">
                                        @if ($data->profile == 'null')
                                            <img src="{{ asset('img/avatar/avatar-illustrated-02.webp') }}" alt=""
                                                width="50" style="border-radius: 25px">
                                        @else
                                            <img src="{{ asset('upload') }}/{{ $data->profile }}" alt="" width="50"
                                                style="border-radius: 25px">
                                        @endif
                                    </td>
                                    <td class="name">{{ $data->name }}</td>
                                    <td class="name">{{ $data->email }}</td>
                                    <td class="role">
                                        @if ($data->role == 'manager')
                                            <p style="background-color: green">Manager</p>
                                        @elseif($data->role == 'salesperson')
                                            <p style="background-color: red">Sales Person</p>
                                        @elseif($data->role == 'accountant')
                                            <p style="background-color: rgb(37, 22, 247)">Acountant</p>
                                        @elseif($data->role == 'frontoffice')
                                            <p style="background-color: rgb(138, 22, 247)">Front Office</p>
                                        @else
                                            <p style="background-color: rgb(247, 131, 22)">Stock Keeper</p>
                                        @endif
                                    </td>

                                    <td>
                                        <form action="/user/remove" method="post" style="display: unset;">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$data->id}}">
                                            <button class="btn-danger btn" type="submit"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                        &nbsp;
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#usertedit" onclick="edituser({{$data}})"><i
                                                class="fas fa-pen"></i></button>
                                        
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- add department models ection -->
        <div class="modal fade " id="departmentadd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog col-md-10" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('message.add') }} {{ __('message.user') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/add/user" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="col-md-12 ">
                                        <label for="">{{ __('message.Employee') }}</label>

                                        <select name="" class="inline-search" id="serch" style="width: 100%;"
                                            onchange="search($('#serch').val())">

                                            @foreach ($employees as $emp)
                                                <option value="{{ $emp }}"> {{ $emp->emp_id }}
                                                    ({{ $emp->emp_name }})</option>

                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-9 m-auto">
                                        <br>
                                        <img src="{{ asset('img/avatar/avatar-illustrated-02.webp') }}" id="userimg" alt=""
                                            width="200" style="border-radius: 25px">
                                    </div>
                                </div>


                                <div class="col-md-8">
                                    <div class="row">


                                        <div class="col-md-6  my-2">
                                            <label for=""> {{ __('message.user') }} {{ __('message.name') }}</label>
                                            <input type="hidden" class="form-control emp_id" name="emp_id">
                                            <input type="text" class="form-control name" placholder="Enter Department Id "
                                                name="name" autocomplete="off" required readonly>
                                        </div>
                                        <div class="col-md-6  my-2">
                                            <label for="">{{ __('message.user') }} {{ __('message.email') }}</label>
                                            <input type="text" class="form-control email" placholder="Enter Department Id "
                                                name="email" autocomplete="off" required readonly>
                                        </div>

                                        <div class="col-md-6  my-2">
                                            <label for="">{{ __('message.user') }} {{ __('message.address') }}</label>
                                            <input type="text" class="form-control address"
                                                placholder="Enter Department Id " autocomplete="off" required readonly>
                                        </div>

                                        <div class="col-md-6  my-2">
                                            <label for="">{{ __('message.user') }} {{ __('message.nic') }}</label>
                                            <input type="text" class="form-control nic" placholder="Enter Department Id "
                                                autocomplete="off" required readonly>
                                        </div>

                                        <div class="col-md-6  my-2">
                                            <label for="">{{ __('message.user') }} {{ __('message.password') }}</label>
                                            <input type="text" class="form-control" placholder="Enter Department I"
                                                name="password" minlength="8" autocomplete="off" required>
                                        </div>

                                        <div class="col-md-6  my-2">
                                            <label for="">{{ __('message.user') }} {{ __('message.role') }}</label>
                                            <select name="role" id="" class="form-control" autocomplete="off" required>
                                                <option value="">--select role --</option>
                                                <option value="manager">Manager</option>
                                                <option value="salesperson">Sales Person</option>
                                                <option value="accountant">Accountant</option>
                                                <option value="frontoffice">Front Office</option>
                                                <option value="stockkeeper">Stock Keeper</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger"
                                    data-dismiss="modal">{{ __('message.close') }}</button>
                                <button type="submit" class="btn btn-success">{{ __('message.addnew') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


            <!-- Edit deprtment model -->
            <div class="modal fade" id="usertedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1"
                aria-hidden="true">
                <div class="modal-dialog col-md-10" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">Edit User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="/update/user" method="POST">
                          @csrf
                          <div class="modal-body">
                              <div class="row">
                                  <div class="col-md-4">
                                     
                                      <div class="col-md-9 m-auto">
                                          <br>
                                          <img src="{{ asset('img/avatar/avatar-illustrated-02.webp') }}" id="userimg1" alt=""
                                              width="200" style="border-radius: 25px">
                                      </div>
                                  </div>
  
  
                                  <div class="col-md-8">
                                      <div class="row">
  
  
                                          <div class="col-md-6  my-2">
                                              <label for=""> {{ __('message.user') }} {{ __('message.name') }}</label>
                                              <input type="hidden" class="form-control emp_id" name="id">
                                              <input type="text" class="form-control name" placholder="Enter Department Id "
                                                  name="name" autocomplete="off" required readonly>
                                          </div>
                                          <div class="col-md-6  my-2">
                                              <label for="">{{ __('message.user') }} {{ __('message.email') }}</label>
                                              <input type="text" class="form-control email" placholder="Enter Department Id "
                                                  name="email" autocomplete="off" required readonly>
                                          </div>
  
                                          <div class="col-md-6  my-2">
                                              <label for="">{{ __('message.user') }} {{ __('message.address') }}</label>
                                              <input type="text" class="form-control address"
                                                  placholder="Enter Department Id " autocomplete="off" required readonly>
                                          </div>
  
                                          <div class="col-md-6  my-2">
                                              <label for="">{{ __('message.user') }} {{ __('message.nic') }}</label>
                                              <input type="text" class="form-control nic" placholder="Enter Department Id "
                                                  autocomplete="off" required readonly>
                                          </div>
  
                                          <div class="col-md-6  my-2">
                                              <label for="">{{ __('message.add') }} {{ __('message.user') }} {{ __('message.password') }}</label>
                                              <input type="text" class="form-control" placholder="Enter Department I"
                                                  name="password" minlength="8" autocomplete="off" >
                                          </div>
  
                                          <div class="col-md-6  my-2">
                                              <label for="">{{ __('message.user') }} {{ __('message.role') }}</label>
                                              <select name="role" id="role" class="form-control" autocomplete="off" required>
                                                  <option value="">--select role --</option>
                                                  <option value="manager">Manager</option>
                                                  <option value="salesperson">Sales Person</option>
                                                  <option value="accountant">Accountant</option>
                                                  <option value="frontoffice">Front Office</option>
                                                  <option value="stockkeeper">Stock Keeper</option>
                                              </select>
                                          </div>
  
                                      </div>
                                  </div>
                              </div>
  
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-danger"
                                      data-dismiss="modal">{{ __('message.close') }}</button>
                                  <button type="submit" class="btn btn-primary">{{ __('message.update') }}</button>
                              </div>
                          </div>
                      </form>
                    </div>
                </div>
            </div>
            <!-- View deprtment model -->
       
            <script>
                function search(value) {
                    const data = JSON.parse(value)
                    $('.name').val(data.emp_name);
                    $('.emp_id').val(data.id);
                    $('.email').val(data.emp_email);
                    $('.address').val(data.emp_address);
                    $('.nic').val(data.emp_nic);
                    if (data.profile == 'null') {
                        document.getElementById('userimg').src = "{{ asset('img/avatar/avatar-illustrated-02.webp') }}"
                    } else {
                        document.getElementById('userimg').src = "{{ asset('upload') }}/" + data.profile
                    }

                }
                function edituser(data){
                  $('.name').val(data.emp_name);
                    $('.emp_id').val(data.id);
                    $('.email').val(data.emp_email);
                    $('.address').val(data.emp_address);
                    $('.nic').val(data.emp_nic);
                    $('#role').val(data.role);
                    if (data.profile == 'null') {
                        document.getElementById('userimg1').src = "{{ asset('img/avatar/avatar-illustrated-02.webp') }}"
                    } else {
                        document.getElementById('userimg1').src = "{{ asset('upload') }}/" + data.profile
                    }
                }
            </script>

        @endsection
