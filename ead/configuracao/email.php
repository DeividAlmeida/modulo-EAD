<?php 
$query = json_encode(DBRead('ead_config_email','*'));
?>
<div class="card"  >
    <div class="card-header white" >
        <strong>Configuração de E-mail</strong>
    </div>
        <div class="card-body">
        <form method="post" action="?editaEmail" >
            <div class="row" >
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nome da Escola: </label>
                        <input class="form-control" v-model="idx[0].nome" name="nome" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>E-mail da Escola: </label>
                        <input class="form-control" v-model="idx[0].remetente" name="remetente" placeholder="Informe o e-mail da escola" required>
                    </div>
                </div>
            </div>
            <div class="row" >
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Servidor SMTP: </label>
                        <input class="form-control" v-model="idx[0].email_servidor" name="email_servidor" placeholder="Informe o Servidor SMTP" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Usuário SMTP: </label>
                        <input class="form-control" v-model="idx[0].email_usuario" name="email_usuario" placeholder="Informe o Usuário SMTP"  required>
                    </div>
                </div>
            </div>
            <div class="row" >
                <div class="col-md-6">    
                    <div class="form-group">
                        <label>Senha SMTP: </label>
                        <input class="form-control" v-model="idx[0].email_senha" name="email_senha" placeholder="Informe o Senha SMTP" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Porta SMTP: </label>
                        <input class="form-control" v-model="idx[0].email_porta" name="email_porta" placeholder="Informe a Porta SMTP" required>
                    </div>
                </div>
                <div class="col-md-6">    
                    <div class="form-group">
                        <label>Protocolo de Segurança: </label>
                        <select   required name='email_protocolo_seguranca' v-model="idx[0].email_protocolo_seguranca" class='form-control'  > 
                            <option value="ssl">SSL</option>
                            <option value="tls">TLS</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="card-footer white">
                <button style="margin-bottom: 7px;" class="btn btn-primary float-right" type="submit"><i class="icon icon-save" aria-hidden="true"></i> Salvar</button>
            </div>
        </form>
    </div>
</div>
<script>
    new Vue({
        el:".card",
        data: {
            idx:<?php echo $query ?>
        }
    })
</script>