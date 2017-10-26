<form method="POST" v-on:submit.prevent="createKeep">
<div class="modal fade" id="create">
 <div class="modal-dialog">
  <div class="modal-content">

    <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">
           <span>&times;</span>
         </button>
         <h4>Crear</h4>
    </div>

    <div class="modal-body">
      <label for="keep"> Nueva Tarea</label>
      <input type="text" name="keep" class="form-control" v-model="newKeep">
    <div v-if="newKeep.length===0">
      <span   v-for="error in errors" class="text-danger">@{{ error }} </span>
      </div>
    </div>

   <div class="modal-footer">
      <input type="submit" class="btn btn-primary" value="Grabar">
   </div>

  </div>
 </div>
</div>
</form>
