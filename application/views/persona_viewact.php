<body style="background-color: orange">

	<div class="row">
		<div class="container">
			<?php foreach ($persona as $p) { ?>
				<form method="POST" action="<?php echo base_url('persona_controller/ingresar'); ?>">
					<table>
						<tr>
							<div class="form-label-group">
								<td><label>Número de DUI:</label></td>
								<td><input type="text" id="DUI" name="DUI_persona" class="form-control" value="<?= $p->DUI_persona ?>" ></td>
								<script type="text/javascript">
									$(function () {
										var selector = document.getElementById("DUI");

										var im = new Inputmask("99999999-9");
										im.mask(selector);
									});
								</script>
							</div>
						</tr>
						<tr>
							<td><label>Nombres:</label></td>
							<td><input value="<?= $p->nombre1 ?>" id="nombre" type="text" name="nombre1" class="form-control" min ></td>
							<td><input value="<?= $p->nombre2 ?>" id="nombre" type="text" name="nombre2" class="form-control"></td>
							<td><input value="<?= $p->nombre3 ?>" id="nombre" type="text" name="nombre3" class="form-control"></td>
							<td><input value="<?= $p->nombre4 ?>" id="nombre" type="text" name="nombre4" class="form-control"></td>

						</tr>
						<tr>
							<td><label>Apellidos:</label></td>
							<td><input value="<?= $p->apellido1 ?>" id="apellido" type="text" name="apellido1" class="form-control"></td>
							<td><input value="<?= $p->apellido2 ?>" id="apellido" type="text" name="apellido2" class="form-control"></td>
							<td><input value="<?= $p->apellido3 ?>" id="apellido" type="text" name="apellido3" class="form-control"></td>
							<td></td>
						</tr>
						<tr>
							<td><label>Telefono:</label></td>
							<td><input value="<?= $p->telefono ?>" id="telefono" type="text" name="telefono" class="form-control"></td>
							<script type="text/javascript">
								$(function () {
									var selector = document.getElementById("telefono");

									var im = new Inputmask("9999-9999");
									im.mask(selector);
								});
							</script>
						</tr>
						<tr>
							<td><label>Direccion:</label></td>
							<td><input id="" type="text" name="direccion" class="form-control"></td>
						</tr>
						<tr>
							<td><label>Fecha de nacimiento:</label></td>
							<td><input id="fnacimiento" type="date" name="fnacimiento" class="form-control"></td>
						</tr>
						<tr>
							<td><label>Estado:</label></td>
							<td><select id="sexo" name="estado" class="form-control">
								<option value="">--Seleccione un estado--</option>
								<?php foreach($estado as $e){ ?>
									<option value="<?= $e->id_estadoh ?>"><?= $e->nombre_estadoh ?></option>
								<?php } ?>
							</select></td>
						</tr>
						<tr>
							<td><label>Sexo:</label></td>
							<td><select id="sexo" name="sexo" class="form-control">
								<option value="">--Seleccione un sexo--</option>
								<?php foreach($sexo as $s){ ?>
									<option value="<?= $s->id_sexo ?>"><?= $s->nombre_sexo ?></option>
								<?php } ?>
							</select></td>
						</tr>
						<tr>
							<td><label>Departamento:</label></td>
							<td><select id="departamento"  onchange="load(this.value)" name="departamento" class="form-control">
								<option value="">--Seleccione un departamento--</option>
								<?php foreach($departamento as $d){ ?>
									<option value="<?= $d->id_departamento ?>"><?= $d->nombre ?></option>
								<?php } ?>
							</select></td>
						</tr>
						<tr>
							<td><label>Municipio:</label></td>
							<td><div id="municipio"><select class="form-control" name="municipio">
								<option value="">--Primero seleccione un departamento--</option>
							</select></div></td>
						</tr>
						<tr>
							<td><label>Foto:</label></td>
							<td><div class="custom-file">
								<input type="file" class="custom-file-input" id="customFileLang" lang="es" name="img">
								<label class="custom-file-label" for="customFileLang"></label>
							</div></td>
						</tr>
						<tr>
							<td><input id="guardar" type="submit" value="Guardar" class="form-control"></td>
						</tr>
					</table>	
				</form>
			<?php } ?>
		</div>
	</div>

</body>