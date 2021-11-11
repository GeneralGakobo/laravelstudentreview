
@php

$id = $_POST['id'];
$row = \App\Models\competenciesGroups::where('id',$id)->first();
 
@endphp
<label for="">competency group</label>
    <input type="text" class="form-control" name="competency_group" value="{{$row->competency_group}}" />
</div>
    <div class="modal-footer">
      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
      <button class="btn btn-primary" onclick="edit({{$id}})" data-dismiss="modal">Edit</button>
    </div>
</div>
</div>
</form>