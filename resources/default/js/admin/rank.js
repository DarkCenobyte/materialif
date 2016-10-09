$(document).ready(function(){
  $(".edit-rank-button").click(function(){
    $("#rank-edit-id").val($(this).data('rankid'));
    $("#rank-edit-name").val($(this).data('rankname'));
    Materialize.updateTextFields();
  });
});
