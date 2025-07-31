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
  $(".textInfoProM").hide(10000);
}

let create = document.getElementById("create");

create.addEventListener("submit", async e => {
  e.preventDefault();
  const createDate = new FormData(create);
  const req = await fetch("../../controller/php/crearEstudiante.php", {
    method: "POST",
    body: createDate
  });
  resetForm();
  const res = await req.json();
  messengerAlert(res.error, res.color);
});

let modify = document.getElementById("modify");

modify.addEventListener("submit", async e => {
  e.preventDefault();
  const modifyDate = new FormData(modify);
  const req = await fetch("../../controller/php/modificarEstudiante.php", {
    method: "POST",
    body: modifyDate
  });
  resetForm();
  const res = await req.json();
  messengerAlert(res.error, res.color);
});

let delet = document.getElementById("delet");

delet.addEventListener("submit", async e => {
  e.preventDefault();
  const deletDate = new FormData(delet);
  const req = await fetch("../../controller/php/eliminarEstudiante.php", {
    method: "POST",
    body: deletDate
  });
  resetForm();
  const res = await req.json();
  messengerAlert(res.error, res.color);
});

let inscription = document.getElementById("inscription");

inscription.addEventListener("submit", async e => {
  e.preventDefault();
  const inscriptionDate = new FormData(inscription);
  const req = await fetch("../../controller/php/inscribirAlumno.php", {
    method: "POST",
    body: inscriptionDate
  });
  resetForm();
  const res = await req.json();
  messengerAlert(res.error, res.color);
});

let inscriptionEdit = document.getElementById("inscriptionEdit");

inscriptionEdit.addEventListener("submit", async e => {
  e.preventDefault();
  const inscriptionEDate = new FormData(inscriptionEdit);
  const req = await fetch("../../controller/php/inscribirAlumnoMod.php", {
    method: "POST",
    body: inscriptionEDate
  });
  resetForm();
  const res = await req.json();
  messengerAlert(res.error, res.color);
});

