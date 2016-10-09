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
          <td>TODO</td>
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
{include file="../shared/footer.tpl"}
