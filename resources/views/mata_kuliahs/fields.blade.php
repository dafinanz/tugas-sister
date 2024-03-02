<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Sks Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sks', 'Sks:') !!}
    {!! Form::number('sks', null, ['class' => 'form-control', 'required']) !!}
</div>