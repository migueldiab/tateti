  <div id="body_area">
    <div class="left">
    </div>
    <div class="body_area1">
      <div class="banner_bottom"></div>
      <div class="mid">
        <div class="tick_head">
          Registrate Y&aacute;!
        </div>
        <div class="inner_banner">
            <form id="formRegistro" method="post" action="./index.php" onsubmit="validarFormRegistro();return false;">
              <input name="pagina" type="hidden" value="registrar" />
              <div id="errorMsg" class="errorMsg">{errorMsg}</div>
              <div class="login_textarea">
                <div class="input_label">Usuario</div>
                <div class="login_box">
                  <label>
                    <input id="usuario" name="usuario" type="text" class="logintextbox" />
                  </label>
                </div>

              </div>
              <div class="login_textarea">
                <div class="input_label">eMail</div>
                <div class="login_box">
                  <label>
                    <input id="email" name="email" type="text" class="logintextbox" />
                  </label>
                </div>
              </div>
              <div class="login_textarea">
                <div class="input_label">Contrase&ntilde;a</div>
                <div class="login_box">
                  <label>
                    <input id="contrasena" name="contrasena" type="password" class="logintextbox" />
                  </label>
                </div>
              </div>
              <div class="login_textarea">
                <div class="input_label">Confirmar</div>
                <div class="login_box">
                  <label>
                    <input id="confirmar" name="confirmar" type="password" class="logintextbox" />
                  </label>
                </div>
              </div>
              <div class="login_textarea">
                <a href="" onclick="validarFormRegistro();return false;" class="login">Enviar</a>
                <input id="enviar" name="enviar" type="submit" class="logintextbox" style="visibility: hidden;"/>
              </div>
            </form>
        </div>
      </div>
      
    </div>
  </div>
