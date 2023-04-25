<form action="{{ route('personals.update', $item->id) }}" method="POST">
    @method('POST')
    {{ csrf_field() }}
 <div class="modal fade" id="editModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Edit Personal') }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" name="name" required value="{{$item->name}}">
  </div>
  <div class="mb-3">
    <label class="form-label">E-Mail</label>
    <input type="email" class="form-control" name="email" required value="{{$item->email}}">  
  </div>

  <div class="mb-3">
    <label class="form-label">Department</label>
  <select class="form-select form-select-sm" aria-label=".form-select-lg example" name="department">
  @foreach (\App\Models\Department::all() as $items)
  <option value="{{$items->name}}" {{$items->name == $item->department  ? 'selected' : ''}}>{{$items->name}}</option>
  @endforeach
</select>
  </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Edit</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</form>