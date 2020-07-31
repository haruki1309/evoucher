<a href="{{ url('vouchers/' . $id) }}" data-id="{{ $id }}" class="btn btn-info btn-circle btn-sm">
    <i class="fas fa-info-circle"></i>
</a>
@if($status != 'sent')
<a href="{{ url('vouchers/' . $id . '/edit') }}" data-id="{{ $id }}" class="btn btn-success btn-circle btn-sm">
    <i class="fas fa-pen"></i>
</a>
<button id="delete-product" data-id="{{ $id }}" class="delete btn btn-danger btn-circle btn-sm">
    <i class="fas fa-trash"></i>
</button>
@endif
