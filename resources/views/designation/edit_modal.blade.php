
@php

$id = $_POST['id'];
$row = \App\Models\designation::where('id',$id)->first();
 
@endphp
<label for="">Designation</label>
    <input type="text" class="form-control" name="designation_name" value="{{$row->designation_name}}" />
</div>
    <div class="modal-footer">
      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
      <button class="btn btn-primary" onclick="edit({{$id}})" data-dismiss="modal">Edit</button>
    </div>
</div>
</div>
</form>