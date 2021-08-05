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
                        Editar tarea
                    </div>
                    <div class="card-body">    
                    <form id="myFormEditTask" method="POST" action="{{route('tasks.update',$task->id)}}">
                        @method('put')
                        @csrf
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nombre de la tarea</label>
                            <input type="text" class="form-control" name="name" value="{{$task->name}}">
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-sm btn-primary">Actualizar</button>
                            </div>


                        </form>
                    </div>
                </div>

                   </div>
              
               </div>
                     
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
