<?php
echo phpinfo();
<label>Cep:
<input name="cep" class="form-control" type="text" id="cep" value="" size="10" maxlength="9" onblur="pesquisacep(this.value);" /></label><br />
<label>Rua:
<input name="rua" class="form-control" type="text" id="rua" size="60" /></label><br />
<label>Bairro:
<input name="bairro" class="form-control" type="text" id="bairro" size="40" /></label><br />
<label>Cidade:
<input name="cidade" class="form-control" type="text" id="cidade" size="40" /></label><br />
<label>Estado:
<input name="uf" type="text" class="form-control" id="uf" size="2" /></label><br />