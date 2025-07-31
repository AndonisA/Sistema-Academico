let count;
collegeShow();
function collegeShow() {
  var peticion = $.ajax({
    url: "/SistemaEaD/controller/php/searchCarrera.php",
    type: "POST",
    data: {},
    dataType: "json",
    success: function (response) {
      for (let x = 0; x <= response.length; x++) {
        count = x + 100;
        if (x == 0) {
          $(".listEdit").append(
            "<div class='dropdown-item'><input type='radio' hidden class='form-check-input carreraC " +
              +response[x]["codigo"] +
              "' name='carreraC' value=" +
              response[x]["codigo"] +
              " > <label class='form-check-label " +
              +response[x]["codigo"] +
              "-I" +
              "'>" +
              response[x]["nombre"] +
              "</label></div>"
          );
        } else {
          $(".listEdit").append(
            "<div class='dropdown-item'><input type='radio' hidden class='form-check-input carreraC " +
              +response[x]["codigo"] +
              "' name='carreraC' value=" +
              response[x]["codigo"] +
              "> <label class='form-check-label " +
              +response[x]["codigo"] +
              "-I" +
              "'>" +
              response[x]["nombre"] +
              "</label></div>"
          );
        }
        test = response.length
        trans = parseInt(test-1)
        console.log(x +" == "+ trans)
        if (x == trans) {
          $(".dropdown-toggle").dropdown("update");
          for (let temp = 0; temp <= response.length; temp++) {
            $("." + response[temp]["codigo"] + "-I").click(function () {
              $("#carreraC").val(
                $("label." + response[temp]["codigo"] + "-I").text()
              );
              $("#carreraCN").val($("." + response[temp]["codigo"]).val());
            });
          }
        }
      }
    },
    error: function (request, error) {
      alert(error);
    },
  });
}
