@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Nueva Área</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'area.store']) !!}
            <div class="form-group">
                {!! Form::label('nombre', 'Nombre:') !!}
                {!! Form::text('nombre', null, [
                    'class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''),
                    'placeholder' => 'Ingrese el nombre...',
                ]) !!}
                @error('nombre')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('estado', 'Estado:') !!}
                {!! Form::select('estado', ['Activo' => 'Activo', 'Inactivo' => 'Inactivo'], null, [
                    'class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''),
                    'placeholder' => 'Seleccione el estado...',
                ]) !!}
                @error('estado')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('descripcion', 'Descripción:') !!}
                {!! Form::text('descripcion', null, [
                    'class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''),
                    'placeholder' => 'Ingrese la descripción...',
                ]) !!}
                @error('descripcion')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('tipo', 'Tipo:') !!}
                {!! Form::select('tipo', ['Area Deportiva' => 'Area Deportiva', 'Area Común' => 'Area Común'], null, [
                    'class' => 'form-control' . ($errors->has('tipo') ? ' is-invalid' : ''),
                    'placeholder' => 'Seleccione el tipo...',
                ]) !!}
                @error('tipo')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            {!! Form::submit('Crear Área', ['class' => 'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
