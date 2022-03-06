@extends('layouts.app')
@section('content')
<div class="container-fluid" id="container-wrapper">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" style="color:blue">{{__('message.Dashboard')}} </a></li>
            <li class="breadcrumb-item active" aria-current="page"  style="color:black;font-weight:bold">{{__('message.Department')}} </li>
        </ol>

        <div >
            <button class="btn btn-success" data-toggle="modal" data-target="#departmentadd">{{__('message.add')}} {{__('message.Department')}} </button>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>Department Id</th>
                            <th>Department Name</th>
                            {{-- <th>Name</th>
                            <th>Title</th>
                            <th>Price</th> --}}
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                          <th>Department Id</th>
                          <th>Department Name</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                       @foreach($datas as $data)
                        <tr>
                            <td class="id">{{$data->id}}</td>
                            <td class="name"> {{$data->dep_name}}</td>
                            {{-- <td class="name">sd</td>
                            <td class="name">sd</td>
                            <td class="name">sd</td> --}}
                            <td> <form action="/department/remove" method="post" style="display: unset;">
                              <input type="hidden" value="{{$data->dep_id}}" name="dep_id">
                      @csrf

                      <button class="btn-danger btn" type="submit"><i class="fas fa-trash"></i></button>
                      </form>
                                &nbsp;
                              <button class="btn btn-primary"data-toggle="modal" data-target="#departmentedit"  onclick="edit({{$data}})"><i class="fas fa-pen"></i></button>
                              &nbsp;
                              <button class="btn btn-info"data-toggle="modal" data-target="#departmentview" onclick="view({{$data}})"><i class="fas fa-eye"></i></button>
                            </td>

                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- add department models ection -->
    <div class="modal fade" id="departmentadd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="/add/department" method="post">
      @csrf
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Department</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
       <div class="row">
         
           <div class="col-md-6">
            <label for="">Department Id</label>
            <input type="text" class="form-control" name="dep_id" placholder="Enter Department Id " value="{{$lastid+1}}" readonly>
            </div>

            <div class="col-md-6">
            <label for="">Department Name</label>
            <input type="text" class="form-control" name="dep_name" placholder="Enter Department Id " required>
            </div>
            
       </div>
      
      </div>
  
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('message.close')}}</button>
        <button type="submit" class="btn btn-success">{{__('message.add')}}</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- Edit deprtment model -->
<div class="modal fade" id="departmentedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form action="/update/department" method="post">
    @csrf
    
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Department</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="row">
           <div class="col-md-6">
            <label for="">Department Id</label>
            <input type="text" class="form-control" name="dep_id" id="dep_id" placholder="Enter Department Id " readonly>
            </div>

            <div class="col-md-6">
            <label for="">Department Name</label>
            <input type="text" class="form-control" name="dep_name" id="dep_name" placholder="Enter Department Id" required>
            </div>
            
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
  </form>
</div>
<!-- View deprtment model -->
<div class="modal fade" id="departmentview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Department</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="row">
           <div class="col-md-6">
            <label for="">Department Id</label>
            <input type="text" class="form-control" id="dep_idview" placholder="Enter Department Id " readonly>
            </div>

            <div class="col-md-6">
            <label for="">Department Name</label>
            <input type="text" class="form-control" id="dep_nameview" placholder="Enter Department Id " readonly>
            </div>
            
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<script>
  function edit(data){
    $('#dep_id').val(data.id);
    $('#dep_name').val(data.dep_name);
  }
  function view(data){
    $('#dep_idview').val(data.id);
    $('#dep_nameview').val(data.dep_name);
  }
</script>

    @endsection