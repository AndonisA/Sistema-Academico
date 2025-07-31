let classColorM = "h";
function messengerAlert(error, color) {
  if (classColorM != color) {
    $(".textInfoProM").text(error);
    $(".textInfoProM").removeClass(classColorM);
    $(".textInfoProM").addClass(color);
  } else {
    $(".textInfoProM").text(error);
  }
  classColorM = color;
  $(".textInfoProM").show(100);
  $(".textInfoProM").hide(7000);
}
let countPeriod;
function searchStudent(req, type) {
  var parameters = {
    cedula: req,
  };
  var petition = $.ajax({
    url: "../../controller/php/buscarEstudianteNotas.php",
    type: "POST",
    data: parameters,
    dataType: "json",
    success: function (response) {
      if (type == 1) {
        $(".cedula").val(response.cedula);
        $(".nombre").val(response.nombre);
        collegeShow(response.carrera);
        searchStudentPeriod(response.email, 2);
      }
      if (type == 2) {
        $("#cedulaLN").val(response.cedula);
        $("#nombreLN").val(response.nombre);
        searchStudentPeriod(response.email, 1);
      }
      console.log(response.color);
      messengerAlert(response.error, response.color);
    },
    error: function (request, error) {
      alert(error);
    },
  });
}

function searchStudentPeriod(req, type) {
  var parameters = {
    correo: req,
  };
  var petition = $.ajax({
    url: "../../controller/php/buscarNotaAlumnoPeriodo.php",
    type: "POST",
    data: parameters,
    dataType: "json",
    success: function (response) {
      console.log(response)
      for (let x = 0; x < response.length; x++) {
        countPeriod = x + 100;
        $(".correo").val(response[0]["correo"]);
        if (type == 1) {
          console.log(response[x]["periodo"])
          if (x == 0) {
            $(".divRemovePeriod").remove();
            $("#payrollList").append(
              "<div class='dropdown-item divRemovePeriod'><input readonly hidden type='radio' class='form-check-input' id='" +
                response[x]["periodo"] +
                "' value=" +
                response[x]["periodo"] +
                "> <label class='form-check-label' id='" +
                response[x]["periodo"] +
                "-PL" +
                "'>" +
                response[x]["periodo"] +
                "</label></div>"
            );
          } else {
            $("#payrollList").append(
              "<div class='dropdown-item divRemovePeriod'><input readonly hidden type='radio' class='form-check-input' id='" +
                response[x]["periodo"] +
                "' value=" +
                response[x]["periodo"] +
                "> <label class='form-check-label' id='" +
                response[x]["periodo"] +
                "-PL" +
                "'>" +
                response[x]["periodo"] +
                "</label></div>"
            );
          }
          $("#" + response[x]["periodo"] + "-PL").click(function () {
            console.log(response[x]["periodo"]);
            $("#periodoPD").val($("#" + response[x]["periodo"] + "-PL").text());
          });
          $("#" + response[x]["periodo"]).click(function () {
            console.log('hola')
            $('#periodoPD').val($("#" + response[x]["periodo"]+"-PL").val())
          });
        }
        if (type == 2) {
          if (x == 0) {
            $(".divRemovePeriodI").remove();
            $("#payrollListStudent").append(
              "<div class='dropdown-item divRemovePeriodI'><input readonly hidden type='radio' class='form-check-input " +
                response[x]["periodo"] +
                "' value=" +
                response[x]["periodo"] +
                "> <label class='form-check-label " +
                response[x]["periodo"] +
                "'>" +
                response[x]["periodo"] +
                "</label></div>"
            );
          } else {
            $("#payrollListStudent").append(
              "<div class='dropdown-item divRemovePeriodI'><input readonly hidden type='radio' class='form-check-input " +
                response[x]["periodo"] +
                "' value=" +
                response[x]["periodo"] +
                "> <label class='form-check-label " +
                response[x]["periodo"] +
                "'>" +
                response[x]["periodo"] +
                "</label></div>"
            );
          }


          $("." + response[x]["periodo"]).click(function () {
            for (let mat = 1; mat < 9; mat++) {
              for (let note = 1; note < 4; note++) {
                $("#m" + mat + "c" + note).attr("readonly", "readonly");
                $("#m" + mat + "c" + note).val("");
              }
              $("#m" + mat + "IID").val("");
              $("#m" + mat + "ID").val("");
            }
            $("#periodoPD").val($("." + response[x]["periodo"]).val());
            searchStudentPayroll(
              response[x]["correo"],
              $("." + response[x]["periodo"]).val()
            );
            searchStudentNote(
              response[x]["correo"],
              $("." + response[x]["periodo"]).val()
            );
          });
        }
      }
      messengerAlert(response.error, response.color);
    },
    error: function (request, error) {
      //debugger;
    },
  });
}
function searchStudentPayroll(req, peri) {
  var parameters = {
    cedula: req,
    periodo: peri,
  };
  var petition = $.ajax({
    url: "../../controller/php/buscarNotaAlumno.php",
    type: "POST",
    data: parameters,
    dataType: "json",
    success: function (response) {
      /* 
        $("#m1IID").val(response.materia);
        $("#m2IID").val(response.materia);
        $("#m3IID").val(response.materia);
        $("#m4IID").val(response.materia);
        $("#m5IID").val(response.materia);
        $("#m6IID").val(response.materia);
        $("#m7IID").val(response.materia);
        $("#m8IID").val(response.materia);
      */
      for (let x = 0; x < response.length; x++) {
        if (response[0]["asignatura"] != "") {
          $("#m1ID").val(response[0]["asignatura"]);
          $("#m1c1").val(response[0]["corte1"]);
          $("#m1c1").removeAttr("readonly");
          $("#m1c2").val(response[0]["corte2"]);
          $("#m1c2").removeAttr("readonly");
          $("#m1c3").val(response[0]["corte3"]);
          $("#m1c3").removeAttr("readonly");
        }
        if (response[1]["asignatura"] != "") {
          $("#m2ID").val(response[1]["asignatura"]);
          $("#m2c1").val(response[1]["corte1"]);
          $("#m2c1").removeAttr("readonly");
          $("#m2c2").val(response[1]["corte2"]);
          $("#m2c2").removeAttr("readonly");
          $("#m2c3").val(response[1]["corte3"]);
          $("#m2c3").removeAttr("readonly");
        }
        if (response[2]["asignatura"] != "") {
          $("#m3ID").val(response[2]["asignatura"]);
          $("#m3c1").val(response[2]["corte1"]);
          $("#m3c1").removeAttr("readonly");
          $("#m3c2").val(response[2]["corte2"]);
          $("#m3c2").removeAttr("readonly");
          $("#m3c3").val(response[2]["corte3"]);
          $("#m3c3").removeAttr("readonly");
        }
        if (response[3]["asignatura"] != "") {
          $("#m4ID").val(response[3]["asignatura"]);
          $("#m4c1").val(response[3]["corte1"]);
          $("#m4c1").removeAttr("readonly");
          $("#m4c2").val(response[3]["corte2"]);
          $("#m4c2").removeAttr("readonly");
          $("#m4c3").val(response[3]["corte3"]);
          $("#m4c3").removeAttr("readonly");
        }
        if (response[4]["asignatura"] != "") {
          $("#m5ID").val(response[4]["asignatura"]);
          $("#m5c1").val(response[4]["corte1"]);
          $("#m5c1").removeAttr("readonly");
          $("#m5c2").val(response[4]["corte2"]);
          $("#m5c2").removeAttr("readonly");
          $("#m5c3").val(response[4]["corte3"]);
          $("#m5c3").removeAttr("readonly");
        }
        if (response[5]["asignatura"] != "") {
          $("#m6ID").val(response[5]["asignatura"]);
          $("#m6c1").val(response[5]["corte1"]);
          $("#m6c1").removeAttr("readonly");
          $("#m6c2").val(response[5]["corte2"]);
          $("#m6c2").removeAttr("readonly");
          $("#m6c3").val(response[5]["corte3"]);
          $("#m6c3").removeAttr("readonly");
        }
        if (response[6]["asignatura"] != "") {
          $("#m7ID").val(response[6]["asignatura"]);
          $("#m7c1").val(response[6]["corte1"]);
          $("#m7c1").removeAttr("readonly");
          $("#m7c2").val(response[6]["corte2"]);
          $("#m7c2").removeAttr("readonly");
          $("#m7c3").val(response[6]["corte3"]);
          $("#m7c3").removeAttr("readonly");
        }
        if (response[7]["asignatura"] != "") {
          $("#m8ID").val(response[7]["asignatura"]);
          $("#m8c1").val(response[7]["corte1"]);
          $("#m8c1").removeAttr("readonly");
          $("#m8c2").val(response[7]["corte2"]);
          $("#m8c2").removeAttr("readonly");
          $("#m8c3").val(response[7]["corte3"]);
          $("#m8c3").removeAttr("readonly");
        }
      }
      $("#periodoPD").val(response.prd);
    },
    error: function (request, error) {
      alert(error);
    },
  });
}

