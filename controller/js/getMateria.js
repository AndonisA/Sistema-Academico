let countMateria;
let matterArray = [];
let matterArrayE = [];
let matterPreArray = [];
let matterPreArrayE = [];
let afterPeriod = "x";
/* 
response[x]["codigo"] == response[0]["codigo"] ||
          response[x]["codigo"] == response[6]["codigo"] ||
          response[x]["codigo"] == response[12]["codigo"] ||
          response[x]["codigo"] == response[18]["codigo"] ||
          response[x]["codigo"] == response[24]["codigo"] ||
          response[x]["codigo"] == response[30]["codigo"] ||
          response[x]["codigo"] == response[36]["codigo"] ||
          response[x]["codigo"] == response[43]["codigo"] ||
          response[x]["codigo"] == response[49]["codigo"] ||
          response[x]["codigo"] == response[55]["codigo"] ||
          response[x]["codigo"] == response[61]["codigo"] ||
          response[x]["codigo"] == response[65]["codigo"
*/
$(".dropdown-toggle").dropdown("update");
function matterShow(res, type) {
  var parameters = {
    valor: res,
  };
  var peticion = $.ajax({
    url: "/SistemaEaD/controller/php/buscarMateria.php",
    type: "POST",
    data: parameters,
    dataType: "json",
    success: function (response) {
      $("#divRemove").remove();
      $("#labelRemove").remove();
      $("#hrRemove").remove();
      $(".divRemove").remove();
      $(".labelRemove").remove();
      $(".hrRemove").remove();
      $("#7").prop("checked", false);
      $("#8").prop("checked", false);
      $("#9").prop("checked", false);
      $("#10").prop("checked", false);
      $("#11").prop("checked", false);
      $("#12").prop("checked", false);
      $(".7").prop("checked", false);
      $(".8").prop("checked", false);
      $(".9").prop("checked", false);
      $(".10").prop("checked", false);
      $(".11").prop("checked", false);
      $(".12").prop("checked", false);
      for (let x = 0; x <= response.length; x++) {
        countMateria = x;

        if (response[x]["periodo"] != afterPeriod) {
          afterPeriod = response[x]["periodo"];
          if (type == 1) {
            $(".listIns").append(
              "<label class='mt-1 labelRemove'>Periodo " +
                response[x]["periodo"] +
                "</label> <hr class='m-0 hrRemove'>"
            );
          }
          if (type == 2)
            $(".listInsEdit").append(
              "<label class='mt-1' id='labelRemove'>Periodo " +
                response[x]["periodo"] +
                "</label> <hr class='m-0' id='hrRemove'>"
            );
        }
        if (type == 1) {
          if (response[x]["carrera"] == 1) $("#7").prop("checked", true);
          if (response[x]["carrera"] == 2) $("#8").prop("checked", true);
          if (response[x]["carrera"] == 3) $("#9").prop("checked", true);
          if (response[x]["carrera"] == 4) $("#10").prop("checked", true);
          if (response[x]["carrera"] == 5) $("#11").prop("checked", true);
          if (response[x]["carrera"] == 6) $("#12").prop("checked", true);
          if (x == 0) {
            $(".listIns").append(
              "<div class='dropdown-item divRemove'><input type='checkbox' class='form-check-input " +
                response[x]["codigo"] +
                "' id='materia' name='materiaB' value=" +
                response[x]["codigo"] +
                " > <label class='form-check-label " +
                response[x]["codigo"] +
                " " +
                x +
                "'>" +
                response[x]["materia"] +
                "</label></div>"
            );
          } else {
            $(".listIns").append(
              "<div class='dropdown-item divRemove'><input type='checkbox' class='form-check-input " +
                response[x]["codigo"] +
                " " +
                x +
                "' id='materia' name='materiaB' value=" +
                response[x]["codigo"] +
                "> <label class='form-check-label " +
                response[x]["codigo"] +
                " " +
                x +
                "'>" +
                response[x]["materia"] +
                "</label></div>"
            );
          }
        }
        if (type == 2) {
          if (response[x]["carrera"] == 1) $(".7").prop("checked", true);
          if (response[x]["carrera"] == 2) $(".8").prop("checked", true);
          if (response[x]["carrera"] == 3) $(".9").prop("checked", true);
          if (response[x]["carrera"] == 4) $(".10").prop("checked", true);
          if (response[x]["carrera"] == 5) $(".11").prop("checked", true);
          if (response[x]["carrera"] == 6) $(".12").prop("checked", true);
          if (x == 0) {
            $(".listInsEdit").append(
              "<div class='dropdown-item' id='divRemove'><input type='checkbox' class='form-check-input " +
                response[x]["codigo"] +
                "' id='materia' name='materiaB' value=" +
                response[x]["codigo"] +
                " > <label class='form-check-label " +
                response[x]["codigo"] +
                " " +
                x +
                "'>" +
                response[x]["materia"] +
                "</label></div>"
            );
          } else {
            $(".listInsEdit").append(
              "<div class='dropdown-item' id='divRemove'><input type='checkbox' class='form-check-input " +
                response[x]["codigo"] +
                " " +
                x +
                "' id='materia' name='materiaB' value=" +
                response[x]["codigo"] +
                "> <label class='form-check-label " +
                response[x]["codigo"] +
                " " +
                x +
                "'>" +
                response[x]["materia"] +
                "</label></div>"
            );
          }
        }
        if (x == 5) {
          $(document).ready(function () {
            for (let tempMT = 0; tempMT < response.length; tempMT++) {
              $("#" + response[tempMT]["codigo"]).prop("checked", false);
              $("." + response[tempMT]["codigo"]).prop("checked", false);
            }
            var matter = 1;
            var matterE = 1;
            if (matter == 0) matter = 1;
            if (matterE == 0) matterE = 1;
            if (type == 1) {
              $('input[name="materiaB"]').change(function () {
                if ($(this).is(":checked")) {
                  matterArray.push(this.value);
                  matterPreArray.push(matter);
                  for (let y = 1; y < 9; y++) {
                    if (
                      $("#m" + y + "I").val() == "" ||
                      $("#m" + y + "I").val() == null
                    ) {
                      matter = y;
                      break;
                    }
                  }
                  $("#m" + matter + "I").val(this.value);
                  $("#m" + matter).val($("label." + this.value).text());
                  matter++;
                } else {
                  var temp = matter;
                  var tempArray;
                  for (let x = 0; x <= matterArray.length; x++) {
                    if (this.value == matterArray[x]) {
                      $("#m" + matterPreArray[x] + "I").val(null);
                      $("#m" + matterPreArray[x]).val(null);
                      for (let y = 1; y < 9; y++) {
                        if (
                          $("#m" + y + "I").val() == "" ||
                          $("#m" + y + "I").val() == null
                        ) {
                          matter = y;
                          break;
                        }
                      }
                      tempArray = matter;
                      matterArray.splice(0, x);
                      matterPreArray.splice(0, x);
                      break;
                    }
                  }
                  if (matter == 0) {
                    matter = tempArray;
                    matterPreArray.push(matter);
                    $("#m" + tempArray + "I").val(null);
                    $("#m" + tempArray).val(null);
                  }
                  if (matter == temp) {
                    for (let y = 1; y < 9; y++) {
                      if ($(this).val() == $("#m" + y + "I").val()) {
                        matter = y;
                        $("#m" + y + "I").val(null);
                        $("#m" + y).val(null);
                        break;
                      }
                    }
                    $("#m" + tempArray + "I").val(null);
                    $("#m" + tempArray).val(null);
                  }
                }
              });
            }
            if (type == 2) {
              $('input[name="materiaB"]').change(function () {
                if ($(this).is(":checked")) {
                  matterArrayE.push(this.value);
                  matterPreArrayE.push(matterE);
                  for (let y = 1; y < 9; y++) {
                    if (
                      $("#m" + y + "IID").val() == "" ||
                      $("#m" + y + "IID").val() == null
                    ) {
                      matterE = y;
                      break;
                    }
                  }
                  $("#m" + matterE + "IID").val(this.value);
                  $("#m" + matterE + "ID").val($("label." + this.value).text());
                  matterE++;
                } else {
                  var tempE = matterE;
                  var tempArrayE;
                  for (let x = 0; x <= matterArrayE.length; x++) {
                    if (this.value == matterArrayE[x]) {
                      $("#m" + matterPreArrayE[x] + "IID").val(null);
                      $("#m" + matterPreArrayE[x] + "ID").val(null);
                      for (let y = 1; y < 9; y++) {
                        if (
                          $("#m" + y + "IID").val() == "" ||
                          $("#m" + y + "IID").val() == null
                        ) {
                          matter = y;
                          break;
                        }
                      }
                      tempArrayE = matterE;
                      matterArrayE.splice(0, x);
                      matterPreArrayE.splice(0, x);
                      break;
                    }
                  }
                  if (matterE == 0) {
                    matterE = tempArrayE;
                    matterPreArrayE.push(matterE);
                    $("#m" + tempArrayE + "IID").val(null);
                    $("#m" + tempArrayE + "ID").val(null);
                  }
                  if (matterE == tempE) {
                    for (let y = 1; y < 9; y++) {
                      if ($(this).val() == $("#m" + y + "IID").val()) {
                        matterE = y;
                        $("#m" + y + "IID").val(null);
                        $("#m" + y + "ID").val(null);
                        break;
                      }
                    }
                    $("#m" + tempArrayE + "IID").val(null);
                    $("#m" + tempArrayE + "ID").val(null);
                  }
                }
              });
            }
          });
        }
      }
    },
    error: function (request, error) {
      alert(error);
    },
  });
}
