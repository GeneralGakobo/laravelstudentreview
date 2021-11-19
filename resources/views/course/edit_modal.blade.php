@php

$id = $_POST['id'];
$row = \App\Models\course::where('id',$id)->first();
 
@endphp
<label for="">Department</label>
<select type="text" class="form-control" name="department_id" value="{{$row->department}}">
<option value="">-- Select departments --</option>

  @foreach($department as $key=>$value)
   @if($value->id == $row->department_id)
   <option selected value="{{$value->id}}">{{$value->department}}</option>

   @else
   <option value="{{$value->id}}">{{$value->department}}</option>

   @endif

  @endforeach

</select>
<br>   

<label for="">Course Code</label>
<input type="text" class="form-control" name="course_id" value="{{$row->course_id}}" />
<br>
<label for="">Course Name</label>
<input type="text" class="form-control" name="course_name" value="{{$row->course_name}}" />
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