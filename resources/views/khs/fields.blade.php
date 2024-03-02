<!-- Kode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nim', 'Mahasiswa:') !!} 
    <select name="nim" class="form-control" @if(isset($khs->nim)) disabled @endif>
        @foreach($mhs as $mahasiswa)
            <option value="{{$mahasiswa->nim}}" @if(isset($khs->nim)) @if($mahasiswa->nim == $khs->nim) selected @endif @endif>{{$mahasiswa->nim}} - {{$mahasiswa->nama}}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('kode', 'Mata Kuliah:') !!} 
    <select name="kode" class="form-control" @if(isset($khs->kode)) disabled @endif>
        @foreach($matkul as $matakuliah)
            <option value="{{$matakuliah->kode}}" @if(isset($khs->kode)) @if($matakuliah->kode == $khs->kode) selected @endif @endif>{{$matakuliah->kode}} - {{$matakuliah->nama}}</option>
        @endforeach
    </select>
</div>

<!-- Nilai Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nilai', 'Nilai:') !!}
    {!! Form::number('nilai', null, ['class' => 'form-control', 'required']) !!}
</div>