@php

$id = $_POST['id'];
$row = \App\Models\competencyScore::where('id',$id)->first();
 
@endphp

<label for="">score name</label>
<input type="text" class="form-control" name="score_name" value="{{$row->score_name}}" />
<br>
<br>   

<label for="">score value<label>
<input type="text" class="form-control" name="score_value" value="{{$row->score_value}}" />
<br>
    <div class="modal-footer">
      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
      <button class="btn btn-primary" onclick="edit({{$id}})" data-dismiss="modal">Update</button>
    </div>
</div>
</div>
</form>


<!-- @section('scripts')
<script type="text/javascript">

    console.log("Test");
     $.ajax({
                    type: "GET",
                    url: "{{ url('/get_competencies') }}",
                   
                    success: function(data)
                    {
                      console.log(data)
                    }
                });


</script>

@endsection -->