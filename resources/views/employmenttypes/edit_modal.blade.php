
@php

$id = $_POST['id'];
$row = \App\Models\employmentType::where('id',$id)->first();
 
@endphp
<label for="">employmenttype</label>
    <input type="text" class="form-control" name="employment_type" value="{{$row->employment_type}}" />
</div>
    <div class="modal-footer">
      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
      <button class="btn btn-primary" onclick="edit({{$id}})" data-dismiss="modal">Edit</button>
    </div>
</div>
</div>
</form>