let countPeriod;
function searchStudentPeriod(req, type) {
  var parameters = {
    cedula: req
  };
  var petition = $.ajax({
    url: "../../controller/php/buscarAlumnoInscrito.php",
    type: "POST",
    data: parameters,
    dataType: "json",
    success: function(response) {
      for (let x = 0; x < response.length; x++) {
        if (x == 0) {
          if (response[x]["carrera"] == 1) $(".200").prop("checked", true);
          if (response[x]["carrera"] == 2) $(".201").prop("checked", true);
          if (response[x]["carrera"] == 3) $(".202").prop("checked", true);
          if (response[x]["carrera"] == 4) $(".203").prop("checked", true);
          if (response[x]["carrera"] == 5) $(".204").prop("checked", true);
          if (response[x]["carrera"] == 6) $(".205").prop("checked", true);
        }
        countPeriod = x + 300;
        if (type == 1) {
          if (x == 0) {
            $(".divRemovePeriod").remove();
            $(".payrollList").append(
              "<div class='dropdown-item divRemovePeriod'><input readonly type='radio' class='form-check-input' id='" +
                countPeriod +
                "' value=" +
                response[x]["periodo"] +
                "> <label class='form-check-label' id='" +
                countPeriod +
                "'>" +
                response[x]["periodo"] +
                "</label></div>"
            );
          } else {
            $(".payrollList").append(
              "<div class='dropdown-item divRemovePeriod'><input readonly type='radio' class='form-check-input' id='" +
                countPeriod +
                "' value=" +
                response[x]["periodo"] +
                "> <label class='form-check-label' id='" +
                countPeriod +
                "'>" +
                response[x]["periodo"] +
                "</label></div>"
            );
          }
          for (let x = 0; x <= countPeriod; x++) {
            $("#" + x).click(function() {
              $(".periodoI").val($("label[id='" + x + "']").text());
            });
          }
        }
        if (type == 2) {
          if (x == 0) {
            $(".divRemovePeriodI").remove();
            $("#payrollListStudent").append(
              "<div class='dropdown-item divRemovePeriodI'><input readonly type='radio' class='form-check-input " +
                countPeriod +
                "' value=" +
                response[x]["periodo"] +
                "> <label class='form-check-label " +
                countPeriod +
                "'>" +
                response[x]["periodo"] +
                "</label></div>"
            );
          } else {
            $("#payrollListStudent").append(
              "<div class='dropdown-item divRemovePeriodI'><input readonly type='radio' class='form-check-input " +
                countPeriod +
                "' value=" +
                response[x]["periodo"] +
                "> <label class='form-check-label " +
                countPeriod +
                "'>" +
                response[x]["periodo"] +
                "</label></div>"
            );
          }
          for (let x = 300; x <= countPeriod; x++) {
            $("." + x).click(function() {
              $("#periodoPD").val($("label[id='" + x + "']").val());
              searchStudentPayroll(
                $("#buscarCedulaID").val(),
                $("." + x).val()
              );
            });
          }
        }
      }
      if (response.color == "bg-danger") {
        messengerAlert(response.error, response.color);
      } else {
        messengerAlert("Datos del estudiante encontrado.", "bg-success");
      }
    },
    error: function(request, error) {
      console.log(request);
      console.log(error);
      //debugger;
    }
  });
}
function searchStudentPayroll(req, peri) {
  var parameters = {
    cedula: req,
    periodo: peri
  };
  var petition = $.ajax({
    url: "../../controller/php/buscarAlumnoIns.php",
    type: "POST",
    data: parameters,
    dataType: "json",
    success: function(response) {
      $("#periodoPD").val(response.prd);
      if (response.m1 != "") {
        $("#m1IID").val(response.m1);
        $("#ms1").val(response.s1);
        $("." + response.m1).prop("checked", true);
        searchMatterI(response.m1, 1);
      }
      if (response.m2 != "") {
        $("#m2IID").val(response.m2);
        $("#ms2").val(response.s2);
        $("." + response.m2).prop("checked", true);
        searchMatterI(response.m2, 2);
      }
      if (response.m3 != "") {
        $("#m3IID").val(response.m3);
        $("#ms3").val(response.s3);
        $("." + response.m3).prop("checked", true);
        searchMatterI(response.m3, 3);
      }
      if (response.m4 != "") {
        $("#m4IID").val(response.m4);
        $("#ms4").val(response.s4);
        $("." + response.m4).prop("checked", true);
        searchMatterI(response.m4, 4);
      }
      if (response.m5 != "") {
        $("#m5IID").val(response.m5);
        $("#ms5").val(response.s5);
        $("." + response.m5).prop("checked", true);
        searchMatterI(response.m5, 5);
      }
      if (response.m6 != "") {
        $("#m6IID").val(response.m6);
        $("#ms6").val(response.s6);
        $("." + response.m6).prop("checked", true);
        searchMatterI(response.m6, 6);
      }
      if (response.m7 != "") {
        $("#m7IID").val(response.m7);
        $("#ms7").val(response.s7);
        $("." + response.m7).prop("checked", true);
        searchMatterI(response.m7, 7);
      }
      if (response.m8 != "") {
        $("#m8IID").val(response.m8);
        $("#ms8").val(response.s8);
        $("." + response.m8).prop("checked", true);
        searchMatterI(response.m8, 8);
      }
    },
    error: function(request, error) {
      console.log(request);
      console.log(error);
    }
  });
}

function readyDocument() {
  console.log("Sistema diseñado y creado por Andonis Harin Ayala Avila");
}
function carrera(e) {
  console.log("Universidad Alonso de Ojeda");
}

