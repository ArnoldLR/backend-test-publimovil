
<!-- Modal -->
<div class="modal fade" id="modalNewProduct" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="formUpdateProduct" ng-submit="submitForm()">
      @csrf
      <div class="modal-body row">
        <div class="col-md-6 mb-2">
            <label for="">Nombre</label>
            <input type="text" name="nombre" ng-model="product.nombre" class="form-control">
        </div>
        <div class="col-md-6 mb-2">
            <label for="">SKU</label>
            <input type="text" name="sku" ng-model="product.sku" class="form-control">
        </div>
        <div class="col-md-6 mb-2">
            <label for="">Cantidad</label>
            <input type="number" name="cantidad" ng-model="product.cantidad" class="form-control">
        </div>
        <div class="col-md-6 mb-2">
            <label for="">Precio</label>
            <input type="text" step="any" name="precio" ng-model="product.precio" class="form-control">
        </div>

        <div class="col-md-12 mb-2">
            <label for="">Descripción</label>
            <input type="text" name="descripcion" ng-model="product.descripcion" class="form-control">
        </div>

        <div class="col-md-12 mb-2">
            <label for="">Imagen URL</label>
            <input type="text" name="img_url" ng-model="product.img_url" class="form-control">
        </div>
        <br>  
        <div class="col-md-12 mt-2"> 
          <figure>
            <img ng-src="@{{product.img_url}}" alt="" width="100px">
          </figure>
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