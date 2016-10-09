{include file="../shared/header.tpl"}
    <h1>Ranks Management</h1>
    <table class="striped">
      <thead>
        <tr>
            <th data-field="name">Name</th>
            <th data-field="action">Actions</th>
        </tr>
      </thead>

      <tbody>
        {foreach from=$ranksList item=rank}
        <tr>
          <td>{$rank->name}</td>
          <td>
            {if !$rank->protected}
            <a class="btn" href="{'admin/index.php?c=rank&t=remove&p[id]='|cat:$rank->id|url_rewriter}"><i class="material-icons">delete</i></a>
            {/if}
            <button class="btn modal-trigger edit-rank-button" data-target="edit-rank-modal" data-rankid="{$rank->id}" data-rankname="{$rank->name}"><i class="material-icons">edit</i></button>
          </td>
        </tr>
        {/foreach}
      </tbody>
    </table>
    <ul class="pagination">
      {for $i=1 to $ranksPCount}
      <li class="{if $i == $currentPage}active{else}waves-effect{/if}">
        <a href="{'admin/index.php?c=rank&t=index&p[page]='|cat:$i|url_rewriter}">{$i}</a>
      </li>
      {/for}
    </ul>
    <div id="edit-rank-modal" class="modal bottom-sheet">
      <form action="{'admin/index.php?c=rank&t=edit'|url_rewriter}" method="post">
        <div class="modal-content">
          <h4>Edit a Rank</h4>
          <div class="row">
           <div class="input-field col s6">
             <input id="rank-edit-id" name="p[id]" type="hidden">
             <input id="rank-edit-name" name="p[name]" type="text" class="validate" required>
             <label for="rank-edit-name">Rank Name</label>
           </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn modal-action modal-close waves-effect waves-light" type="submit" name="action">Save</button>
        </div>
      </form>
    </div>
    <div id="add-rank-modal" class="modal bottom-sheet">
      <form action="{'admin/index.php?c=rank&t=add'|url_rewriter}" method="post">
        <div class="modal-content">
          <h4>Add a Rank</h4>
          <div class="row">
           <div class="input-field col s6">
             <input id="rank-add-name" name="p[name]" type="text" class="validate" required>
             <label for="rank-add-name">Rank Name</label>
           </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn modal-action modal-close waves-effect waves-light" type="submit" name="action">Add</button>
        </div>
      </form>
    </div>
{include file="../shared/footer.tpl" jsFile="rank.js"}
