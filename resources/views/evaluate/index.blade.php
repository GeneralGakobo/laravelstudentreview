@extends('layouts.app')
@section('title', 'Evaluation')
@section('page-title', 'Evaluation')

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
            <h6 class="m-0 font-weight-bold text-primary">Evaluation</h6>  </div>

            <div class="card-body">
            <div class="table-responsive">
                <a href="#"><button class="btn btn-primary">ADD</button></a>
                <table class="table table-bordered school" id="dataTable"  cellspacing="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>semester Name</th>  
                            <th>units</th>     
                            <th>lecturer</th>   
                            <th>Button</th>  
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($studentunits as $key => $value)
                            <tr id="row_{{$value->id}}">

                                 <td>{{$value->id}}</td> 
                                 <td><?php $n_id =$value->id; $semester = DB::table('semesters')->select('semesters.*')->where('id','=',$value->semester_id)->first(); echo $semester->semester_name;  ?>
                                </td> 
                          
                                
                                 <td><?php  $semester_units = DB::table('semester_units')->select('semester_units.*')->where('id','=',$value->semester_units_id)->first(); $unit_id =$semester_units->unit_id ; $lec_id = $semester_units->lecturer_id;
                                 $unit = DB::table('units')->select('units.*')->where('id','=',$unit_id)->first(); echo $unit->unit_name; ?>
                                </td> 
                           
                                
                                 <td><?php  $lecturer = DB::table('lecturers')->select('lecturers.*')->where('id','=',$lec_id)->first(); echo $lecturer->first_name.' '.$lecturer->last_name;  ?>
                                </td> 
                                <td><button class="btn btn-primary"><a style="color:#ffffff" href="/assess/{{$n_id}}">Assess</a></button></td>
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
            
        
        function showDialog(id) {          
                    var data =$("form").serialize();
               console.log(id);
               var url =   "#";
             //  var data = "id="+id;

               $("#myModalLabel").html("#");
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
            var url =   "{{ url('#') }}";
        
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
                    text: "Are you sure you want to delete this competency!",
                    icon: "error",
                    buttons: [true, "Delete"],
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location.href="{{url('/delete-competency/' )}}"+"/"+id;
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
