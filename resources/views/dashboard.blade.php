@extends('app')

@section('content')

<div id="crud" class="row">
  <div class="col-xs-12">
    <h1  class="page-header"> CRUD Laravel y Vue.js - Lista de Tareas
    </h1>

    <div class="col-sm-7">

     <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create"> Nueva tarea</a>

     <table class="table table-over table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Tarea</th>
            <th colspan="2">
              &nbsp;
            </th>
          </tr>
        </thead>
       <tbody>
        <tr v-for="keep in keeps">
            <td width="10px"> @{{ keep.id }} </td>
            <td> @{{ keep.keep }} </td>
            <td width="10px">
                <a href="#" class="btn btn-warning btn-sm" v-on:click.prevent="editKeep(keep)"> Editar&nbsp;&nbsp;&nbsp; </a>
            </td>
             <td width="10px">
                <a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="deletekeep(keep)"> Eliminar </a>
            </td>
        </tr>
       </tbody>
     </table>
    <nav>


      @include('pagination')
      @include('create')
      @include('edit')
    </div>


     <div class="col sm-5">
       <pre>
         @{{ $data }}
       </pre>
     </div>


  </div>
</div>


@endsection
