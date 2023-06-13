<?php

namespace App\DataTables;

use App\Models\HotelKandidat;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;

class HotelKandidatDataTable extends DataTable
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
        return $dataTable->addColumn('action', 'hotel_kandidats.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\HotelKandidat $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(HotelKandidat $model): QueryBuilder
    {
         $data = HotelKandidat::
                select('hotel_kandidat.id','hotel.nama as hotel_nama', 'wisata.nama as wisata_nama','hotel_kandidat.harga','hotel_kandidat.fasilitas','hotel_kandidat.kelas','hotel_kandidat.jarak')->
                leftjoin('hotel', 'hotel.id', 'hotel_kandidat.id_hotel')->
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
                    ->setTableId('hotelkandidat-table')
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
            'harga' => ['name' => 'hotel_kandidat.harga', 'data' => 'harga', 'title' => 'Harga'],
            'fasilitas' => ['name' => 'hotel_kandidat.fasilitas', 'data' => 'fasilitas', 'title' => 'Fasilitas'],
            'kelas' => ['name' => 'hotel_kandidat.kelas', 'data' => 'kelas', 'title' => 'Kelas'],
            'jarak' => ['name' => 'hotel_kandidat.jarak', 'data' => 'jarak', 'title' => 'Jarak'], 
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
        return 'HotelKandidat_' . date('YmdHis');
    }
}
