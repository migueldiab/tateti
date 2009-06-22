  <div id="body_area">
    <div class="left">
    </div>
    <div class="body_area1">
      <div class="banner_bottom"></div>
      <div class="mid">
        <div class="tick_head">
          Entr&aacute; Y&aacute;!
        </div>
        <div class="inner_banner">
            <form id="loginForm" method="POST" action="./index.php">
              <input name="pagina" type="hidden" value="entrar" />
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
                <div class="input_label">Contrase&ntilde;a</div>
                <div class="login_box">
                  <label>
                    <input id="contrasena" name="contrasena" type="password" class="logintextbox" />
                  </label>
                </div>
              </div>
              <div class="login_textarea">
                <a href="" onclick="$('#loginForm').submit();return false;;" class="login">Entrar</a>
                <input id="enviar" name="enviar" type="submit" class="logintextbox" style="visibility: hidden;"/>
              </div>
            </form>
        </div>
      </div>
      
    </div>
  </div>
