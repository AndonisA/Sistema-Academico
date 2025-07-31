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
				<ul class="nav nav-tabs">
					<li class="nav-item"><a href="#editEstudiante" class="nav-link active" data-toggle="tab">Gestión de estudiante</a></li>
					<li class="nav-item"><a href="#insEstudiante" class="nav-link " data-toggle="tab">Inscripción de estudiante</a></li>
				</ul>
				<!-- ****************************************************************************************** -->
				<div class='bg-white border tab-content rounded-bottom col-md-12 mb-3'>

					<div class="tab-pane active" id="editEstudiante">
						<?php
						include("../../../SistemaEaD/model/php/editEstudiante.php")
						?>

					</div>
					<!-- ****************************************************************************************** -->
					<div class='tab-pane fade' id='insEstudiante'>
						<div class='col-md-12'>
							<h2 class='m1'>Inscripción del estudiante.</h2>
						</div>
						<ul class='nav nav-tabs'>
							<li class='nav-item'><a href='#formInsEstudiante' class='nav-link active' data-toggle='tab'>Inscripción</a></li>
							<li class='nav-item'><a href='#EditInsEstudiante' class='nav-link' data-toggle='tab'>Editar</a></li>
							<li class='nav-item'><a href='#planiEstudiante' class='nav-link' data-toggle='tab'>Planilla</a></li>
						</ul>
						<div class='bg-white border tab-content rounded-bottom col-md-12 mb-3'>
							<div class='tab-pane active' id='formInsEstudiante'>
								<h2 class='mt-1 mr-4'>Inscripción</h2>
								<form action='POST' autocomplete="off" class='md-form form-sm' enctype='multipart/form-data' id='searchInscription'>
									<div class='text-center'>
										<br>
										<label>Ingresar cédula del estudiante para realizar la búsqueda</label>
										<div class='input-group mb-3 justify-content-center'>
											<input type='text' class='buscarCedulaM form-control col-md-5' placerholder='Cedula del estudiante' aria-label='Search' name='buscarCedulaM' id='buscarCedulaM'>
											<div class='input-group-append'>
												<button type='button' class='btn btn-outline-secondary btn-sm my-0' id='buscarCedulaMB'>Buscar</button>
											</div>
										</div>
									</div>
								</form>
								<hr>
								<form method='POST' autocomplete="off" class='md-form form-sm' name='inscription' id='inscription' enctype='multipart/form-data' id='inscription'>
									<label class='mt-2'>Cédula</label>
									<input type='text' name='cedula' id='cedulaI' readonly maxlength='15' class='form-control md-2'>

									<label class='mt-2'>Nombres y apellidos</label>
									<input type='text' name='nombre' id='nombreI' readonly maxlength='85' class='form-control md-2'>

									<label class='mt-2'>Periodo académico</label>
									<input type='text' name='periodo' id='periodo' maxlength='45' class='form-control periodoIL md-2' readonly>
									<small class='form-text text-muted'>Periodo académico actual.</small>
									<div class='dropdown'>
										<button type='button' class='btn btn-secondary dropdown-toggle m-4' data-toggle='dropdown' aria-haspopup='true'>
											Lista de periodo académico
										</button>
										<div class='dropdown-menu list-period-I dropdown-menu-scroll form-check'>
										</div>
									</div>

									<label class='mt-2'>Carrera</label>
									<input type='text' id='carreraI' maxlength='45' class='form-control carreraI md-2' readonly>
									<small class='form-text text-muted'>Carrera que cursa el estudiante.</small>
									<div class='mt-2'>
										<div class='inscription form-check' hidden></div>
									</div>

									<div class='mt-2 justify-content-center row'>
										<label class='col h5 text-center'>Materias inscritas</label>
										<label class='col h5 text-center'>Lista de materias</label>
									</div>

									<div class='row'>
										<div class='col-2'>
											<label class='mt-2 '>Materia 1</label>
											<input type='text' name='m1I' id='m1I' readonly maxlength='25' class='form-control md-2'>
											<label class='mt-2 '>Materia 2</label>
											<input type='text' name='m2I' id='m2I' readonly maxlength='25' class='form-control md-2'>
											<label class='mt-2 '>Materia 3</label>
											<input type='text' name='m3I' id='m3I' readonly maxlength='25' class='form-control md-2'>
											<label class='mt-2 '>Materia 4</label>
											<input type='text' name='m4I' id='m4I' readonly maxlength='25' class='form-control md-2'>
											<label class='mt-2 '>Materia 5</label>
											<input type='text' name='m5I' id='m5I' readonly maxlength='25' class='form-control md-2'>
											<label class='mt-2 '>Materia 6</label>
											<input type='text' name='m6I' id='m6I' readonly maxlength='25' class='form-control md-2'>
											<label class='mt-2 '>Materia 7</label>
											<input type='text' name='m7I' id='m7I' readonly maxlength='25' class='form-control md-2'>
											<label class='mt-2 '>Materia 8</label>
											<input type='text' name='m8I' id='m8I' readonly maxlength='25' class='form-control md-2'>
										</div>
										<div class='col-2'>
											<label class='mt-2'>Sección 1</label>
											<div class='input-group'>
												<input type='text' name='s1' id='s1' readonly maxlength='25' class='form-control md-2'>
												<div class='input-group-append'>
													<button class='btn btn-outline-secondary dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>S</button>
													<div class='dropdown-menu s1M'>
													</div>
												</div>
											</div>
											<label class='mt-2'>Sección 2</label>
											<div class='input-group'>
												<input type='text' name='s2' id='s2' readonly maxlength='25' class='form-control md-2'>
												<div class='input-group-append'>
													<button class='btn btn-outline-secondary dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>S</button>
													<div class="dropdown">
														<div class='dropdown-menu dropdown-menu-scroll s2M'>
														</div>
													</div>
												</div>
											</div>
											<label class='mt-2'>Sección 3</label>
											<div class='input-group'>
												<input type='text' name='s3' id='s3' readonly maxlength='25' class='form-control md-2'>
												<div class='input-group-append'>
													<button class='btn btn-outline-secondary dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>S</button>
													<div class="dropdown">
														<div class='dropdown-menu dropdown-menu-scroll s3M'>
														</div>
													</div>
												</div>
											</div>
											<label class='mt-2'>Sección 4</label>
											<div class='input-group'>
												<input type='text' name='s4' id='s4' readonly maxlength='25' class='form-control md-2'>
												<div class='input-group-append'>
													<button class='btn btn-outline-secondary dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>S</button>
													<div class="dropdown">
														<div class='dropdown-menu dropdown-menu-scroll s4M'>
														</div>
													</div>
												</div>
											</div>
											<label class='mt-2'>Sección 5</label>
											<div class='input-group'>
												<input type='text' name='s5' id='s5' readonly maxlength='25' class='form-control md-2'>
												<div class='input-group-append'>
													<button class='btn btn-outline-secondary dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>S</button>
													<div class="dropdown">
														<div class='dropdown-menu dropdown-menu-scroll s5M'>
														</div>
													</div>
												</div>
											</div>
											<label class='mt-2'>Sección 6</label>
											<div class='input-group'>
												<input type='text' name='s6' id='s6' readonly maxlength='25' class='form-control md-2'>
												<div class='input-group-append'>
													<button class='btn btn-outline-secondary dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>S</button>
													<div class="dropdown">
														<div class='dropdown-menu dropdown-menu-scroll s6M'>
														</div>
													</div>
												</div>
											</div>
											<label class='mt-2'>Sección 7</label>
											<div class='input-group'>
												<input type='text' name='s7' id='s7' readonly maxlength='25' class='form-control md-2'>
												<div class='input-group-append'>
													<button class='btn btn-outline-secondary dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>S</button>
													<div class="dropdown">
														<div class='dropdown-menu dropdown-menu-scroll s7M'>
														</div>
													</div>
												</div>
											</div>
											<label class='mt-2'>Sección 8</label>
											<div class='input-group'>
												<input type='text' name='s8' id='s8' readonly maxlength='25' class='form-control md-2'>
												<div class='input-group-append'>
													<button class='btn btn-outline-secondary dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>S</button>
													<div class='dropdown-menu s8M'>
													</div>
												</div>
											</div>
										</div>
										<div class='col'>
											<label class='mt-2'>Materia 1</label>
											<input type='text' name='m1' id='m1' readonly maxlength='25' class='form-control md-2'>
											<label class='mt-2'>Materia 2</label>
											<input type='text' name='m2' id='m2' readonly maxlength='25' class='form-control md-2'>
											<label class='mt-2'>Materia 3</label>
											<input type='text' name='m3' id='m3' readonly maxlength='25' class='form-control md-2'>
											<label class='mt-2'>Materia 4</label>
											<input type='text' name='m4' id='m4' readonly maxlength='25' class='form-control md-2'>
											<label class='mt-2'>Materia 5</label>
											<input type='text' name='m5' id='m5' readonly maxlength='25' class='form-control md-2'>
											<label class='mt-2'>Materia 6</label>
											<input type='text' name='m6' id='m6' readonly maxlength='25' class='form-control md-2'>
											<label class='mt-2'>Materia 7</label>
											<input type='text' name='m7' id='m7' readonly maxlength='25' class='form-control md-2'>
											<label class='mt-2'>Materia 8</label>
											<input type='text' name='m8' id='m8' readonly maxlength='25' class='form-control md-2'>
										</div>

										<div class='col scroll-list listIns m-4 border'>

										</div>
									</div>
									<div class='input-group-append mx-auto justify-content-center m-4'>
										<button type='button' class='btn btn-outline-secondary btn-sm my-0 mr-4 text-white bg-secondary' id='cancelarI'>Cancelar</button>
										<button type='submit' class='btn btn-outline-secondary btn-sm my-0 ml-4 text-white bg-secondary' id='Aceptar'>Aceptar</button>
									</div>
								</form>
							</div>
							<!--////////////////-->
							<div class='tab-pane fade' id='EditInsEstudiante'>
								<h2 class='mt-1 mr-4'>Editar planilla de inscripción</h2>
								<form action='POST' autocomplete="off" class='md-form form-sm' enctype='multipart/form-data' id='searchInscriptionMod'>
									<div class='text-center'>
										<br>
										<label>Ingresar cédula del estudiante para realizar la búsqueda</label>
										<div class='input-group mb-3 justify-content-center'>
											<input type='text' class='buscarCedulaM form-control col-md-5' placerholder='Cedula del estudiante' aria-label='Search' name='buscarCedulaM' id='buscarCedulaID'>
											<div class='input-group-append'>
												<button type='button' class='btn btn-outline-secondary btn-sm my-0' id='buscarCedulaIDB'>Buscar</button>
											</div>
										</div>
									</div>
								</form>
								<form method='POST' autocomplete="off" class='md-form form-sm' name='inscription' id='inscriptionEdit' enctype='multipart/form-data'>
									<div class='col-12 text-success textInfoPerD text-md-center'></div>
									<label class='mt-2'>Periodo</label>
									<input type='text' id='periodoPD' name='periodoPD' maxlength='45' class='form-control md-2' readonly>
									<small class='form-text text-muted'>Periodo la cual desee obtener la planilla. Hacer click en en la lista desplegable.</small>
									<div class='dropdown justify-content-center col-12'>
										<button type='button' class='btn btn-secondary dropdown-toggle m-4' data-toggle='dropdown' aria-haspopup='true'>
											Lista de periodo del estudiante
										</button>
										<div class='dropdown-menu insert-ul dropdown-menu-scroll form-check' id='payrollListStudent'>
										</div>
									</div>
									<hr>
									<label class='mt-2'>Cédula</label>
									<input type='text' name='cedulaID' id='cedulaIID' readonly maxlength='15' class='form-control md-2'>

									<label class='mt-2'>Nombres y apellidos</label>
									<input type='text' name='nombreID' id='nombreIID' readonly maxlength='25' class='form-control md-2'>

									<!-- <label class='mt-2'>Periodo académico</label>
									<input type='text' name='periodo' id='periodo' maxlength='45' class='form-control periodoIE md-2' readonly>
									<small class='form-text text-muted'>Periodo académico actual.</small>
									<div class='dropdown'>
										<button type='button' class='btn btn-secondary dropdown-toggle m-4' data-toggle='dropdown' aria-haspopup='true'>
											Lista de periodo académico
										</button>
										<div class='dropdown-menu insert-ul list-period-EI dropdown-menu-scroll form-check'>
										</div>
									</div> -->

									<label class='mt-2'>Carrera</label>
									<input type='text' id='carreraID' maxlength='45' class='form-control carreraM md-2' readonly>
									<small class='form-text text-muted'>Carrera que cursa el estudiante.</small>
									<div class='mt-2'>
										<div class='inscriptionEdit form-check' hidden></div>
									</div>
									<div class='mt-2 justify-content-center row'>
										<label class='col h5 text-center'>Materias inscritas</label>
										<label class='col h5 text-center'>Lista de materias</label>
									</div>
									<div class='row'>
										<div class='col-2'>
											<label class='mr-0 mt-2'>Materia 1</label>
											<input type='text' name='m1IID' id='m1IID' readonly maxlength='25' class='form-control md-2'>
											<label class='mr-0 mt-2'>Materia 2</label>
											<input type='text' name='m2IID' id='m2IID' readonly maxlength='25' class='form-control md-2'>
											<label class='mr-0 mt-2'>Materia 3</label>
											<input type='text' name='m3IID' id='m3IID' readonly maxlength='25' class='form-control md-2'>
											<label class='mr-0 mt-2'>Materia 4</label>
											<input type='text' name='m4IID' id='m4IID' readonly maxlength='25' class='form-control md-2'>
											<label class='mr-0 mt-2'>Materia 5</label>
											<input type='text' name='m5IID' id='m5IID' readonly maxlength='25' class='form-control md-2'>
											<label class='mr-0 mt-2'>Materia 6</label>
											<input type='text' name='m6IID' id='m6IID' readonly maxlength='25' class='form-control md-2'>
											<label class='mr-0 mt-2'>Materia 7</label>
											<input type='text' name='m7IID' id='m7IID' readonly maxlength='25' class='form-control md-2'>
											<label class='mr-0 mt-2'>Materia 8</label>
											<input type='text' name='m8IID' id='m8IID' readonly maxlength='25' class='form-control md-2'>
										</div>

										<div class='col-2'>
											<label class='mt-2'>Sección 1</label>
											<div class='input-group'>
												<input type='text' name='ms1' id='ms1' readonly maxlength='25' class='form-control md-2'>
												<div class='input-group-append'>
													<button class='btn btn-outline-secondary dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>S</button>
													<div class='dropdown-menu ms1M'>
													</div>
												</div>
											</div>
											<label class='mt-2'>Sección 2</label>
											<div class='input-group'>
												<input type='text' name='ms2' id='ms2' readonly maxlength='25' class='form-control md-2'>
												<div class='input-group-append'>
													<button class='btn btn-outline-secondary dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>S</button>
													<div class='dropdown-menu ms2M'>
													</div>
												</div>
											</div>
											<label class='mt-2'>Sección 3</label>
											<div class='input-group'>
												<input type='text' name='ms3' id='ms3' readonly maxlength='25' class='form-control md-2'>
												<div class='input-group-append'>
													<button class='btn btn-outline-secondary dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>S</button>
													<div class='dropdown-menu ms3M'>
													</div>
												</div>
											</div>
											<label class='mt-2'>Sección 4</label>
											<div class='input-group'>
												<input type='text' name='ms4' id='ms4' readonly maxlength='25' class='form-control md-2'>
												<div class='input-group-append'>
													<button class='btn btn-outline-secondary dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>S</button>
													<div class='dropdown-menu ms4M'>
													</div>
												</div>
											</div>
											<label class='mt-2'>Sección 5</label>
											<div class='input-group'>
												<input type='text' name='ms5' id='ms5' readonly maxlength='25' class='form-control md-2'>
												<div class='input-group-append'>
													<button class='btn btn-outline-secondary dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>S</button>
													<div class='dropdown-menu ms5M'>
													</div>
												</div>
											</div>
											<label class='mt-2'>Sección 6</label>
											<div class='input-group'>
												<input type='text' name='ms6' id='ms6' readonly maxlength='25' class='form-control md-2'>
												<div class='input-group-append'>
													<button class='btn btn-outline-secondary dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>S</button>
													<div class='dropdown-menu ms6M'>
													</div>
												</div>
											</div>
											<label class='mt-2'>Sección 7</label>
											<div class='input-group'>
												<input type='text' name='ms7' id='ms7' readonly maxlength='25' class='form-control md-2'>
												<div class='input-group-append'>
													<button class='btn btn-outline-secondary dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>S</button>
													<div class='dropdown-menu ms7M'>
													</div>
												</div>
											</div>
											<label class='mt-2'>Sección 8</label>
											<div class='input-group'>
												<input type='text' name='ms8' id='ms8' readonly maxlength='25' class='form-control md-2'>
												<div class='input-group-append'>
													<button class='btn btn-outline-secondary dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>S</button>
													<div class='dropdown-menu ms8M'>
													</div>
												</div>
											</div>
										</div>

										<div class='col'>
											<label class='mt-2'>Materia 1</label>
											<input type='text' name='m1ID' id='m1ID' readonly maxlength='25' class='form-control md-2'>
											<label class='mt-2'>Materia 2</label>
											<input type='text' name='m2ID' id='m2ID' readonly maxlength='25' class='form-control md-2'>
											<label class='mt-2'>Materia 3</label>
											<input type='text' name='m3ID' id='m3ID' readonly maxlength='25' class='form-control md-2'>
											<label class='mt-2'>Materia 4</label>
											<input type='text' name='m4ID' id='m4ID' readonly maxlength='25' class='form-control md-2'>
											<label class='mt-2'>Materia 5</label>
											<input type='text' name='m5ID' id='m5ID' readonly maxlength='25' class='form-control md-2'>
											<label class='mt-2'>Materia 6</label>
											<input type='text' name='m6ID' id='m6ID' readonly maxlength='25' class='form-control md-2'>
											<label class='mt-2'>Materia 7</label>
											<input type='text' name='m7ID' id='m7ID' readonly maxlength='25' class='form-control md-2'>
											<label class='mt-2'>Materia 8</label>
											<input type='text' name='m8ID' id='m8ID' readonly maxlength='25' class='form-control md-2'>
										</div>

										<div class='col scroll-list listInsEdit m-4 border' id='listInsEdit'>

										</div>
									</div>
									<div class='input-group-append mx-auto justify-content-center m-4'>
										<button type='button' class='btn btn-outline-secondary btn-sm my-0 mr-3 text-white bg-secondary cancelarI' id='cancelarI'>Cancelar</button>
										<button type='submit' class='btn btn-outline-secondary btn-sm my-0 ml-4 text-white bg-secondary' id='Aceptar'>Aceptar</button>
									</div>
								</form>
							</div>
							<!--////////////////-->
							<div class='tab-pane fade' id='planiEstudiante'>
								<h2 class='mt-1 mr-4'>Planilla de inscripción</h2>
								<hr>
								<form method='POST' autocomplete="off" class='md-form form-sm' id='planilla' enctype='multipart/form-data'>
									<label class='mt-2'>Cedula del estudiante</label>
									<div class='input-group mb-3 justify-content-center'>
										<input type='text' class='buscarCedulaM form-control col-md-11 cedulaP' id='buscarPlanillaEstudiante'>
										<div class='input-group-append'>
											<button type='button' class='btn btn-outline-secondary btn-sm my-0' id='buscarEP'>Buscar</button>
										</div>
									</div>
									<small class='form-text text-muted'>Cedula del estudiante que desee obtener la planilla de inscripción.</small>
									<label class='mt-2'>Periodo</label>
									<input type='text' id='periodoP' maxlength='45' class='form-control periodoI md-2' readonly>
									<small class='form-text text-muted'>Periodo la cual desee obtener la planilla. Hacer click en en la lista desplegable.</small>
									<div class='dropdown justify-content-center'>
										<button type='button' class='btn btn-secondary dropdown-toggle m-4' data-toggle='dropdown' aria-haspopup='true'>
											Lista de periodo del estudiante
										</button>
										<div class='dropdown-menu insert-ul payrollList dropdown-menu-scroll form-check'>
										</div>
									</div>
									
									
									<div class='input-group-append mx-auto justify-content-center m-4'>
										<button type='button' class='btn btn-outline-secondary btn-sm my-0 mr-4 text-white bg-secondary' id='cancelarP'>Cancelar</button>
										<button type='button' class='btn btn-outline-secondary btn-sm my-0 ml-4 text-white bg-secondary' id='AceptarP'>Aceptar</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<h3 class='position-fixed text-center textInfoProM text-white'></h3>
	</div>
	<?php
	include("../../../SistemaEaD/model/php/managerJS.php");
	?>
	<script src="../../../SistemaEaD/controller/js/sendStudent.js"></script>
	<script src="../../controller/js/getCarrera.js"></script>
	<script src="../../controller/js/getCarreraM.js"></script>
	<script src="../../controller/js/getCarreraI.js"></script>
	<script src="../../controller/js/getMateria.js"></script>
</body>

</html>