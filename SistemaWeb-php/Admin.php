<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet"/>
	<link href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
	<meta charset="ISO-8859-1"/>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>
	<link href="/SistemaWeb-php/css/styles.css" rel="stylesheet"/>
	<title>Administrador</title>
	
</head>
<body>
	<div class="container">
		<div class="main row">
			<div class="col-sm-12">
        <input type="text" id="Lider_Name" value="<?php echo $_GET['user']; ?>" Style="Display:none;"/>
				<div id="Cabecera"></div>
				<hr/>
			</div>
		</div>
		<div class="row">
  			<div class="col-sm-12"> <!--Tabla fabricas -->
  				<h2>F&aacute;bricas</h2>
  				<div class="table-responsive">
  					<table id="contenido" class="table table-striped table-hover">
  						<thead>
							<tr>
								<th>Id Fabrica</th>
								<th>Nombre Fabrica</th>
								<th>Ubicacion</th>
								<th>Lider</th>
								<th><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#saveModal"><span class="glyphicon glyphicon-plus"></span></button></th>
							</tr>
						</thead>
						<tbody>
						
						</tbody>
  					</table>
  				</div>
    		</div>
    		<hr/>
    	</div>
    	
    	<div class="row"> 
    		<div class="col-md-3">  <!--guardar fabrica-->
    			<!-- saveModal -->
				<div id="saveModal" class="modal fade" role="dialog">
  					<div class="modal-dialog">
  						<!-- Modal content-->
    					<div class="modal-content">
      						<div class="modal-header">
      							<button type="button" id="cerrar_boton" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
      							<h4 class="modal-title">Nueva F&aacute;brica</h4>
      							
      						</div>
      						<div class="modal-body"><!--Modal body -->
    							<form id="form_save" method="POST">

    								<div class="form-group">
    									<label>Usuario</label><input type="text" id="userSave" class="form-control input-lg" name="userSave" required="required" />
    								</div>
    								<div class="form-group">
    									<label>Password</label><input type="password" id="passSave" class="form-control input-lg" name="passSave" required="required" />
    								</div>
    								<div class="form-group">
    									<label>Confirmar Pass</label><input type="password" id="confSave" class="form-control input-lg" name="confSave" required="required" />
    								</div>

    								<div class="form-group">
    									<label>Nombre de la f&aacute;brica</label><input type="text" id="nombrefab" class="form-control input-lg" name="Nombre" required="required" />
    								</div>
    								<div class="form-group">
    									<label>Ubicaci&oacute;n</label><input type="text" id="ubicacion" class="form-control input-lg" name="Ubicacion" required="required" />
    								</div>
    								<div class="form-group">
    									<input type="submit" value="Guardar" id="guardar_boton" class="btn btn-success btn-lg btn-block"/>
    								</div>
    							</form>
    						</div><!--Modal body ends-->
    					</div><!--Modal content ends-->
    				</div>
    			</div><!--saveModal ends-->
    		</div>
    		<div class="col-md-3"> <!-- editar fabrica -->
    			<!-- editModal -->
				<div id="editModal" class="modal fade" role="dialog">
  					<div class="modal-dialog">
  						<!-- Modal content-->
    					<div class="modal-content">
      						<div class="modal-header">
      							<button type="button" id="cerrar_boton" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
      							<h4 class="modal-title">Editar F&aacute;brica</h4>
      						</div>
      						<div class="modal-body"><!--Modal body -->
    							<form id="form_edit" method="POST">
    								<div class="form-group">
    									<label>Id Fabrica</label><input type="text" id="id_edit" class="form-control input-lg" name="id" required="required" disabled="disabled"/>
    								</div>
    								<div class="form-group">
    									<label>Lider</label><input type="text" id="userSave_edit" class="form-control input-lg" name="userSave" required="required" disabled="disabled"/>
    								</div>
    								<div class="form-group">
    									<label>Nombre de la f&aacute;brica</label><input type="text" id="nombrefab_edit" class="form-control input-lg" name="Nombre" required="required" />
    								</div>
    								<div class="form-group">
    									<label>Ubicaci&oacute;n</label><input type="text" id="ubicacion_edit" class="form-control input-lg" name="Ubicacion_edit" required="required" />
    								</div>
    								<div class="btn-group">
    									<input type="submit" value="Guardar" class="btn btn-success btn-lg "/>
    									<button type="button" id="cambiar_lider" class="btn btn-danger btn-lg" data-dismiss="modal" data-toggle="modal" data-target="#liderModal">Cambiar Lider</button>
    								</div>
    							</form>
    						</div><!--Modal body ends-->
    					</div><!--Modal content ends-->
    				</div>
    			</div><!--editModal ends-->
    		</div>
    		<div class="col-md-3"> <!-- eliminar fabrica -->
    			<!-- deleteModal -->
				<div id="deleteModal" class="modal fade" role="dialog">
  					<div class="modal-dialog">
  						<!-- Modal content-->
    					<div class="modal-content">
      						<div class="modal-header">
      							<h4 class="modal-title">Eliminar F&aacute;brica</h4>
      						</div>
      						<div class="modal-body"><!--Modal body -->
      							<div class="form-group">
    								<label>¿Estas seguro que quieres eliminar el registro? Id: </label> 
    								<input type="text" class="form-control input-lg" id="id_eliminar" size="3" disabled="disabled"/>
    								<input type="text" class="form-control input-lg" id="lider_eliminar" disabled="disabled"/>
    							</div>
    							<div class="btn-group">
    								<button type="button" id="eliminar_fabrica" class="btn btn-danger">Eliminar</button>
    								<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
    							</div>
    						</div><!--Modal body ends-->
    					</div><!--Modal content ends-->
    				</div>
    			</div><!--deleteModal ends-->
    		</div>

    		<div class="col-md-3"> <!-- editar lider -->
    			<!-- liderModal -->
				<div id="liderModal" class="modal fade" role="dialog">
  					<div class="modal-dialog">
  						<!-- Modal content-->
    					<div class="modal-content">
      						<div class="modal-header">
      							<button type="button" id="cerrar_boton" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
      							<h4 class="modal-title">Editar Lider</h4>
      						</div>
      						<div class="modal-body"><!--Modal body -->
      							<form id="form_lider" method="POST">
      								
    								<div class="form-group">
    									<label>Lider</label><input type="text" id="userSave_lider" class="form-control input-lg" name="userSave" required="required" />
    								</div>
    								<div class="form-group">
    									<label>Password</label><input type="password" id="passSave_lider" class="form-control input-lg" name="passSave" required="required" />
    								</div>
    								<div class="form-group">
    									<label>Confirmar Pass</label><input type="password" id="confSave_lider" class="form-control input-lg" name="confSave" required="required" />
    								</div>
    								<div class="form-group">
    									<input type="submit" value="Guardar" class="btn btn-success btn-lg btn-block"/>
    								</div>
    							</form>
    						</div><!--Modal body ends-->
    					</div><!--Modal content ends-->
    				</div>
    			</div><!--deleteModal ends-->
    		</div>
    	</div>

    	<div class="row">
    		<div class="col-sm-12"> <!--Tabla ventas -->
    			<h2>Ventas</h2>
    			<div class="table-responsive">
  					<table id="contenidoVenta" class="table table-striped table-hover">
  						<thead>
							<tr>
								<th>Id Venta</th>
								<th>Cantidad</th>
								<th>Fecha</th>
								<th>Id Punto</th>
								<th>Id Fabrica</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						
						</tbody>
  					</table>
  				</div>
    		</div>
    		<hr/>
    	</div>
    	<div class="row">
        <div class="col-sm-12">
          <h2>Gr&aacute;fico</h2>
          <input type="date" name="fecha1" id="fecha1" required="required"/>
          <input type="date" name="fecha2" id="fecha2" required="required"/>
          <button type="button" class="btn btn-primary" id="Crear_Grafico">Crear</button>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div id="div_canvas">
            <canvas id="myChart" width="900px" height="500px"></canvas>
          </div>
        </div>
      </div>
    	<div class="row">
    		<div class="col-md-3"> <!-- eliminar venta -->
    			<!-- deleteModal -->
				<div id="deleteVenta" class="modal fade" role="dialog">
  					<div class="modal-dialog">
  						<!-- Modal content-->
    					<div class="modal-content">
      						<div class="modal-header">
      							<h4 class="modal-title">Eliminar Venta</h4>
      						</div>
      						<div class="modal-body"><!--Modal body -->
      							<div class="form-group">
    								<label>¿Estas seguro que quieres eliminar la venta? Id: </label> 
    								<input type="text" class="form-control input-lg" id="idventa_eliminar" size="3" disabled="disabled"/>
    							</div>
    							<div class="btn-group">
    								<button type="button" id="eliminar_venta" class="btn btn-danger">Eliminar</button>
    								<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
    							</div>
    						</div><!--Modal body ends-->
    					</div><!--Modal content ends-->
    				</div>
    			</div><!--deleteModal ends-->
    		</div>
    	</div>
	</div>
	<script src="//code.jquery.com/jquery-1.12.3.js"></script>
	<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
  <script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
  <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
  <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
  <script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
  <script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="/SistemaWeb-php/js/Chart.js"></script>
	<script language="Javascript"  src="/SistemaWeb-php/js/admin.js"></script>
</body>
</html>