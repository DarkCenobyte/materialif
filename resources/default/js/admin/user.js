$(document).ready(function(){
  $(".edit-user-button").click(function(){
    $("#user-edit-id").val($(this).data('userid'));
    $("#user-edit-name").val($(this).data('username'));
    $("#user-edit-email").val($(this).data('usermail'));
    $("#user-edit-rank").val($(this).data('userrank'));
    $("#user-edit-avatar").val($(this).data('useravatar'));
    $("#user-edit-firstname").val($(this).data('userfirstname'));
    $("#user-edit-lastname").val($(this).data('userlastname'));
    $("#user-edit-birthdate").val($(this).data('userbirthdate'));
    Materialize.updateTextFields();
    $('select').material_select();
  });

  $('select').material_select();
});
