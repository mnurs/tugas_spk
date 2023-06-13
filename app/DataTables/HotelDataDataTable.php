<?php

namespace App\DataTables;

use App\Models\HotelData;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;

class HotelDataDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $dataTable = new EloquentDataTable($query);
        return $dataTable->addColumn('action', 'hotel_datas.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\HotelDatum $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(HotelData $model): QueryBuilder
    {
        $data = HotelData::
                select('hotel_data.id','hotel.nama as hotel_nama', 'wisata.nama as wisata_nama','hotel_data.harga','hotel_data.fasilitas','hotel_data.kelas','hotel_data.jarak')->
                leftjoin('hotel', 'hotel.id', 'hotel_data.id_hotel')->
                leftjoin('wisata', 'wisata.id', 'hotel.id_wisata');

        return $this->applyScopes($data);  
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('hoteldata-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    // ->buttons([
                    //     Button::make('excel'),
                    //     Button::make('csv'),
                    //     Button::make('pdf'),
                    //     Button::make('print'),
                    //     Button::make('reset'),
                    //     Button::make('reload')
                    // ])
                    ;
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            'wisata' => ['name' => 'wisata.nama', 'data' => 'wisata_nama', 'title' => 'Wisata'],
            'hotel' => ['name' => 'hotel.nama', 'data' => 'hotel_nama', 'title' => 'Hotel'],
            'harga' => ['name' => 'hotel_data.harga', 'data' => 'harga', 'title' => 'Harga'],
            'fasilitas' => ['name' => 'hotel_data.fasilitas', 'data' => 'fasilitas', 'title' => 'Fasilitas'],
            'kelas' => ['name' => 'hotel_data.kelas', 'data' => 'kelas', 'title' => 'Kelas'],
            'jarak' => ['name' => 'hotel_data.jarak', 'data' => 'jarak', 'title' => 'Jarak'], 
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'HotelData_' . date('YmdHis');
    }
}
