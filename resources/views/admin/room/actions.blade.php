<div class="d-flex order-actions">
    <a href="{{ route('admin.room.edit', $model) }}" class="ms-2 btn btn-sm btn-info">Edytuj</a>
    <a href="{{ route('admin.room.destroy', $model) }}" class="ms-2 btn btn-sm btn-danger" id="delete"
        data-table="room-table">Usuń</a>
    <a href="{{ route('admin.room.show', $model) }}" class="ms-2 btn btn-sm btn-warning"
        data-table="room-table">Pokaż</a>
</div>
