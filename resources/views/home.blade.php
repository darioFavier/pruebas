@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}
                    @if (session('status'))                  

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif
                </div>

                <div class="card-body">
               <div class="row">
                   <div class="col-md-4">
<div class="card">
    <div class="card-header"> 
        Nueva tarea
    </div>
<div class="card-body">    
<form id="myFormCreateTask" method="POST" action="{{route('tasks.store')}}">
        @csrf
        <div class="form-group">
            <label for="exampleInputPassword1">Nombre de la tarea</label>
            <input type="text" class="form-control" name="name">
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-block btn-sm btn-primary">Guardar</button>
        </div>


    </form>
</div>
</div>

                   </div>
                   <div class="col-md-8">
                    <table class="table">
                        <thead>
                            <th>Nombre de la tarea</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                            @forelse (auth()->user()->tasks as $task)
                                <tr>
                                    <td>
                                        {{$task->name}}
                                    </td>
                                    <td>
                                    <a href="{{route('tasks.edit',$task->id)}}" class="btn btn-primary btn-sm">
                                            Editar
                                        </a>
                                    <a href="{{route('tasks.destroy',$task->id)}}" class="btn btn-danger btn-sm" onclick="return deleteTask()">
                                            Eliminar
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                
                            @endforelse
                        </tbody>
                    </table>
                   </div>
               </div>
                     
                   
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function deleteTask(params)  {
        let msg = confirm("¿Desea eliminar el registro?");
        if(msg){
            return true;
        }
        return false;     
    }
</script>
@endsection
