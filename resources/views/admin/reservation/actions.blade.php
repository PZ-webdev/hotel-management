<div class="d-flex order-actions">
    <a href="{{ route('admin.reservation.edit', $model) }}" class="ms-2 btn btn-sm btn-info">Edytuj</a>
    <a href="{{ route('admin.reservation.destroy', $model) }}" class="ms-2 btn btn-sm btn-danger" id="delete"
        data-table="reservation-table">Usuń</a>
    <a href="{{ route('admin.reservation.show', $model) }}" class="ms-2 btn btn-sm btn-warning"
        data-table="reservation-table">Pokaż</a>
</div>
