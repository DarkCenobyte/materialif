{include file="../shared/header.tpl"}
    <h1>Users Management</h1>
    <table class="striped">
      <thead>
        <tr>
            <th data-field="name">Name</th>
            <th data-field="action">Actions</th>
        </tr>
      </thead>

      <tbody>
        {foreach from=$usersList item=user}
        <tr>
          <td>{$user->username}</td>
          <td>
            <a class="btn" href="{'admin/index.php?c=user&t=remove&p[id]='|cat:$user->id|url_rewriter}"><i class="material-icons">delete</i></a>
            <button class="btn modal-trigger edit-user-button" data-target="edit-user-modal" data-userid="{$user->id}" data-username="{$user->username}" data-usermail="{$user->email}" data-userrank="{$user->rank_id}" data-useravatar="{$user->avatar}" data-userfirstname="{$user->first_name}" data-userlastname="{$user->last_name}" data-userbirthdate="{$user->birthdate}"><i class="material-icons">edit</i></button>
          </td>
        </tr>
        {/foreach}
      </tbody>
    </table>
    <ul class="pagination">
      {for $i=1 to $usersPCount}
      <li class="{if $i == $currentPage}active{else}waves-effect{/if}">
        <a href="{'admin/index.php?c=user&t=index&p[page]='|cat:$i|url_rewriter}">{$i}</a>
      </li>
      {/for}
    </ul>
    <button class="modal-trigger btn-floating btn-large waves-effect waves-light red right" data-target="add-user-modal"><i class="material-icons">add</i></button>
    <div id="edit-user-modal" class="modal bottom-sheet">
      <form action="{'admin/index.php?c=user&t=edit'|url_rewriter}" method="post">
        <div class="modal-content">
          <h4>Edit an User</h4>
          <div class="row">
           <div class="input-field col s6">
             <input id="user-edit-id" name="p[id]" type="hidden">
             <input id="user-edit-name" name="p[username]" type="text" class="validate" required>
             <label for="user-edit-name">User Name</label>
             <input id="user-edit-email" name="p[email]" type="email" class="validate" required>
             <label for="user-edit-email">User E-mail</label>
             <input id="user-edit-password" name="p[password]" type="password" class="validate">
             <label for="user-edit-password">Password</label>
             <select id="user-edit-rank" name="p[rank]">
             {foreach from=$ranksList item=rank}
              <option value="{$rank->id}">{$rank->name}</option>
             {/foreach}
             </select>
             <label for="user-edit-rank">Rank</label>
             <input id="user-edit-avatar" name="p[avatar]" type="text" class="validate"> {* TODO *}
             <label for="user-edit-avatar">Avatar URL</label>

             <input id="user-edit-firstname" name="p[firstname]" type="text" class="validate">
             <label for="user-edit-firstname">First Name</label>
             <input id="user-edit-lastname" name="p[lastname]" type="text" class="validate">
             <label for="user-edit-lastname">Last Name</label>
             <input id="user-edit-birthdate" name="p[birthdate]" type="date" class="validate">
             <label for="user-edit-birthdate">Birthdate</label>
           </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn modal-action modal-close waves-effect waves-light" type="submit" name="action">Save</button>
        </div>
      </form>
    </div>
    <div id="add-user-modal" class="modal bottom-sheet">
      <form action="{'admin/index.php?c=user&t=add'|url_rewriter}" method="post">
        <div class="modal-content">
          <h4>Add an User</h4>
          <div class="row">
           <div class="input-field col s6">
             <input id="user-add-name" name="p[username]" type="text" class="validate" required>
             <label for="user-add-name">User Name</label>
             <input id="user-add-email" name="p[email]" type="email" class="validate" required>
             <label for="user-add-email">User E-mail</label>
             <input id="user-add-password" name="p[password]" type="password" class="validate">
             <label for="user-add-password">Password</label>
             <select id="user-add-rank" name="p[rank]">
             {foreach from=$ranksList item=rank}
              <option value="{$rank->id}">{$rank->name}</option>
             {/foreach}
             </select>
             <label for="user-add-rank">Rank</label>
             <input id="user-add-avatar" name="p[avatar]" type="text" class="validate"> {* TODO *}
             <label for="user-add-avatar">Avatar URL</label>

             <input id="user-add-firstname" name="p[firstname]" type="text" class="validate">
             <label for="user-add-firstname">First Name</label>
             <input id="user-add-lastname" name="p[lastname]" type="text" class="validate">
             <label for="user-add-lastname">Last Name</label>
             <input id="user-add-birthdate" name="p[birthdate]" type="date" class="validate">
             <label for="user-add-birthdate">Birthdate</label>
           </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn modal-action modal-close waves-effect waves-light" type="submit" name="action">Add</button>
        </div>
      </form>
    </div>
{include file="../shared/footer.tpl"}
