@php

$id = $_POST['id'];
$row = \App\Models\lecturer::where('id',$id)->first();
 
@endphp
<label for="">first_name</label>
<input type="text" class="form-control" name="first_name" value="{{$row->first_name}}" />
<br>
<label for="">last_name</label>
<input type="text" class="form-control" name="last_name" value="{{$row->last_name}}" />
<br>
<label for="">Reference_no</label>
<input type="text" class="form-control" name="reference_no" value="{{$row->reference_no}}" />
<br>
<label for="">email</label>
<input type="text" class="form-control" name="email" value="{{$row->email}}" />
<br>
<label for="">Designation</label>
<select type="text" class="form-control" name="id" value="{{$row->designation_name}}">
<option value="">-- select designation --</option>

  @foreach($designation as $key=>$value)
   @if($value->id == $row->designation_name)
   <option selected value="{{$value->id}}">{{$value->designation_name}}</option>

   @else
   <option value="{{$value->id}}">{{$value->designation_name}}</option>

   @endif

  @endforeach

</select>
<br>
<label for="">Department</label> 
<select type="text" class="form-control" name="department_id" value="{{$row->department}}">
<option value="">-- select department --</option>

  @foreach($Department as $key=>$value)
   @if($value->id == $row->department_id)
   <option selected value="{{$value->id}}">{{$value->department}}</option>

   @else
   <option value="{{$value->id}}">{{$value->department}}</option>

   @endif

  @endforeach

</select>
<br> 
<label for="">mobile</label>
<input type="text" class="form-control" name="mobile" value="{{$row->mobile}}" />
<br>
<label for="">employment</label>
<select type="text" class="form-control" name="employment_type_id" value="{{$row->employment_type}}">
<option value="">-- select employmentType --</option>

  @foreach($employmentType as $key=>$value)
   @if($value->id == $row->employment_type_id)
   <option selected value="{{$value->id}}">{{$value->employment_type}}</option>

   @else
   <option value="{{$value->id}}">{{$value->employment_type}}</option>

   @endif

  @endforeach

</select>
<br> 
<label for="">staff category</label>
<select type="text" class="form-control" name="staff_category_id" value="{{$row->staff_category}}">
<option value="">-- select staff_category --</option>

  @foreach($staffCategory as $key=>$value)
   @if($value->id == $row->staff_category_id)
   <option selected value="{{$value->id}}">{{$value->staff_category}}</option>

   @else
   <option value="{{$value->id}}">{{$value->staff_category}}</option>

   @endif

  @endforeach

</select>
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