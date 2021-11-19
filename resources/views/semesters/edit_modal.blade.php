@php

$id = $_POST['id'];
$row = \App\Models\semester::where('id',$id)->first();
 
@endphp

<label for="">Semester Name</label>
<input type="text" class="form-control" name="semester_name" value="{{$row->semester_name}}" />
<br>
<br>   

<label for="">Date From<label>
<input type="text" class="form-control" name="date_from" value="{{$row->date_from}}" />
<br>
<label for="">Date to</label>
<input type="text" class="form-control" name="date_to" value="{{$row->date_to}}" />
</div>

<label for="">Academic Year</label>
<input type="text" class="form-control" name="academic_year" value="{{$row->academic_year}}" />
<br>

<label for="">Is active</label>
<input type="text" class="form-control" name="is_active" value="{{$row->is_active}}" />
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