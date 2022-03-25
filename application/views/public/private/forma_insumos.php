 
<div class="container-fluid mt-4 pt-2 col-12">

	<div class="page-header" id="banner">

		<h1>Detalle insumo</h1>
	</div>
	

	<div class="pt-2">
		<div class="row m-2">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active" aria-current="page"> <i class="fa-solid fa-angle-left"></i><a href="<?=base_url('/controlador/insumos')?>"> Volver atras</a></li>
				</ol>
			</nav>
		</div>

		<div class="row m-2"><!-- me falta arreglar eso lo de la actualización-->
		<form action="<?php echo base_url(); ?>insumos/update" class="mt-4" method="POST">
			<div class="card p-2">
			
				<div class="row">
					<div class="col-12">
					    <div class="form-group">
					      <label for="exampleInputEmail1" class="form-label mt-4">Nombre</label>
					      <input type="text" class="form-control" id="nombre" <?php echo form_error('nombre') ? 'is-invalid':'' ; ?> placeholder="Nombre del insumo" value="<?php echo set_value('nombre'); ?>">
					    </div>

					    <div class="form-group">
					      <label for="exampleSelect2" class="form-label mt-4">Unidad de medida</label>
					      <select class="form-select" id="unidadMedida" <?php echo form_error('unidadMedida') ? 'is-invalid':'' ; ?> value="<?php echo set_value('unidadMedida'); ?>">
					        <option value="lts">Litro (lts.)</option>
					        <option value="ml">Mililitro (ml.)</option>
					        <option value="cc">Centímetros cúbicos (c.c.)</option>
					        <option value="kg">Kilogramos(kg.)</option>
					        <option value="gr">Gramos (gr.)</option>
					        <option value="lb">Libra (lb.)</option>
					        <option value="oz">Onza (oz.)</option>
					      </select>
					    </div>

					    <div class="form-group">
					      <label for="exampleSelect2" class="form-label mt-4">Proveedor</label>
					      <select class="form-select" id="idProveedor" <?php echo form_error('idProveedor') ? 'is-invalid':'' ; ?> value="<?php echo set_value('idProveedor'); ?>">
					        <option value="1">Proveedor 1</option>
					        <option value="2">Proveedor 2</option>
					      </select>
					    </div>

					</div>
					<div class="row m-4"></div>


					<div class="col">
					</div>
					<div class="col">
						<button class="form-control btn btn-outline-primary btn-sm" type="submit">GUARDAR <i class="fa-solid fa-chart-simple"></i></button>
						<div class="row mt-2"></div>
						<!-- <button class="form-control btn btn-outline-primary btn-sm" type="button">EXPORTAR A EXCEL <i class="fa-solid fa-file-export"></i></button> -->
					</div>
				</div>
			</div>
			</form>	
		</div>

	</div>

	<div class="row m-3"></div>

<!-- 	<div class="d-flex justify-content-around m-2">
		<a href="http://localhost/inventario/">Login</a>
		<a href="http://localhost/inventario/controlador/puntosVenta">Puntos de venta</a>
		<a href="http://localhost/inventario/controlador/insumos">Insumos</a>
		<a href="http://localhost/inventario/controlador/recetas">Recetas</a>
		<a href="http://localhost/inventario/controlador/productos">productos</a>
		<a href="http://localhost/inventario/controlador/reportes">Reportes</a>
	</div> -->
	

</div>
