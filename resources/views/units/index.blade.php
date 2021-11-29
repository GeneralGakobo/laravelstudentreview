@extends('layouts.app')
@section('title', 'Units')
@section('page-title', 'Units')

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
            <h6 class="m-0 font-weight-bold text-primary">units</h6>  </div>

            <div class="card-body">
            <div class="table-responsive">
                <a href="/add-unit"><button class="btn btn-primary">ADD</button></a>
                <table class="table table-bordered school" id="dataTable"  cellspacing="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>course</th>  
                            <th>Unit_name</th>      
                            <th>Edit</th>
                            <th>Delete</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($data as $key => $value)
                            <tr id="row_{{$value->id}}">

                                 <td>{{$value->id}}</td> 
                                 <td>{{$value->course_name}}</td> 
                                 <td>{{$value->unit_name}}</td>      
                                 <td><button class="btn btn-primary" style="color:white" onclick="showDialog({{$value->id}})">Edit</button></td>
                                 <td><button data-id="{{$value->id}}" class="btn btn-danger unassigned">Delete</button></td>
                              <?php $bb=$value->id; ?>
                            </tr>
                            
                            @endforeach
            
        </tbody>
        </table>
        </div>
        </div>
        </div>
                </div>
        
                   
        <form action="/edit-unit/{{$bb}}" method="post">
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
            
        
        function showDialog(id) {          
                    var data =$("form").serialize();
               console.log(id);
               var url =   "{{ url('/edit-unit-modal') }}";
             //  var data = "id="+id;

               $("#myModalLabel").html("Edit unit");
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
            var url =   "{{ url('/edit-unit') }}";
        
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
                    text: "Are you sure you want to delete this unit!",
                    icon: "error",
                    buttons: [true, "Delete"],
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location.href="{{url('/delete-unit/' )}}"+"/"+id;
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
