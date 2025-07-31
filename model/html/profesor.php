<!-- <!DOCTYPE html> -->
<html lang="es">
<?php
include("../../../SistemaEaD/model/php/head.php");

?>

<body class="bg-light">
	<?php
	include("../../../SistemaEaD/model/php/main.php");
	?>

	<div class="container">
		<section>
			<div class="row">
				<div class="col-md-12">
					<h2 class="m1">Gestor de profesores.</h2>
				</div>

				<!-- ****************************************************************************************** -->
				<ul class="nav nav-tabs">
					<li class="nav-item p-0"><a href="#regProfesor" class="nav-link p-2 active" data-toggle="tab">Registrar</a></li>
					<li class="nav-item p-0"><a href="#modProfesor" class="nav-link p-2" data-toggle="tab">Modificar</a></li>
					<li class="nav-item p-0"><a href="#delProfesor" class="nav-link p-2" data-toggle="tab">Eliminar</a></li>
					<li class="nav-item p-0"><a href="#MateProfesor" class="nav-link p-2" data-toggle="tab">Ingresar materia</a></li>
					<li class="nav-item p-0"><a href="#listProfesor" class="nav-link p-2" data-toggle="tab">L. profesores por Materia</a></li>
					<li class="nav-item p-0"><a href="#listTotalProfesor" class="nav-link p-2" data-toggle="tab">Lista de profesores</a></li>
				</ul>
				<!-- ****************************************************************************************** -->
				<div class="bg-white border tab-content rounded-bottom col-md-12 mb-3">

					<div class="tab-pane active" id="regProfesor">
						<h2 class="mt-1 mr-4">Registrar</h2>
						<hr>
						<form method="post" autocomplete="off" id='create' class="md-form form-sm" enctype="multipart/form-data">
							<div class="form-group">
								<label>Cédula</label>
								<input type="text" name="cedulaC" maxlength="10" class="form-control md-2 cedulaC">
								<small class="form-text text-muted">Ingresar solo el número de cédula.</small>
								<label class="mt-2">Nombres y apellidos</label>
								<input type="text" name="nombreC" maxlength="65" class="form-control md-2">
								<small class="form-text text-muted">Nombre completo del profesor.</small>
								<label class="mt-2">Profesión</label>
								<input type="text" name="profesionC" maxlength="65" class="form-control md-2">
								<small class="form-text text-muted">Ocupación del profesor.</small>
								<label class="mt-2">Número de teléfono</label>
								<input type="text" name="telefonoC" maxlength="65" class="form-control md-2 telefonoC">
								<small class="form-text text-muted">Número de teléfono para contactar al profesor.</small>
								<label class="mt-2">Correo electrónico</label>
								<input type="text" name="correoC" maxlength="45" class="form-control md-2">
								<small class="form-text text-muted">Correo electrónico para contactar al profesor.</small>
								<div class="input-group-append mx-auto justify-content-center m-4">
									<button type="button" class="btn btn-outline-secondary btn-sm my-0 mr-4 text-white bg-secondary" id="cancelar">Cancelar</button>
									<button type="submit" class="btn btn-outline-secondary btn-sm my-0 ml-4 text-white bg-secondary" id="Aceptar">Aceptar</button>
								</div>
							</div>
						</form>
					</div>
					<!-- ******************************************************************** -->
					<div class="tab-pane fade" id="modProfesor">
						<h2 class="mt-1 mr-4">Modificar</h2>
						<form method='POST' autocomplete="off" class='md-form form-sm' enctype='multipart/form-data' id='searchModify'>
							<div class='text-center'>
								<label>Ingresar cédula del profesor</label>
								<div class='input-group mb-3 justify-content-center'>
									<input type='text' class='buscarCedulaM form-control col-md-5' aria-label='Search' id='buscarCedulaM'>
									<div class='input-group-append'>
										<button type='button' class='btn btn-outline-secondary btn-sm my-0' id='buscarCedulaMB'>Buscar</button>
									</div>
								</div>
							</div>
						</form>
						<hr>
						<form method="post" autocomplete="off" class="md-form form-sm" enctype="multipart/form-data" id='modify'>
							<div class="form-group">
								<label>Cédula</label>
								<input type="text" name="cedulaM" id='cedulaM' maxlength="10" class="form-control md-2" readonly>
								<small class="form-text text-muted">Ingresar solo el número de cédula.</small>
								<label class="mt-2">Nombres y apellidos</label>
								<input type="text" name="nombreM" maxlength="65" id='nombreM' class="form-control md-2">
								<small class="form-text text-muted">Nombre completo del profesor.</small>
								<label class="mt-2">Profesión</label>
								<input type="text" id='profesionM' name="profesionM" maxlength="65" class="form-control md-2">
								<small class="form-text text-muted">Ocupación del profesor.</small>
								<label class="mt-2">Número de teléfono</label>
								<input type="text" name="telefonoM" maxlength="15" id='telefonoM' class="form-control md-2 telefonoM">
								<small class="form-text text-muted">Número de teléfono para contactar al profesor.</small>
								<label class="mt-2">Correo electrónico</label>
								<input type="text" id='correoM' name="correoM" maxlength="45" class="form-control md-2">
								<small class="form-text text-muted">Correo electrónico para contactar al profesor.</small>
								<div class="input-group-append mx-auto justify-content-center m-4">
									<button type="submit" class="btn btn-outline-secondary btn-sm my-0 mr-4 text-white bg-secondary" id="cancelar">Cancelar</button>
									<button type="submit" class="btn btn-outline-secondary btn-sm my-0 ml-4 text-white bg-secondary" id="Aceptar">Aceptar</button>
								</div>
							</div>
						</form>
					</div>
					<!-- ******************************************************************** -->
					<div class="tab-pane fade" id="delProfesor">
						<h2 class="mt-1 mr-4">Eliminar</h2>
						<form method='POST' autocomplete="off" class='md-form form-sm' enctype='multipart/form-data' id='searchDelet'>
							<div class='text-center'>
								<label>Ingresar cédula del profesor</label>
								<div class='input-group mb-3 justify-content-center'>
									<input type='text' class='buscarCedulaD form-control col-md-5' aria-label='Search' id='buscarCedulaD'>
									<div class='input-group-append'>
										<button type='button' class='btn btn-outline-secondary btn-sm my-0' id='buscarCedulaDB'>Buscar</button>
									</div>
								</div>
							</div>
						</form>
						<hr>
						<form method="post" autocomplete="off" class="md-form form-sm" enctype="multipart/form-data" id='delet'>
							<div class="form-group">
								<label>Cédula</label>
								<input type="text" id='cedulaD' name="cedulaD" maxlength="10" class="form-control md-2" disabled>
								<label class="mt-2">Nombres y apellidos</label>
								<input type="text" id='nombreD' name="nombreD" maxlength="25" class="form-control md-2" disabled>
								<label class="mt-2">Profesión</label>
								<input type="text" id='profesionD' name="profesionD" maxlength="10" class="form-control md-2" disabled>
								<label class="mt-2">Número de teléfono</label>
								<input type="text" id='telefonoD' name="telefonoD" maxlength="65" class="form-control md-2" readonly>
								<label class="mt-2">Correo electrónico</label>
								<input type="text" id='correoD' name="correoD" maxlength="65" class="form-control md-2" readonly>

								<div class="input-group-append mx-auto justify-content-center m-4">
									<button type="submit" class="btn btn-outline-secondary btn-sm my-0 mr-4 text-white bg-secondary" id="cancelar">Cancelar</button>
									<button type="button" class="btn btn-outline-secondary btn-sm my-0 ml-4 text-white bg-secondary" id="AceptarD">Aceptar</button>
								</div>
							</div>
						</form>
					</div>
					<!-- ******************************************************************** -->
					<div class="tab-pane fade" id="MateProfesor">
						<h2 class="mt-1 mr-4">Ingresar profesor a una materia</h2>
						<form method='POST' autocomplete="off" class='md-form form-sm' enctype='multipart/form-data' id='searchModify'>
							<div class='text-center'>
								<label>Ingresar cédula del profesor</label>
								<div class='input-group mb-3 justify-content-center'>
									<input type='text' class='buscarCedulaI form-control col-md-5' placerholder='Cedula del estudiante' aria-label='Search' name='buscarCedulaM' id='buscarCedulaI'>
									<div class='input-group-append'>
										<button type='button' class='btn btn-outline-secondary btn-sm my-0' id='buscarCedulaIB'>Buscar</button>
									</div>
								</div>
							</div>
						</form>
						<hr>
						<form method="post" autocomplete="off" class="md-form form-sm" enctype="multipart/form-data" id='registerProMat'>
							<div class="form-group">
								<label>Cédula</label>
								<input type="text" name="cedulaI" maxlength="10" id='cedulaI' class="form-control md-2" readonly>
								<small class="form-text text-muted">Ingresar solo el número de cédula.</small>
								<label class="mt-2">Nombres y apellidos</label>
								<input type="text" name="nombre" maxlength="25" id='nombreI' class="form-control md-2" readonly>
								<small class="form-text text-muted">Primer y segundo nombre.</small>
								<label class='mt-2'>Periodo académico</label>
								<input type='text' name='periodoIE' id='periodoIE' maxlength='45' class='form-control periodoIE md-2' readonly>
								<small class='form-text text-muted'>Periodo académico actual.</small>
								<div class='dropdown'>
									<button type='button' class='btn btn-secondary dropdown-toggle m-4' data-toggle='dropdown' aria-haspopup='true'>
										Lista de periodo académico
									</button>
									<div class='dropdown-menu list-period-EI dropdown-menu-scroll form-check'>
									</div>
								</div>
								<label class='mt-2'>Carrera</label>
								<input type='text' id='carreraC' maxlength='45' class='form-control carreraI md-2' readonly>
								<div class='mt-2'>
									<div class='inscription form-check'></div>
								</div>

								<div class='mt-2 justify-content-center row'>
									<label class='col h5 text-center'>Materia</label>
									<label class='col h5 text-center'>Lista de materias</label>
								</div>

								<div class='row'>
									<div class='col-2'>
										<br>
										<input type='text' name='m1I' id='m1I' readonly maxlength='25' class='form-control md-2'>
										<br>
										<div class='text-center'>
											<input type='checkbox' class='form-check-input deleteMatter' name='deleteMatter' value="1">
										</div>
									</div>
									<div class='col'>
										<br>
										<input type='text' name='m1' id='m1' readonly maxlength='25' class='form-control md-2'>
										<br>
										<label class='form-check-label text-center'>Retirar la materia seleccionada al profesor.</label>
									</div>

									<div class='col scroll-list item-hg listIns m-4 border'>
									</div>
								</div>


								<div class="input-group-append mx-auto justify-content-center m-4">
									<button type="submit" class="btn btn-outline-secondary btn-sm my-0 mr-4 text-white bg-secondary" id="cancelar">Cancelar</button>
									<button type="button" class="btn btn-outline-secondary btn-sm my-0 ml-4 text-white bg-secondary" id="AceptarRPM">Aceptar</button>
								</div>
							</div>
						</form>
					</div>
					<!-- ******************************************************************** -->
					<div class="tab-pane fade" id="listProfesor">
						<h2 class="mt-1 mr-4">Lista de profesores por materia</h2>
						<hr>
						<form method='POST' autocomplete="off" class='md-form form-sm' id='list' enctype='multipart/form-data'>
							<label class='mt-2'>Periodo académico</label>
							<input type='text' id='periodoP' maxlength='45' class='form-control periodoP md-2' readonly>
							<small class='form-text text-muted'>Periodo académico actual.</small>
							<div class='dropdown'>
								<button type='button' class='btn btn-secondary dropdown-toggle m-4' data-toggle='dropdown' aria-haspopup='true'>
									Lista de periodo académico
								</button>
								<div class='dropdown-menu insert-ul listEdit dropdown-menu-scroll form-check'>
								</div>
							</div>
							<label class='mt-2'>Carrera</label>
							<input type='text' id='carreraC' maxlength='45' class='form-control carreraM md-2' readonly>
							<div class='mt-2'>
								<div class='inscriptionEdit form-check'></div>
							</div>

							<div class='mt-2 justify-content-center row'>
								<label class='col h5 text-center'>Materia</label>
								<label class='col h5 text-center'>Lista de materias</label>
							</div>

							<div class='row'>
								<div class='col-2'>
									<br>
									<input type='text' name='m1IID' id='m1IID' readonly maxlength='25' class='form-control md-2'>
									<br>
								</div>
								<div class='col'>
									<br>
									<input type='text' name='m1I' id='m1ID' readonly maxlength='25' class='form-control md-2'>
									<br>
								</div>

								<div class='col scroll-list item-test listInsEdit m-4 border'>
								</div>
							</div>

							<div class='input-group-append mx-auto justify-content-center m-4'>
								<button type='button' class='btn btn-outline-secondary btn-sm my-0 mr-4 text-white bg-secondary' id='cancelarP'>Cancelar</button>
								<button type='button' class='btn btn-outline-secondary btn-sm my-0 ml-4 text-white bg-secondary' id='listaProf'>Aceptar</button>
							</div>
						</form>
					</div>
					<!-- ******************************************************************** -->
					<div class="tab-pane fade" id="listTotalProfesor">
						<h2 class="mt-1 mr-4">Lista de profesores</h2>
						<hr>
						<form method='POST' autocomplete="off" class='md-form form-sm' id='list' enctype='multipart/form-data'>
							<label class='mt-2'>Periodo académico</label>
							<input type='text' id='periodoIL' maxlength='45' class='form-control periodoIL md-2' readonly>
							<small class='form-text text-muted'>Periodo académico actual.</small>
							<div class='dropdown'>
								<button type='button' class='btn btn-secondary dropdown-toggle m-4' data-toggle='dropdown' aria-haspopup='true'>
									Lista de periodo académico
								</button>
								<div class='dropdown-menu list-period-I listEdit dropdown-menu-scroll form-check'>
								</div>
							</div>
							<div>
								<input type="checkbox" id="generalList">
								<label>Obtener lista de todos profesores registrados en el sistema.</label>
							</div>
							<div class='input-group-append mx-auto justify-content-center m-4'>
								<button type='button' class='btn btn-outline-secondary btn-sm my-0 mr-4 text-white bg-secondary' id='cancelarP'>Cancelar</button>
								<button type='button' class='btn btn-outline-secondary btn-sm my-0 ml-4 text-white bg-secondary' id='listaProfTotal'>Aceptar</button>
							</div>
						</form>
					</div>
				</div>
				<!-- ****************************************************************************************** -->
			</div>
		</section>
		<h3 class='position-fixed text-center textInfoProM  text-white'></h3>
	</div>
	<?php
	include("../../../SistemaEaD/model/php/managerJS.php");
	?>
	<script src="../../controller/js/sendTeacher.js"></script>
	<script src="../../controller/js/getMateria.js"></script>
	<script src="../../controller/js/getCarreraI.js"></script>
</body>

</html>