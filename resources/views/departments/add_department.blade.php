@extends('layouts.app')
@section('title', 'Add Department')
@section('page-title', 'Add Department')

@section('content')
@if(Session::has('success'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{{ Session::get('success') }}</strong>
  <button type="button" style="float:right;" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<a href="/departments"><button class="btn btn-primary btn-small">VIEW</button></a>
    <!-- Begin Page Content -->
<div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        {{-- <h1 class="h3 mb-0 text-gray-800">Sms Stats</h1> --}}
    </div>
<div class="row">
    <div class="card shadow col-md-12">
            <div class="card-body">
                <form method="POST" action="/add-department">
                    @csrf
                <div class="form-group">  
                <div class="set_wrap row">
                 
                    </div>
                <div>
                    <button class="add_btn btn btn-warning" >Click to add</button>
                </div>
                </div>
                
                <input type="submit" class="btn btn-primary" value="submit" />

                </form>
         </div>
     </div>
</div>

 </div>
@endsection
@section('scripts')

<script type="text/javascript">
   

    $(document).ready(function() {
        var max_fields      = 100; //maximum input boxes allowed
        var wrapper         = $(".set_wrap"); //Fields wrapper
        var add_button      = $(".add_btn"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div class="col-md-4" style="padding-top:10px;padding-bottom:10px" >' +
                '<label> School</label><select class="form-control" name="adjArr[]" placeholder="Select School" /><br>@foreach($school as $value) <option value="{{$value->id}}">{{$value->school_name}}</option>@endforeach</select>  ' +
                    '<label> Department</label><input type="text"  class="form-control"  placeholder="Enter value" name="acjArr[]"  /><br> ' +
                    '<a href="#"  class="btn btn-danger remove_option">Remove</a></div>'); //add input box

            }

        });

        $(wrapper).on("click",".remove_option", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove();
            x--;
        })
    });
</script>
    
    
@endsection
