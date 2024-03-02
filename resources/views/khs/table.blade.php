<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="khs-table">
            <thead>
            <tr>
                <th>Kode</th>
                <th>Nilai</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($khs as $khs)
                <tr>
                    <td>{{ $khs->kode }}</td>
                    <td>{{ $khs->nilai }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['khs.destroy', $khs->nim,kode], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('khs.show', [$khs->nim,kode]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('khs.edit', [$khs->nim,kode]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $khs])
        </div>
    </div>
</div>
