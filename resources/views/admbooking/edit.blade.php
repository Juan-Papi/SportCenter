@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Reserva</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($reserva, ['route' => ['booking.update', $reserva], 'method' => 'put']) !!}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('fecha', 'Fecha:') !!}
                        {!! Form::date('fecha', null, [
                            'class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''),
                        ]) !!}
                        @error('fecha')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! Form::label('fecha_reserva', 'Fecha de Reserva:') !!}
                        {!! Form::date('fecha_reserva', null, [
                            'class' => 'form-control' . ($errors->has('fecha_reserva') ? ' is-invalid' : ''),
                        ]) !!}
                        @error('fecha_reserva')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! Form::label('hora_inicio', 'Hora de Inicio:') !!}
                        {!! Form::time('hora_inicio', null, [
                            'class' => 'form-control' . ($errors->has('hora_inicio') ? ' is-invalid' : ''),
                        ]) !!}
                        @error('hora_inicio')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! Form::label('hora_fin', 'Hora de Fin:') !!}
                        {!! Form::time('hora_fin', null, [
                            'class' => 'form-control' . ($errors->has('hora_fin') ? ' is-invalid' : ''),
                        ]) !!}
                        @error('hora_fin')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! Form::label('estado', 'Estado:') !!}
                        {!! Form::select(
                            'estado',
                            ['SOLICITADO' => 'Solicitado', 'FINALIZADO' => 'Finalizado', 'APROBADO' => 'Aprobado'],
                            'SOLICITADO',
                            [
                                'class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''),
                                'placeholder' => 'Seleccione el estado...',
                            ],
                        ) !!}
                        @error('estado')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('user_id', 'Usuario:') !!}
                        {!! Form::select('user_id', $users->pluck('email', 'id'), null, [
                            'class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''),
                            'placeholder' => 'Seleccione el usuario...',
                        ]) !!}
                        @error('user_id')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! Form::label('cliente_id', 'Cliente:') !!}
                        {!! Form::select('cliente_id', $clientes->pluck('nombre', 'id'), null, [
                            'class' => 'form-control' . ($errors->has('cliente_id') ? ' is-invalid' : ''),
                            'placeholder' => 'Seleccione el cliente...',
                        ]) !!}
                        @error('cliente_id')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! Form::label('area_id', 'Área:') !!}
                        {!! Form::select('area_id', $areas->pluck('nombre', 'id'), null, [
                            'class' => 'form-control' . ($errors->has('area_id') ? ' is-invalid' : ''),
                            'placeholder' => 'Seleccione el área...',
                        ]) !!}
                        @error('area_id')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-12">
                {!! Form::submit('Actualizar Reserva', ['class' => 'btn btn-primary mt-2']) !!}
            </div>
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
