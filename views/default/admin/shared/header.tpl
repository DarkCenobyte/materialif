<!DOCTYPE html5>
<html>
  <head>
    <base href="{$basedir}/">
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="resources/default/css/materialize.min.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Administration</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col s12" id="header">Admin Page</div>
      </div>
      <div class="divider"></div>
      {if isset($smarty.session.isAdmin) && $smarty.session.isAdmin}
      <ul id="slide-out" class="side-nav fixed">
        <li><div class="userView">
          Welcome {$smarty.session.username}
        </div></li>
        <li><div class="divider"></div></li>
        <li><a class="subheader">Users settings</a></li>
        <li><a class="waves-effect" href="{'admin/index.php?c=user&t=index'|url_rewriter}"><i class="material-icons">people</i>Manage Users</a></li>
        <li><a class="waves-effect" href="{'admin/index.php?c=rank&t=index'|url_rewriter}"><i class="material-icons">verified_user</i>Manage Ranks</a></li>

        <li><div class="divider"></div></li>
        <li><a class="subheader">Forum settings</a></li>
        <li><a class="waves-effect" href="{'admin/index.php?c=category&t=index'|url_rewriter}"><i class="material-icons">collections_bookmark</i>Manage Categories</a></li>
        <li><a class="waves-effect" href="{'admin/index.php?c=template&t=index'|url_rewriter}"><i class="material-icons">insert_photo</i>Manage Templates</a></li>
        <li><a class="waves-effect" href="{'admin/index.php?c=generalSettings&t=index'|url_rewriter}"><i class="material-icons">settings</i>General Settings</a></li>
        <li><div class="divider"></div></li>
        <li><a class="subheader">Advanced settings</a></li>
        <li><a class="waves-effect" href="{'admin/index.php?c=advanced&t=index'|url_rewriter}"><i class="material-icons">settings</i>Caches Settings</a></li>
        <li><div class="divider"></div></li>
        <li><a class="subheader">Extensions settings</a></li>
        {* <li><a class="waves-effect" href="{'admin/index.php?c=extSample&t=index'|url_rewriter}"><i class="material-icons">extension</i>Example Ext Settings</a></li> *}
      </ul>
      {/if}