function searchStudentNote(req, prd) {
  var parameters = {
    cedula: req,
    periodo: prd,
  };
  var petition = $.ajax({
    url: "../../controller/php/buscarNotaAlumno.php",
    type: "POST",
    data: parameters,
    dataType: "json",
    success: function (response) {
      var nextInput;
      for (let temp = 0; temp < response.length; temp++) {
        for (let mat = 0; mat <= response.length; mat++) {
          nextInput = mat + 1;
          if (
            $("#m" + nextInput + "ID").val() == response[temp]["materia"] &&
            $("#m" + nextInput + "ID").val() != ""
          ) {
            for (let note = 1; note < 4; note++) {
              $("#m" + nextInput + "c" + note).val(
                response[temp]["m1n" + note]
              );
              $("#m" + nextInput + "c" + note).removeAttr("readonly");
            }
          }
        }
        for (let mat = 1; mat < 9; mat++) {
          if (
            $("#m" + nextInput + "ID").val() == response[temp]["materia"] &&
            $("#m" + nextInput + "ID").val() != ""
          ) {
            for (let note = 1; note < 4; note++) {
              $("#m" + nextInput + "c" + note).removeAttr("readonly");
            }
          }
        }
      }
    },
    error: function (request, error) {
      alert(error);
    },
  });
}
function updateStudentNote(req, prd) {
  console.log($("#m1ID").val());
  console.log($("#m1c1").val());
  console.log($("#m1c2").val());
  console.log($("#m1c3").val());
  console.log($("#m2ID").val());
  console.log($("#m2c1").val());
  console.log($("#m2c2").val());
  console.log($("#m2c3").val());
  console.log($("#m3ID").val());
  console.log($("#m3c1").val());
  console.log($("#m3c2").val());
  console.log($("#m3c3").val());
  console.log($("#m4ID").val());
  console.log($("#m4c1").val());
  console.log($("#m4c2").val());
  console.log($("#m4c3").val());
  console.log($("#m5ID").val());
  console.log($("#m5c1").val());
  console.log($("#m5c2").val());
  console.log($("#m5c3").val());
  console.log($("#m6ID").val());
  console.log($("#m6c1").val());
  console.log($("#m6c2").val());
  console.log($("#m6c3").val());
  console.log($("#m7ID").val());
  console.log($("#m7c1").val());
  console.log($("#m7c2").val());
  console.log($("#m7c3").val());
  console.log($("#m8ID").val());
  console.log($("#m8c1").val());
  console.log($("#m8c2").val());
  console.log($("#m8c3").val());
  var parameters = {
    cedula: req,
    periodo: prd,
    materia1: $("#m1ID").val(),
    m1c1: $("#m1c1").val(),
    m1c2: $("#m1c2").val(),
    m1c3: $("#m1c3").val(),
    materia2: $("#m2ID").val(),
    m2c1: $("#m2c1").val(),
    m2c2: $("#m2c2").val(),
    m2c3: $("#m2c3").val(),
    materia3: $("#m3ID").val(),
    m3c1: $("#m3c1").val(),
    m3c2: $("#m3c2").val(),
    m3c3: $("#m3c3").val(),
    materia4: $("#m4ID").val(),
    m4c1: $("#m4c1").val(),
    m4c2: $("#m4c2").val(),
    m4c3: $("#m4c3").val(),
    materia5: $("#m5ID").val(),
    m5c1: $("#m5c1").val(),
    m5c2: $("#m5c2").val(),
    m5c3: $("#m5c3").val(),
    materia6: $("#m6ID").val(),
    m6c1: $("#m6c1").val(),
    m6c2: $("#m6c2").val(),
    m6c3: $("#m6c3").val(),
    materia7: $("#m7ID").val(),
    m7c1: $("#m7c1").val(),
    m7c2: $("#m7c2").val(),
    m7c3: $("#m7c3").val(),
    materia8: $("#m8ID").val(),
    m8c1: $("#m8c1").val(),
    m8c2: $("#m8c2").val(),
    m8c3: $("#m8c3").val(),
  };
  var petition = $.ajax({
    url: "../../controller/php/actualizarNotaAlumno.php",
    type: "POST",
    data: parameters,
    dataType: "json",
    success: function (response) {
      messengerAlert(response.error, response.color);
      for (let mat = 1; mat < 9; mat++) {
        for (let note = 1; note < 4; note++) {
          $("#m" + mat + "c" + note).attr("readonly", "readonly");
        }
      }
      $("#searchStudent").trigger("reset");
      $("#updateNote").trigger("reset");
    },
    error: function (request, error) {
      alert(error);
    },
  });
}
function collegeShow(req) {
  var parameters = {
    carrera: req,
  };
  var peticion = $.ajax({
    url: "../../controller/php/searchCarrera.php",
    type: "POST",
    data: parameters,
    dataType: "json",
    success: function (response) {
      for (let x = 0; x < response.length; x++) {
        if (response[x]["codigo"] == req) {
          $(".carrera").val(response[x]["nombre"]);
          $(".carreraCodigo").val(response[x]["codigo"]);
        }
      }
    },
    error: function (request, error) {
      alert(error);
    },
  });
}

