@php

$id = $_POST['id'];
$row = \App\Models\competency::where('id',$id)->first();
 
@endphp
<label for="">Competency Group</label>
<select type="text" class="form-control" name="competency_group_id" value="{{$row->competency_group}}">
<option value="">-- Select Competency Grooup --</option>

  @foreach($competenciesGroups as $key=>$value)
   @if($value->id == $row->competency_group_id)
   <option selected value="{{$value->id}}">{{$value->competency_group}}</option>

   @else
   <option value="{{$value->id}}">{{$value->competency_group}}</option>

   @endif

  @endforeach

</select>
<br>   

<label for="">Competency Name</label>
<input type="text" class="form-control" name="competency_name" value="{{$row->competency_name}}" />
<br>
</div>
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