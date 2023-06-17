
<!-- Modal -->
<div class="modal fade" id="modalNewUser" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Usuarios</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="formUpdateUser" ng-submit="submitForm()">
      @csrf
      <div class="modal-body row">
      <span class="text-danger">@{{error.message}}</span>
        <div class="col-md-6 mb-2">
            <label for="">Nombre</label>
            <input type="text" name="name" ng-model="user.name" class="form-control">
            <span class="text-danger">@{{error.errors.name}}</span>
        </div>
        <div class="col-md-6 mb-2">
            <label for="">Email</label>
            <input type="email" name="email" ng-model="user.email" class="form-control">
            <span class="text-danger">@{{error.errors.email}}</span>
        </div>
        <div class="col-md-6 mb-2">
            <label for="">User name</label>
            <input type="text" name="username" ng-model="user.username" class="form-control">
            <span class="text-danger">@{{error.errors.username}}</span>
        </div>
        <div class="col-md-6 mb-2">
            <label for="">Teléfono</label>
            <input type="number" name="telefono" ng-model="user.telefono" class="form-control">
            <span class="text-danger">@{{error.errors.telefono}}</span>
        </div>
        <div class="col-md-6 mb-2">
            <label for="">Fecha nacimiento</label>
            <input type="text" name="fecha_nacimiento" ng-model="user.fecha_nacimiento" class="form-control">
            <span class="text-danger">@{{error.errors.fecha_nacimiento}}</span>
        </div>

        <div class="col-md-6 mb-2">
            <label for="">Contraseña</label>
            <input type="password" name="password" ng-model="user.password" class="form-control">
            <span class="text-danger">@{{error.errors.password}}</span>
        </div>
 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>