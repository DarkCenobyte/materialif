{include file="../shared/header.tpl"}
<h1>Categories Management</h1>
<table class="striped">
  <thead>
    <tr>
        <th data-field="name">Name</th>
        <th data-field="action">Actions</th>
    </tr>
  </thead>

  <tbody>
    {foreach from=$categoriesList item=category}
    <tr>
      <td>{$category->name}</td>
      <td>
        <a class="btn" href="{'admin/index.php?c=category&t=remove&p[id]='|cat:$category->id|url_rewriter}"><i class="material-icons">delete</i></a>
        <button class="btn modal-trigger edit-category-button" data-target="edit-category-modal" data-categoryid="{$category->id}" data-categoryname="{$category->name}" data-categorydesc="{$category->description}" data-categoryparent="{$category->parent_id}"><i class="material-icons">edit</i></button>
      </td>
    </tr>
    {/foreach}
  </tbody>
</table>
<ul class="pagination">
  {for $i=1 to $categoriesPCount}
  <li class="{if $i == $currentPage}active{else}waves-effect{/if}">
    <a href="{'admin/index.php?c=category&t=index&p[page]='|cat:$i|url_rewriter}">{$i}</a>
  </li>
  {/for}
</ul>
<button class="modal-trigger btn-floating btn-large waves-effect waves-light red right" data-target="add-category-modal"><i class="material-icons">add</i></button>
<div id="edit-category-modal" class="modal bottom-sheet">
  <form action="{'admin/index.php?c=category&t=edit'|url_rewriter}" method="post">
    <div class="modal-content">
      <h4>Edit a Category</h4>
      <div class="row">
       <div class="input-field col s6">
         <input id="category-edit-id" name="p[id]" type="hidden">
         <input id="category-edit-name" name="p[name]" type="text" class="validate" required>
         <label for="category-edit-name">Category Name</label>
       </div>
       <div class="input-field col s6">
         <select id="category-edit-parent" name="p[parent]">
           <option value="">No Parent</option>
           {foreach from=$allCategories item=category}
           <option value="{$category->id}">{$category->name}</option>
           {/foreach}
         </select>
         <label for="category-edit-parent">Parent</label>
       </div>
      </div>
      <div class="row">
       <div class="input-field col s6">
         <input id="category-edit-desc" name="p[description]" type="text" class="validate">
         <label for="category-edit-desc">Category Description</label>
       </div>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn modal-action modal-close waves-effect waves-light" type="submit" name="action">Save</button>
    </div>
  </form>
</div>
<div id="add-category-modal" class="modal bottom-sheet">
  <form action="{'admin/index.php?c=category&t=add'|url_rewriter}" method="post">
    <div class="modal-content">
      <h4>Add a Category</h4>
      <div class="row">
       <div class="input-field col s6">
         <input id="category-add-name" name="p[name]" type="text" class="validate" required>
         <label for="category-add-name">Category Name</label>
       </div>
       <div class="input-field col s6">
         <select id="category-add-parent" name="p[parent]">
           <option value="">No Parent</option>
           {foreach from=$allCategories item=category}
           <option value="{$category->id}">{$category->name}</option>
           {/foreach}
         </select>
         <label for="category-add-parent">Parent</label>
       </div>
      </div>
      <div class="row">
       <div class="input-field col s6">
         <input id="category-add-desc" name="p[description]" type="text" class="validate">
         <label for="category-add-desc">Category Description</label>
       </div>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn modal-action modal-close waves-effect waves-light" type="submit" name="action">Add</button>
    </div>
  </form>
</div>
{include file="../shared/footer.tpl" jsFile="category.js"}
