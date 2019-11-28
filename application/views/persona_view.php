<body>
	
	<div class="row">
		<div class="container">
			<h2 style="color:blue" align="center">Tabla de personas</h2><br>

			<form enctype="multipart/form-data" onsubmit="validarFormulario()" action="" method="POST" >
				<table>
					<tr>
						<div class="form-label-group">
							<td><label>Número de DUI:</label></td>
							<td><input type="text" id="DUI" name="DUI_persona" class="form-control"></td>
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
						<td><input id="nombre" type="text" name="nombre1" class="form-control" min ></td>
						<td><input id="nombre" type="text" name="nombre2" class="form-control"></td>
						<td><input id="nombre" type="text" name="nombre3" class="form-control"></td>
						<td><input id="nombre" type="text" name="nombre4" class="form-control"></td>

					</tr>
					<tr>
						<td><label>Apellidos:</label></td>
						<td><input id="apellido" type="text" name="apellido1" class="form-control"></td>
						<td><input id="apellido" type="text" name="apellido2" class="form-control"></td>
						<td><input id="apellido" type="text" name="apellido3" class="form-control"></td>
						<td></td>
					</tr>
					<tr>
						<td><label>Telefono:</label></td>
						<td><input id="telefono" type="text" name="telefono" class="form-control"></td>
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
			</form><br>



			<table class="table table-dark">
				<thead style="background-color:blue ">
					<tr>
						<td>N° de DUI</td>
						<td>Nombres</td>
						<td>Apellidos</td>
						<td>Teléfono</td>
						<td>Dirección</td>
						<td>Fecha de nacimiento</td>
						<td>Expedición</td>
						<td>Expiración</td>
						<td>Estado</td>
						<td>Sexo</td>
						<td>Departamento y municipio</td>
						<td>Foto</td>
						<td>Eliminar</td>
						<td>Actualizar</td>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($persona as $p) { ?>

						<tr>
							<td><?= $p->DUI_persona  ?></td>
							<td><?php echo $p->nombre1." ".$p->nombre2;
							if(isset($p->nombre3, $p->nombre4)){ echo " ".$p->nombre3." ".$p->nombre4; } ?></td>

							<td><?php echo $p->apellido1." ".$p->apellido2;
							if(isset($p->apellido3)){ echo " ".$p->apellido3; }  ?></td>

							<td><?= $p->telefono  ?></td>
							<td><?= $p->direccion  ?></td>
							<td><?= $p->fnacimiento  ?></td>
							<td><?= $p->fexpedicion  ?></td>
							<td><?= $p->fexpiracion  ?></td>
							<td><?= $p->nombre_estadoh  ?></td>
							<td><?= $p->nombre_sexo  ?></td>
							<td><?= $p->nombre.", ".$p->nombre_municipio  ?></td>
							<td><img  style="width: 150%; border-radius: 15px" src="<?= base_url($p->rutaimg) ?>"></td>
							<td><button id="id" onclick="alerta_eliminar(<?= $p->DUI_persona ?>)">Eliminar</button></td>
							<td><a href="<?= base_url().$p->DUI_persona  ?>"><button id="id2" onclick="actualizar()">Actualizar</button></a></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>

	<?php $this->load->view('utils/alertspersona') ?>
</body>