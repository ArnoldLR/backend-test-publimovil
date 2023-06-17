<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Teléfono</th>
      <th scope="col">Fecha nacimiento</th>
      <th scope="col" class="text-center">Opciones</th>
    </tr>
  </thead>
  <tbody>
    <tr ng-repeat="user in users">
      <th ng-bind="user.id"></th>
      <td ng-bind="user.name"></td>
      <td ng-bind="user.username"></td>
      <td ng-bind="user.email"></td>
      <td ng-bind="user.telefono"></td>
      <td ng-bind="user.fecha_nacimiento"></td>
      <td class="text-center">
        <a type="button" class="text-primary" ng-click="showUser(user)" data-bs-toggle="modal" data-bs-target="#modalNewUser">
        <i class="fa-solid fa-square-pen fa-xl mr-1"></i>
        </a>
        <a type="button" class="text-primary" ng-click="delete(user.id)">
        <i class="fa-solid fa-trash fa-lg"></i>
        </a>
      </td>
    </tr>
  </tbody>
</table>