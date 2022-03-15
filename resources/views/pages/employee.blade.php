@extends('layouts.app')
@section('content')
<div id="container-wrapper">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" style="color:blue">{{__('message.Dashboard')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page"  style="color:black;font-weight:bold">  {{__('message.Employee')}}</li>
        </ol>

        <div >
            <button class="btn btn-success" data-toggle="modal" data-target="#departmentadd">{{__('message.add')}} {{__('message.Employee')}}</button>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>Employee Id</th>
                            <th>Image</th>
                            <th>Employee Name</th>
                            <th>Employee Email</th>
                            <th>Employee Address</th>
                            <th>Employee Nic</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                          <th>Employee Id</th>
                          <th>Image</th>
                          <th>Employee Name</th>
                          <th>Employee Email</th>
                            <th>Employee Address</th>
                            <th>Employee Nic</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                      @foreach($datas as $data)
                        <tr>
                            <td class="id">{{$data->id}}</td>
                            <td class="name">
                              @if($data->profile == 'null')
                              <img src="{{asset('img/avatar/avatar-illustrated-02.webp')}}" alt="" width="50" style="border-radius: 25px"> 
                            @else
                            <img src="{{asset('upload')}}/{{$data->profile}}" alt="" width="50" style="border-radius: 25px"> 
                            @endif
                            </td>
                            <td class="name"> {{$data->emp_name}}</td>
                            <td class="name">{{$data->emp_email}}</td>
                            <td class="name">{{$data->emp_address}}</td>
                            <td class="name">{{$data->emp_nic}}</td>
                            <td style="display: block ruby"> <form action="/employee/remove" method="post" style="display: unset;">
                              <input type="hidden" value="{{$data->emp_id}}" name="emp_id">
                              <input type="hidden" value="{{$data->profile}}" name="get_img">
                      @csrf

                      <button class="btn-danger btn" type="submit"><i class="fas fa-trash"></i></button>
                      </form>
                                &nbsp;
                              <button class="btn btn-primary"data-toggle="modal" data-target="#departmentedit"  onclick="edit({{$data}})"><i class="fas fa-pen"></i></button>
                              &nbsp;
                              <button class="btn btn-success" data-toggle="modal" data-target="#file"
                                onclick="file({{ $data }})">
                                <i class="fas fa-file"> </i>
                               </button>
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
      <form action="/add/employee" method="post" enctype="multipart/form-data">
        @csrf
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{__('message.add')}} {{__('message.Employee')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
       
          
            
            <div class="containers" style="justify-content: center;display: grid">
              
              <div class="imageWrapper">
                <img class="image" src="{{asset('img/avatar/avatar-illustrated-02.webp')}}">
              </div>
            
            
            <button type="button" class="file-upload">            
              <input type="file" class="file-input" name="image">{{__('message.choose')}}
            </button>
          </div>
       
       <div class="row">
           <div class="col-md-6">
            <label for="">{{__('message.emp')}} {{__('message.id')}}</label>
            <input type="text" class="form-control" name="emp_id" placholder="Enter Employee Id " value="{{$lastid+1}}" readonly>
            </div>

            <div class="col-md-6">
            <label for="">{{__('message.emp')}} {{__('message.name')}}</label>
            <input type="text" class="form-control" name="emp_name" placholder="Enter Employee Name ">
            </div>
            <div class="col-md-6">
              <label for="">{{__('message.emp')}} {{__('message.nic')}}</label>
              <input type="text" class="form-control nic"   onmouseout="niccheck($('.nic').val());" name="emp_nic" placholder="Enter Employee Name ">
              <span class="nicerror"></span> 
            </div>
              <div class="col-md-6">
                <label for="">{{__('message.emp')}} {{__('message.email')}}</label>
                <input type="text" class="form-control" name="emp_email" placholder="Enter Employee Name ">
                </div>

                <div class="col-md-6">
                  <label for="">{{__('message.emp')}} {{__('message.address')}}</label>
                  <input type="text" class="form-control" name="emp_address" placholder="Enter Employee Name ">
                  </div>

                  
            
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('message.close')}}</button>
        <button type="submit" id="submit" class="btn btn-success">{{__('message.addnew')}}</button>
      </div>
    </div>
  </div>
</form>
</div>