periodShow();
function periodShow() {
  var peticion = $.ajax({
    url: "../../controller/php/buscarPeriodo.php",
    type: "POST",
    dataType: "json",
    success: function (response) {
      let countPeriod;
      for (let x = 0; x < response.length; x++) {
        if (x == 0) {
          $(".list-period-I").append(
            "<div class='dropdown-item'><input hidden type='radio' class='form-check-input " +
              response[x]["idPeriodo"] +
              "' value=" +
              response[x]["idPeriodo"] +
              " > <label class='form-check-label " +
              response[x]["idPeriodo"] +
              "'>" +
              response[x]["idPeriodo"] +
              "</label></div>"
          );
          $(".list-period-EI").append(
            "<div class='dropdown-item'><input hidden type='radio' class='form-check-input " +
              response[x]["idPeriodo"] +
              "-EI" +
              "' value=" +
              response[x]["idPeriodo"] +
              " > <label class='form-check-label " +
              response[x]["idPeriodo"] +
              "-EI" +
              "'>" +
              response[x]["idPeriodo"] +
              "</label></div>"
          );
        } else {
          $(".list-period-I").append(
            "<div class='dropdown-item'><input hidden type='radio' class='form-check-input " +
              response[x]["idPeriodo"] +
              "' value=" +
              response[x]["idPeriodo"] +
              "> <label class='form-check-label " +
              response[x]["idPeriodo"] +
              "'>" +
              response[x]["idPeriodo"] +
              "</label></div>"
          );
          $(".list-period-EI").append(
            "<div class='dropdown-item'><input hidden type='radio' class='form-check-input " +
              response[x]["idPeriodo"] +
              "-EI" +
              "' value=" +
              response[x]["idPeriodo"] +
              "> <label class='form-check-label " +
              response[x]["idPeriodo"] +
              "-EI" +
              "'>" +
              response[x]["idPeriodo"] +
              "</label></div>"
          );
        }
        $("." + response[x]["idPeriodo"]).click(function () {
          $(".periodoIL").val($("label." + response[x]["idPeriodo"]).text());
          console.log($("label." + response[x]["idPeriodo"]).text());
        });
        $("." + response[x]["idPeriodo"] + "-EI").click(function () {
          $(".periodoIE").val(
            $("label." + response[x]["idPeriodo"] + "-EI").text()
          );
          console.log($("label." + response[x]["idPeriodo"] + "-EI").text());
        });
      }
    },
    error: function (request, error) {
      alert(error);
    },
  });
}

