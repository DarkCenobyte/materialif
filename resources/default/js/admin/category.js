$(document).ready(function(){
  $(".edit-category-button").click(function(){
    undisableParents();
    $("#category-edit-id").val($(this).data('categoryid'));
    $("#category-edit-name").val($(this).data('categoryname'));
    $("#category-edit-desc").val($(this).data('categorydesc'));
    $("#category-edit-parent").val($(this).data('categoryparent'));
    disableItselfParent($(this).data('categoryid'));
    Materialize.updateTextFields();
    $('select').material_select();
  });

  $('select').material_select();

  function undisableParents() {
    $("#category-edit-parent > option:disabled").prop('disabled', false);
  }
  function disableItselfParent(id) {
    $("#category-edit-parent > option[value='" + id + "']").prop('disabled', true);
  }
});
