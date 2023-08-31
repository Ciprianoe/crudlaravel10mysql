@extends('layout.base')

@section('content')
<div class="row">
@if (Session::has('success') || Session::has('warning'))
    <div class="alert {{ Session::has('success') ? 'alert-success' : 'alert-warning' }} mt-2">
        <strong>{{ Session::has('success') ? Session::get('success') : Session::get('warning') }}</strong>
    </div>
@endif

<div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <tr class="text-secondary">
                <th>Tarea</th>
                <th>Descripción</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
                @foreach($tasks as $task)
                <tr>
                <td class="fw-bold">{{$task->title}}</td>
                <td>{{$task->description}}</td>
                <td>
                {{$task->due_date}}
                </td>
                <td>
                    <span class="badge bg-warning fs-6">{{$task->status}}</span>
                </td>
                <td>
                <a href="{{ url('tasks/' . $task->id . '/edit') }}" class="btn btn-warning">Editar</a>

<form id="deleteForm" action="{{route('tasks.destroy',['task'=>$task])}}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" >Eliminar</button>
</form>
</td>
</tr>              
 @endforeach        
                
        </table>
        <div class="d-flex">
        {{$tasks->links()}}
        </div> 
        
    </div>
</div>
</div>
@endsection