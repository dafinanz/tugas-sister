<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="mahasiswas-table">
            <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($mahasiswas as $mahasiswa)
                <tr>
                    <td>{{ $mahasiswa->nim }}</td>
                    <td>{{ $mahasiswa->nama }}</td>
                    <td>{{ $mahasiswa->alamat }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['mahasiswas.destroy', $mahasiswa->nim], 'method' => 'delete']) !!}
                        <div class='btn-group'> 
                            <a href="{{ route('mahasiswas.edit', [$mahasiswa->nim]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $mahasiswas])
        </div>
    </div>
</div>