function searchMatterI(req, type) {
  var parameters = {
    codigo: req
  };
  var petition = $.ajax({
    url: "../../controller/php/buscarMateriaE.php",
    type: "POST",
    data: parameters,
    dataType: "json",
    success: function(response) {
      if (type == 1) $("#m1ID").val(response.materia);
      if (type == 2) $("#m2ID").val(response.materia);
      if (type == 3) $("#m3ID").val(response.materia);
      if (type == 4) $("#m4ID").val(response.materia);
      if (type == 5) $("#m5ID").val(response.materia);
      if (type == 6) $("#m6ID").val(response.materia);
      if (type == 7) $("#m7ID").val(response.materia);
      if (type == 8) $("#m8ID").val(response.materia);
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
function resetFormSearch() {
  $("#create").trigger("reset");
  $("#modify").trigger("reset");
  $("#delet").trigger("reset");
  $("#inscription").trigger("reset");
  $("#inscriptionEdit").trigger("reset");
  $(".divRemovePeriod").remove();
  $("#200").prop("checked", false);
  $("#201").prop("checked", false);
  $("#202").prop("checked", false);
  $("#203").prop("checked", false);
  $("#204").prop("checked", false);
  $("#205").prop("checked", false);
  $(".200").prop("checked", false);
  $(".201").prop("checked", false);
  $(".202").prop("checked", false);
  $(".203").prop("checked", false);
  $(".204").prop("checked", false);
  $(".205").prop("checked", false);
  $("#100").prop("checked", false);
  $("#101").prop("checked", false);
  $("#102").prop("checked", false);
  $("#103").prop("checked", false);
  $("#104").prop("checked", false);
  $("#105").prop("checked", false);
  $(".100").prop("checked", false);
  $(".101").prop("checked", false);
  $(".102").prop("checked", false);
  $(".103").prop("checked", false);
  $(".104").prop("checked", false);
  $(".105").prop("checked", false);
  $("#1").prop("checked", false);
  $("#2").prop("checked", false);
  $("#3").prop("checked", false);
  $("#4").prop("checked", false);
  $("#5").prop("checked", false);
  $("#6").prop("checked", false);
  $(".1").prop("checked", false);
  $(".2").prop("checked", false);
  $(".3").prop("checked", false);
  $(".4").prop("checked", false);
  $(".5").prop("checked", false);
  $(".6").prop("checked", false);
  for (let temp = 0; temp < 100; temp++) {
    $("#divRemove").remove();
    $("#labelRemove").remove();
    $("#hrRemove").remove();
    $(".divRemove").remove();
    $(".labelRemove").remove();
    $(".hrRemove").remove();
    $(".divRemovePeriod").remove();
  }
}
function resetForm() {
  $("#create").trigger("reset");
  $("#modify").trigger("reset");
  $("#delet").trigger("reset");
  $("#planilla").trigger("reset");
  $("#searchModify").trigger("reset");
  $("#searchDelet").trigger("reset");
  $("#searchInscription").trigger("reset");
  $("#inscription").trigger("reset");
  $("#searchInscriptionMod").trigger("reset");
  $("#inscriptionEdit").trigger("reset");
  $("#planilla").trigger("reset");
  $("#carreraID").trigger("reset");
  $("#200").prop("checked", false);
  $("#201").prop("checked", false);
  $("#202").prop("checked", false);
  $("#203").prop("checked", false);
  $("#204").prop("checked", false);
  $("#205").prop("checked", false);
  $(".200").prop("checked", false);
  $(".201").prop("checked", false);
  $(".202").prop("checked", false);
  $(".203").prop("checked", false);
  $(".204").prop("checked", false);
  $(".205").prop("checked", false);
  $("#100").prop("checked", false);
  $("#101").prop("checked", false);
  $("#102").prop("checked", false);
  $("#103").prop("checked", false);
  $("#104").prop("checked", false);
  $("#105").prop("checked", false);
  $(".100").prop("checked", false);
  $(".101").prop("checked", false);
  $(".102").prop("checked", false);
  $(".103").prop("checked", false);
  $(".104").prop("checked", false);
  $(".105").prop("checked", false);
  $("#1").prop("checked", false);
  $("#2").prop("checked", false);
  $("#3").prop("checked", false);
  $("#4").prop("checked", false);
  $("#5").prop("checked", false);
  $("#6").prop("checked", false);
  $(".1").prop("checked", false);
  $(".2").prop("checked", false);
  $(".3").prop("checked", false);
  $(".4").prop("checked", false);
  $(".5").prop("checked", false);
  $(".6").prop("checked", false);
  for (let temp = 0; temp < 200; temp++) {
    $("#divRemove").remove();
    $("#labelRemove").remove();
    $("#hrRemove").remove();
    $(".divRemove").remove();
    $(".labelRemove").remove();
    $(".hrRemove").remove();
    $(".divRemovePeriod").remove();
  }
}

$(document).ready(function() {
  $("#cancelarC").click(function() {
    resetForm();
  });
  $("#cancelarCR").click(function() {
    resetForm();
  });
  $("#cancelarM").click(function() {
    resetForm();
  });
  $("#cancelarD").click(function() {
    resetForm();
  });
  $(".cancelarI").click(function() {
    resetForm();
    for (let temp = 0; temp < 200; temp++) {
      $("#divRemove").remove();
      $("#labelRemove").remove();
      $("#hrRemove").remove();
      $(".divRemove").remove();
      $(".labelRemove").remove();
      $(".hrRemove").remove();
      $(".divRemovePeriod").remove();
    }
    $("#carreraID").trigger("reset");
    console.log("hi");
  });
  $("#cancelarP").click(function() {
    resetForm();
  });
  $("#buscarEP").click(function() {
    resetFormSearch();
    searchStudentPeriod($("#buscarPlanillaEstudiante").val(), 1);
  });
  $("#AceptarP").click(function() {
    var link =
      "../../controller/php/templateInscription.php?cd=" +
      $(".cedulaP").val() +
      "&prd=" +
      $("#periodoP").val();
    window.open(link, "newStuff");
    resetForm();
  });
  $("#AceptarLis").click(function() {
    var link =
      "../../controller/php/templateListStudent.php?prd=" +
      $("#periodoLis").val();
    window.open(link, "newStuff");
    resetForm();
  });
  $("#buscarCedulaMB").click(function() {
    resetFormSearch();
    searchStudent($("#buscarCedulaM").val(), 1);
  });
  $("#buscarCedulaEMB").click(function() {
    resetFormSearch();
    searchStudent($("#buscarCedulaEM").val(), 2);
  });
  $("#buscarCedulaEDB").click(function() {
    resetFormSearch();
    searchStudent($("#buscarCedulaED").val(), 3);
  });
  $("#buscarCedulaIDB").click(function() {
    resetFormSearch();
    searchStudent($("#buscarCedulaID").val(), 4);
    searchStudentPeriod($("#buscarCedulaID").val(), 2);
  });
  checkNumber("buscarCedulaM");
  checkNumber("telefonoC");
  checkNumber("cedulaC");
  checkNumber("buscarCedulaEM");
  checkNumber("cedulaM");
  checkNumber("telefonoM");
  checkNumber("buscarCedulaED");
});

function setCarrer(req, type) {
  var petition = $.ajax({
    url: "../../controller/php/searchCarrera.php",
    type: "POST",
    dataType: "json",
    success: function(response) {
      console.log(response.length);
      var carrerTemp;
      for (let i = 0; i <= response.length; i++) {
        if (response[i].codigo == req && type == 2) {
          console.log(response[i].nombre)
          $("#carreraM").val(response[i].nombre);
          $("#carreraMN").val(response[i].codigo);
        }
        if (response[i].codigo == req && type == 3) {
          console.log(response[i].nombre)
          $(".carreraD").val(response[i].nombre);
        }
      }
    },
    error: function(request, error) {
      alert(error);
    }
  });
}
function searchProcedent(req) {
  var petition = $.ajax({
    url: "../../controller/php/buscarProcedencia.php",
    type: "POST",
    dataType: "json",
    success: function(response) {
      for (let i = 0; i <= response.length; i++) {
        if (response[i].id == req) {
          console.log(response[i].id)
          $("#procedenciaM").val(response[i].procedencia);
          $("#procedenciaMN").val(response[i].id);
        }
      }
    },
    error: function(request, error) {
      alert(error);
    }
  });
}

function searchStudent(req, type) {
  var parameters = {
    cedula: req
  };
  var petition = $.ajax({
    url: "../../controller/php/buscarEstudiante.php",
    type: "POST",
    data: parameters,
    dataType: "json",
    success: function(response) {
      console.log(type);
      console.log(response.carrera);
      if (type == 1) {
        $("#cedulaI").val(response.cedula);
        $("#nombreI").val(response.nombre);
        if (response.carrera == 1) {
          $("#200").prop("checked", true);
          $("#201").prop("checked", false);
          $("#202").prop("checked", false);
          $("#203").prop("checked", false);
          $("#204").prop("checked", false);
          $("#205").prop("checked", false);
          $(".carreraI").val($("label[id='200']").text());
          matterShow(response.carrera, 1);
        }
        if (response.carrera == 2) {
          $("#200").prop("checked", false);
          $("#201").prop("checked", true);
          $("#202").prop("checked", false);
          $("#203").prop("checked", false);
          $("#204").prop("checked", false);
          $("#205").prop("checked", false);
          $(".carreraI").val($("label[id='201']").text());
          matterShow(response.carrera, 1);
        }
        if (response.carrera == 3) {
          $("#200").prop("checked", false);
          $("#201").prop("checked", false);
          $("#202").prop("checked", true);
          $("#203").prop("checked", false);
          $("#204").prop("checked", false);
          $("#205").prop("checked", false);
          $(".carreraI").val($("label[id='202']").text());
          matterShow(response.carrera, 1);
        }
        if (response.carrera == 4) {
          $("#200").prop("checked", false);
          $("#201").prop("checked", false);
          $("#202").prop("checked", false);
          $("#203").prop("checked", true);
          $("#204").prop("checked", false);
          $("#205").prop("checked", false);
          $(".carreraI").val($("label[id='203']").text());
          matterShow(response.carrera, 1);
        }
        if (response.carrera == 5) {
          $("#200").prop("checked", false);
          $("#201").prop("checked", false);
          $("#202").prop("checked", false);
          $("#203").prop("checked", false);
          $("#204").prop("checked", true);
          $("#205").prop("checked", false);
          $(".carreraI").val($("label[id='204']").text());
          matterShow(response.carrera, 1);
        }
        if (response.carrera == 6) {
          $("#200").prop("checked", false);
          $("#201").prop("checked", false);
          $("#202").prop("checked", false);
          $("#203").prop("checked", false);
          $("#204").prop("checked", false);
          $("#205").prop("checked", true);
          $(".carreraI").val($("label[id='205']").text());
          matterShow(response.carrera, 1);
        }
        if (response.carrera == 7) {
          $("#200").prop("checked", false);
          $("#201").prop("checked", false);
          $("#202").prop("checked", false);
          $("#203").prop("checked", false);
          $("#204").prop("checked", false);
          $("#205").prop("checked", true);
          $("#206").prop("checked", true);
          $(".carreraI").val($("label[id='206']").text());
          matterShow(response.carrera, 1);
        }
      }
      if (type == 2) {
        $(".cedulaM").val(response.cedula);
        $(".nombreM").val(response.nombre);
        $(".telefonoM").val(response.telefono);
        $(".emailM").val(response.email);
        $(".procedenciaM").val(response.procedencia);
        setCarrer(response.carrera, 2);
        searchProcedent(response.procedencia);
        $(".perIngresoM").val(response.perIngreso);
      }
      if (type == 3) {
        $(".cedulaD").val(response.cedula);
        $(".nombreD").val(response.nombre);
        $(".telefonoD").val(response.telefono);
        $(".emailD").val(response.email);
        $(".procedenciaD").val(response.procedencia);
        setCarrer(response.carrera, 3);
        $(".perIngresoD").val(response.perIngreso);
      }
      if (type == 4) {
        $("#cedulaIID").val(response.cedula);
        $("#nombreIID").val(response.nombre);

        if (response.carrera == 1) {
          $(".200").prop("checked", true);
          $(".201").prop("checked", false);
          $(".202").prop("checked", false);
          $(".203").prop("checked", false);
          $(".204").prop("checked", false);
          $(".205").prop("checked", false);
          $(".carreraM").val($("label.200").text());
          matterShow(response.carrera, 2);
        }
        if (response.carrera == 2) {
          $(".200").prop("checked", false);
          $(".201").prop("checked", true);
          $(".202").prop("checked", false);
          $(".203").prop("checked", false);
          $(".204").prop("checked", false);
          $(".205").prop("checked", false);
          $(".carreraM").val($("label.201").text());
          matterShow(response.carrera, 2);
        }
        if (response.carrera == 3) {
          $(".200").prop("checked", false);
          $(".201").prop("checked", false);
          $(".202").prop("checked", true);
          $(".203").prop("checked", false);
          $(".204").prop("checked", false);
          $(".205").prop("checked", false);
          $(".carreraM").val($("label.202").text());
          matterShow(response.carrera, 2);
        }
        if (response.carrera == 4) {
          $(".200").prop("checked", false);
          $(".201").prop("checked", false);
          $(".202").prop("checked", false);
          $(".203").prop("checked", true);
          $(".204").prop("checked", false);
          $(".205").prop("checked", false);
          $(".carreraM").val($("label.203").text());
          matterShow(response.carrera, 2);
        }
        if (response.carrera == 5) {
          $(".200").prop("checked", false);
          $(".201").prop("checked", false);
          $(".202").prop("checked", false);
          $(".203").prop("checked", false);
          $(".204").prop("checked", true);
          $(".205").prop("checked", false);
          $(".carreraM").val($("label.204").text());
          matterShow(response.carrera, 2);
        }
        if (response.carrera == 6) {
          $(".200").prop("checked", false);
          $(".201").prop("checked", false);
          $(".202").prop("checked", false);
          $(".203").prop("checked", false);
          $(".204").prop("checked", false);
          $(".205").prop("checked", true);
          $(".carreraM").val($("label.205").text());
          matterShow(response.carrera, 2);
        }
      }
    }
  });
}
periodShow();
function periodShow() {
  var peticion = $.ajax({
    url: "../../controller/php/buscarPeriodo.php",
    type: "POST",
    dataType: "json",
    success: function(response) {
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
          $(".list-period-Lis").append(
            "<div class='dropdown-item'><input hidden type='radio' class='form-check-input " +
              response[x]["idPeriodo"] +
              "-Lis" +
              "' value=" +
              response[x]["idPeriodo"] +
              " > <label class='form-check-label " +
              response[x]["idPeriodo"] +
              "-Lis" +
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
          $(".list-period-Lis").append(
            "<div class='dropdown-item'><input hidden type='radio' class='form-check-input " +
              response[x]["idPeriodo"] +
              "-Lis" +
              "' value=" +
              response[x]["idPeriodo"] +
              "> <label class='form-check-label " +
              response[x]["idPeriodo"] +
              "-Lis" +
              "'>" +
              response[x]["idPeriodo"] +
              "</label></div>"
          );
        }
        $("." + response[x]["idPeriodo"]).click(function() {
          $(".periodoIL").val($("label." + response[x]["idPeriodo"]).text());
          console.log($("label." + response[x]["idPeriodo"]).text());
        });
        $("." + response[x]["idPeriodo"] + "-EI").click(function() {
          $(".periodoIE").val(
            $("label." + response[x]["idPeriodo"] + "-EI").text()
          );
          console.log($("label." + response[x]["idPeriodo"] + "-EI").text());
        });
        $("." + response[x]["idPeriodo"] + "-Lis").click(function() {
          $(".periodoLis").val(
            $("label." + response[x]["idPeriodo"] + "-Lis").text()
          );
          console.log($("label." + response[x]["idPeriodo"] + "-Lis").text());
        });
      }
    },
    error: function(request, error) {
      alert(error);
    }
  });
}

precedentShow();
function precedentShow() {
  var peticion = $.ajax({
    url: "/SistemaEaD/controller/php/buscarProcedencia.php",
    type: "POST",
    data: {},
    dataType: "json",
    success: function(response) {
      for (let x = 0; x < response.length; x++) {
        if (x == 0) {
          $(".listEditProce").append(
            "<div class='dropdown-item'><input type='radio' hidden class='form-check-input procedenciaC " +
              +response[x]["procedencia"] +
              "' name='procedenciaC' value=" +
              response[x]["id"] +
              " > <label class='form-check-label " +
              +response[x]["id"] +
              "-N" +
              "-I" +
              "'>" +
              response[x]["procedencia"] +
              "</label></div>"
          );
          $(".listProce").append(
            "<div class='dropdown-item'><input type='radio' hidden class='form-check-input procedenciaC " +
              +response[x]["id"] +
              "-IM" +
              "' name='procedenciaC' value=" +
              response[x]["id"] +
              " > <label class='form-check-label " +
              +response[x]["id"] +
              "-IM" +
              "'>" +
              response[x]["procedencia"] +
              "</label></div>"
          );
        } else {
          $(".listEditProce").append(
            "<div class='dropdown-item'><input type='radio' hidden class='form-check-input procedenciaC " +
              +response[x]["procedencia"] +
              "' name='procedenciaC' value=" +
              response[x]["id"] +
              "> <label class='form-check-label " +
              +response[x]["id"] +
              "-N" +
              "-I" +
              "'>" +
              response[x]["procedencia"] +
              "</label></div>"
          );
          $(".listProce").append(
            "<div class='dropdown-item'><input type='radio' hidden class='form-check-input procedenciaC " +
              +response[x]["id"] +
              "-IM" +
              "' name='procedenciaC' value=" +
              response[x]["id"] +
              " > <label class='form-check-label " +
              +response[x]["id"] +
              "-IM" +
              "'>" +
              response[x]["procedencia"] +
              "</label></div>"
          );
        }
        console.log(response[x]["procedencia"]);
        if (x == 2) {
          $(".dropdown-toggle").dropdown("update");
          for (let temp = 0; temp <= response.length; temp++) {
            $("." + response[temp]["id"] + "-N-I").click(function() {
              $("#procedenciaC").val(
                $("label." + response[temp]["id"] + "-N-I").text()
              );
              $("#procedenciaCN").val($("." + response[temp]["id"]).val());
            });

            $("." + response[temp]["id"] + "-IM").click(function() {
              $("#procedenciaM").val(
                $("label." + response[temp]["id"] + "-IM").text()
              );
              $("#procedenciaMN").val(
                $("." + response[temp]["id"] + "-IM").val()
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

for (let tempSec = 1; tempSec <= 8; tempSec++) {
  sectionShow(tempSec);
}

function sectionShow(tSec) {
  var peticionD = $.ajax({
    url: "/SistemaEaD/controller/php/buscarSeccion.php",
    type: "POST",
    data: {},
    dataType: "json",
    success: function (responseD) { 
      for (let x = 0; x < responseD.length; x++) {
        if(x==0){
          $(".s"+tSec+"M").append(
            "<div class='dropdown-item'> <label class='form-check-label'>" +
              "Turno matutino" +
              "</label></div>"+
              "<div role='separator' class='dropdown-divider'></div>"
          );
          $(".ms"+tSec+"M").append(
            "<div class='dropdown-item'> <label class='form-check-label'>" +
              "Turno matutino" +
              "</label></div>"+
              "<div role='separator' class='dropdown-divider'></div>"
          );
        }
        if(x==4){
          $(".s"+tSec+"M").append(
            "<div class='dropdown-item'> <label class='form-check-label'>" +
              "Turno diurno" +
              "</label></div>"+
              "<div role='separator' class='dropdown-divider'></div>"
          );
          $(".ms"+tSec+"M").append(
            "<div class='dropdown-item'> <label class='form-check-label'>" +
              "Turno diurno" +
              "</label></div>"+
              "<div role='separator' class='dropdown-divider'></div>"
          );
        }
        if(x==8){
          $(".s"+tSec+"M").append(
            "<div class='dropdown-item'> <label class='form-check-label'>" +
              "Turno nocturno" +
              "</label></div>"+
              "<div role='separator' class='dropdown-divider'></div>"
          );
          $(".ms"+tSec+"M").append(
            "<div class='dropdown-item'> <label class='form-check-label'>" +
              "Turno nocturno" +
              "</label></div>"+
              "<div role='separator' class='dropdown-divider'></div>"
          );
        }
        $(".s"+tSec+"M").append(
          "<div class='dropdown-item'> <label class='form-check-label " +
            responseD[x]["seccion"] +
            "-S" +"-"+tSec+
            "'>" +
            responseD[x]["seccion"] +
            "</label></div>"
        );
        $(".ms"+tSec+"M").append(
          "<div class='dropdown-item'> <label class='form-check-label " +
            responseD[x]["seccion"] +
            "-SM" +"-"+tSec+
            "'>" +
            responseD[x]["seccion"] +
            "</label></div>"
        );
        if (x == 11) {
          for (let temp = 0; temp <= responseD.length; temp++) {
            $("." + responseD[temp]["seccion"] + "-S"+"-"+tSec).click(function () {
              $("#s"+tSec).val(
                $("." + responseD[temp]["seccion"] + "-S"+"-"+tSec).text()
              );
            }); 
            $("." + responseD[temp]["seccion"] + "-SM"+"-"+tSec).click(function () {
              $("#ms"+tSec).val(
                $("." + responseD[temp]["seccion"] + "-SM"+"-"+tSec).text()
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