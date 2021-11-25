@extends('layouts.app')
@section('title', 'Assessment')
@section('page-title', 'Assessment')

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
            <h6 class="m-0 font-weight-bold text-primary">assess</h6>  </div>

            <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="semester_units_id" value="{{$id}}">
                <?php
                    $auth = Auth::user();
                    $user_email = $auth->email;
                    $student_details = DB::table('students')->select('students.*')->where('email','=',$user_email)->get();
                    foreach($student_details as $key => $value){
                        $student_id = $value->id;
                        //echo $student_id;
                    }
                ?>
                <input type="hidden" name="student_id" value="{{$student_id}}">
                <table class="table table-bordered">
               <tr>
                   <thead>
                       <th>Competency</th>
                       <th>Scores</th>
                   </thead>
               </tr>
            <?php
                foreach($competencies as $key => $value){
                    $plus = 0;
                    $competency_id = $value->id;

                    ?>
                    <input type="hidden" name="competency_id" value="{{$competency_id}}">
                              
               <tbody>
                   <tr>
                       <td>{{$value->competency_name}}</td>
                       <td><?php
                            foreach($competencyscores as $key => $value){
                                
                                   
                                
                            }
                       ?></td>
                   </tr>
               </tbody>
          
           <?php } ?>
           </table>
            </form>


</div>
</div>
</div>
</div>

</script>

<script src= {{ asset("vendor/datatables/jquery.dataTables.min.js")}}></script>
<script src={{ asset("vendor/datatables/dataTables.bootstrap4.min.js")}}></script>
<script src={{ asset("vendor/jquery/jquery.min.js")}}></script>

        

@endsection
