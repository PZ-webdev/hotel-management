<?php

namespace App\DataTables;

use App\Models\Reservation;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ReservationDataTable extends DataTable
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
            ->addColumn('id_room', function ($model) {
                return $model->rooms->name;
            })
            ->addColumn('name', function ($model) {
                return $model->first_name . ' ' . $model->last_name;
            })
            ->addColumn('count_days', function ($model) {
                return $model->dateDiffInDays($model->date_start, $model->date_end);
            })
            ->addColumn('verified_at', function ($model) {
                return $model->verified_at != null ? "Tak" : "Nie";
            })
            ->addColumn('action', 'admin.reservation.actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Reservation $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Reservation $model)
    {
        return Reservation::with('rooms')
            ->select('id', 'id_room','first_name', 'last_name', 'date_start', 'date_end', 'verified_at')
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
            ->setTableId('reservation-table')
            ->columns($this->getColumns())
            ->buttons(["csv", "excel", "pdf", "print"])
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1);
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
            Column::make('id_room')->title('Pokój'),
            Column::make('name')->title('Klient'),
            Column::make('date_start')->title('Od'),
            Column::make('date_end')->title('Do'),
            Column::make('count_days')->title('Liczba dni'),
            Column::make('verified_at')->title('Potwierdzono'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center')
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
    //     return 'Reservation_' . date('YmdHis');
    // }
}
