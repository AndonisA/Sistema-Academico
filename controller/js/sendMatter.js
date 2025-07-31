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

let create = document.getElementById("create");

create.addEventListener("submit", async e => {
  e.preventDefault();
  const createDate = new FormData(create);
  const req = await fetch("../../controller/php/crearMateriaE.php", {
    method: "POST",
    body: createDate
  });
  $("#create").trigger("reset");
  const res = await req.json();
  messengerAlert(res.error, res.color);
});

$("#buscarCedulaMB").click(function() {
  searchMatter($("#buscarMateriaM").val(), 1);
});

let modify = document.getElementById("modify");

modify.addEventListener("submit", async e => {
  e.preventDefault();
  const modifyDate = new FormData(modify);
  const req = await fetch("../../controller/php/modificarMateriaE.php", {
    method: "POST",
    body: modifyDate
  });
  $("#modify").trigger("reset");
  const res = await req.json();
  messengerAlert(res.error, res.color);
});

$("#buscarMateriaDB").click(function() {
  searchMatter($("#buscarMateriaD").val(), 2);
});

let delet = document.getElementById("delet");

delet.addEventListener("submit", async e => {
  e.preventDefault();
  const deletDate = new FormData(delet);
  const req = await fetch("../../controller/php/eliminarMateriaE.php", {
    method: "POST",
    body: deletDate
  });
  $("#delet").trigger("reset");
  const res = await req.json();
  messengerAlert(res.error, res.color);
});

$(document).ready(function() {
  $(".dropdown-toggle").dropdown("update");
  $("#cancelarC").click(function() {
    $("#create").trigger("reset");
  });
  $("#cancelarM").click(function() {
    $("#modify").trigger("reset");
  });
  $("#cancelarD").click(function() {
    $("#delet").trigger("reset");
  });
  $("#cancelarMP").click(function() {
    $("#modPeriod").trigger("reset");
    $("#searchPeriodModify").trigger("reset");
  });
});

function searchMatter(res, type) {
  var parameters = {
    codigo: res
  };
  var peticion = $.ajax({
    url: "../../controller/php/buscarMateriaE.php",
    type: "POST",
    data: parameters,
    dataType: "json",
    success: function(response) {
      if (type == 1) {
        $(".codigoM").val(response.codigo);
        $(".codigoMO").val(response.codigo);
        $(".materiaM").val(response.materia);
        $(".ucM").val(response.uc);
        $(".periodoM").val(response.periodo);
        //$(".carreraM").val(response.carrera);
        searchCollege(response.carrera, 1);
      }
      if (type == 2) {
        $(".codigoD").val(response.codigo);
        $(".materiaD").val(response.materia);
        $(".ucD").val(response.uc);
        $(".periodoD").val(response.periodo);
        //$(".carreraD").val(response.carrera);
        searchCollege(response.carrera, 2);
      }
      messengerAlert(response.error, response.color);
    },
    error: function(request, error) {
      //debugger;

      alert(error);
    }
  });
}
function searchCollege(collegeSearch, type) {
  var parameters = {};
  var petition = $.ajax({
    url: "../../controller/php/searchCarrera.php",
    type: "POST",
    data: parameters,
    dataType: "json",
    success: function(response) {
      if (type == 1) {
        for (let x = 0; x <= response.length; x++) {
          if (response[x]["codigo"] == collegeSearch) {
            $("#carreraM").val(response[x]["nombre"]);
            $("#carreraMN").val(response[x]["codigo"]);
          }
        }
      }
      if (type == 2) {
        for (let x = 0; x <= response.length; x++) {
          if (response[x]["codigo"] == collegeSearch) {
            $(".carreraD").val(response[x]["nombre"]);
          }
        }
      }
    },
    error: function(request, error) {
      alert(error);
    }
  });
}
let count;
collegeShow();
function collegeShow() {
  var peticion = $.ajax({
    url: "../../../SistemaEaD/controller/php/searchCarrera.php",
    type: "POST",
    data: {},
    dataType: "json",
    success: function(response) {
      for (let x = 0; x < response.length; x++) {
        count = x + 1;
        if (x == 0) {
          $(".insert-ul-C").append(
            "<div class='dropdown-item'><input hidden type='radio' class='form-check-input " +
              response[x]["codigo"] +
              "-check" +
              "' value=" +
              response[x]["codigo"] +
              " > <label class='form-check-label " +
              response[x]["codigo"] +
              "'>" +
              response[x]["nombre"] +
              "</label></div>"
          );
          $(".insert-ul-M").append(
            "<div class='dropdown-item'><input hidden type='radio' class='form-check-input " +
              response[x]["codigo"] +
              "-checkM" +
              "' value=" +
              response[x]["codigo"] +
              "-M" +
              " > <label class='form-check-label " +
              response[x]["codigo"] +
              "-M" +
              "'>" +
              response[x]["nombre"] +
              "</label></div>"
          );
        } else {
          $(".insert-ul-C").append(
            "<div class='dropdown-item'><input hidden type='radio' class='form-check-input " +
              response[x]["codigo"] +
              "-check" +
              "' value=" +
              response[x]["codigo"] +
              "> <label class='form-check-label " +
              response[x]["codigo"] +
              "'>" +
              response[x]["nombre"] +
              "</label></div>"
          );
          $(".insert-ul-M").append(
            "<div class='dropdown-item'><input hidden type='radio' class='form-check-input " +
              response[x]["codigo"] +
              "-checkM" +
              "' value=" +
              response[x]["codigo"] +
              "> <label class='form-check-label " +
              response[x]["codigo"] +
              "-M" +
              "'>" +
              response[x]["nombre"] +
              "</label></div>"
          );
        }
        if (x == 6) {
          for (let x = 0; x <= 8; x++) {
            $("." + response[x]["codigo"] + "-M").click(function() {
              $("#carreraM").val(
                $("label." + response[x]["codigo"] + "-M").text()
              );
              $("#carreraMN").val(
                $("." + response[x]["codigo"] + "-checkM").val()
              );
            });
            $("." + response[x]["codigo"]).click(function() {
              $("#carreraC").val($("label." + response[x]["codigo"]).text());
              $("#carreraCN").val(
                $("." + response[x]["codigo"] + "-check").val()
              );
            });
          }
        }
      }
    },
    error: function(request, error) {
      alert(error);
    }
  });
}

