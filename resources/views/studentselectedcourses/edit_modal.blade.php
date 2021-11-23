@php

$id = $_POST['id'];
$row = \App\Models\studentSelectedCourse::where('id',$id)->first();
 
@endphp
<label for="">semester</label>
<select type="text" class="form-control" name="semester_id" value="{{$row->semester_name}}">
<option value="">-- Select semester --</option>

  @foreach($semester as $key=>$value)
   @if($value->id == $row->semester_id)
   <option selected value="{{$value->id}}">{{$value->semester_name}}</option>

   @else
   <option value="{{$value->id}}">{{$value->semester_name}}</option>

   @endif

  @endforeach

</select>
<br>   
<label for="">semester unit</label>
<select type="text" class="form-control" name="semester_units_id" value="{{$row->unit_id}}">
<option value="">-- Select semester unit --</option>

  @foreach($semesterUnits as $key=>$value)
   @if($value->id == $row->semester_units_id)
   <option selected value="{{$value->id}}">{{$value->unit_id}}</option>

   @else
   <option value="{{$value->id}}">{{$value->unit_id}}</option>

   @endif

  @endforeach

</select>
<br> 
<label for="">student</label>
<select type="text" class="form-control" name="student_id" value="{{$row->first_name}}">
<option value="">-- Select student --</option>

  @foreach($student as $key=>$value)
   @if($value->id == $row->student_id)
   <option selected value="{{$value->id}}">{{$value->first_name}}</option>

   @else
   <option value="{{$value->id}}">{{$value->first_name}}</option>

   @endif

  @endforeach

</select>
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