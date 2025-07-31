let countCategoryD;
//let checkedRO
//categoryShow();
function categoryShow() {
  var peticionD = $.ajax({
    url: "/SistemaEaD/controller/php/searchCarrera.php",
    type: "POST",
    data: {},
    dataType: "json",
    success: function (responseD) {
      for (let x = 0; x <= responseD.length; x++) {
        countCategoryD = x + 1;
        if (x == 0) {
          $(".listEditM").append(
            "<div class='dropdown-item'><input type='radio' hidden class='form-check-input " +
              responseD[x]["codigo"] +
              "-MN" +
              "' name='carreraM' value=" +
              responseD[x]["codigo"] +
              "> <label class='form-check-label " +
              responseD[x]["codigo"] +
              "-M" +
              "'>" +
              responseD[x]["nombre"] +
              "</label></div>"
          );
        } else {
          $(".listEditM").append(
            "<div class='dropdown-item'><input type='radio' hidden class='form-check-input " +
              responseD[x]["codigo"] +
              "-MN" +
              "' name='carreraM' value=" +
              responseD[x]["codigo"] +
              "> <label class='form-check-label " +
              responseD[x]["codigo"] +
              "-M" +
              "'>" +
              responseD[x]["nombre"] +
              "</label></div>"
          );
        }
        if (x == response.length) {
          for (let temp = 0; temp <= responseD.length; temp++) {
            $("." + responseD[temp]["codigo"] + "-M").click(function () {
              $("#carreraM").val(
                $("." + responseD[temp]["codigo"] + "-M").text()
              );
              $("#carreraMN").val(
                $("." + responseD[temp]["codigo"] + "-MN").val()
              );
            });
          }
        }
      }
    },
    error: function (requestD, errorD) {
      alert(errorD);
    },
  });
}
$(".dropdown-toggle").dropdown("update");

