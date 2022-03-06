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
                    {{ __('message.Customer') }}</li>
            </ol>

            <div>
                <button class="btn btn-success" onclick="add()" data-toggle="modal" data-target="#departmentadd">{{ __('message.add') }}
                    {{ __('message.Customer') }}</button>
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
                                <th>Prospect</th>
                                <th>Inavtive</th>
                                <th>Acount Number</th>
                                <th>Biling Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Customer Id</th>
                                <th>Name</th>
                                <th>Prospect</th>
                                <th>Inavtive</th>
                                <th>Acount Number</th>
                                <th>Biling Address</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($datas as $cus)

                                <tr>
                                    <td class="id">{{ $cus->id }}</td>
                                    <td class="id">{{ $cus->cus_id }}</td>
                                    <td class="name"> {{ $cus->cus_name }}</td>
                                    <td class="name">
                                        @if ($cus->prospect == 'on')
                                            <p
                                                style="border-radius: 20px;border: 2px solid rgb(0, 128, 32);padding: 5px;text-align: center">
                                                on</p>
                                        @else
                                            <p
                                                style="border-radius: 20px;border: 2px solid red;padding: 5px;text-align: center">
                                                off</p>
                                        @endif
                                    </td>
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
                                    <td class="name">{{ $cus->b_address }}</td>
                                    <td>
                                        <div class="nav-user-wrapper">
                                            <button class="btn nav-user-btn dropdown-btn btn-outline-dark">
                                                <i class="fas fa-ellipsis-h" style="color: black"></i>
                                            </button>
                                            <ul class="users-item-dropdown nav-user-dropdown  dropdown1"
                                                style="top: auto;width: auto">
                                                <li style="margin: 10px 0"><a href="/customer/remove/{{ $cus->id }}">
                                                        <i class="fas fa-trash" style="margin: 0 10px;
                                                    border: 2px solid #ff0000;
                                                    border-radius: 14px;
                                                    padding: 5px;
                                                    color: rgb(255, 0, 0)"></i>
                                                        <span>{{ __('message.delete') }}</span>
                                                    </a></li>

                                                <li style="margin: 10px 0"><span data-toggle="modal"
                                                        data-target="#customeredit"
                                                        onclick="editcustomer({{ $cus }})">
                                                        <i class="fas fa-pen" style="margin: 0 10px;
                                                    border: 2px solid #0058ff;
                                                    border-radius: 14px;
                                                    padding: 5px;
                                                    color: blue"></i>
                                                        <span>{{ __('message.edit') }}</span>
                                                    </span></li>
                                                {{-- <li style="margin: 10px 0"> <span data-toggle="modal">
                                                        <i class="fas fa-eye" style="margin: 0 10px;
                                                border: 2px solid #394cf3;
                                                border-radius: 14px;
                                                padding: 5px;
                                                color: rgb(47, 144, 204)"></i>
                                                        <span>View</span>
                                                    </span></li> --}}
                                                <li style="margin: 10px 0"><span data-toggle="modal" data-target="#history">
                                                        <i class="fas fa-history" style="margin: 0 10px;
                                                            border: 2px solid #0058ff;
                                                            border-radius: 14px;
                                                            padding: 5px;"></i>
                                                        <span>{{ __('message.history') }}</span>
                                                    </span></li>
                                                <li style="margin: 10px 0"><span data-toggle="modal"
                                                        data-target="#salesinfo">
                                                        <i class="fas fa-info" style="margin: 0 10px;
                                                    border: 2px solid #0058ff;
                                                    border-radius: 14px;
                                                    padding: 5px;"></i>
                                                        <span>{{ __('message.sells') }} {{ __('message.info') }}</span>
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
                                    {{-- <td>
                                    <form action="/admin/admin-remove" method="post" style="display: unset;">
                                        @csrf

                                        <button class="btn-danger btn" type="submit"><i class="fas fa-trash"></i></button>
                                    </form>
                                    &nbsp;
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#departmentedit"><i
                                            class="fas fa-pen"></i></button>
                                    &nbsp;
                                    <button class="btn btn-info" data-toggle="modal" data-target="#departmentview"><i
                                            class="fas fa-eye"></i></button>
                                </td> --}}

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- add department models ection -->
        <div class="modal fade" id="departmentadd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog col-md-11" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('message.add') }}
                            {{ __('message.Customer') }}</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div style="margin-bottom: 10px">
                            <button class="btn btn-info general" onclick="genearal()">{{ __('message.general') }}</button>
                            <button class="btn btn-info contact" onclick="contact()">{{ __('message.contact') }}</button>

                        </div>
                        <form action="/add/customer" method="post" id="customer">
                            @csrf
                            <div id="general">
                                <div class="row">

                                    <div class="col-md-4">
                                        <label for="">{{ __('message.Customer') }} {{ __('message.id') }}</label>
                                        <input type="text" class="form-control" name="cus_id"
                                            value="cus_{{ $last_id + 1 }}" placholder="Enter Department Id " readonly
                                            required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">{{ __('message.Customer') }} {{ __('message.name') }}</label>
                                        <input type="text" class="form-control" name="cus_name"
                                            placholder="Enter Department Id " autocomplete="off" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">{{ __('message.prospect') }}</label>
                                        <input type="checkbox" name="prospect" checked data-toggle="toggle" data-on="Ready"
                                            data-off="Not Ready" data-onstyle="success" autocomplete="off"
                                            data-offstyle="danger" data-size="lg" value="0">
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-4">
                                        <label for="">{{ __('message.inactive') }}</label>
                                        <input type="checkbox" checked data-toggle="toggle" data-on="Ready"
                                            data-off="Not Ready" data-onstyle="success" autocomplete="off"
                                            data-offstyle="danger" data-size="lg" name="active">
                                    </div>

                                    <div class="col-md-4">
                                        <label for=""> {{ __('message.A/CNumber') }}</label>
                                        <input type="text" name="ac_number" class="form-control"
                                            placholder="Enter Department Id " autocomplete="off" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">{{ __('message.billing') }} {{ __('message.address') }}</label>
                                        <input type="text" name="b_address" class="form-control"
                                            placholder="Enter Department Id " autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="row">

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
                                </div>

                                <div class="row">

                                    <div class="col-md-4">
                                        <label for="">{{ __('message.country') }}</label>
                                        <input type="text" name="country" class="form-control"
                                            placholder="Enter Department Id " autocomplete="off" autocomplete="off"
                                            required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for=""> {{ __('message.sells') }} {{ __('message.tax') }}</label>
                                        <input type="text" name="tax" class="form-control"
                                            placholder="Enter Department Id " autocomplete="off" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">{{ __('message.Customer') }} {{ __('message.type') }}</label>
                                        <select name="ctype" id="" class="form-control" required>
                                            <option value="">--select--</option>
                                            <option value="cus1">Customer 1</option>
                                            <option value="cus2">Customer 2</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">





                                    <div class="col-md-4">
                                        <label for="">{{ __('message.website') }}</label>
                                        <input type="text" autocomplete="off" name="web" class="form-control"
                                            placholder="Enter Department Id ">
                                    </div>
                                </div>
                                <br>
                                <div class="modal-footer">

                                    <button type="button" class="btn btn-primary" onclick="next()">{{ __('message.next') }}</button>
                                </div>
                            </div>


                            <div id="contact">
                                <div class="row">

                                    <div class="col-md-4">
                                        <label for="">{{ __('message.contact') }} {{ __('message.name') }}</label>
                                        <input type="text" autocomplete="off" name="co_name" class="form-control"
                                            placholder="Enter Department Id " required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">{{ __('message.company') }} {{ __('message.name') }}</label>
                                        <input type="text" autocomplete="off" name="company" class="form-control"
                                            placholder="Enter Department Id " required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">{{ __('message.job') }} {{ __('message.title') }}</label>
                                        <input type="text" autocomplete="off" name="job" class="form-control"
                                            placholder="Enter Department Id " required>
                                    </div>

                                </div>



                                <div class="row">

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
                                </div>

                                <div class="row">

                                    <div class="col-md-4">
                                        <label for="">{{ __('message.email') }}</label>
                                        <input type="text" autocomplete="off" name="email" class="form-control"
                                            placholder="Enter Department Id ">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">{{ __('message.gender') }}</label>
                                        <select name="gender" id="" class="form-control">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>

                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">{{ __('message.address') }}</label>
                                        <input type="text" autocomplete="off" name="address" class="form-control"
                                            placholder="Enter Department Id ">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">{{ __('message.notes') }}</label>
                                        <textarea name="note" autocomplete="off" id="" cols="20" rows="5"
                                            class="form-control"></textarea>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">This is default ship-to contact for this customer</label>
                                        <input type="checkbox" autocomplete="off" class="form-control" checked
                                            data-toggle="toggle" data-size="lg" name="default">
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


        <!-- Edit deprtment model -->
        <div class="modal fade" id="customeredit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog col-md-11" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('message.edit') }} {{ __('message.Customer') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div style="margin-bottom: 10px">
                            <button class="btn btn-info general" onclick="genearal1()">{{ __('message.general') }}</button>
                            <button class="btn btn-info contact" onclick="contact1()">{{ __('message.contact') }}</button>

                        </div>
                        <form action="/update/customer" method="post" id="my-form">
                            @csrf
                            <div id="general1">
                                <div class="row">

                                    <div class="col-md-4">
                                        <label for="">{{ __('message.Customer') }} {{ __('message.id') }}</label>
                                        <input type="text" class="form-control" name="cus_id"
                                            placholder="Enter Department Id " readonly required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">{{ __('message.Customer') }} {{ __('message.name') }}</label>
                                        <input type="text" class="form-control" name="cus_name"
                                            placholder="Enter Department Id " required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">{{ __('message.prospect') }}</label>
                                        {{-- <input type="checkbox" id="toggle-two"> --}}
                                        <input type="checkbox" id="prospect" name="prospect" checked data-toggle="toggle"
                                            data-on="Ready" data-off="Not Ready" data-onstyle="success"
                                            data-offstyle="danger" data-size="lg" value="0">
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-4">
                                        <label for="">{{ __('message.inactive') }}</label>

                                        <input type="checkbox" id="active" checked data-toggle="toggle" data-on="Ready"
                                            data-off="Not Ready" data-onstyle="success" data-offstyle="danger"
                                            data-size="lg" name="active">
                                    </div>

                                    <div class="col-md-4">
                                        <label for=""> {{ __('message.A/CNumber') }}</label>
                                        <input type="text" name="ac_number" class="form-control"
                                            placholder="Enter Department Id " required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">{{ __('message.billing') }} {{ __('message.address') }}</label>
                                        <input type="text" name="b_address" class="form-control"
                                            placholder="Enter Department Id " required>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-4">
                                        <label for="">{{ __('message.city') }}</label>
                                        <input type="text" name="city" class="form-control"
                                            placholder="Enter Department Id " required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for=""> ST</label>
                                        <input type="text" name="st" class="form-control"
                                            placholder="Enter Department Id " required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Zip code</label>
                                        <input type="text" name="zip" class="form-control"
                                            placholder="Enter Department Id" required>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-4">
                                        <label for="">{{ __('message.country') }}</label>
                                        <input type="text" name="country" class="form-control"
                                            placholder="Enter Department Id " required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for=""> {{ __('message.sells') }} {{ __('message.tax') }}</label>
                                        <input type="text" name="tax" class="form-control"
                                            placholder="Enter Department Id " required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">{{ __('message.Customer') }} {{ __('message.type') }}</label>
                                        <select name="ctype" id="ctype" class="form-control">
                                            <option value="cus1">Customer 1</option>
                                            <option value="cus2">Customer 2</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">





                                    <div class="col-md-4">
                                        <label for="">{{ __('message.website') }}</label>
                                        <input type="text" name="web" class="form-control"
                                            placholder="Enter Department Id ">
                                    </div>
                                </div>
                                <br>
                                <div class="modal-footer">

                                    <button type="button" class="btn btn-primary" onclick="next1()">{{ __('message.next') }}</button>
                                </div>
                            </div>


                            <div id="contact1">
                                <div class="row">

                                    <div class="col-md-4">
                                        <label for="">{{ __('message.contact') }} {{ __('message.name') }}</label>
                                        <input type="text" name="co_name" class="form-control"
                                            placholder="Enter Department Id " required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">{{ __('message.company') }} {{ __('message.name') }}</label>
                                        <input type="text" name="company" class="form-control"
                                            placholder="Enter Department Id " required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">{{ __('message.job') }} {{ __('message.tittle') }}</label>
                                        <input type="text" name="job" class="form-control"
                                            placholder="Enter Department Id " required>
                                    </div>

                                </div>



                                <div class="row">

                                    <div class="col-md-4">
                                        <label for="">{{ __('message.telephone') }} -1</label>
                                        <input type="text" name="t1" class="form-control"
                                            placholder="Enter Department Id " required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">{{ __('message.telephone') }} -2</label>
                                        <input type="text" name="t2" class="form-control"
                                            placholder="Enter Department Id ">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">{{ __('message.fax') }}</label>
                                        <input type="text" name="fax" class="form-control"
                                            placholder="Enter Department Id ">
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-4">
                                        <label for="">{{ __('message.email') }}</label>
                                        <input type="text" name="email" class="form-control"
                                            placholder="Enter Department Id ">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">{{ __('message.gender') }}</label>
                                        <select name="gender" id="" class="form-control">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>

                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">{{ __('message.address') }}</label>
                                        <input type="text" name="address" class="form-control"
                                            placholder="Enter Department Id ">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">{{ __('message.notes') }}</label>
                                        <textarea name="note" id="note" cols="20" rows="5"
                                            class="form-control"></textarea>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">This is default ship-to contact for this customer</label>
                                        <input type="checkbox" class="form-control" id="default" checked
                                            data-toggle="toggle" data-size="lg" name="default">
                                    </div>
                                </div>
                                <br>
                                <input type="hidden" name="id">
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
                            <h5 class="modal-title" id="exampleModalLabel">Customer Id</h5>

                            <h5 class="modal-title" id="exampleModalLabel">Customer Name</h5>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <label for="">Customer Since</label>
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
                                    <label for="">Last payment amount</label>
                                    <input type="text" class="form-control" placholder="Enter Department Id ">
                                </div>

                                <div class="col-md-12">
                                    <label for="">Avg days to pay invoice</label>
                                    <input type="text" class="form-control" placholder="Enter Department Id ">
                                </div>

                                <div class="col-md-12">
                                    <label for="">Last statement date</label>
                                    <p></p>
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
                        <form action="/upload/file/customer" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                @csrf
                                <label for="">{{ __('message.file') }} {{ __('message.upload') }}</label>
                                <input type="file" class="form-control" id="file-input" name="image[]" multiple required/>
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                                <div id="thumb-output" class="row m-auto"></div>
                            </div>
                            <input type="hidden" name="vender_id" id="vender_id">
                            <button type="submit" class="btn btn-success">{{ __('message.upload') }} </button>
                        </form>

                        <p id="error">Delete Fail</p>
                        <div id="upload-image" class="row m-auto">

                        </div>
                    </div>


                </div>
            </div>
        </div>
        {{-- sales info --}}

        <div class="modal fade" id="salesinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                        <input type="checkbox" name="processing" checked data-toggle="toggle"
                                            data-on="REPLACE" data-off="NOT" data-onstyle="success" data-offstyle="danger"
                                            data-size="lg" value="0">
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
             function add() {
            document.getElementById("customer").reset();
            // $('#addform').reset();
        }
            document.getElementById('contact').style.display = "none";

            function contact() {
                document.getElementById('general').style.display = "none";
                document.getElementById('contact').style.display = "block";
                $('.contact').addClass('btn-danger');
                $('.general').removeClass('btn-danger');
            }

            function genearal() {
                document.getElementById('general').style.display = "block";
                document.getElementById('contact').style.display = "none";
                $('.general').addClass('btn-danger');
                $('.contact').removeClass('btn-danger');
            }

            function contact1() {
                document.getElementById('general1').style.display = "none";
                document.getElementById('contact1').style.display = "block";
                $('.contact').addClass('btn-danger');
                $('.general').removeClass('btn-danger');
            }

            function genearal1() {
                document.getElementById('general1').style.display = "block";
                document.getElementById('contact1').style.display = "none";
                $('.general').addClass('btn-danger');
                $('.contact').removeClass('btn-danger');
            }

            function next() {
                document.getElementById('general').style.display = "none";
                document.getElementById('contact').style.display = "block";
                $('.contact').addClass('btn-danger');
                $('.general').removeClass('btn-danger');
            }

            function next1() {
                document.getElementById('general1').style.display = "none";
                document.getElementById('contact1').style.display = "block";
                $('.contact').addClass('btn-danger');
                $('.general').removeClass('btn-danger');
            }

            function editcustomer(data) {
                document.getElementById('contact1').style.display = "none";
                console.log(data);
                $("input[name='cus_id']").val(data.cus_id);
                $("input[name='cus_name']").val(data.cus_name);
                if (data.prospect == 'on') {
                    $('#prospect').bootstrapToggle('on', true);
                    $('input[name="prospect"]').prop('checked', true);

                } else {
                    $('#prospect').bootstrapToggle('off', true);
                    $('input[name="prospect"]').prop('checked', false);
                }

                if (data.active == 'on') {
                    $('#active').bootstrapToggle('on', true);
                    $('input[name="active"]').prop('checked', true);

                } else {
                    $('#active').bootstrapToggle('off', true);
                    $('input[name="active"]').prop('checked', false);
                }
                $("input[name='id']").val(data.id);

                $("input[name='ac_number']").val(data.ac_number);
                $("input[name='b_address']").val(data.b_address);
                $("input[name='city']").val(data.city);
                $("input[name='st']").val(data.st);
                $("input[name='zip']").val(data.zip);
                $("input[name='country']").val(data.country);
                $("input[name='tax']").val(data.sellsTax);
                $("#ctype").val(data.c_type);
                $("input[name='web']").val(data.website);
                $("input[name='co_name']").val(data.co_name);
                $("input[name='company']").val(data.company);
                $("input[name='job']").val(data.job);
                $("input[name='t1']").val(data.t1);
                $("input[name='t2']").val(data.t2);
                $("input[name='email']").val(data.email);
                $("input[name='gender']").val(data.gender);
                $("input[name='address']").val(data.address);
                $("input[name='fax']").val(data.fax);
                $("#note").val(data.note);
                if (data.default == 'on') {
                    $('#default').bootstrapToggle('on', true);
                    $('input[name="default"]').prop('checked', true);

                } else {
                    $('#default').bootstrapToggle('off', true);
                    $('input[name="default"]').prop('checked', false);
                }
                $("input[name='default']").val(data.default);
                //     var elements = document.getElementById("my-form").elements;
                //     for (var i = 0, element; element = elements[i++];) {
                //        console.log(element);     

                // }
            }

            function file(data) {
                console.log(data);


                $.ajax({

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/customer/file",
                    type: "post",
                    data: {
                        'id': data.id
                    },
                    success: function(response) {
                        console.log(response);
                        $("#upload-image").html("");
                        $('#error').html('');
                        $('#error').removeClass('removefail');
                        $('#error').removeClass('removedone');
                        if (response.data == 'no data') {
                            $("#upload-image").html(
                                "<p style='color:red;padding:6px;text-align:center;margin:auto'>No data found</p>"
                                );
                        } else {
                            for (var v = 0; v < response.data.length; v++) {

                                var d = response.data[v].file.split('.');
                                var im = '';
                                if (d[1] == 'pdf') {
                                    im = '{{ asset('img/pdf.png') }}';
                                    var img = $("<span class='pip' id=" + response.data[v].id +
                                        "><img class='imageThumb1' src=" + im +
                                        "><br/><span class='remove'><span id='deletefile'  onclick='removefile( \"" +
                                        response.data[v].id + "," + response.data[v].file +
                                        "\")'><i class='fas fa-trash'></i></span>  <span><a target='_blank' href='{{ asset('upload/customer') }}/" +
                                        response.data[v].file +
                                        "'><i class='fas fa-eye'></i></a></span> <span><a  href='{{ asset('upload/customer') }}/" +
                                        response.data[v].file +
                                        "' download><i class='fas fa-download'></i></a></span> </span></span>");

                                } else {
                                    var img = $("<span class='pip' id=" + response.data[v].id +
                                        "><img class='imageThumb1' src='{{ asset('upload/customer') }}/" +
                                        response.data[v].file +
                                        "'/><br/><span class='remove'><span id='deletefile'  onclick='removefile( \"" +
                                        response.data[v].id + "," + response.data[v].file +
                                        "\")'><i class='fas fa-trash'></i></span> <span><a target='_blank' href='{{ asset('upload/customer') }}/" +
                                        response.data[v].file +
                                        "'><i class='fas fa-eye'></i></a></span>  <span><a  href='{{ asset('upload/customer') }}/" +
                                        response.data[v].file +
                                        "' download><i class='fas fa-download'></i></a></span> </span></span>");

                                }
                                $('#upload-image').append(img);
                            }
                        }


                    }
                })
                $('#vender_id').val(data.id);
            }

            function removefile(data) {
                // console.log(id);
                var value = data.split(',');
                console.log(value[0]);
                $.ajax({

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/customer/file/remove",
                    type: "post",
                    data: {
                        'id': value[0],
                        'image': value[1]
                    },

                    success: function(response) {
                        console.log(response);
                        //  $("#upload-image").html("");
                        if (response.data == '0') {
                            $('#error').addClass('removefail');
                            $('#error').text('File Remove Fail!');
                        } else {
                            $('#error').addClass('removedone');
                            $('#error').text(response.data);
                            document.getElementById(value[0]).remove();
                        }


                    }
                })
            }
        </script>
    @endsection
