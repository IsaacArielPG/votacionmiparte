<body>
	<div class="row">
		<div class="container">
			<h2 style="color:blue" align="center">Tabla de urnas/votación</h2><br>



			<!-- Button trigger modal -->
<div align="left"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Agregar nueva urna/votación
</button></div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nueva urna/votación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
      </div>
    </div>
  </div>
</div>

<table>
				<form method="POST" action="<?= base_url('uv_controller/ingresar') ?>" >
					<tr>
						<td><label>Votación</label></td>
						<td>
							<select id="sexo" name="votacion" class="form-control" required="">
								<option value="">--Seleccione una votación--</option>
								<?php foreach ($votacion as $v) { ?>
									<option value="<?= $v->id_votacion ?>"><?= $v->descripcion ?></option>
								<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td><label>Urna</label></td>
						<td>
							<select id="sexo" name="urnas" class="form-control" required="">
								<option value="">--Seleccione una urna--</option>
								<?php foreach ($urnas as $u) { ?>
									<option value="<?= $u->id_urnas ?>"><?= $u->nombre_urnas ?></option>
								<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td><input type="button" value="Guardar"></td>
					</tr>
				</form>
			</table>

			<br><table class="table table-dark">
				<thead style="background-color:blue">
					<tr>
						<td>Votación</td>
						<td>Estado</td>
						<td>Fecha de inicio</td>
						<td>Fecha de finalización</td>
						<td>Urna</td>
						<td>Sede</td>
						<td>Departamento y muncicipio</td>
						<td>Eliminar</td>
						<td>Actualizar</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php foreach ($urnas_votacion as $u) { ?>
							<td><?=$u->descripcion ?></td>
							<td><?=$u->nombre_estado ?></td>
							<td><?=$u->fecha_inicio  ?></td>
							<td><?=$u->fecha_final  ?></td>
							<td><?=$u->id_urnas.", ".$u->nombre_urnas  ?></td>
							<td><?=$u->nombre_sede  ?></td>
							<td><?=$u->nombre.", ".$u->nombre_municipio  ?></td>
							<td><a href=""><button class="btn btn-danger">Eliminar</button></a></td>
							<td><a href=""><button class="btn btn-success">Actualizar</button></a></td>
						</tr>
					<?php } ?>
				</tbody>	
			</table>
		</div>
	</div>
</body>
