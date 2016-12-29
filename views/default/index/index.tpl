{include file="../shared/header.tpl"}
    {foreach from=$categories item=category}
      <a href="http://TODO"><h4>{$category->name}</h4></a>
      {assign var="lastThread" value=$category->threads()->orderBy('id', 'desc')->first()}
      <p>Last: <a href="http://TODO">{$lastThread->title}</a>
      by: <a href="http://TODO">{$lastThread->author->username}</a></p>
      <hr />
    {/foreach}
    <a href='{"admin/index.php"|url_rewriter}'>Admin page</a>
{include file="../shared/footer.tpl"}
