<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="wisata-datas-table">
            <thead>
            <tr>
                <th>Id Wisata</th>
                <th>Fasilitas</th>
                <th>Aksesibilitas</th>
                <th>Biaya</th>
                <th>Aktifitas</th>
                <th>Kunjungan</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($wisataDatas as $wisataData)
                <tr>
                    <td>{{ $wisataData->id_wisata }}</td>
                    <td>{{ $wisataData->fasilitas }}</td>
                    <td>{{ $wisataData->aksesibilitas }}</td>
                    <td>{{ $wisataData->biaya }}</td>
                    <td>{{ $wisataData->aktifitas }}</td>
                    <td>{{ $wisataData->kunjungan }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['wisataDatas.destroy', $wisataData->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('wisataDatas.show', [$wisataData->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('wisataDatas.edit', [$wisataData->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $wisataDatas])
        </div>
    </div>
</div>
