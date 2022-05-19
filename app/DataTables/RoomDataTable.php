<?php

namespace App\DataTables;

use App\Models\Room;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class RoomDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('is_empty', fn ($model) => ($model->is_empty) ? 'Tak' : 'Nie')
            ->addColumn('created_at', function ($model) {
                return $model->created_at->diffForHumans();
            })
            ->addColumn('room_fee', function ($model) {
                return floatval($model->room_fee) . ' zł';
            })
            ->addColumn('action', 'admin.room.actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Room $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Room $model)
    {
        return Room::select('id', 'name', 'is_empty', 'room_fee', 'image', 'created_at')
            ->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('room-table')
            ->columns($this->getColumns())
            ->buttons(["csv", "excel", "pdf", "print"])
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1, 'asc');
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id')->title('ID'),
            Column::make('name')->title('Nazwa'),
            Column::make('is_empty')->title('Zajęty'),
            Column::make('room_fee')->title('Cena'),
            Column::make('created_at')->title('Dodano'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->title('Akcja'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    // protected function filename()
    // {
    //     return 'Room_' . date('YmdHis');
    // }
}