$("#AceptarMP").click(function() {
  modifyPeriod($(".periodoMC").val(), $("#periodoMC").val());
});

function searchPeriod(req) {
  var parameters = {
    periodo: req
  };
  var petition = $.ajax({
    url: "../../controller/php/buscarPeriodoCM.php",
    type: "POST",
    data: parameters,
    dataType: "json",
    success: function(response) {
      if (response.color == "bg-success") {
        if (response.periodo != "") {
          $(".periodoMC").removeAttr("readonly");
          $("#cuota1").removeAttr("readonly");
          $("#cuota2").removeAttr("readonly");
          $("#cuota3").removeAttr("readonly");
          $("#cuota4").removeAttr("readonly");
          $("#UCD").removeAttr("readonly");
          $("#UCB").removeAttr("readonly");
          $("#UCBC").removeAttr("readonly");
          $("#INICIAL").removeAttr("readonly");
          $(".periodoMC").val(response.periodo);
          $("#periodoMC").val(response.periodo);
          $("#cuota1").val(response.ct1);
          $("#cuota2").val(response.ct2);
          $("#cuota3").val(response.ct3);
          $("#cuota4").val(response.ct4);
          $("#UCB").val(response.ucb);
          $("#UCBC").val(response.ucbc);
          $("#INICIAL").val(response.inicial);
        } else {
          $(".periodoMC").removeAttr("readonly");
          $("#cuota1").removeAttr("readonly");
          $("#cuota2").removeAttr("readonly");
          $("#cuota3").removeAttr("readonly");
          $("#cuota4").removeAttr("readonly");
          $("#UCD").removeAttr("readonly");
          $("#UCB").removeAttr("readonly");
          $("#UCBC").removeAttr("readonly");
          $("#INICIAL").removeAttr("readonly");
          $("#cuota1").val(response.ct1);
          $("#cuota2").val(response.ct2);
          $("#cuota3").val(response.ct3);
          $("#cuota4").val(response.ct4);
          $("#UCB").val(response.ucb);
          $("#UCBC").val(response.ucbc);
          $("#INICIAL").val(response.inicial);
        }
      }

      messengerAlert(response.error, response.color);
    },
    error: function(request, error) {
      alert(error);
    }
  });
}
function modifyPeriod(req, tempReq) {
  var parameters = {
    periodo: req,
    tempPeriodo: tempReq,
    ct1: $("#cuota1").val(),
    ct2: $("#cuota2").val(),
    ct3: $("#cuota3").val(),
    ct4: $("#cuota4").val(),
    UCD: $("#UCD").val(),
    UCB: $("#UCB").val(),
    UCBC: $("#UCBC").val(),
    IUC: $("#INICIAL").val()
  };
  var petition = $.ajax({
    url: "../../controller/php/modificarPeriodo.php",
    type: "POST",
    data: parameters,
    dataType: "json",
    success: function(response) {
      if (response.color == "bg-success") {
        $("#searchPeriodModify").trigger("reset");
        $("#modPeriod").trigger("reset");
        $(".periodoMC").attr("readonly", "readonly");
        $("#cuota1").attr("readonly", "readonly");
        $("#cuota2").attr("readonly", "readonly");
        $("#cuota3").attr("readonly", "readonly");
        $("#cuota4").attr("readonly", "readonly");
        $("#UCD").attr("readonly", "readonly");
        $("#UCB").attr("readonly", "readonly");
        $("#UCBC").attr("readonly", "readonly");
        $("#INICIAL").attr("readonly", "readonly");
      }
      messengerAlert(response.error, response.color);
    },
    error: function(request, error) {
      alert(error);
    }
  });
}

function checkNumber(box) {
  $("input." + box).keyup(function(event) {
    if (
      (event.which != 8 && event.which != 0 && event.which < 48) ||
      event.which > 57
    ) {
      $(this).val(function(index, value) {
        return value.replace(/\D/g, "");
      });
    }
  });
}

$(document).ready(function() {
  $("#buscarPeriodoB").click(function() {
    searchPeriod($("#periodoP").val());
  });
  $(".dropdown-toggle").dropdown("update");
  checkNumber("ucC");
});
