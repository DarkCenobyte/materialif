{include file="../shared/header.tpl"}
<div class="col s12">
  <form class="col s12" id="step-1-form">
    <div class="row">
      <div class="input-field col s12 m6">
        <input name="admin-username" type="text" class="validate" required>
        <label for="admin-username">Admin Username</label>
      </div>
      <div class="input-field col s12 m6">
        <input name="admin-password" type="password" class="validate" required>
        <label for="admin-password">Password</label>
      </div>
    </div>
    <div class="row">
      <a class="waves-effect waves-light btn-large green lighten-2"><i class="material-icons left">check_circle</i>Login</a>
    </div>
  </form>
</div>
{include file="../shared/footer.tpl"}
