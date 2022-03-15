<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="./img/svg/logo.svg" type="image/x-icon">
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/datatables/buttontable.css')}}" rel="stylesheet">
  <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

  {{-- <link href="{{asset('vendor/select2/dist/css/select2.min.css')}}" rel="stylesheet"> --}}
  <!-- Custom styles -->
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <style>
        #loader{
           
            width: 100%;
            height: 100vh;
            position: fixed;
            z-index: 10000;
            background-size: 30%;
            background: url('{{asset('img/loder.gif')}}');
            background-repeat: no-repeat;
            background-position: center;
            
        }
        .select2-selection__choice__remove {
  display: none !important;
}

.select2-container--focus .select2-autocomplete .select2-selection__choice {
  display: none;
}
.red{
  color: red;
}
.green{
  color: green
}
    </style>
</head>
<body>
    <div id="loader"></div>
    <div id="app">
    <div class="layer"></div>
<!-- ! Body -->
<a class="skip-link sr-only" href="#skip-target">Skip to content</a>
<div class="page-flex" >
    <!-- ! Sidebar -->
    
    @include('partials.sidebar')
    <div class="main-wrapper " >
        <!-- ! Main nav -->
        @include('partials.navbar')
        <main class="py-4 container ">
            @yield('content')
        </main>
        
    </div>
    </div>


    <!-- Chart library -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
    {{-- <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script> --}}
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('vendor/datatables/button.js')}}"></script>
<script src="{{asset('plugins/chart.min.js')}}"></script>
<!-- Icons library -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.full.js"></script>

<script src="{{asset('plugins/feather.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<!-- Custom scripts -->
<script src="{{asset('js/script.js')}}"></script>
<script src="{{asset('js/validation.js')}}"></script>
{{-- <script src="{{asset('vendor/select2/dist/js/select2.min.js')}}"></script> --}}
   <script>
    $(document).ready(function () {
        $.noConflict();
      $('#dataTable').DataTable(); // ID From dataTable
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
  <script>
      var loader= document.getElementById('loader');
      window.addEventListener('load',function(){
          loader.style.display = "none";
      })
    $('.file-input').change(function(e){
      var curElement = $('.image');
      var file = e.target.files[0].size;
      if(file > 2097152){

            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'File size must not be more than 2 MB!',
         
          })
          $('.file-input').val('');
      }
      else{

     
      var reader = new FileReader();
      reader.onload = function (e) {
          // get loaded data and render thumbnail.
          curElement.attr('src', e.target.result);
          // console.log(e.target);
      };
  
      // read the image file as a data URL.
      reader.readAsDataURL(this.files[0]);
    }
      
  });
  
  </script>
 
   <script>
//        $(document).ready(function() {
//     $('#empserach').select2({
//       placeholder:"Select a Employee",
//       allowClear:true,
//       selectOnClose: true
      
     
//     });
//     // $('#empserach').select2("readonly", true);
// });

$.fn.select2.amd.require([
  'select2/selection/multiple',
  'select2/selection/search',
  'select2/dropdown',
  'select2/dropdown/attachBody',
  'select2/dropdown/closeOnSelect',
  'select2/compat/containerCss',
  'select2/utils'
], function (MultipleSelection, Search, Dropdown, AttachBody, CloseOnSelect, ContainerCss, Utils) {
  var SelectionAdapter = Utils.Decorate(
    MultipleSelection,
    Search
  );
  
  var DropdownAdapter = Utils.Decorate(
    Utils.Decorate(
      Dropdown,
      CloseOnSelect
    ),
    AttachBody
  );
  
  $('.inline-search').select2({
    dropdownAdapter: DropdownAdapter,
    selectionAdapter: SelectionAdapter
  });
  
  $('.dropdown-search').select2({
    selectionAdapter: MultipleSelection
  });
  
  $('.autocomplete').select2({
    dropdownAdapter: DropdownAdapter,
    selectionAdapter: Utils.Decorate(SelectionAdapter, ContainerCss),
    containerCssClass: 'select2-autocomplete'
  });
});

$(document).ready(function() {

if(window.File && window.FileList && window.FileReader) {
   $("#file-input").on("change",function(e) {
       var files = e.target.files ,
       filesLength = files.length ;
       var fileSize = 0;
       for (var i = 0; i < filesLength ; i++) {
           var f = files[i]
         
           if(f.size > 2097152){
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'File size must not be more than 2 MB!',
         
          })
            // alert('File size must not be more than 2 MB');
            $('#file-input').val('');
           }
           else{

           
           var fileReader = new FileReader();
           fileReader.onload = (function(e) {
               var file = e.target;
               var imga='';
               console.log(file.result);
             console.log(file.result.match('data:application/pdf'));
             if(file.result.match('data:application/pdf')){
               imga = '{{asset('img/pdf.png')}}'
             }
             else{
              imga = e.target.result;
             }
              var img= $("<span class='pip'><img class='imageThumb' src="+ imga + " title=" + file.name + "/><br/><span id='deleteImage' class='remove'><i class='fas fa-trash'></i></span> </span>");
          $('#thumb-output').append(img)
          });
         
         
          fileReader.readAsDataURL(f);
           }
      }
 });
} else { alert("Your browser doesn't support to File API") }
});
$(document).on('click','#deleteImage',function(){
  console.log('sd');
    var pips = $('.pip').toArray();
    var $selectedPip = $(this).parent('.pip');
    var index = pips.indexOf($selectedPip[0]);

    var dt = new DataTransfer();
    var files = $("#file-input")[0].files;

    for (var fileIdx = 0; fileIdx < files.length; fileIdx++) {
        if (fileIdx !== index) {
            dt.items.add(files[fileIdx]);
            console.log(fileIdx);
        }
    }

    $("#file-input")[0].files = dt.files;

    $selectedPip.remove();
});
  </script>
  @include('layouts.notify')
</body>
</html>
