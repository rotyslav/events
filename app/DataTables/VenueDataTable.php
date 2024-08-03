<?php

namespace App\DataTables;

use App\Models\Venue;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class VenueDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param  QueryBuilder  $query  Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->setRowId('id')
            ->addColumn('update', function (Venue $venue) {
                return '<a href='.route('venue.edit', ['id' => $venue->id]).'>Edit</a>';
            })->addColumn('more', function (Venue $venue) {
                return '<a href='.route("venue.show", ['id' => $venue->id]).'> Details</a>';
            })
            ->rawColumns(['update', 'more']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Venue $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('venue-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->selectStyleSingle();
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('name'),
            Column::make('update')->orderable(false),
            Column::make('more')->orderable(false),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Venue_'.date('YmdHis');
    }
}
