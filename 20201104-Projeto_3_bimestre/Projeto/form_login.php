
<div class="modal fade" id="modal_login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Autenticação</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" name="form" action="autenticacao.php">
            <input type="email" name="email" placeholder="E-mail..." />
            <input type="password" name="senha" placeholder="Senha..."/>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary autenticar" id="autenticar">Autenticar</button>
        </form>
        <div>
        Ainda não é cadastrado?<a href='#' class='link_bg_claro'>clique aqui!</a>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
    $(function(){
        $("#autenticar").click(function(){
            var senha = $.md5($("input[name='senha']").val());
            $("input[name='senha']").val(senha);
            $("#autenticar").attr("disabled", true);
            $("form[name='form']").submit();
        });
    });
</script>