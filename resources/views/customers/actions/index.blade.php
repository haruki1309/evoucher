<a href="{{ url('customers/' . $id) }}" data-id="{{ $id }}" class="btn btn-info btn-circle btn-sm">
    <i class="fas fa-info-circle"></i>
</a>
<a href="{{ url('customers/' . $id . '/edit') }}" data-id="{{ $id }}" class="btn btn-success btn-circle btn-sm">
    <i class="fas fa-pen"></i>
</a>
<button id="delete-customers" data-id="{{ $id }}" class="delete btn btn-danger btn-circle btn-sm">
    <i class="fas fa-trash"></i>
</button>
