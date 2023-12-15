@extends('layouts.app')

@section('title', 'home')

@section('content')

@if(session("correcto"))
    <div class="alert alert-success">{{session("correcto")}}</div>

@endif


@if(session("Incorrecto"))
    <div class="alert alert-danger">{{session("Incorrecto")}}</div>
@endif

<script>
  var res=function(){
    var not=confirm("Estas seguro que deseas eliminar");
    return not;
  }
   
</script>


 <!-- Modal REGISTRO datos-->
 <div class="modal fade" id="ModalRegistro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar datos</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
            <form action="{{route('crud.create')}}" method="post">
                @csrf
               
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Titulo</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txttitulo">
                <div class="mb-3">

                <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Descripcion</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtdescripcion">
                 <div class="mb-3">

                    <div class="mb-3">
                        <label for="disabledSelect" class="form-label">Selecione el Estado</label>
                        <select id="disabledSelect" class="form-select" name="txtmenu">
                          <option>por hacer</option>
                          <option>progreso</option>
                          <option>completada</option>
                        </select>
                      </div>
                      
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Fecha Inicio</label>
                        <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtfechainicio">
                         <div class="mb-3">

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Fecha Fin</label>
                                <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtfechafin">
                                 <div class="mb-3">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
              </form>
        </div>
    </div>
    </div>
</div>




@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/dd52354806.js" crossorigin="anonymous"></script>
</head>
<body>
            
        <div class="p-5 table-responsive">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalRegistro" class="btn btn-warning btn-sm" >Añadir Titulo</button>
            <table class="table  table-striped table-bordered">
                <thead>
                  <tr>
                   
                    <th scope="col">TITULO</th>
                    <th scope="col">DESCRIPCION</th>
                    <th scope="col">ESTADO</th>
                    <th scope="col">FECHA_INICIO</th>
                    <th scope="col">FECHA_FIN</th>
                    <th>DIAS_POR_HACER</th>
                    <th>FINALIZO_TAREA</th>
                    <th>EDIDAR</th>
                    <th>ELIMINAR</th>
                    
                  </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach($datos as $item)
                    
                  <tr>
                   
                    <th>{{$item->titulo}}</th>
                    <td>{{$item->descripcion}}</td>
                    <td>{{$item->estado}}</td>
                    <td>{{$item->fecha_inicio}}</td>
                    <td>{{$item->fecha_fin}}</td>
                    <td>{{ $item->diasFaltantes}}</td>
                    <td>{{ $item->diasFaltantes2}}</td>
                    <td><a href="" data-bs-toggle="modal" data-bs-target="#ModalEditar{{$item->ID}}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a></td>
                    <td><a href="{{route('crud.delete',$item->ID)}}" onclick="return res()" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a></td>
                   
                    
             
                   

                            <!-- Modal modificarod datos-->
                            <div class="modal fade" id="ModalEditar{{$item->ID}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Moodificar datos</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      
                                        <form action="{{route('crud.update')}}" method="post">
                                          @csrf
                                          <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">ID</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtID" value="{{$item->ID}}" readonly>
                                          <div class="mb-3">


                                            <div class="mb-3">
                                              <label for="exampleInputEmail1" class="form-label">Titulo</label>
                                              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txttitulo" value="{{$item->titulo}}">
                                            <div class="mb-3">

                                            <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Descripcion</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtdescripcion" value="{{$item->descripcion}}">
                                             <div class="mb-3">

                                              <div class="mb-3">
                                                <label for="disabledSelect" class="form-label">Seleccione el Estado</label>
                                                <select id="disabledSelect" class="form-select" name="txtmenu">
                                                    <option @if($item->estado == 'por hacer') selected @endif>por hacer</option>
                                                    <option @if($item->estado == 'progreso') selected @endif>progreso</option>
                                                    <option @if($item->estado == 'completada') selected @endif>completada</option>
                                                </select>
                                            </div>
                                                  
                                                  <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Fecha Inicio</label>
                                                    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtfechainicio" value="{{$item->fecha_inicio}}">
                                                     <div class="mb-3">

                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Fecha Fin</label>
                                                            <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtfechafin" value="{{$item->fecha_fin}}">
                                                             <div class="mb-3">

                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary">Modificar</button>
                                                </div>
                                          </form>
                                    </div>
                                </div>
                                </div>
                            </div>

                  </tr>
                  @endforeach
                </tbody>
              </table>
       
        </div>
        
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>