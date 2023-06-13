<?php

namespace App\DataTables;

use App\Models\WisataKandidat;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;

class WisataKandidatDataTable extends DataTable
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
        return $dataTable->addColumn('action', 'wisata_kandidats.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\WisataKandidat $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(WisataKandidat $model): QueryBuilder
    {
        $data = WisataKandidat::
                select('wisata_kandidat.id','wisata_kandidat.fasilitas','wisata_kandidat.aksesibilitas','wisata_kandidat.biaya','wisata_kandidat.aktifitas','wisata_kandidat.kunjungan', 'wisata.nama as wisata_nama')->
                leftjoin('wisata', 'wisata.id', 'wisata_kandidat.id_wisata');
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
                    ->setTableId('wisatakandidat-table')
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
           'fasilitas' => ['name' => 'wisata_kandidat.fasilitas', 'data' => 'fasilitas', 'title' => 'Fasilitas'],
           'aksesibilitas' => ['name' => 'wisata_kandidat.aksesibilitas', 'data' => 'aksesibilitas', 'title' => 'Aksesibilitas'],
           'biaya' => ['name' => 'wisata_kandidat.biaya', 'data' => 'biaya', 'title' => 'Biaya'],
           'aktifitas' => ['name' => 'wisata_kandidat.aktifitas', 'data' => 'aktifitas', 'title' => 'Aktifitas'],
           'kunjungan' => ['name' => 'wisata_kandidat.kunjungan', 'data' => 'kunjungan', 'title' => 'Kunjungan'],
            
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
        return 'WisataKandidat_' . date('YmdHis');
    }
}
