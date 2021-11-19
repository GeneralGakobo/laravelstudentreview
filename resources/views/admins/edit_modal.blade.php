@php

$id = $_POST['id'];
$row = \App\Models\admins::where('id',$id)->first();
 
@endphp
<label for="">Name</label>
<input type="text" class="form-control" name="name" value="{{$row->name}}" />
<br>
<label for="">Email</label>
<input type="text" class="form-control" name="email" value="{{$row->email}}" />
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