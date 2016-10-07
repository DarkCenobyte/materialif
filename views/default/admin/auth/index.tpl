{include file="../shared/header.tpl"}
<div class="col s12">
  <form class="col s12" id="step-1-form" method="POST" action="admin/auth/auth">
    <div class="row">
      <div class="input-field col s12 m6">
        <input name="p[admin-username]" type="text" class="validate" required>
        <label for="admin-username">Admin Username</label>
      </div>
      <div class="input-field col s12 m6">
        <input name="p[admin-password]" type="password" class="validate" required>
        <label for="admin-password">Password</label>
      </div>
    </div>
    <div class="row">
      <button class="btn waves-effect waves-light green lighten-2" type="submit">Login
        <i class="material-icons right">check_circle</i>
      </button>
    </div>
  </form>
</div>
{include file="../shared/footer.tpl"}
