@php

$id = $_POST['id'];
$row = \App\Models\semesterUnits::where('id',$id)->first();
 
@endphp
<label for="">Ref Id</label>
<input type="text" class="form-control" name="reference_id" value="{{$row->reference_id}}" />
<br>
<label for="">Unit Name</label>
<select type="text" class="form-control" name="unit_id" value="{{$row->unit_name}}">
<option value="">-- Select Unit Name --</option>

  @foreach($semesterUnits as $key=>$value)
   @if($value->id == $row->unit_id)
   <option selected value="{{$value->id}}">{{$value->unit_name}}</option>

   @else
   <option value="{{$value->id}}">{{$value->unit_name}}</option>

   @endif

  @endforeach

</select>
<br>   

<label for="">Unit Group</label>
<input type="text" class="form-control" name="group" value="{{$row->group}}" />
<br>
<label for="">offered By</label>
<select type="text" class="form-control" name="lecturer_id" value="{{$row->first_name}}">
<option value="">-- Select unit lecturer --</option>

  @foreach($lecturer as $key=>$value)
   @if($value->id == $row->unit_id)
   <option selected value="{{$value->id}}">{{$value->first_name}}</option>

   @else
   <option value="{{$value->id}}">{{$value->first_name}}</option>

   @endif

  @endforeach

</select>
<br>  
<label for="">Semester</label>
<select type="text" class="form-control" name="semester_id" value="{{$row->semester_name}}">
<option value="">-- Select semester --</option>

  @foreach($semester as $key=>$value)
   @if($value->id == $row->unit_id)
   <option selected value="{{$value->id}}">{{$value->semester_name}}</option>

   @else
   <option value="{{$value->id}}">{{$value->semester_name}}</option>

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