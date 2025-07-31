let classColorM;
let classColorD;
let arrayTrue = new Array();

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
let create = document.getElementById("create");

create.addEventListener("submit", async (e) => {
  e.preventDefault();
  const createDate = new FormData(create);
  const req = await fetch("../../controller/php/crearProfesor.php", {
    method: "POST",
    body: createDate,
  });
  const res = await req.json();
  $("#create").trigger("reset");
  messengerAlert(res.error, res.color);
});

let modify = document.getElementById("modify");

modify.addEventListener("submit", async (e) => {
  e.preventDefault();
  const modifyDate = new FormData(modify);
  const req = await fetch("../../controller/php/modificarProfesor.php", {
    method: "POST",
    body: modifyDate,
  });
  const res = await req.json();
  $("#modify").trigger("reset");
  $("#searchModify").trigger("reset");
  messengerAlert(res.error, res.color);
});

let getCarrera;

function carrera(e) {
  getCarrera = e;
}

function checkedDelete(e) {
  var val;
  if (e == true) {
    val = 1;
  } else {
    val = 0;
  }
  return val;
}

function registerMatter() {
  var parameters = {
    cedulaI: $("#cedulaI").val(),
    carreraC: getCarrera,
    m1I: $("#m1I").val(),
    periodoM: $("#periodoIE").val(),
    dM: checkedDelete($(".deleteMatter").is(":checked")),
  };
  var res = $.ajax({
    url: "../../controller/php/insgresarProfesorMateria.php",
    type: "POST",
    data: parameters,
    dataType: "json",
    success: function (res) {
      if (res.color != "bg-danger") {
        $("#registerProMat").trigger("reset");
        $("#searchModify").trigger("reset");
      }
      messengerAlert(res.error, res.color);
    },
    error: function (error) {
      alert(error);
    },
  });
}

function deletTeacher(req) {
  var parameters = {
    cedula: req,
  };
  var res = $.ajax({
    url: "../../controller/php/eliminarProfesor.php",
    type: "POST",
    data: parameters,
    dataType: "json",
    success: function (res) {
      $("#delet").trigger("reset");
      $("#searchDelet").trigger("reset");
      messengerAlert(res.error, res.color);
    },
  });
}

