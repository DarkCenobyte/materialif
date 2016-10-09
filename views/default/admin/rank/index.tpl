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
            <button class="btn modal-trigger" data-target="edit-rank" data-rankid="{$rank->id}" data-rankname="{$rank->name}"><i class="material-icons">edit</i></button>
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
    <div id="edit-rank" class="modal bottom-sheet">
      <div class="modal-content">
        <h4>Modal Header</h4>
        <p>A bunch of text</p>
      </div>
      <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
      </div>
    </div>
{include file="../shared/footer.tpl"}
