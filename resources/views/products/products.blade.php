<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">SKU</th>
      <th scope="col">Nombre</th>
      <th scope="col">Precio</th>
      <th scope="col">Cantidad</th>
      <th scope="col" class="text-center">Opciones</th>
    </tr>
  </thead>
  <tbody>
    <tr ng-repeat="product in products">
      <th ng-bind="product.id"></th>
      <td ng-bind="product.sku"></td>
      <td ng-bind="product.nombre"></td>
      <td ng-bind="product.precio"></td>
      <td ng-bind="product.cantidad"></td>
      <td class="text-center">
        <a type="button" class="text-primary" ng-click="showProduct(product)" data-bs-toggle="modal" data-bs-target="#modalNewProduct">
        <i class="fa-solid fa-square-pen fa-xl mr-1"></i>
        </a>
        <a type="button" class="text-primary" ng-click="delete(product.id)">
        <i class="fa-solid fa-trash fa-lg"></i>
        </a>
      </td>
    </tr>
  </tbody>
</table>