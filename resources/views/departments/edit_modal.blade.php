@php

$id = $_POST['id'];
$row = \App\Models\Department::where('id',$id)->first();
 
@endphp
<label for="">School</label>
<select type="text" class="form-control" name="school_id" value="{{$row->school_name}}">
<option value="">-- Select School --</option>

  @foreach($school as $key=>$value)
   @if($value->id == $row->school_id)
   <option selected value="{{$value->id}}">{{$value->school_name}}</option>

   @else
   <option value="{{$value->id}}">{{$value->school_name}}</option>

   @endif

  @endforeach

</select>
<br>   
<label for="">Department</label>
<input type="text" class="form-control" name="department" value="{{$row->department}}" />
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