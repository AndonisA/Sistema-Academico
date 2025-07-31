let classColorM;
function messengerAlert(error, color) {
  if (classColorM != error) {
    $(".textInfoProM").text(error);
    $(".textInfoProM").removeClass(classColorM);
    $(".textInfoProM").addClass(color);
  } else {
    $(".textInfoProM").text(error);
  }
  classColorM = color;
  $(".textInfoProM").show(300);
  $(".textInfoProM").hide(7000);
}

function checkLogin() {
  var parameters = {
    usuario: $(".usuario").val(),
    contra: $(".contra").val(),
  };
  var res = $.ajax({
    url: "../../../SistemaEaD/controller/php/login.php",
    type: "POST",
    data: parameters,
    dataType: "json",
    success: function (res) {
      if (res.color != "bg-danger") {
        window.location="../../../SistemaEaD/index.php"
      }
      messengerAlert(res.error, res.color);
    },
    error: function (error) {
      alert(error);
    },
  });
}
$("#AceptarLog").click(function () {
  checkLogin();
});
$(".sendToLogin").click(function () {
  window.location="../../../SistemaEaD/model/html/login.php"
});
$('.contra').trigger('click');
$(function (){
  $('.contra').keypress(function (e){
    var code = (e.keyCode ? e.keyCode : e.which);
    if (code == 13){
      $('#AceptarLog').trigger('click');
      return true;
    }
  })
})