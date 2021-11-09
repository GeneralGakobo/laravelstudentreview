
@php

$id = $_POST['id'];
$row = \App\Models\school::where('id',$id)->first();
 
@endphp
<label for="">School</label>
    <input type="text" class="form-control" name="school_name" value="{{$row->school_name}}" />
</div>
    <div class="modal-footer">
      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
      <button class="btn btn-primary" onclick="edit({{$id}})" data-dismiss="modal">Edit</button>
    </div>
</div>
</div>
</form>