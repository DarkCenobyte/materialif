{include file="../shared/header.tpl"}
  <table class="bordered highlight responsive-table">
    <tbody>
      {foreach from=$categories item=category}
        <tr>
          <td><a href="http://TODO"><h5><i class="material-icons">forum</i> {$category->name}</h5></a></td>
          {assign var="lastThread" value=$category->threads()->orderBy('id', 'desc')->first()}
          {if isset($lastThread)}
          <td><p>Last: <a href="http://TODO">{$lastThread->title}</a><br />
            by: <a href="http://TODO">{$lastThread->author->username}</a></p>
          </td>
          {else}
          <td><p>Empty</p></td>
          {/if}
        </tr>
      {/foreach}
    </tbody>
  </table>
{include file="../shared/footer.tpl"}
