@extends('layouts.app')
@section('content')
    <div class="" id="container-wrapper">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" style="color:blue">{{__('message.Dashboard')}} </a></li>
                <li class="breadcrumb-item active" aria-current="page" style="color:black;font-weight:bold"> {{__('message.Supplier')}}</li>
            </ol>

            <div>
                <button class="btn btn-success" data-toggle="modal" data-target="#departmentadd">{{__('message.add')}} {{__('message.Supplier')}} </button>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-responsive" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>Action</th>
                                <th>Id</th>
                                <th>Business Name</th>
                                <th>Business Address</th>
                                <th>Business T.No</th>
                                <th>Business R.No</th>
                                <th>Proprietor's Name</th>
                                <th>Residential Address</th>
                                <th>Number of year in Business</th>
                                <th>NIC No</th>
                                <th>Bank</th>
                                <th>Branch</th>
                                <th>A/C No</th>
                                <th>Cheque Signature 1</th>
                                <th>Cheque Signature 2</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Action</th>
                                <th>Id</th>
                                <th>Business Name</th>
                                <th>Business Address</th>
                                <th>Business T.No</th>
                                <th>Business R.No</th>
                                <th>Proprietor's Name</th>
                                <th>Residential Address</th>
                                <th>Number of year in Business</th>
                                <th>NIC No</th>
                                <th>Bank</th>
                                <th>Branch</th>
                                <th>A/C No</th>
                                <th>Cheque Signature 1</th>
                                <th>Cheque Signature 2</th>

                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($datas as $data)
                                <tr>
                                    <td>
                                        <form action="/supplier/remove" method="post" style="display: unset;">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$data->id}}">
                                            <button class="btn-danger btn" type="submit"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                        &nbsp;
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#departmentedit"
                                            onclick="edit({{ $data }})"><i class="fas fa-pen"></i></button>
                                        &nbsp;
                                        <button class="btn btn-info" data-toggle="modal" onclick="view({{ $data }})" data-target="#departmentview"><i
                                                class="fas fa-eye"></i></button>
                                    </td>
                                    <td class="id">{{ $data->id }}</td>
                                    <td class="name"> {{ $data->b_name }}</td>
                                    <td class="name"> {{ $data->b_address }}</td>
                                    <td class="name"> {{ $data->bt_Number }}</td>
                                    <td class="name"> {{ $data->br_Number }}</td>
                                    <td class="name"> {{ $data->p_name }}</td>
                                    <td class="name"> {{ $data->r_address }}</td>
                                    <td class="name"> {{ $data->n_f_y_business }}</td>
                                    <td class="name"> {{ $data->nic }}</td>
                                    <td class="name"> {{ $data->bank }}</td>
                                    <td class="name"> {{ $data->branch }}</td>
                                    <td class="name"> {{ $data->a_c_number }}</td>
                                    <td class="name"> {{ $data->signature1 }}</td>
                                    <td class="name"> {{ $data->signature2 }}</td>



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
                        <h5 class="modal-title" id="exampleModalLabel">{{__('message.add')}} {{__('message.Supplier')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/add/supplier" method="post">
                        @csrf
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">{{__('message.Supplier')}} {{__('message.id')}}</label>
                                    <input type="text" class="form-control" name="sup_id"
                                        placholder="Enter Department Id " value="{{ $lastid + 1 }}" required
                                        readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="">{{__('message.bname')}}</label>
                                    <input type="text" class="form-control" name="bname" placholder="Enter Department Id "
                                        required>
                                </div>

                                <div class="col-md-4">
                                    <label for="">{{__('message.baddres')}}</label>
                                    <input type="text" class="form-control" name="baddress"
                                        placholder="Enter Department Id " required>
                                </div>
                                <div class="col-md-4">
                                    <label for="">{{__('message.bt')}}r</label>
                                    <input type="text" class="form-control" name="bt" placholder="Enter Department Id "
                                        required>
                                </div>
                                <div class="col-md-4">
                                    <label for="">{{__('message.br')}}</label>
                                    <input type="text" class="form-control" name="br" placholder="Enter Department Id "
                                        required>
                                </div>

                                <div class="col-md-4">
                                    <label for="">{{__('message.pname')}}</label>
                                    <input type="text" class="form-control" name="pname" placholder="Enter Department Id "
                                        required>
                                </div>

                                <div class="col-md-4">
                                    <label for="">{{__('message.raddress')}}</label>
                                    <input type="text" class="form-control" name="raddress"
                                        placholder="Enter Department Id " required>
                                </div>
                                <div class="col-md-4">
                                    <label for="">{{__('message.noyb')}} </label>
                                    <input type="text" class="form-control" name="noyb" placholder="Enter Department Id "
                                        required>
                                </div>

                                <div class="col-md-4">
                                    <label for="">{{__('message.nic')}}</label>
                                    <input type="text" class="form-control nic" name="nic"
                                        onmouseout="niccheck($('.nic').val());" placholder="Enter Department Id " required>
                                    <span class="nicerror"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"
                                    style="padding: 15px;background-color: #16a032a3;margin: 15px 0;color:white;text-align: center">
                                    <h5>{{__('message.Bankdetails')}}</h5>
                                </div>
                            </div>
                            <div class="justify-content-center">
                                <div class="col-md-8 m-auto">
                                    <label for="">{{__('message.Bank')}}</label>
                                    <input type="text" class="form-control" name="bank" placholder="Enter Department Id "
                                        required>
                                </div>

                                <div class="col-md-8  m-auto">
                                    <label for="">{{__('message.Branch')}}</label>
                                    <input type="text" class="form-control" name="branch"
                                        placholder="Enter Department Id " required>
                                </div>

                                <div class="col-md-8  m-auto">
                                    <label for="">{{__('message.A/CNumber')}}</label>
                                    <input type="text" class="form-control" name="acnumber"
                                        placholder="Enter Department Id " required>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"
                                        style="padding: 15px;background-color: #16a032a3;margin: 15px 0;color:white;text-align: center">
                                        <h5>{{__('message.csd')}}</h5>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="col-md-8  m-auto">
                                    <label for="">1.</label>
                                    <input type="text" class="form-control" name="sig1" placholder="Enter Department Id ">
                                </div>
                                <div class="col-md-8  m-auto">
                                    <label for="">2.</label>
                                    <input type="text" class="form-control" name="sig2" placholder="Enter Department Id ">
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('message.close')}}</button>
                            <button type="submit" id="submit" class="btn btn-success">{{__('message.addnew')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Edit deprtment model -->
        <div class="modal fade" id="departmentedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog col-md-11" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{__('message.edit')}} {{__('message.Supplier')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/update/supplier" method="post">
                        @csrf
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">{{__('message.Supplier')}} {{__('message.id')}}</label>
                                    <input type="text" class="form-control" name="sup_id"
                                        placholder="Enter Department Id " id="id" required readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="">{{__('message.bname')}}</label>
                                    <input type="text" class="form-control" id="bname" name="bname"
                                        placholder="Enter Department Id " required>
                                </div>

                                <div class="col-md-4">
                                    <label for="">{{__('message.baddres')}}</label>
                                    <input type="text" class="form-control" name="baddress"
                                        placholder="Enter Department Id " id="baddress" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="">{{__('message.bt')}}r</label>
                                    <input type="text" class="form-control" id="bt" name="bt"
                                        placholder="Enter Department Id " required>
                                </div>
                                <div class="col-md-4">
                                    <label for="">{{__('message.br')}}</label>
                                    <input type="text" class="form-control" id="br" name="br"
                                        placholder="Enter Department Id " required>
                                </div>

                                <div class="col-md-4">
                                    <label for="">{{__('message.pname')}}r</label>
                                    <input type="text" class="form-control" id="pname" name="pname"
                                        placholder="Enter Department Id " required>
                                </div>

                                <div class="col-md-4">
                                    <label for="">{{__('message.raddress')}}r</label>
                                    <input type="text" class="form-control" id="raddress" name="raddress"
                                        placholder="Enter Department Id " required>
                                </div>
                                <div class="col-md-4">
                                    <label for="">{{__('message.noyb')}} </label>
                                    <input type="text" class="form-control" id="noyb" name="noyb"
                                        placholder="Enter Department Id " required>
                                </div>

                                <div class="col-md-4">
                                    <label for="">{{__('message.nic')}} </label>
                                    <input type="text" class="form-control nic nic1" name="nic"
                                        onmouseout="niccheck($('.nic1').val());" id="nic" placholder="Enter Department Id "
                                        required>
                                    <span class="nicerror"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"
                                    style="padding: 15px;background-color: #16a032a3;margin: 15px 0;color:white;text-align: center">
                                    <h5>{{__('message.Bankdetails')}}</h5>
                                </div>
                            </div>
                            <div class="justify-content-center">
                                <div class="col-md-8 m-auto">
                                    <label for="">{{__('message.Bank')}}</label>
                                    <input type="text" class="form-control" id="bank" name="bank"
                                        placholder="Enter Department Id " required>
                                </div>

                                <div class="col-md-8  m-auto">
                                    <label>{{__('message.Branch')}}</label>
                                    <input type="text" class="form-control" name="branch"
                                        placholder="Enter Department Id " id="branch" required>
                                </div>

                                <div class="col-md-8  m-auto">
                                    <label for="">{{__('message.A/CNumber')}}</label>
                                    <input type="text" class="form-control" name="acnumber"
                                        placholder="Enter Department Id " id="acnumber" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"
                                        style="padding: 15px;background-color: #16a032a3;margin: 15px 0;color:white;text-align: center">
                                        <h5>{{__('message.csd')}}</h5>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="col-md-8  m-auto">
                                    <label for="">1.</label>
                                    <input type="text" class="form-control" id="sig1" name="sig1"
                                        placholder="Enter Department Id ">
                                </div>
                                <div class="col-md-8  m-auto">
                                    <label for="">2.</label>
                                    <input type="text" class="form-control" id="sig2" name="sig2"
                                        placholder="Enter Department Id ">
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('message.close')}}</button>
                            <button type="submit" id="submit1" class="btn btn-primary">{{__('message.update')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- View deprtment model -->
        <div class="modal fade" id="departmentview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog col-md-10" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">View Supplier</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-4">
                                <label for="">{{__('message.Supplier')}} {{__('message.id')}}</label>
                                <input type="text" class="form-control" name="sup_id"
                                    placholder="Enter Department Id " id="id1" required readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="">{{__('message.bname')}}</label>
                                <input type="text" class="form-control" id="bname1" name="bname"
                                    placholder="Enter Department Id " required readonly>
                            </div>

                            <div class="col-md-4">
                                <label for="">{{__('message.baddres')}}</label>
                                <input type="text" class="form-control" name="baddress"
                                    placholder="Enter Department Id " id="baddress1" required readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="">{{__('message.bt')}}</label>
                                <input type="text" class="form-control" id="bt1" name="bt"
                                    placholder="Enter Department Id " required readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="">{{__('message.br')}}</label>
                                <input type="text" class="form-control" id="br1" name="br"
                                    placholder="Enter Department Id " required readonly>
                            </div>

                            <div class="col-md-4">
                                <label for="">{{__('message.pname')}}</label>
                                <input type="text" class="form-control" id="pname1" name="pname"
                                    placholder="Enter Department Id " required readonly>
                            </div>

                            <div class="col-md-4">
                                <label for="">{{__('message.raddress')}}</label>
                                <input type="text" class="form-control" id="raddress1" name="raddress"
                                    placholder="Enter Department Id " required readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="">{{__('message.noyb')}}</label>
                                <input type="text" class="form-control" id="noyb1" name="noyb"
                                    placholder="Enter Department Id " required readonly>
                            </div>

                            <div class="col-md-4">
                                <label for="">{{__('message.nic')}}</label>
                                <input type="text" class="form-control nic1 nic" name="nic"
                                    onmouseout="niccheck($('.nic1').val());" id="nic1" placholder="Enter Department Id "
                                    required readonly>
                                <span class="nicerroredit"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"
                                style="padding: 15px;background-color: #16a032a3;margin: 15px 0;color:white;text-align: center">
                                <h5>{{__('message.Bankdetails')}}</h5>
                            </div>
                        </div>
                        <div class="justify-content-center">
                            <div class="col-md-8 m-auto">
                                <label>{{__('message.Bank')}}</label>
                                <input type="text" class="form-control" id="bank1" name="bank"
                                    placholder="Enter Department Id " required readonly>
                            </div>

                            <div class="col-md-8  m-auto">
                                <label>{{__('message.Branch')}}</label>
                                <input type="text" class="form-control" name="branch"
                                    placholder="Enter Department Id " id="branch1" required readonly>
                            </div>

                            <div class="col-md-8  m-auto">
                                <label for="">{{__('message.A/CNumber')}}</label>
                                <input type="text" class="form-control" name="acnumber"
                                    placholder="Enter Department Id " id="acnumber1" required readonly>
                            </div>
                            <div class="row">
                                <div class="col-md-12"
                                    style="padding: 15px;background-color: #16a032a3;margin: 15px 0;color:white;text-align: center">
                                    <label for="">{{__('message.csd')}}</label>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="col-md-8  m-auto">
                                <label for="">1.</label>
                                <input type="text" class="form-control" id="sig11" name="sig1"
                                    placholder="Enter Department Id "readonly>
                            </div>
                            <div class="col-md-8  m-auto">
                                <label for="">2.</label>
                                <input type="text" class="form-control" id="sig21" name="sig2"
                                    placholder="Enter Department Id " readonly>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> <label for="">{{__('message.close')}}</label></button>
                        {{-- <button type="button" class="btn btn-primary">Add</button> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
        <script>
            function edit(data) {
            console.log(data);
                console.log(data);
                $('#id').val(data.id);
                $('#bname').val(data.b_name);
                $('#baddress').val(data.b_address);
                $('#bt').val(data.bt_Number);
                $('#br').val(data.br_Number);
                $('#pname').val(data.p_name);
                $('#raddress').val(data.r_address);
                $('#noyb').val(data.n_f_y_business);
                $('#nic').val(data.nic);
                $('#bank').val(data.bank);
                $('#branch').val(data.branch);
                $('#acnumber').val(data.a_c_number);
                $('#sig1').val(data.signature1);
                $('#sig2').val(data.signature2);


            }
            function view(data) {
                console.log(data);
                $('#id1').val(data.id);
                $('#bname1').val(data.b_name);
                $('#baddress1').val(data.b_address);
                $('#bt1').val(data.bt_Number);
                $('#br1').val(data.br_Number);
                $('#pname1').val(data.p_name);
                $('#raddress1').val(data.r_address);
                $('#noyb1').val(data.n_f_y_business);
                $('#nic1').val(data.nic);
                $('#bank1').val(data.bank);
                $('#branch1').val(data.branch);
                $('#acnumber1').val(data.a_c_number);
                $('#sig11').val(data.signature1);
                $('#sig21').val(data.signature2);


            }
        </script>


    @endsection