function searchTeacher(req, type) {
  var parameters = {
    cedula: req,
  };
  var res = $.ajax({
    url: "../../controller/php/buscarProfesor.php",
    type: "POST",
    data: parameters,
    dataType: "json",
    success: function (response) {
      if (type == 1) {
        $("#cedulaM").val(response.cedula);
        $("#nombreM").val(response.nombre);
        $("#profesionM").val(response.profesion);
        $("#correoM").val(response.correo);
        $("#telefonoM").val(response.telefono);
      }
      if (type == 2) {
        $("#cedulaD").val(response.cedula);
        $("#nombreD").val(response.nombre);
        $("#profesionD").val(response.profesion);
        $("#correoD").val(response.correo);
        $("#telefonoD").val(response.telefono);
      }
      if (type == 3) {
        $("#cedulaI").val(response.cedula);
        $("#nombreI").val(response.nombre);
      }
      messengerAlert(response.error, response.color);
    },
    error: function (error) {
      console.log(parameters);
      console.log(type);
      console.log(error);
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

function readyDocument() {
  for (let temp = 0; temp < arrayTrue.length; temp++) {
    $("." + arrayTrue[temp]).prop("checked", true);
  }
  for (let temp = 0; temp < arrayTrue.length; temp++) {
    arrayTrue.splice(0, temp);
  }
}
periodShow();
function periodShow() {
  var peticion = $.ajax({
    url: "../../../SistemaEaD/controller/php/buscarPeriodo.php",
    type: "POST",
    dataType: "json",
    success: function (response) {
      for (let x = 0; x < response.length; x++) {
        if (x == 0) {
          $(".insert-ul").append(
            "<div class='dropdown-item'><input hidden type='radio' class='form-check-input " +
              response[x]["idPeriodo"] +
              "' name='carreraC' value=" +
              response[x]["idPeriodo"] +
              " > <label class='form-check-label " +
              response[x]["idPeriodo"] +
              "'>" +
              response[x]["idPeriodo"] +
              "</label></div>"
          );
          $(".list-period-I").append(
            "<div class='dropdown-item'><input hidden type='radio' class='form-check-input " +
              response[x]["idPeriodo"] +
              "' value=" +
              response[x]["idPeriodo"] +
              " > <label class='form-check-label " +
              response[x]["idPeriodo"] +"-I" +
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
          $(".insert-ul").append(
            "<div class='dropdown-item'><input hidden type='radio' class='form-check-input " +
              response[x]["idPeriodo"] +
              "' name='carreraC' value=" +
              response[x]["idPeriodo"] +
              "> <label class='form-check-label " +
              response[x]["idPeriodo"] +
              "'>" +
              response[x]["idPeriodo"] +
              "</label></div>"
          );
          $(".list-period-I").append(
            "<div class='dropdown-item'><input hidden type='radio' class='form-check-input " +
              response[x]["idPeriodo"] +
              "' value=" +
              response[x]["idPeriodo"] +
              "> <label class='form-check-label " +
              response[x]["idPeriodo"] +"-I" +
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
          $(".periodoP").val($("label." + response[x]["idPeriodo"]).text());
        });
        $("." + response[x]["idPeriodo"]+"-I").click(function () {
          $(".periodoIL").val($("label." + response[x]["idPeriodo"]).text());
        });
        $("." + response[x]["idPeriodo"] + "-EI").click(function () {
          $(".periodoIE").val(
            $("label." + response[x]["idPeriodo"] + "-EI").text()
          );
        });
      }
    },
    error: function (request, error) {
      alert(error);
    },
  });
}

$(document).ready(function () {
  var hg = 270;
  $(".item-test").css("height", hg + "px");
  $(".item-hg").css("height", hg + "px");
  /*  for (let x = 99; x <= count; x++) {
    $("." + x).click(function () {
      $(".divRemove").remove();
      $(".labelRemove").remove();
      $(".hrRemove").remove();
      $("#carreraC").val($("label." + x).text());
      matterShow(this.value, 1);
    });
  } */
  checkNumber("buscarCedulaI");
  checkNumber("buscarCedulaD");
  checkNumber("buscarCedulaM");
  checkNumber("cedulaC");
  checkNumber("telefonoC");
  checkNumber("telefonoM");
  $("#listaProf").click(function () {
    if ($("#m1IID").val() != "") {
      var link =
        "../../../SistemaEaD/controller/php/templateProfesor.php?mt=" +
        $("#m1IID").val() +
        "&prd=" +
        $("#periodoP").val();
      window.open(link, "newStuff");
      $("#list").trigger("reset");
    } else {
      var mensaje = "Verifique que todos los campos están completos.";
      var color = "bg-danger";
      messengerAlert(mensaje, color);
    }
  });
  $("#listaProfTotal").click(function () {
    if($("#generalList").prop('checked')){
      var link =
      "../../../SistemaEaD/controller/php/templateListTeacher.php"
      window.open(link, "newStuff");
    }else{
      if ($("#periodoIL").val() != "") {
        var link =
          "../../../SistemaEaD/controller/php/templateProfesorTotal.php?prd=" +
          $("#periodoIL").val()
        window.open(link, "newStuff");
        $("#list").trigger("reset");
      } else {
        var mensaje = "Verifique que todos los campos están completos.";
        var color = "bg-danger";
        messengerAlert(mensaje, color);
      }
    }
  });

  $("#buscarCedulaDB").click(function () {
    searchTeacher($("#buscarCedulaD").val(), 2);
    $(".textInfoProM").removeClass(classColorD);
  });

  $("#AceptarD").click(function () {
    deletTeacher($("#cedulaD").val());
  });

  $("#buscarCedulaIB").click(function () {
    searchTeacher($("#buscarCedulaI").val(), 3);
    $(".textInfoProM").removeClass(classColorD);
  });
  $("#buscarCedulaMB").click(function () {
    searchTeacher($("#buscarCedulaM").val(), 1);
    $(".textInfoProM").removeClass(classColorM);
  });

  $("#AceptarRPM").click(function () {
    registerMatter();
    $(".textInfoProM").removeClass(classColorM);
  });
});