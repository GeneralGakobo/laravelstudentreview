
@php

$id = $_POST['id'];
$row = \App\Models\staffCategory::where('id',$id)->first();
 
@endphp
<label for="">staff category</label>
    <input type="text" class="form-control" name="staff_category" value="{{$row->staff_category}}" />
</div>
    <div class="modal-footer">
      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
      <button class="btn btn-primary" onclick="edit({{$id}})" data-dismiss="modal">Edit</button>
    </div>
</div>
</div>
</form>