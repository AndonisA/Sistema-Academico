<?php
	echo"
		<div class='col-md-12'>
			<h2 class='m1'>Gestión de estudiante.</h2>
		</div>
		<!-- ********************************************************************************** -->
		<ul class='nav nav-tabs'>
			<li class='nav-item'><a href='#regEstudiante' class='nav-link active' data-toggle='tab'>Registrar</a></li>
			<li class='nav-item'><a href='#modEstudiante' class='nav-link' data-toggle='tab'>Modificar</a></li>
		</ul>
		<!-- ********************************************************************************** -->
		<div class='bg-white border tab-content rounded-bottom col-md-12 mb-3'>
			<div class='tab-pane active' id='regEstudiante'>
				<h2 class='mt-1 mr-4'>Registrar</h2>
				<hr>
				<form method='post' autocomplete='off' class='md-form form-sm' enctype='multipart/form-data' id='create'>
					<div class='form-group'>
						<label>Cédula</label>
						<input type='text' name='cedulaC' maxlength='10' class='form-control cedulaC md-2'>
						<small class='form-text text-muted'>Ingresar solo el número de cédula.</small>
						<label class='mt-2'>Nombres y apellidos</label>
						<input type='text' name='nombreC' maxlength='85' class='form-control nombreC md-2'>
						<small class='form-text text-muted'>Nombre completo del estudiante.</small>
						<label class='mt-2'>Teléfono</label>
						<input type='text' name='telefonoC' maxlength='25' class='form-control telefonoC md-2'>
						<small class='form-text text-muted'>Solo escribir el número de contacto.</small>
						<label class='mt-2'></label>
						<label class='mt-2'>Email</label>
						<input type='text' name='emailC' maxlength='45' class='form-control emailC md-2'>
						<small class='form-text text-muted'>Correo electrónico.</small>
						<label class='mt-2'>Carrera</label>
						<input type='text' id='carreraC' maxlength='25' class='form-control carreraC md-2' readonly>
						<input hidden type='text' id='carreraCN' name='carreraC' maxlength='25' class='form-control carreraC md-2' readonly>
						<small class='form-text text-muted'>Carrera que cursa el estudiante.</small>

						<div class='dropdown'>
							<button type='button' class='btn btn-secondary dropdown-toggle m-4' data-toggle='dropdown' aria-haspopup='true'>
								Lista de carrera
							</button>
							<div class='dropdown-menu insert-ul listEdit dropdown-menu-scroll form-check'>
							</div>
						</div>

						<label class='mt-2'>Procedencia</label>
						<input type='text' id='procedenciaC' maxlength='25' class='form-control md-2' readonly>
						<input  type='text' id='procedenciaCN' hidden name='tipoC' maxlength='25' class='form-control procedenciaC md-2' readonly>
						<div class='dropdown'>
							<button type='button' class='btn btn-secondary dropdown-toggle m-4' data-toggle='dropdown' aria-haspopup='true'>
								Lista de procedencia
							</button>
							<div class='dropdown-menu insert-ul listEditProce dropdown-menu-scroll form-check'>
							</div>
						</div>

						<label class='mt-2'>Periodo de ingreso</label>
						<input type='text' name='perIngreso' maxlength='15' class='form-control perIngreso md-2'>
						<small class='form-text text-muted'>Periodo la cual el estudiante ingreso a estudios a distancia.</small>
						<div class='input-group-append mx-auto justify-content-center m-4'>
							<button type='button' class='cancelarC btn btn-outline-secondary btn-sm my-0 mr-4 text-white bg-secondary' id='cancelarCR'>Cancelar</button>
							<button type='submit' class='btn btn-outline-secondary btn-sm my-0 ml-4 text-white bg-secondary' id='aceptarC'>Aceptar</button>
						</div>
					</div>
				</form>
			</div>
			<!-- ******************************************************************** -->
			<div class='tab-pane fade' id='modEstudiante'>
				<h2 class='mt-1 mr-4'>Modificar</h2>
				<div>
					<form method='POST' autocomplete='off' class='md-form form-sm' enctype='multipart/form-data' id='searchModify'>
						<div class='text-center'>
							<br>
							<label>Ingresar cédula del estudiante para realizar la búsqueda</label>
							<div class='input-group mb-3 justify-content-center'>
								<input type='text' class='buscarCedulaEM form-control col-md-5' placerholder='Cedula del estudiante' aria-label='Search' name='buscarCedulaM' id='buscarCedulaEM'>
								<div class='input-group-append'>
									<button type='button' class='btn btn-outline-secondary btn-sm my-0' id='buscarCedulaEMB' >Buscar</button>
								</div>
							</div>
						</div>
					</form>
				</div>
				<hr>
				<div class='col-md-12 m-0'>
					<form method='post' autocomplete='off' class='md-form form-sm' enctype='multipart/form-data' id='modify'>
						<div class='form-group'>
							<label>Cédula</label>
							<input type='text' name='cedulaM' maxlength='10' class='form-control cedulaM md-2'>
							<input type='text' name='cedulaMO' readonly maxlength='10' class='form-control cedulaM md-2'>
							<small class='form-text text-muted'>Ingresar solo el número de cédula.</small>
							<label class='mt-2'>Nombres y apellidos</label>
							<input type='text' name='nombreM' maxlength='85' class='form-control nombreM md-2'>
							<small class='form-text text-muted'>Nombre completo del estudiante.</small>
							<label class='mt-2'>Teléfono</label>
							<input type='text' name='telefonoM' maxlength='25' class='form-control telefonoM md-2'>
							<small class='form-text text-muted'>Solo escribir el número de contacto.</small>
							<label class='mt-2'>Email</label>
							<input type='text' name='emailM' maxlength='35' class='form-control emailM md-2'>
							<small class='form-text text-muted'>Correo electrónico.</small>
							<label class='mt-2'>Carrera</label>
							<input type='text' id='carreraM' maxlength='45' class='form-control carreraM md-2' readonly>
							<input type='text' id='carreraMN' name='carreraM' hidden maxlength='45' class='form-control carreraMN md-2' readonly>
							<small class='form-text text-muted'>Carrera que cursa el estudiante.</small>

							<div class='dropdown'>
								<button type='button' class='btn btn-secondary dropdown-toggle m-4' data-toggle='dropdown' aria-haspopup='true'>
									Lista de carrera
								</button>
								<div class='dropdown-menu insert-ul listEditM dropdown-menu-scroll form-check'>
								</div>
							</div>

							<label class='mt-2'>Procedencia</label>
							<input type='text' id='procedenciaM' maxlength='25' class='form-control md-2' readonly>
							<input  type='text' id='procedenciaMN' hidden name='tipoM' maxlength='25' class='form-control procedenciaC md-2' readonly>
							
							<div class='dropdown'>
								<button type='button' class='btn btn-secondary dropdown-toggle m-4' data-toggle='dropdown' aria-haspopup='true'>
									Lista de carrera
								</button>
								<div class='dropdown-menu insert-ul listProce dropdown-menu-scroll form-check'>
								</div>
							</div>

							<label class='mt-2'>Periodo de ingreso</label>
							<input type='text' name='perIngresoM' maxlength='15' class='form-control perIngresoM md-2'>
							<small class='form-text text-muted'>Periodo la cual el estudiante ingreso a estudios a distancia.</small>
							<div class='input-group-append mx-auto justify-content-center m-4'>
								<button type='button' class='btn btn-outline-secondary btn-sm my-0 mr-4 text-white bg-secondary' id='cancelarM'>Cancelar</button>
								<button type='submit' class='btn btn-outline-secondary btn-sm my-0 ml-4 text-white bg-secondary' id='Aceptar'>Aceptar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- ******************************************************************** -->
			<div class='tab-pane fade' id='delEstudiante'>
				<h2 class='mt-1 mr-4'>Eliminar</h2>
				<div>
					<form method='POST' autocomplete='off' class='md-form form-sm' enctype='multipart/form-data' id='searchDelet'>
						<div class='text-center'>
							<br>
							<label>Ingresar cédula del estudiante para realizar la búsqueda</label>
							<div class='input-group mb-3 justify-content-center'>
								<input type='text' class='buscarCedulaED form-control col-md-5' placerholder='Cedula del estudiante' aria-label='Search' name='buscarCedulaD' id='buscarCedulaED'>
								<div class='input-group-append'>
									<button type='button' class='btn btn-outline-secondary btn-sm my-0' id='buscarCedulaEDB' >Buscar</button>
								</div>
							</div>
						</div>
					</form>
				</div>
				<hr>
				<div class='col-md-12 m-0'>
					<form method='post' autocomplete='off' id='delet' class='md-form form-sm' enctype='multipart/form-data'>
						<div class='form-group'>
							<label>Cédula</label>
							<input type='text' readonly name='cedulaD' maxlength='10' class='form-control cedulaD md-2'>
							
							<label class='mt-2'>Nombres y apellidos</label>
							<input type='text' readonly name='nombreD' maxlength='25' class='form-control nombreD md-2'>
							
							<label class='mt-2'>Teléfono</label>
							<input type='text' readonly name='telefonoD' maxlength='25' class='form-control telefonoD md-2'>
							
							<label class='mt-2'>Email</label>
							<input type='text' readonly name='emailD' maxlength='25' class='form-control emailD md-2'>
							
							<label class='mt-2'>Carrera</label>
							<input type='text' readonly name='carreraD' maxlength='10' class='form-control carreraD md-2'>
							
							<label class='mt-2'>Periodo de ingreso</label>
							<input type='text' readonly name='perIngresoD' maxlength='10' class='form-control perIngresoD md-2'>
							
							<div class='input-group-append mx-auto justify-content-center m-4'>
								<button type='button' class='btn btn-outline-secondary btn-sm my-0 mr-4 text-white bg-secondary' id='cancelarD'>Cancelar</button>
								<button type='submit' class='btn btn-outline-secondary btn-sm my-0 ml-4 text-white bg-secondary' id='Aceptar'>Aceptar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class='tab-pane fade' id='lisEstudiante'>
				<h2 class='mt-1 mr-4'>Lista de estudiantes</h2>
				<hr>
				<form method='POST' autocomplete='off' class='md-form form-sm' id='planilla' enctype='multipart/form-data'>
					<label class='mt-2'>Periodo</label>
					<input type='text' id='periodoLis' maxlength='45' class='form-control periodoLis md-2' readonly>
					<div class='justify-content-center align-items-center'>
						<small class='form-text text-muted'>Seleccione el periodo académico para obtener un listado de los estudiantes registrado en dicho periodo. Hacer click en en la lista desplegable.</small>
						<small class='form-text bg-warning'>Si desea obtener una lista de estudiantes registrado en el sistema deje el campo en blanco.</small>
					</div>
					<div class='dropdown justify-content-center'>
						<button type='button' class='btn btn-secondary dropdown-toggle m-4' data-toggle='dropdown' aria-haspopup='true'>
							Lista de periodo académico
						</button>
						<div class='dropdown-menu insert-ul list-period-Lis dropdown-menu-scroll form-check'>
						</div>
					</div>
					<div class='input-group-append mx-auto justify-content-center m-4'>
						<button type='button' class='btn btn-outline-secondary btn-sm my-0 mr-4 text-white bg-secondary' id='cancelarLis'>Cancelar</button>
						<button type='button' class='btn btn-outline-secondary btn-sm my-0 ml-4 text-white bg-secondary' id='AceptarLis'>Aceptar</button>
					</div>
				</form>
			</div>
		</div>
	";
?>