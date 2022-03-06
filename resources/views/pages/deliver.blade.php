@extends('layouts.app')
@section('content')
<div class="container-fluid" id="container-wrapper">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" style="color:blue">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"  style="color:black;font-weight:bold"> Deliver</li>
        </ol>

        <div >
            <button class="btn btn-success" data-toggle="modal" data-target="#departmentadd">Add Deliver</button>
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
                            <th>Title</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>Id</th>
                        <th>Image</th>
                            <th>Name</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                       
                        <tr>
                            <td class="id">sd</td>
                            <td class="name"> sd</td>
                            <td class="name">sd</td>
                            <td class="name">sd</td>
                            <td class="name">sd</td>
                            <td> <form action="/admin/admin-remove" method="post" style="display: unset;">
                      @csrf

                      <button class="btn-danger btn" type="submit"><i class="fas fa-trash"></i></button>
                      </form>
                                &nbsp;
                              <button class="btn btn-primary"data-toggle="modal" data-target="#departmentedit" ><i class="fas fa-pen"></i></button>
                              &nbsp;
                              <button class="btn btn-info"data-toggle="modal" data-target="#departmentview" ><i class="fas fa-eye"></i></button>
                            </td>

                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- add department models ection -->
    <div class="modal fade" id="departmentadd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Deliver</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="row">
           <div class="col-md-6">
            <label for="">Deliver Id</label>
            <input type="text" class="form-control" placholder="Enter Department Id ">
            </div>

            <div class="col-md-6">
            <label for="">Deliver Name</label>
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
</div>


<!-- Edit deprtment model -->
<div class="modal fade" id="departmentedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Deliver</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="row">
           <div class="col-md-6">
            <label for="">Deliver Id</label>
            <input type="text" class="form-control" placholder="Enter Department Id ">
            </div>

            <div class="col-md-6">
            <label for="">Deliver Name</label>
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
</div>
<!-- View deprtment model -->
<div class="modal fade" id="departmentview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Deliver</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="row">
           <div class="col-md-6">
            <label for="">Deliver Id</label>
            <input type="text" class="form-control" placholder="Enter Department Id ">
            </div>

            <div class="col-md-6">
            <label for="">Deliver Name</label>
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
</div>

    @endsection