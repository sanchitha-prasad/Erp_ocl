@extends('layouts.app')
@section('content')
    <style>
        .toggle.btn-lg {
            width: 100% !important
        }

    </style>
    <div class="container-fluid" id="container-wrapper">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" style="color:blue">{{ __('message.Dashboard') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="color:black;font-weight:bold">
                    {{ __('message.vender') }}</li>
            </ol>

            <div>
                <button class="btn btn-success" onclick="addender()" data-toggle="modal"
                    data-target="#venderadd">{{ __('message.add') }}
                    {{ __('message.vender') }}</button>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>Id</th>
                                <th>Customer Id</th>
                                <th>Name</th>
                                <th>Inavtive</th>
                                <th>Account Number</th>
                                <th>Mailing Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Customer Id</th>
                                <th>Name</th>
                                <th>Inavtive</th>
                                <th>Account Number</th>
                                <th>Mailing Address</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($datas as $cus)

                                <tr>
                                    <td class="id">{{ $cus->id }}</td>
                                    <td class="id">{{ $cus->v_id }}</td>
                                    <td class="name"> {{ $cus->v_name }}</td>
                                    <td class="name">
                                        @if ($cus->active == 'on')
                                            <p
                                                style="border-radius: 20px;border: 2px solid rgb(22, 141, 6);padding: 5px;text-align: center">
                                                active</p>
                                        @else
                                            <p
                                                style="border-radius: 20px;border: 2px solid red;padding: 5px;text-align: center">
                                                inactive</p>
                                        @endif
                                    </td>
                                    <td class="name">{{ $cus->ac_number }}</td>
                                    <td class="name">{{ $cus->m_address }}</td>
                                    <td>
                                        <div class="nav-user-wrapper">
                                            <button class="btn nav-user-btn dropdown-btn btn-outline-dark">
                                                <i class="fas fa-ellipsis-h" style="color: black"></i>
                                            </button>
                                            <ul class="users-item-dropdown nav-user-dropdown  dropdown1"
                                                style="top: auto;width: auto">
                                                <li style="margin: 10px 0"><a href="/vender/remove/{{ $cus->id }}">
                                                        <i class="fas fa-trash" style="margin: 0 10px;
                                                                    border: 2px solid #ff0000;
                                                                    border-radius: 14px;
                                                                    padding: 5px;
                                                                    color: rgb(255, 0, 0)"></i>
                                                        <span>{{ __('message.delete') }}</span>
                                                    </a></li>

                                                <li style="margin: 10px 0"><span data-toggle="modal"
                                                        data-target="#customeredit"
                                                        onclick="editvender({{ $cus }})">
                                                        <i class="fas fa-pen" style="margin: 0 10px;
                                                                    border: 2px solid #0058ff;
                                                                    border-radius: 14px;
                                                                    padding: 5px;
                                                                    color: blue"></i>
                                                        <span>{{ __('message.edit') }}</span>
                                                    </span></li>
                                                <li style="margin: 10px 0"><span data-toggle="modal" data-target="#address">
                                                        <i class="fas fa-map" style="margin: 0 10px;
                                                                            border: 2px solid #0058ff;
                                                                            border-radius: 14px;
                                                                            padding: 5px;"></i>
                                                        <span>{{ __('message.address') }}</span>
                                                    </span></li>
                                                <li style="margin: 10px 0"><span data-toggle="modal" data-target="#history">
                                                        <i class="fas fa-history" style="margin: 0 10px;
                                                                            border: 2px solid #0058ff;
                                                                            border-radius: 14px;
                                                                            padding: 5px;"></i>
                                                        <span>{{ __('message.history') }}</span>
                                                    </span></li>
                                                <li style="margin: 10px 0"><span data-toggle="modal"
                                                        data-target="#purchase">
                                                        <i class="fas fa-info" style="margin: 0 10px;
                                                                    border: 2px solid #0058ff;
                                                                    border-radius: 14px;
                                                                    padding: 5px;"></i>
                                                        <span>{{ __('message.purchase') }} {{ __('message.info') }} </span>
                                                    </span></li>
                                                    
                                                <li style="margin: 10px 0"><span data-toggle="modal" data-target="#file"
                                                        onclick="file({{ $cus }})">
                                                        <i class="fas fa-file" style="margin: 0 10px;
                                                                    border: 2px solid #16ca06;
                                                                    border-radius: 14px;
                                                                    padding: 5px;
                                                                    color: #16ca06"></i>
                                                        <span>{{ __('message.file') }} </span>
                                                    </span></li>
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

        <!-- add department models ection -->
        <div class="modal fade" id="venderadd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog col-md-11" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('message.add') }}
                            {{ __('message.vender') }}</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="/add/vender" method="post" id="addform">
                            @csrf
                            <div id="general">
                                <div class="row">
                                    {{-- cus_{{ $last_id + 1 }} --}}
                                    <div class="col-md-4">
                                        <label for="">{{ __('message.vender') }} {{ __('message.id') }}</label>
                                        <input type="text" class="form-control" name="v_id"
                                            value="vender_{{ $lastid + 1 }}" placholder="Enter Department Id " readonly
                                            required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for=""> {{ __('message.name') }}</label>
                                        <input type="text" class="form-control" name="name"
                                            placholder="Enter Department Id " autocomplete="off" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">{{ __('message.inactive') }}</label>

                                        <input type="checkbox" id="active" checked data-toggle="toggle" data-on="Active"
                                            data-off="Inactive" data-onstyle="success" data-offstyle="danger" data-size="lg"
                                            name="active">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">{{ __('message.contact') }}</label>
                                        <input type="text" class="form-control" name="contact"
                                            placholder="Enter Department Id " autocomplete="off" required>
                                    </div>


                                    <div class="col-md-4">
                                        <label for=""> {{ __('message.A/CNumber') }}</label>
                                        <input type="text" name="ac_number" class="form-control"
                                            placholder="Enter Department Id " autocomplete="off" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for=""> {{ __('message.mailing') }} {{ __('message.address') }}</label>
                                        <input type="text" name="maddress" class="form-control"
                                            placholder="Enter Department Id " autocomplete="off" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">{{ __('message.city') }}</label>
                                        <input type="text" name="city" class="form-control"
                                            placholder="Enter Department Id " autocomplete="off" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for=""> ST</label>
                                        <input type="text" name="st" class="form-control"
                                            placholder="Enter Department Id " autocomplete="off" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Zip code</label>
                                        <input type="text" name="zip" class="form-control"
                                            placholder="Enter Department Id" autocomplete="off" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">{{ __('message.country') }}</label>
                                        <input type="text" name="country" class="form-control"
                                            placholder="Enter Department Id " autocomplete="off" autocomplete="off"
                                            required>
                                    </div>


                                    <div class="col-md-4">
                                        <label for="">{{ __('message.vender') }} {{ __('message.type') }}</label>
                                        <select name="vtype" id="" class="form-control" required>
                                            <option value="">--select--</option>
                                            <option value="cus1">vender 1</option>
                                            <option value="cus2">vender 2</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">1099 {{ __('message.type') }}</label>
                                        <input type="text" name="onet" class="form-control"
                                            placholder="Enter Department Id " autocomplete="off" autocomplete="off"
                                            required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">{{ __('message.expenses') }} {{ __('message.account') }}</label>
                                        <input type="text" name="Eaccount" class="form-control"
                                            placholder="Enter Department Id " autocomplete="off" autocomplete="off"
                                            required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">{{ __('message.telephone') }} -1</label>
                                        <input type="text" autocomplete="off" name="t1" class="form-control"
                                            placholder="Enter Department Id " required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">{{ __('message.telephone') }} -2</label>
                                        <input type="text" autocomplete="off" name="t2" class="form-control"
                                            placholder="Enter Department Id ">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">{{ __('message.fax') }}</label>
                                        <input type="text" autocomplete="off" name="fax" class="form-control"
                                            placholder="Enter Department Id ">
                                    </div>



                                    <div class="col-md-4">
                                        <label for="">{{ __('message.email') }}</label>
                                        <input type="text" autocomplete="off" name="email" class="form-control"
                                            placholder="Enter Department Id ">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">{{ __('message.website') }}</label>
                                        <input type="text" autocomplete="off" name="web" class="form-control"
                                            placholder="Enter Department Id ">
                                    </div>
                                </div>
                                <br>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('message.close') }}</button>
                                    <button type="submit" class="btn btn-primary">{{ __('message.addnew') }}</button>
                                </div>
                            </div>




                        </form>

                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="address" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog col-md-10" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Address</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="/update/customer" method="post" id="my-form">
                            @csrf
                            <div class="row " style="margin: 0 5px">

                                <div class="col-md-6">

                                    <label for="">Mailing Address</label>
                                    <input type="text" class="form-control" name="v_id" value=""
                                        placholder="Enter Department Id " readonly required>

                                </div>
                                <br>
                                <div class=" col-md-6 ">
                                    <label for=""> Copy Mailing Address</label>
                                    <input type="text" class="form-control" name="cus_name"
                                        placholder="Enter Department Id " autocomplete="off" required>
                                    <br>

                                    <div class="d-flex justify-content-end col-md-12">
                                        <button class="btn btn-success">Copy</button>
                                    </div>
                                </div>

                            </div>
                            {{-- <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div> --}}

                            <div class="m-auto col-md-12">
                                <p style="font-weight: bold">Select Default addresses for the following transtraction</p>
                                <br>
                                <div class="row col-md-12">

                                    <div class="col-md-2"><label for="">Payments</label></div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="v_id" value=""
                                            placholder="Enter Department Id " required>
                                    </div>
                                </div>
                                <br>
                                <div class="row col-md-12">

                                    <div class="col-md-2"><label for="">Purchase Order</label></div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="v_id" value=""
                                            placholder="Enter Department Id " required>
                                    </div>
                                </div>
                                <br>
                                <div class="row col-md-12">

                                    <div class="col-md-2"><label for="">Shipment</label></div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="v_id" value=""
                                            placholder="Enter Department Id " required>
                                    </div>
                                </div>
                                <br>
                            </div>

                            <div class="col-lg-12">
                                <div class="card mb-4">
                                    <div class="table-responsive p-3">
                                        <table class="table align-items-center table-flush" id="dataTable">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Remit to</th>
                                                    <th>Recipt</th>
                                                    <th>Address Line 1</th>
                                                    <th>Address Line 2</th>
                                                    <th>City</th>
                                                    <th>ST</th>
                                                    <th>Zip Code</th>
                                                    <th>Country</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Remit to</th>
                                                    <th>Recipt</th>
                                                    <th>Address Line 1</th>
                                                    <th>Address Line 2</th>
                                                    <th>City</th>
                                                    <th>ST</th>
                                                    <th>Zip Code</th>
                                                    <th>Country</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @foreach ($datas as $cus)

                                                    <tr>
                                                        <td class="id">{{ $cus->id }}</td>
                                                        <td class="id">{{ $cus->v_id }}</td>
                                                        <td class="name"> {{ $cus->v_name }}</td>
                                                        <td class="name">
                                                            @if ($cus->active == 'on')
                                                                <p
                                                                    style="border-radius: 20px;border: 2px solid rgb(22, 141, 6);padding: 5px;text-align: center">
                                                                    active</p>
                                                            @else
                                                                <p
                                                                    style="border-radius: 20px;border: 2px solid red;padding: 5px;text-align: center">
                                                                    inactive</p>
                                                            @endif
                                                        </td>
                                                        <td class="name">{{ $cus->ac_number }}</td>
                                                        <td class="name">{{ $cus->m_address }}</td>



                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


                    </div>

                </div>

                </form>

            </div>
        </div>
    </div>
    </div>
    <!-- Edit deprtment model -->
    <div class="modal fade" id="customeredit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog col-md-11" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('message.edit') }} {{ __('message.vender') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="/update/vender" method="post">
                        @csrf
                        <div id="general">
                            <div class="row">
                                {{-- cus_{{ $last_id + 1 }} --}}
                                <div class="col-md-4">
                                    <label for="">{{ __('message.vender') }} {{ __('message.id') }}</label>
                                    <input type="text" class="form-control" name="v_id" placholder="Enter Department Id "
                                        readonly required>
                                </div>

                                <div class="col-md-4">
                                    <label for=""> {{ __('message.name') }}</label>
                                    <input type="text" class="form-control" name="name" placholder="Enter Department Id "
                                        autocomplete="off" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="">{{ __('message.inactive') }}</label>

                                    <input type="checkbox" id="active1" checked data-toggle="toggle" data-on="Active"
                                        data-off="Inactive" data-onstyle="success" data-offstyle="danger" data-size="lg"
                                        name="active">
                                </div>
                                <div class="col-md-4">
                                    <label for="">{{ __('message.contact') }}</label>
                                    <input type="text" class="form-control" name="contact"
                                        placholder="Enter Department Id " autocomplete="off" required>
                                </div>


                                <div class="col-md-4">
                                    <label for=""> {{ __('message.A/CNumber') }}</label>
                                    <input type="text" name="ac_number" class="form-control"
                                        placholder="Enter Department Id " autocomplete="off" required>
                                </div>

                                <div class="col-md-4">
                                    <label for=""> {{ __('message.mailing') }} {{ __('message.address') }}</label>
                                    <input type="text" name="maddress" class="form-control"
                                        placholder="Enter Department Id " autocomplete="off" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="">{{ __('message.city') }}</label>
                                    <input type="text" name="city" class="form-control" placholder="Enter Department Id "
                                        autocomplete="off" required>
                                </div>

                                <div class="col-md-4">
                                    <label for=""> ST</label>
                                    <input type="text" name="st" class="form-control" placholder="Enter Department Id "
                                        autocomplete="off" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Zip code</label>
                                    <input type="text" name="zip" class="form-control" placholder="Enter Department Id"
                                        autocomplete="off" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="">{{ __('message.country') }}</label>
                                    <input type="text" name="country" class="form-control"
                                        placholder="Enter Department Id " autocomplete="off" autocomplete="off" required>
                                </div>


                                <div class="col-md-4">
                                    <label for="">{{ __('message.vender') }} {{ __('message.type') }}</label>
                                    <select name="vtype" id="" class="form-control" required>

                                        <option value="cus1">vender 1</option>
                                        <option value="cus2">vender 2</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="">1099 {{ __('message.type') }}</label>
                                    <input type="text" name="onet" class="form-control" placholder="Enter Department Id "
                                        autocomplete="off" autocomplete="off" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="">{{ __('message.expenses') }} {{ __('message.account') }}</label>
                                    <input type="text" name="Eaccount" class="form-control"
                                        placholder="Enter Department Id " autocomplete="off" autocomplete="off" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="">{{ __('message.telephone') }} -1</label>
                                    <input type="text" autocomplete="off" name="t1" class="form-control"
                                        placholder="Enter Department Id " required>
                                </div>

                                <div class="col-md-4">
                                    <label for="">{{ __('message.telephone') }} -2</label>
                                    <input type="text" autocomplete="off" name="t2" class="form-control"
                                        placholder="Enter Department Id ">
                                </div>
                                <div class="col-md-4">
                                    <label for="">{{ __('message.fax') }}</label>
                                    <input type="text" autocomplete="off" name="fax" class="form-control"
                                        placholder="Enter Department Id ">
                                </div>



                                <div class="col-md-4">
                                    <label for="">{{ __('message.email') }}</label>
                                    <input type="text" autocomplete="off" name="email" class="form-control"
                                        placholder="Enter Department Id ">
                                </div>

                                <div class="col-md-4">
                                    <label for="">{{ __('message.website') }}</label>
                                    <input type="text" autocomplete="off" name="web" class="form-control"
                                        placholder="Enter Department Id ">
                                </div>
                            </div>
                            <input type="hidden" name="id">
                            <br>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('message.close') }}</button>
                                <button type="submit" class="btn btn-primary">{{ __('message.update') }}</button>
                            </div>
                        </div>




                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog col-md-8" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        {{ __('message.file') }}</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/upload/file/vender"  method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            @csrf
                            <label for="">{{ __('message.file') }} {{ __('message.upload') }}</label>
                            <input type="file" class="form-control" id="file-input" name="image[]" data-max-size="32154" multiple required/>
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                            <div id="thumb-output" class="row m-auto"></div>
                        </div>
                        <input type="hidden" name="vender_id" id="vender_id">
                        <button type="submit" class="btn btn-success">{{ __('message.upload') }} </button>
                    </form>

                    <p id="error">Delete Fail</p>
                    <div id="upload-image" class="row m-auto" >

                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- View deprtment model -->
    {{-- <div class="modal fade" id="departmentview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">View Customer</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Customer Id</label>
                                    <input type="text" class="form-control" placholder="Enter Department Id ">
                                </div>

                                <div class="col-md-6">
                                    <label for="">Customer Name</label>
                                    <input type="text" class="form-control" placholder="Enter Department Id ">
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </div>
            </div> --}}

    {{-- /history/ --}}
    <div class="modal fade" id="history" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog col-md-12" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">History</h5>
                    <div class="col-md-10" style="text-align: center">
                        <h5 class="modal-title" id="exampleModalLabel">Vender Id</h5>

                        <h5 class="modal-title" id="exampleModalLabel">Vender Name</h5>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-12">
                                <label for="">Vender Since</label>
                                <input type="date" class="form-control" placholder="Enter Department Id ">
                            </div>

                            <div class="col-md-12">
                                <label for="">Last invoice date</label>
                                <input type="date" class="form-control" placholder="Enter Department Id ">
                            </div>

                            <div class="col-md-12">
                                <label for="">Last invoice amount</label>
                                <input type="text" class="form-control" placholder="Enter Department Id ">
                            </div>

                            <div class="col-md-12">
                                <label for="">Last payment date</label>
                                <input type="date" class="form-control" placholder="Enter Department Id ">
                            </div>


                            <div class="col-md-12">
                                <label for="">Last Payment Amount</label>
                                <input type="date" class="form-control" placholder="Enter Department Id ">
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="col-lg-12">
                                <div class="card mb-4">
                                    <div class="table-responsive p-3">
                                        <table class="table align-items-center table-flush" id="dataTable">
                                            <thead class="thead-light">
                                                <tr>

                                                    <th>Period</th>
                                                    <th>Sales</th>
                                                    <th>Recipt</th>

                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>

                                                    <th>Period</th>
                                                    <th>Sales</th>
                                                    <th>Recipt</th>

                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @foreach ($datas as $cus)

                                                    <tr>
                                                        <td class="id">{{ $cus->id }}</td>
                                                        <td class="id">{{ $cus->cus_id }}</td>
                                                        <td class="name"> {{ $cus->cus_name }}</td>



                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Add</button>
                </div>
            </div>
        </div>
    </div>

    {{-- purchase info --}}

    <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog col-md-12" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sales Info</h5>
                    <div class="col-md-10" style="text-align: center">
                        <h5 class="modal-title" id="exampleModalLabel">Customer Id</h5>

                        <h5 class="modal-title" id="exampleModalLabel">Customer Name</h5>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="row">
                            <div class="col-md-6" style="border: 3px solid #0034ff;
                                    padding: 10px;">
                                <h5 class="text-center">Sales Default</h5>
                                <div class="col-md-12">
                                    <label for="">Sales rep</label>
                                    <input type="text" class="form-control" placholder="Enter Department Id ">
                                </div>

                                <div class="col-md-12">
                                    <label for="">GL sales amount</label>
                                    <input type="text" class="form-control" placholder="Enter Department Id ">
                                </div>

                                <div class="col-md-12">
                                    <label for="">Open PO number</label>
                                    <input type="text" class="form-control" placholder="Enter Department Id ">
                                </div>

                                <div class="col-md-12">
                                    <label for="">Ship via</label>
                                    <input type="text" class="form-control" placholder="Enter Department Id ">
                                </div>

                                <div class="col-md-12">
                                    <label for="">Release number</label>
                                    <input type="text" class="form-control" placholder="Enter Department Id ">
                                </div>

                                <div class="col-md-12">
                                    <label for="">Pricing level</label>
                                    <input type="text" class="form-control" placholder="Enter Department Id ">
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <label for="">Batch delivery method</label>
                                    <div class="row m-0">
                                        <input type="radio" id="paper" name="method">Paper form
                                        &nbsp;
                                        <input type="radio" id="email" name="method">Email
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="">Email sales rep when using batch processing to send</label>
                                    <input type="checkbox" name="processing" checked data-toggle="toggle" data-on="SEND"
                                        data-off="NOT SEND" data-onstyle="success" data-offstyle="danger" data-size="lg"
                                        value="0">
                                </div>

                                <div class="col-md-12">
                                    <label for="">Replace with item id</label>
                                    <input type="checkbox" name="processing" checked data-toggle="toggle" data-on="REPLACE"
                                        data-off="NOT" data-onstyle="success" data-offstyle="danger" data-size="lg"
                                        value="0">
                                </div>


                            </div>


                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Add</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function addender() {
            document.getElementById("addform").reset();
            // $('#addform').reset();
        }

        function editvender(data) {

            console.log(data);
            $("input[name='v_id']").val(data.v_id);
            $("input[name='name']").val(data.v_name);


            if (data.active == 'on') {
                $('#active1').bootstrapToggle('on', true);
                $('input[name="active"]').prop('checked', true);

            } else {
                $('#active1').bootstrapToggle('off', true);
                $('input[name="active"]').prop('checked', false);
            }
            $("input[name='id']").val(data.id);

            $("input[name='ac_number']").val(data.ac_number);
            $("input[name='maddress']").val(data.m_address);
            $("input[name='city']").val(data.city);
            $("input[name='contact']").val(data.contact);
            $("input[name='st']").val(data.st);
            $("input[name='zip']").val(data.zip);
            $("input[name='country']").val(data.country);
            $("#v_type").val(data.vtype);
            $("input[name='web']").val(data.website);
            $("input[name='t1']").val(data.t1);
            $("input[name='t2']").val(data.t2);
            $("input[name='email']").val(data.email);
            $("input[name='Eaccount']").val(data.e_account);
            $("input[name='onet']").val(data.onet);
            $("input[name='fax']").val(data.fax);
            $("#note").val(data.note);

        }

        function file(data) {
            console.log(data);
           
          
            $.ajax({
                
               headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
            url: "/vender/file",
            type: "post",
            data: {'id':data.id},
            success: function (response) {
                console.log(response);
                $("#upload-image").html("");
                $('#error').html('');
                $('#error').removeClass('removefail');
                $('#error').removeClass('removedone');
                if(response.data == 'no data'){
                    $("#upload-image").html("<p style='color:red;padding:6px;text-align:center;margin:auto'>No data found</p>");
                }
                else{
                    for(var v=0;v < response.data.length;v++){
                  
                  var d =response.data[v].file.split('.');
                  var im='';
                  if(d[1] == 'pdf'){
                      im= '{{asset('img/pdf.png')}}';
                      var img= $("<span class='pip' id="+response.data[v].id+"><img class='imageThumb1' src="+ im+ "><br/><span class='remove'><span id='deletefile'  onclick='removefile( \""+ response.data[v].id +","+ response.data[v].file+"\")'><i class='fas fa-trash'></i></span>  <span><a target='_blank' href='{{asset('upload/vender')}}/"+ response.data[v].file + "'><i class='fas fa-eye'></i></a></span> <span><a  href='{{asset('upload/vender')}}/"+ response.data[v].file + "' download><i class='fas fa-download'></i></a></span> </span></span>");
                 
                  }
                  else{
                      var img= $("<span class='pip' id="+response.data[v].id+"><img class='imageThumb1' src='{{asset('upload/vender')}}/"+ response.data[v].file + "'/><br/><span class='remove'><span id='deletefile'  onclick='removefile( \""+ response.data[v].id +","+ response.data[v].file+"\")'><i class='fas fa-trash'></i></span> <span><a target='_blank' href='{{asset('upload/vender')}}/"+ response.data[v].file + "'><i class='fas fa-eye'></i></a></span>  <span><a  href='{{asset('upload/vender')}}/"+ response.data[v].file + "' download><i class='fas fa-download'></i></a></span> </span></span>");
                 
                  }
                   $('#upload-image').append(img);
              }
                }
                
       
            }
            })
           $('#vender_id').val(data.id);
        }
function removefile(data){
    // console.log(id);
    var value = data.split(',');
    console.log(value[0]);
    $.ajax({
                
                headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                         },
             url: "/vender/file/remove",
             type: "post",
             data: {'id':value[0],'image':value[1]},
             
             success: function (response) {
                 console.log(response);
                //  $("#upload-image").html("");
                 if(response.data == '0'){
                    $('#error').addClass('removefail');
                    $('#error').text('File Remove Fail!');
                 }
                 else{
                     $('#error').addClass('removedone');
                     $('#error').text(response.data);
                     document.getElementById(value[0]).remove();
                 }
                 
        
             }
             })
}

    </script>
@endsection
