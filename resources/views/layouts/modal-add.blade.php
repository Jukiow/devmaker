<div class="modal fade" id="modaladdpost" tabindex="-1" role="dialog" aria-labelledby="modaladdLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form>
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Novo Post</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12 col-lg-12">
              	<div class="wrap-input100 validate-input">
              		<span class="btn-show-pass">
              			<i class="zmdi zmdi-eye"></i>
              		</span>
              		<input class="input100" type="text" id="header-post" name="header-post" placeholder="Título">
              		<span class="focus-input100"></span>
              	</div>
                <div class="wrap-input100 validate-input">
              		<span class="btn-show-pass">
              			<i class="zmdi zmdi-eye"></i>
              		</span>
              		<textarea class="input100 textarea-posts" type="textarea" id="content-post" name="content-post" placeholder="Conteúdo"></textarea>
              		<span class="focus-input100"></span>
              	</div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" id="add-post">Adicionar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>
