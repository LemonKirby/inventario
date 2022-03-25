 
<div class="container-fluid mt-4 pt-2 col-12">

	<div class="page-header" id="banner">

		<h1>Gestión insumos</h1>
	</div>
	

	<div class="pt-2">
		<div class="row m-2">
		</div>
		<div class="row m-2">
			<div class="row">
				<div class="col-4">
					<div class="input-group">
						<input type="text" class="form-control form-control-sm">
						<div class="input-group-prepend">
							<button class="btn btn-outline-primary btn-sm" type="button"><i class="fa-solid fa-magnifying-glass"></i></button>
						</div>
						
					</div>
				</div>
				<div class="col">
					<!-- <button class="form-control btn btn-primary btn-sm" type="button">CREAR INSUMO <i class="fa-solid fa-plus"></i></button> -->
				</div>
				<div class="col">
					<button class="form-control btn btn-primary btn-sm" type="button">HISTORIAL <i class="fa-solid fa-chart-simple"></i></button>
				</div>
				<div class="col">
					<a href="<?=base_url('/controlador/insumosAdd')?>" class="form-control btn btn-primary btn-sm" type="button">AGREGAR <i class="fa-solid fa-chart-simple"></i></a>
					<div class="row mt-2"></div>
					<!-- <button class="form-control btn btn-outline-primary btn-sm" type="button">EXPORTAR A EXCEL <i class="fa-solid fa-file-export"></i></button> -->
				</div>
			</div>
		</div>


		<div class="row m-2">
			<div class="table-responsive">			
 		<!-- table -->
				<table class="table table-hover table-sm table-bordered">
				  <thead class="table-dark">
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">INSUMO</th>
				      <th scope="col">PROVEEDOR</th>
				      <th scope="col">MARCA</th>
				      <th scope="col">PRESENTACION</th>
				      <th scope="col">DETALLES</th>
				      <th scope="col">STOCK</th>
				      <th scope="col">ACCIONES</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php 

				  	$datos = array('Azucar','Harina de trigo','Harina de maiz', 'Aceite', 'Pollo', 'Chocolate');
				  	$marcas = array('Mars','Kraft','General Mills');

				  	for ($i=0; $i <6 ; $i++) { ?>

				    <tr>
				      <th scope="row"><?php echo($i+1) ?></th>
				      <td><?php echo($datos[$i]) ?></td>
				      <td><?php echo('Proveedor '.random_int(1, 99)) ?></td>
				      <td><?php $temp = array_rand($marcas); echo($marcas[$temp]) ?></td>
				      <td><?php echo(random_int(100, 699).' grs') ?></td>
				      <td><a href="<?=base_url('/controlador/detalleinsumo')?>">Ver mas </a></td>
				      <td><?php echo(random_int(20, 45).' u') ?></td>
				      <td>
				      	
						<a href="<?=base_url('/controlador/detalleinsumo')?>" type="button" class="btn btn-outline-dark btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
						<a href="<?=base_url('/controlador/detalleinsumo')?>" type="button" class="btn btn-outline-dark btn-sm"><i class="fa-solid fa-trash"></i></a>
						<button type="button" class="btn btn-outline-dark btn-sm">Merma</button>
						<button type="button" class="btn btn-outline-dark btn-sm">Historial Merma</button>
				      </td>
				    </tr> 
				  	<?php
				  	}

				  	?>

				  </tbody>
				</table>
 		<!-- ./table -->
 			</div>
		</div>


	</div>
