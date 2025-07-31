let countCollegeI;
let preCheck;
//let checkedRO
categoryShow();
function categoryShow() {
  var peticionD = $.ajax({
    url: "/SistemaEaD/controller/php/searchCarrera.php",
    type: "POST",
    data: {},
    dataType: "json",
    success: function (responseI) {
      for (let x = 0; x <= responseI.length; x++) {
        countCollegeI = x + 200;
        if (x == 0) {
          $(".inscription").append(
            "<div class='dropdown-item'><input readonly  type='radio' hidden class='form-check-input' id='" +
              countCollegeI +
              "' name='carrera' name='carreraM' value=" +
              responseI[x]["codigo"] +
              "> <label class='form-check-label' id='" +
              countCollegeI +
              "'>" +
              responseI[x]["nombre"] +
              "</label></div>"
          );
          $(".inscriptionEdit").append(
            "<div class='dropdown-item'><input readonly  type='radio' hidden class='form-check-input " +
              countCollegeI +
              "' name='carreraID' name='carreraM' value=" +
              responseI[x]["codigo"] +
              "> <label class='form-check-label " +
              countCollegeI +
              "'>" +
              responseI[x]["nombre"] +
              "</label></div>"
          );
        } else {
          $(".inscription").append(
            "<div class='dropdown-item'><input readonly  type='radio' hidden class='form-check-input' id='" +
              countCollegeI +
              "' name='carrera' name='carreraM' value=" +
              responseI[x]["codigo"] +
              "> <label class='form-check-label' id='" +
              countCollegeI +
              "'>" +
              responseI[x]["nombre"] +
              "</label></div>"
          );
          $(".inscriptionEdit").append(
            "<div class='dropdown-item'><input readonly  type='radio' hidden class='form-check-input " +
              countCollegeI +
              "' name='carreraID' name='carreraM' value=" +
              responseI[x]["codigo"] +
              "> <label class='form-check-label " +
              countCollegeI +
              "'>" +
              responseI[x]["nombre"] +
              "</label></div>"
          );
        }
      }
      $(document).ready(function() {
        $('.dropdown-toggle').dropdown('update')
        for (let x = 200; x <= countCollegeI; x++) {
            $("#"+x).click(function () {
                $(".carreraI").val($("label[id='"+x+"']").text())
                $("#divRemove").remove();
                $("#labelRemove").remove();
                $("#hrRemove").remove();
                $(".divRemove").remove();
                $(".labelRemove").remove();
                $(".hrRemove").remove();
                matterShow(this.value, 1)
                carrera(this.value)
                console.log(this.value)
            }) 
            $("."+x).click(function () {
                $(".carreraM").val($("label."+x).text())
                $("#divRemove").remove();
                $("#labelRemove").remove();
                $("#hrRemove").remove();
                $(".divRemove").remove();
                $(".labelRemove").remove();
                $(".hrRemove").remove();
                matterShow(this.value, 2)
                carrera(this.value)
                console.log(this.value)                
            }) 
        }
    })
    },
    error: function (requestI, errorI) {
      alert(errorI);
    },
  });
}
