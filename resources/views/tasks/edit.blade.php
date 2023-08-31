@extends('layout.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2>Editar Tarea</h2>
        </div>
        <div>
            <a href="{{route('tasks.index')}}" class="btn btn-primary">Volver</a>
        </div>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Error!!!!!</strong> Algo no esta bien..<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('tasks.update',['task'=>$task])}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Tarea:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Tarea" value="{{$task->title}}" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Descripción:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Descripción...">{{$task->description}}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Fecha límite:</strong>
                    <input type="date" name="due_date" class="form-control"  value={{$task->due_date}} id="">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Estado (inicial):</strong>
                    <select name="status" class="form-select" id="">
                        <option value="Pendiente" @if(old('status') == 'Pendiente' || $task->status == 'Pendiente') selected @endif>Pendiente</option>
                        <option value="En progreso" @if(old('status') == 'En progreso' ||  $task->status == 'En progreso')selected @endif>En progreso</option>
                        <option value="Completada" @if(old('status') == 'Completada'||  $task->status == 'Completada')selected @endif> Completada</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </form>
</div>
@endsection