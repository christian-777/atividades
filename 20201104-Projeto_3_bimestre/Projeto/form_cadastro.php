
<div class="modal fade" id="modal_cadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" name="form2" action="cadastrar.php">
            <input type="text" name="nome_cad" placeholder="Digite seu nome ..."/>
            <input type="email" name="email_cad" placeholder="E-mail..." />
            <input type="password" name="senha_cad" placeholder="Senha..."/>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cansel">Cancelar</button>
        <button type="reset" class="btn btn-secondary" id="reset">Limpar</button>
        <button type="button" class="btn btn-primary" id="cadastrar">Cadastrar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
    $(function(){
        $("#cadastrar").click(function(){
            var senha = $.md5($("input[name='senha_cad']").val());
            $("input[name='senha_cad']").val(senha);
            $("#cadastrar").attr("disabled", true);
            $("#cansel").attr("disabled", true);
            $("#reset").attr("disabled", true);
            $("form[name='form2']").submit();
        });
    });
</script>