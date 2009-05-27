<div class="login_area">
  <form id="loginForm" method="post" action="./index.php">
    <input name="pagina" type="hidden" value="entrar" />
    <div class="login_head">{miembro}</div>
    <div class="login_textarea">
      <div class="login_name">{usuario}</div>
      <div class="login_box">
        <label>
          <input id="usuario" name="usuario" type="text" class="logintextbox" />
        </label>
      </div>

    </div>
    <div class="login_textarea">
      <div class="login_name">{password}</div>
      <div class="login_box">
        <label>
          <input id="contrasena" name="contrasena" type="password" class="logintextbox" />
        </label>
      </div>
    </div>
    <div class="login_textarea">
      <a href="#" class="register">{registrate}</a>
      <a href="" onclick="$('#loginForm').submit();return false;" class="login">{login}</a>
      <input id="enviar" name="enviar" type="submit" class="logintextbox" style="visibility: hidden;"/>
    </div>
  </form>
</div>