function checkNumber(box) {
  $("input." + box).keyup(function (event) {
    if (
      (event.which != 8 && event.which != 0 && event.which < 48) ||
      event.which > 57
    ) {
      $(this).val(function (index, value) {
        return value.replace(/\D/g, "");
      });
    }
  });
}
$(document).ready(function () {
  var hg = 270;
  $(".item-test").css("height", hg + "px");
  $(".item-hg").css("height", hg + "px");
  $(".buscarLNB").click(function () {
    searchStudent($("#buscarNotaEstudiante").val(), 2);
  });
  $(".dropdown-toggle").dropdown("update");
  $("#buscarCedulaMB").click(function () {
    searchStudent($("#buscarCedula").val(), 1);
  });
  $("#AceptarNS").click(function () {
    updateStudentNote($(".correo").val(), $("#periodoPD").val());
  });
  $("#AceptarLNM").click(function () {
    if ($(".planilla").is(":checked") == true) {
      var link =
        "../../../SistemaEaD/controller/php/templateNotasTeacher.php?cd=" +
        $("#m1I").val() +
        "&prd=" +
        $("#periodoLNM").val();
      window.open(link, "newStuff");
    } else {
      var link =
        "../../../SistemaEaD/controller/php/templateNotas.php?cd=" +
        $("#m1I").val() +
        "&prd=" +
        $("#periodoLNM").val();
      window.open(link, "newStuff");
    }
  });
  $("#AceptarP").click(function () {
    var record;
    if ($(".record").is(":checked") == true) {
      record = $(".record").val();
    } else {
      record = false;
    }
    var link =
      "../../../SistemaEaD/controller/php/templateNotasEstudiante.php?cedula=" +
      $("#cedulaLN").val()+"&periodo="+$('#periodoPD').val();
    window.open(link, "newStuff");
  });
  checkNumber("buscarCedulaM");
  checkNumber("buscarCedulaN");
});
