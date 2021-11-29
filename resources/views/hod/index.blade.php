@extends('layouts.app')
@section('title', 'Hod')
@section('page-title', 'Hod')

@section('content')
@if(Session::has('success'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{{ Session::get('success') }}</strong>
  <button type="button" style="float:right;" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
    <!-- Begin Page Content -->
<div class="container-fluid">
   
        <div class="row">
            <div class="card shadow col-md-12">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">HOD</h6>  </div>

            <div class="card-body">
            <div class="table-responsive">
                <a href="/add-hod"><button class="btn btn-primary">ADD</button></a>
                <table class="table table-bordered school" id="dataTable"  cellspacing="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>first_name</th>  
                            <th>last_name</th>
                            <th>reference_no</th>
                            <th>email</th>
                            <th>designation</th>
                            <th>department</th>
                            <th>mobile</th>
                          <th>employment_type</th>
                            <th>staff_category</th>      
                            <th>Edit</th>
                            <th>Delete</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($data as $key => $value)
                            <tr id="{{$value->id}}">

                                 <td>{{$value->id}}</td> 
                                 <td>{{$value->first_name}}</td> 
                                 <td>{{$value->last_name}}</td>
                                 <td>{{$value->reference_no}}</td>
                                 <td>{{$value->email}}</td>
                                 <td>{{$value->designation_name}}</td>
                                 <td>{{$value->department}}</td>
                                 <td>{{$value->mobile}}</td>
                                 <td>{{$value->employment_type}}</td> 
                                 <td>{{$value->staff_category}}</td>     
                                 <td><button class="btn btn-primary" style="color:white" onclick="showDialog({{$value->id}})">Edit</button></td>
                                 <td><button data-id="{{$value->id}}" class="btn btn-danger unassigned">Delete</button></td>
                                
                            </tr>
                            
                            @endforeach
            
        </tbody>
        </table>
        </div>
        </div>
        </div>
                </div>
        
                   
        <form action="" method="post">
            @csrf

        <div class="modal fade" id="myModal" style="overflow:scroll;" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="myModalLabel"></p>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal"><span>&times;</span><span>Close</span></button>
                </div>
                <div class="modal-body form-horizontal" id="modalBody">
        
        @endsection
                                {{-- </div></div></div> --}}
        @section('scripts')

        <script type="text/javascript">
                  $(document).ready(function() {
        $('#dataTable').DataTable();
        });
           
        </script>

        <script>
            
        
        function showDialog(id) {          
                    var data =$("form").serialize();
               console.log(id);
               var url =   "{{ url('/edit-hod-modal') }}";
             //  var data = "id="+id;

               $("#myModalLabel").html("Edit hod");
               $("#modalBody").html("Loading...");  // Or use a progress bar...
               $("#myModal").modal("show");
               $.ajax({
                    type: "POST",
                    url: url,
                    data: data+"&id="+id, // serializes the form's elements.
                    success: function(data)
                    {
                        //alert(data); // show response from the php script.
                        $('#modalBody').html(data);

                    }
                });        
           }

        function edit(id){
            
            var data = $("form").serialize();
            var url =   "{{ url('/edit-hod') }}";
        
            $.ajax({
                    type: "POST",
                    url: url,
                    data: data+"&id="+id, // serializes the form's elements.
                    success: function(data)
                    {
                        //alert(data); // show response from the php script.
                        $('#row_'+id).html(data);      
                }
                });
 }
</script>
<script src={{ asset("js/sweetalert.min.js")}}></script>
            <script type="text/javascript">
            $(document).on("click", "table.school tbody .unassigned", function(event) {
                var id = $(this).data('id').toString();
                    swal({
                    title: "Delete!",
                    text: "Are you sure you want to delete this HOD!",
                    icon: "error",
                    buttons: [true, "Delete"],
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location.href="{{url('/delete-hod/' )}}"+"/"+id;
                            swal({
                                title: "Success!",
                                text: "Deleted succesfully",
                                icon: "success",
                                button: true,
                                time: 3000,
                            })
                        } else{
                            swal({
                                title: "Not Deleted",
                                text: "Your file is safe",
                                button: true,
                            })
                        }
                        });           
        })
        

</script>

<script src= {{ asset("vendor/datatables/jquery.dataTables.min.js")}}></script>
<script src={{ asset("vendor/datatables/dataTables.bootstrap4.min.js")}}></script>
<script src={{ asset("vendor/jquery/jquery.min.js")}}></script>

        

@endsection
