@php

$id = $_POST['id'];
$row = \App\Models\student::where('id',$id)->first();
 
@endphp
<label for="">first_name</label>
<input type="text" class="form-control" name="first_name" value="{{$row->first_name}}" />
<br>
<label for="">last_name</label>
<input type="text" class="form-control" name="last_name" value="{{$row->last_name}}" />
<br>
<label for="">Reg_no</label>
<input type="text" class="form-control" name="reg_no" value="{{$row->reg_no}}" />
<br>
<label for="">email</label>
<input type="text" class="form-control" name="email" value="{{$row->email}}" />
<br>
<label for="">gender</label>
<input type="text" class="form-control" name="gender" value="{{$row->gender}}" />
<br>
<label for="">mobile</label>
<input type="text" class="form-control" name="mobile" value="{{$row->mobile}}" /><br>
<label for="">image</label>
<input type="text" class="form-control" name="image" value="{{$row->image}}" />
<label for="">student</label>
<br>
<select type="text" class="form-control" name="course_id" value="{{$row->course_name}}">
<option value="">-- select course --</option>

  @foreach($course as $key=>$value)
   @if($value->id == $row->course_id)
   <option selected value="{{$value->id}}">{{$value->course_name}}</option>

   @else
   <option value="{{$value->id}}">{{$value->course_name}}</option>

   @endif

  @endforeach

</select>
<br>   
<label for="">study_year</label>
<input type="text" class="form-control" name="study_year" value="{{$row->study_year}}" />
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