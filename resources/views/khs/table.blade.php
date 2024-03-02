<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="khs-table">
            <thead>
            <tr> 
                <th>Nama</th> 
                <th>Matkul</th>
                <th>Nilai</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($khs as $khss)
                <tr>
                    <td>[{{ $khss->nim }}] {{ $khss->nimMHS->nama }}</td> 
                    <td>[{{ $khss->kode }}] {{ $khss->kodeMHS->nama }}</td> 
                    <td>{{ $khss->nilai }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['url' => ['khs/hapus/'.$khss->nim.'/'.$khss->kode], 'method' => 'delete']) !!}
                        <div class='btn-group'> 
                            <a href="{{ url('khs/ubah/'.$khss->nim.'/'.$khss->kode) }}"
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
