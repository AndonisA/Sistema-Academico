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
					<h2 class="m1">Gestor de materia y periodo.</h2>
				</div>
<!-- ****************************************************************************************** -->
				<ul class="nav nav-tabs">
					<li class="nav-item m-0"><a href="#regMateria" class="nav-link active" data-toggle="tab">Registrar materia</a></li>
					<li class="nav-item m-0"><a href="#modMateria" class="nav-link" data-toggle="tab">Modificar materia</a></li>
					<li class="nav-item m-0"><a href="#regPeriodo" class="nav-link" data-toggle="tab">Gestor de periodo académico</a></li>
				</ul>
<!-- ****************************************************************************************** -->
				<div class="bg-white border tab-content rounded-bottom col-md-12">
					<div class="tab-pane active" id="regMateria">
						<h2 class="mt-1 mr-4">Registrar</h2>
						<hr>
						<form method="post" class="md-form form-sm" enctype="multipart/form-data" id="create" autocomplete="off">
							<div class="form-group">
								<label class='mt-2'>Carrera</label>
								<input type='text' id='carreraC' maxlength='45' class='form-control carreraI md-2' readonly>
								<input type='text' hidden id='carreraCN' name='carreraC' maxlength='45' class='form-control carreraI md-2' readonly>
								<small class='form-text text-muted'>Identificar la carrera para la nueva materia.</small>

								<div class='dropdown'>
									<button type='button' class='btn btn-secondary dropdown-toggle m-4' data-toggle='dropdown' aria-haspopup='true'>
										Lista de carrera
									</button>
									<div class='dropdown-menu insert-ul insert-ul-C dropdown-menu-scroll form-check'>
									</div>
								</div>

								<label>Código</label>
								<input type="text" name="codigoC" maxlength="10" class="codigoC form-control md-2">
								<small class="form-text text-muted">Identificador de la materia.</small>
								<label class="mt-2">Nombre</label>
								<input type="text" name="nombreC" maxlength="85" class="materiaC form-control md-2">
								<small class="form-text text-muted">Nombre de la materia.</small>
								<label class="mt-2">Unidades de crédito</label>
								<input type="text" name="ucC" maxlength="10" class="ucC form-control md-2">
								<small class="form-text text-muted">Cantidad de unidades de crédito.</small>
								<label>Numeró del periodo</label>
								<input type="text" name="periodoC" maxlength="10" class=" form-control md-2">
								<small class="form-text text-muted">Ingresa números en romanos el periodo donde se cursara la materia.</small>
								
								<div class="input-group-append mx-auto justify-content-center m-4">
                                    <button type="button" class="btn btn-outline-secondary btn-sm my-0 mr-4 text-white bg-secondary" id="cancelarC">Cancelar</button>
                                    <button type="submit" class="btn btn-outline-secondary btn-sm my-0 ml-4 text-white bg-secondary" id="Aceptar">Aceptar</button>
                                </div>
							</div>
						</form>
					</div>
					<!-- ******************************************************************** -->
					<div class="tab-pane fade" id="modMateria">
						<h2 class="mt-1 mr-4">Modificar</h2>
						<form method='POST' class='md-form form-sm' enctype='multipart/form-data' id='searchModify' autocomplete="off">
						<div class='text-center'>
							<label>Ingresar código de la materia</label>
							<div class='input-group mb-3 justify-content-center'>
								<input type='text' class='form-control col-md-5' placerholder='Cedula del estudiante' aria-label='Search'
								id='buscarMateriaM'
								name='buscarMateriaM'>
								<div class='input-group-append'>
									<button type='button' class='btn btn-outline-secondary btn-sm my-0' id='buscarCedulaMB' >Buscar</button>
								</div>
							</div>
						</div>
						</form>
						<hr>
						<form method="post" class="md-form form-sm" enctype="multipart/form-data" id="modify" autocomplete="off">
							<div class="form-group">
								<label class='mt-2'>Carrera</label>
								<input type='text' id='carreraM' maxlength='45' class='form-control carreraI md-2' readonly>
								<input type='text' id='carreraMN' name='carreraM' hidden maxlength='45' class='form-control carreraI md-2' readonly>
								<small class='form-text text-muted'>Identificar la carrera para la nueva materia.</small>
								<div class='dropdown'>
									<button type='button' class='btn btn-secondary dropdown-toggle m-4' data-toggle='dropdown' aria-haspopup='true'>
										Lista de carrera
									</button>
									<div class='dropdown-menu insert-ul insert-ul-M dropdown-menu-scroll form-check'>
									</div>
								</div>

								<label>Código</label>
								<input type="text" name="codigoM" maxlength="10" class="codigoM form-control md-2">
								<input type="text" name="codigoMO" readonly hidden maxlength="10" class="codigoMO form-control md-2">
								<small class="form-text text-muted">Identificador de la materia.</small>
								<label class="mt-2">Nombre</label>
								<input type="text" name="nombreM" maxlength="85" class="materiaM form-control md-2">
								<small class="form-text text-muted">Nombre de la materia.</small>
								<label class="mt-2">Unidades de crédito</label>
								<input type="text" name="ucM" maxlength="10" class="UCM form-control md-2">
								<small class="form-text text-muted">Cantidad de unidades de crédito.</small>
								<label>Numeró del periodo</label>
								<input type="text" name="periodoM" maxlength="10" class="periodoM form-control md-2">
								<small class="form-text text-muted">Ingresa números en romanos el periodo donde se cursara la materia.</small>
								<div class="input-group-append mx-auto justify-content-center m-4">
                                    <button type="button" class="btn btn-outline-secondary btn-sm my-0 mr-4 text-white bg-secondary" id="cancelarM">Cancelar</button>
                                    <button type="submit" class="btn btn-outline-secondary btn-sm my-0 ml-4 text-white bg-secondary" id="Aceptar">Aceptar</button>
                                </div>
							</div>
						</form>
					</div>
					<!-- ******************************************************************** -->
					<div class="tab-pane fade" id="delMateria">
						<h2 class="mt-1 mr-4">Eliminar</h2>
						<form method='POST' class='md-form form-sm' enctype='multipart/form-data' id='searchModify' autocomplete="off">
							<div class='text-center'>
								<label>Ingresar código de la materia</label>
								<div class='input-group mb-3 justify-content-center'>
									<input type='text' class='form-control col-md-5' placerholder='Cedula del estudiante' aria-label='Search' 
									id='buscarMateriaD' name='buscarMateriaD'>
									<div class='input-group-append'>
										<button type='button' class='btn btn-outline-secondary btn-sm my-0' id='buscarMateriaDB' >Buscar</button>
									</div>
								</div>
							</div>
						</form>
						<hr>
						<form method="post" class="md-form form-sm" enctype="multipart/form-data" id="delet" autocomplete="off">
							<div class="form-group">
								<label>Carrera</label>
								<input type="text" readonly name="carreraD" maxlength="10" class="carreraD form-control md-2">
								<br>
								<label>Código</label>
								<input type="text" readonly name="codigoD" maxlength="10" class="codigoD form-control md-2">
								<br>
								<label class="mt-2">Nombre</label>
								<input type="text" readonly name="nombreD" maxlength="25" class="materiaD form-control md-2">
								<br>
								<label class="mt-2">Unidades de crédito</label>
								<input type="text" readonly name="ucD" maxlength="10" class="UCD form-control md-2">
								<br>
								<label>Numeró del periodo</label>
								<input type="text" readonly name="periodoD" maxlength="10" class="periodoD form-control md-2">
								<br>
								<div class="input-group-append mx-auto justify-content-center m-4">
                                    <button type="button" class="btn btn-outline-secondary btn-sm my-0 mr-4 text-white bg-secondary" id="cancelarD">Cancelar</button>
                                    <button type="submit" class="btn btn-outline-secondary btn-sm my-0 ml-4 text-white bg-secondary" id="Aceptar">Aceptar</button>
                                </div>
							</div>
						</form>
					</div>
					<!-- ******************************************************************** -->
					<div class="tab-pane fade" id="regPeriodo">
						<h2 class="mt-1 mr-4">Gestor de periodo académico</h2>
						<form method='POST' class='md-form form-sm' enctype='multipart/form-data' id='searchPeriodModify' autocomplete="off">
							<div class='text-center justify-content-center align-items-center'>
								<br>
								<label>Ingresar periodo académico. Ejemplo: LAR-III-2016</label>
								<div class='input-group mb-3 justify-content-center'>
									<input type='text' id='periodoP' class='form-control col-md-5' placerholder='Cedula del estudiante' aria-label='Search' 
									id='buscarPeriodo' name='buscarMateriaD'>
									<div class='input-group-append'>
										<button type='button' class='btn btn-outline-secondary btn-sm my-0' id='buscarPeriodoB' >Buscar</button>
									</div>
								</div>
								<div class='justify-content-center'>
									<small class="form-text text-muted">Ingresa un periodo académico para verificar si registrado y poder modificar, de lo contrario se podrá registrar un nuevo periodo.</small>
								</div>
							</div>
						</form>
						<hr>
						<form method="post" class="md-form form-sm" enctype="multipart/form-data" id="modPeriod" autocomplete="off">
							<div class="form-group">
								<label>Crear o modificar periodo académico</label>
								<input type="text" name="carreraD" maxlength="15" readonly class="periodoMC form-control md-2">
								<input type="text" name="carreraD" maxlength="15" id='periodoMC' readonly class=" form-control md-2" hidden>
								<small class="form-text text-muted"></small>
								<label class='mt-2'>Fecha de la primera cuota. Por ejemplo: 14/07/2020</label>
								<input type='text' readonly id='cuota1' maxlength='45' class='form-control md-2'>
								<small class='form-text text-muted'>Ingresar fecha de pago de la primera cuota.</small>
								<br>
								<label class='mt-2'>Fecha de la segunda cuota. Por ejemplo: 14/07/2020</label>
								<input type='text' readonly id='cuota2' maxlength='45' class='form-control md-2'>
								<small class='form-text text-muted'>Ingresar fecha de pago de la segunda cuota.</small>
								<br>
								<label class='mt-2'>Fecha de la tercera cuota. Por ejemplo: 14/07/2020</label>
								<input type='text' readonly id='cuota3' maxlength='45' class='form-control md-2'>
								<small class='form-text text-muted'>Ingresar fecha de pago de la tercera cuota.</small>
								<br>
								<label class='mt-2'>Fecha de la cuarta cuota. Por ejemplo: 14/07/2020</label>
								<input type='text' readonly id='cuota4' maxlength='45' class='form-control md-2'>
								<small class='form-text text-muted'>Ingresar fecha de pago de la cuarta cuota.</small>
								<br>
								<label class='mt-2'>Unidad de crédito Bs</label>
								<input type='text' id='UCB' maxlength='45' readonly class='form-control md-2'>
								<small class='form-text text-muted' >Aquí se establecerá el valor de la unidad de crédito en bolivares para estudiante interno.</small>
								<br>
								<label class='mt-2'>Monto inicial</label>
								<input type='text' id='INICIAL' maxlength='45' readonly class='form-control md-2'>
								<small class='form-text text-muted' >Aquí se establecerá el descuento para los estudiantes con convenio.</small>
								<br>
								<div class="input-group-append mx-auto justify-content-center m-4">
                                    <button type="button" class="btn btn-outline-secondary btn-sm my-0 mr-4 text-white bg-secondary" id="cancelarMP">Cancelar</button>
                                    <button type="button" class="btn btn-outline-secondary btn-sm my-0 ml-4 text-white bg-secondary" id="AceptarMP">Aceptar</button>
                                </div>
							</div>
						</form>
					</div>
				</div>
<!-- ****************************************************************************************** -->
			</div>
		</section>
		<h3 class='position-fixed text-center textInfoProM text-white'></h3>
	</div>
	<?php
		include("../../../SistemaEaD/model/php/managerJS.php");
	?>
	<script src="../../controller/js/sendMatter.js"></script>
</body>
</html>