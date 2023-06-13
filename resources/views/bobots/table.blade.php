<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="bobots-table">
            <thead>
            <tr>
                <th>Nilai</th>
                <th>Attribut</th>
                <th>Is Benefit</th>
                <th>Kategori</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($bobots as $bobot)
                <tr>
                    <td>{{ $bobot->nilai }}</td>
                    <td>{{ $bobot->attribut }}</td>
                    <td>{{ $bobot->is_benefit }}</td>
                    <td>{{ $bobot->kategori }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['bobots.destroy', $bobot->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('bobots.show', [$bobot->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('bobots.edit', [$bobot->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $bobots])
        </div>
    </div>
</div>
