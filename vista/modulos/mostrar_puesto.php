<br>
<div class="alert alert-dark" role="alert">
	<h2><i class="fa fa-clipboard"></i> Puestos <small>de la Empresa</small></h2>
</div>
<div class="col-mo-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			
		</div>
		<div class="x_content">
			<table class="table table-hover">
				<thead>
				<tr>
					<th>Puesto</th>
					<th>Salario</th>
					<th>Departamento</th>
					<th>Editar</th>
					<th>Borrar</th>		
				</tr>
				</thead>
				<tbody>
					<?php
						$vistaPersonas = new Controller();
						$vistaPersonas -> vistaPuestoController();
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
