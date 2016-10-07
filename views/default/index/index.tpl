{include file="../shared/header.tpl"}
    <h1>Redirection Test:</h1>
    <h2>{"admin/index.php?c=auth&t=auth&p=toasty"|url_rewriter}</h2>
    <a href='{"admin/index.php?c=auth&t=auth&p=toasty"|url_rewriter}'>ClickMe</a>
{include file="../shared/footer.tpl"}