<!-- Edit deprtment model -->
<div class="modal fade" id="departmentedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form action="/update/employee" method="post" enctype="multipart/form-data">
    @csrf
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="containers" style="justify-content: center;display: grid">
              
              <div class="imageWrapper">
                <img class="image" id="preview" src="{{asset('img/avatar/avatar-illustrated-02.webp')}}">
              </div>
            
            
            <button type="button" class="file-upload">  
              <input type="hidden" name="get_img" id="img">          
              <input type="file" class="file-input" name="image">Choose File
            </button>
          </div>
          <div class="row">
            <div class="col-md-6">
             <label for="">{{__('message.emp')}} {{__('message.id')}}</label>
             <input type="text" class="form-control" name="emp_id" placholder="Enter Employee Id " id="emp_id" readonly>
             </div>
 
             <div class="col-md-6">
             <label for="">{{__('message.emp')}} {{__('message.name')}}</label>
             <input type="text" class="form-control" name="emp_name" placholder="Enter Employee Name " id="emp_name">
             </div>
             <div class="col-md-6">
               <label for="">{{__('message.emp')}} {{__('message.nic')}}</label>
               <input type="text" class="form-control nic nic3" id="emp_nic"  onmouseout="niccheck($('.nic3').val());" name="emp_nic" placholder="Enter Employee Name ">
               <span class="nicerror"></span> 
             </div>
               <div class="col-md-6">
                 <label for="">{{__('message.emp')}} {{__('message.email')}}</label>
                 <input type="text" class="form-control" name="emp_email" id="emp_email" placholder="Enter Employee Name ">
                 </div>
 
                 <div class="col-md-6">
                   <label for="">{{__('message.emp')}} {{__('message.address')}}</label>
                   <input type="text" class="form-control" id="emp_address" name="emp_address" placholder="Enter Employee Name ">
                   </div>
 
                   
             
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('message.close')}}</button>
        <button type="submit" id="submit1" class="btn btn-primary">{{__('message.update')}}</button>
      </div>
    </div>
  </div>
  </form>
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
            <form action="/upload/file/employee" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    @csrf
                    <label for="">{{ __('message.file') }} {{ __('message.upload') }}</label>
                    <input type="file" class="form-control" id="file-input" name="image[]" multiple  required/>
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
<script>
  function edit(data){
    $('#emp_id').val(data.id);
    $('#emp_name').val(data.emp_name);
    $('#emp_email').val(data.emp_email);
    $('#emp_address').val(data.emp_address);
    $('#emp_nic').val(data.emp_nic);
    if(data.profile == "null"){
      document.getElementById('preview').src="{{asset('img/avatar/avatar-illustrated-02.webp')}}"
      
    }
    else{
      document.getElementById('preview').src="{{asset('upload')}}/"+ data.profile 
    }
    $('#img').val(data.profile);
   
  }
  
  function file(data) {
            console.log(data);
           
          
            $.ajax({
                
               headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
            url: "/employee/file",
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
                      var img= $("<span class='pip' id="+response.data[v].id+"><img class='imageThumb1' src="+ im+ "><br/><span class='remove'><span id='deletefile'  onclick='removefile( \""+ response.data[v].id +","+ response.data[v].file+"\")'><i class='fas fa-trash'></i></span>  <span><a target='_blank' href='{{asset('upload/employee')}}/"+ response.data[v].file + "'><i class='fas fa-eye'></i></a></span> <span><a  href='{{asset('upload/employee')}}/"+ response.data[v].file + "' download><i class='fas fa-download'></i></a></span> </span></span>");
                 
                  }
                  else{
                      var img= $("<span class='pip' id="+response.data[v].id+"><img class='imageThumb1' src='{{asset('upload/employee')}}/"+ response.data[v].file + "'/><br/><span class='remove'><span id='deletefile'  onclick='removefile( \""+ response.data[v].id +","+ response.data[v].file+"\")'><i class='fas fa-trash'></i></span> <span><a target='_blank' href='{{asset('upload/employee')}}/"+ response.data[v].file + "'><i class='fas fa-eye'></i></a></span>  <span><a  href='{{asset('upload/employee')}}/"+ response.data[v].file + "' download><i class='fas fa-download'></i></a></span> </span></span>");
                 
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
             url: "/employee/file/remove",
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