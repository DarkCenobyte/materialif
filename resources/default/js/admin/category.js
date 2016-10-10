$(document).ready(function(){
  $(".edit-category-button").click(function(){
    $("#category-edit-id").val($(this).data('categoryid'));
    $("#category-edit-name").val($(this).data('categoryname'));
    $("#category-edit-desc").val($(this).data('categorydesc'));
    $("#category-edit-parent").val($(this).data('categoryparent'));
    Materialize.updateTextFields();
  });

  $('select').material_select();
  
});
