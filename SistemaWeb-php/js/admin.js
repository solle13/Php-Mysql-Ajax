/*<![CDATA[*/
		$(document).ready(function() {
			window.onload = function(){ //-----------------Cargar la tabla fabricas al entrar a la pagina---------
				TablaFabrica();
				cabecera();
				TablaVentas();
				$.notify.defaults({position:"bottom center"});
			};
			var ruta = "/SistemaWeb-php/php/Controlador/";
			function cabecera(){ //----------------mostrar cabecera------------------
				var user = document.getElementById("Lider_Name").value;
				$("#Cabecera").html("<p><h2>Sistema Web - Administrador</h2></p><p><h4> Usuario: "+user+"</h4></p>");
			}//---------------- fin mostrar cabecera----------------------

			function TablaFabrica() { //-------------------Dibujar la tabla fabricas al cargar la pagina---------------
			
				$.ajax({
    				type: "GET",
    				dataType: "json",
    				contentType: "application/x-www-form-urlencoded; charset=UTF-8",
    				url: ""+ruta+"GetAll_Fabrica.php",
					})  
    			.done(function( data ) {
    				JSON.stringify(data);
        			var table = $("#contenido").DataTable({
        				"dom": 'Bfrtip',
        				"buttons": [
        					{
        						extend: 'excelHtml5',
        						text: '<button type="button" class="btn btn-success btn-lg"><b><i class="fa fa-file-excel-o"></i> Excel</b></button>',
        						titleAttr: 'Excel'
        					},
        					{
        						extend: 'pdfHtml5',
        						text: '<button type="button" class="btn btn-success btn-lg"><b><i class="fa fa-file-pdf-o"></i> PDF</b></button>',
        						titleAttr: 'PDF'
        					} 
        					],
						"destroy" : true,
        				"lengthChange": true,
        				"responsive": true,
        				"autoWidth": false,
        				"pageLength": 10,
        				"dataType":"JSON",
						"data":data,
						"columns":[
							{"data":"IdFabrica"},
							{"data":"NombreFabrica"},
							{"data":"Ubicacion"},
							{"data":"Lider"},
							{"defaultContent":'<button type="button" class="editar btn btn-info" data-toggle="modal" data-target="#editModal"><span class="glyphicon glyphicon-pencil"></span></button><button type="button" class="eliminar btn btn-danger" data-toggle="modal" data-target="#deleteModal"><span class="glyphicon glyphicon-trash"></span></button>'}
							]
						});
					obtener_data_editar("#contenido tbody",table);
					obtener_data_eliminar("#contenido tbody",table);
    			})
    			.fail(function( jqXHR, textStatus, errorThrown ) {
    				console.log("jqxhr: "+jqXHR+", Text Status: "+textStatus+", errorThrown: "+errorThrown+"","error");
				});
			}//------------------------------------------fin tabla fabricas---------------------------------------------

			var obtener_data_editar = function(tbody,table){ //------------------boton editar fabrica------------------
			
				$(tbody).on("click","button.editar", function(){
					var data= table.row($(this).parents("tr")).data();
					var lider=$("#userSave_edit").val(data.Lider),
					id = $("#id_edit").val(data.IdFabrica),
					nombreFabrica=$("#nombrefab_edit").val(data.NombreFabrica),
					ubicacion=$("#ubicacion_edit").val(data.Ubicacion);
				});
			}	//---------------------------------------fin boton editar fabrica------------------------------------

			var obtener_data_eliminar = function(tbody,table){ //---------------------boton eliminar fabrica---------------
				$(tbody).on("click","button.eliminar", function(){
					var data= table.row($(this).parents("tr")).data();
					var idfabrica=$("#id_eliminar").val(data.IdFabrica),
					lider=$("#lider_eliminar").val(data.Lider);
				});
			} //--------------------------------------boton eliminar fabrica-------------------------------------

			$("#eliminar_fabrica").click(function(){ //-----------------------eliminar fabrica ajax-----------------------
				var id = document.getElementById("id_eliminar").value;
				var lider= document.getElementById("lider_eliminar").value;

				$.ajax({
    				type: "GET",
    				contentType: "application/x-www-form-urlencoded; charset=UTF-8",
    				dataType: 'text',
    				url: ""+ruta+"DeleteFabrica_Sucursal.php?id="+id+"",
				})  
    			.done(function( data ) {
    				})
    			.fail(function( jqXHR, textStatus, errorThrown ) {
     				console.log("jqxhr: "+jqXHR+", Text Status: "+textStatus+", errorThrown: "+errorThrown+"","error");
     			});

     			$.ajax({
    				type: "GET",
    				contentType: "application/x-www-form-urlencoded; charset=UTF-8",
    				dataType: 'text',
    				url: ""+ruta+"DeleteFabrica_Venta.php?id="+id+"",
				})  
    			.done(function( data ) {
    				})
    			.fail(function( jqXHR, textStatus, errorThrown ) {
     				console.log("jqxhr: "+jqXHR+", Text Status: "+textStatus+", errorThrown: "+errorThrown+"","error");
     			});

				$.ajax({
    				type: "GET",
    				contentType: "application/x-www-form-urlencoded; charset=UTF-8",
    				dataType: 'text',
    				url: ""+ruta+"Delete_Fabrica.php?id="+id+"",
				})  
    			.done(function( data ) {
    				})
    			.fail(function( jqXHR, textStatus, errorThrown ) {
     				console.log("jqxhr: "+jqXHR+", Text Status: "+textStatus+", errorThrown: "+errorThrown+"","error");
     			});

    			var myPromise = new Promise(function(resolve, reject) {
					$.ajax({
    					type: "GET",
    					contentType: "application/x-www-form-urlencoded; charset=UTF-8",
    					dataType: 'json',
    					url: ""+ruta+"User_Usuario.php?usuario="+lider+"", 
					})  
    				.done(function( data ) {
						resolve(data.IdUsuario);
					})
    				.fail(function( jqXHR, textStatus, errorThrown ) {
 						console.log("jqxhr: "+jqXHR+", Text Status: "+textStatus+", errorThrown: "+errorThrown+"","error");
     					reject("error");
  					});
				});
				myPromise.then(function(data){
					return $.ajax({
						contentType:'application/json; charset=utf-8',
    					type: "GET",
    					contentType: "application/x-www-form-urlencoded; charset=UTF-8",
    					dataType: 'text',
    					url: ""+ruta+"Delete_Usuario.php?id="+data+"",
    				})	 
    				.done(function( data ) {
    					JSON.stringify(data);
					})
    				.fail(function( jqXHR, textStatus, errorThrown ) {
     					console.log("jqxhr: "+jqXHR+", Text Status: "+textStatus+", errorThrown: "+errorThrown+"","error");
     				});
				})
				.then(function(data){
					$("#id_eliminar").val("");
    				$("#lider_eliminar").val("");
    				MostrarFabricas();
    				MostrarVentas();
    				$.notify("Se ha eliminado la fábrica","success");
				})
				.catch(function(error) {
						console.log(error);
				});
				return false;
			}); //-----------------------------------eliminar fabrica ajax-----------------------------------

			$("#form_edit").submit(function(){ // ---------------------------editar fabrica-----------------------------
				var NombreFabrica = document.getElementById("nombrefab_edit").value;
				var Ubicacion = document.getElementById("ubicacion_edit").value;
				var Lider = document.getElementById("userSave_edit").value;
				var id = document.getElementById("id_edit").value;
				
				var myPromise = new Promise(function(resolve, reject) {
					$.ajax({
						contentType:'application/json; charset=utf-8',
    					data:  JSON.stringify({"idFabrica":""+id+"","nombreFabrica":""+NombreFabrica+"","ubicacion":""+Ubicacion+"","lider":""+Lider+""}),
    					type: "POST",
    					contentType: "application/x-www-form-urlencoded; charset=UTF-8",
    					dataType: 'json',
    					url: ""+ruta+"Update_Fabrica.php",
					})  
    				.done(function( data ) {
    					resolve();
    				})
    				.fail(function( jqXHR, textStatus, errorThrown ) {
     					console.log("jqxhr: "+jqXHR+", Text Status: "+textStatus+", errorThrown: "+errorThrown+"","error");
     					reject();
     				});
				});

				myPromise.then(function(){
					$("#nombrefab_edit").val("");
    				$("#ubicacion_edit").val("");
    				$("#userSave_edit").val("");
    				$("#id_edit").val("");
    				MostrarFabricas();
    				$.notify("Se ha actualizado la fábrica","success");
				})
				.catch(function(error) {
					console.log(error);
				});
				
				return false;
    		}); //---------------------------------------- fin editar fabrica---------------------------------------

			var Fabrica_id;	          // variables globales de fabrica
			var Nombre_Fabrica;		//Ayudan a cambiar los valores de lider
			var Ubicacion_Fabrica;
			var Lider_Fabrica;

			$("#cambiar_lider").click(function(){  //-----------Almacenar valores de fabrica------------------------
				Fabrica_id=document.getElementById("id_edit").value;
				Nombre_Fabrica=document.getElementById("nombrefab_edit").value;
				Ubicacion_Fabrica=document.getElementById("ubicacion_edit").value;
				Lider_Fabrica=document.getElementById("userSave_edit").value;
			}); //----------------------fin de almacenar valores de fabrica-------------------------

			$("#form_lider").submit(function(){ //------------------------------Cambiar lider-----------------------
				var user = document.getElementById("userSave_lider").value;
				var pass1 = document.getElementById("passSave_lider").value;
				var pass2= document.getElementById("confSave_lider").value;
				if(pass1.length >= 5){
					var myPromise = new Promise(function(resolve, reject) {
						$.ajax({
							contentType: 'application/json; charset=utf-8',
							type: "GET",
							contentType: "application/x-www-form-urlencoded; charset=UTF-8",
							dataType: 'json',
							url: ""+ruta+"User_Usuario.php?usuario="+user+"",
						})
						.done(function(data ){
							JSON.stringify(data);
							if(data!=null){
								$.notify("El nombre de usuario no esta disponible","error");
								reject("error");
							}else{
								if(pass1===pass2){
									resolve();
								}
								else{
									$.notify("Las contraseñas no son iguales","error");
									reject("error");
								}
							}	
						})
						.fail(function(jqXHR, textStatus, errorThrown){
							console.log("jqxhr: "+jqXHR+", Text Status: "+textStatus+", errorThrown: "+errorThrown+"","error");
							reject("error");
						});
					});
					
					myPromise.then(function(){
						return $.ajax({
									contentType: 'application/json; charset=utf-8',
									type: "GET",
									contentType: "application/x-www-form-urlencoded; charset=UTF-8",
									dataType: 'json',
									url: ""+ruta+"User_Usuario.php?usuario="+Lider_Fabrica+"",
								})
								.done(function( data ){
									JSON.stringify(data);
								})
								.fail(function(jqXHR, textStatus, errorThrown){
									console.log("jqxhr: "+jqXHR+", Text Status: "+textStatus+", errorThrown: "+errorThrown+"","error");	
								});
					})
					.then(function( data ){
						return $.ajax({
							contentType: 'application/json; charset=utf-8',
							data:  JSON.stringify({"idUsuario":""+data.IdUsuario+"","usuario":""+user+"","pass":""+pass1+""}),
							type: "POST",
							contentType: "application/x-www-form-urlencoded; charset=UTF-8",
							dataType: 'json',
							url: ""+ruta+"Update_Usuario.php",
						})
						.done(function( data ){
						})
						.fail(function(jqXHR, textStatus, errorThrown){
							console.log("jqxhr: "+jqXHR+", Text Status: "+textStatus+", errorThrown: "+errorThrown+"","error");
						});
						
   					})
					.then(function( data ){
						return $.ajax({
							contentType:'application/json; charset=utf-8',
   							data:  JSON.stringify({"idFabrica":""+Fabrica_id+"","nombreFabrica":""+Nombre_Fabrica+"","ubicacion":""+Ubicacion_Fabrica+"","lider":""+user+""}),
   							type: "POST",
   							contentType: "application/x-www-form-urlencoded; charset=UTF-8",
   							dataType: 'json',
   							url: ""+ruta+"Update_Fabrica.php",
						})  
   						.done(function( data ) {
   						})
   						.fail(function( jqXHR, textStatus, errorThrown ) {
   							console.log("jqxhr: "+jqXHR+", Text Status: "+textStatus+", errorThrown: "+errorThrown+"","error");
   						});
					})
					.then(function( data ){
						$("#userSave_lider").val("");
    					$("#passSave_lider").val("");
    					$("#confSave_lider").val("");
    					MostrarFabricas();
    					$.notify("Se ha editado el lider","success");
					})
					.catch(function(error) {
						console.log(error);
					});
				}
				else{
					$.notify("La contraseña debe tener 5 o mas caracteres","error");
				}
				return false;
			}); //-----------------------------------------------fin cambiar lider---------------------------------------

			$("#form_save").submit(function(){ // -----------------------------Guardar fabrica---------------------------

				var NombreFabrica = document.getElementById("nombrefab").value;
				var Ubicacion = document.getElementById("ubicacion").value;
				var Lider = document.getElementById("userSave").value;
				var pass1 =	document.getElementById("passSave").value;
				var pass2 = document.getElementById("confSave").value;

				if(pass1.length >= 5){
					var myPromise = new Promise(function(resolve, reject) {
						$.ajax({
						type: "GET",
						contentType: "application/x-www-form-urlencoded; charset=UTF-8",
						dataType: 'json',
						url: ""+ruta+"User_Usuario.php?usuario="+Lider+"",
						})
						.done(function( data ){
							JSON.stringify(data);
							if(data!=null){
								$.notify("El nombre de usuario no esta disponible","error");
								reject("Error");
							}
							else 
								if(pass1===pass2){
									resolve();
								}
								else{
									$.notify("Las contraseñas no son iguales","error");
									reject("Error");
								}
							
						})
						.fail(function( jqXHR, textStatus, errorThrown ) {
     						console.log("jqxhr: "+jqXHR+", Text Status: "+textStatus+", errorThrown: "+errorThrown+"","error");
     					});
					});

					myPromise.then(function(){
						return $.ajax({
    								data:  JSON.stringify({"usuario":""+Lider+"","pass":""+pass1+""}),
    								type: "POST",
    								contentType: "application/x-www-form-urlencoded; charset=UTF-8",
    								dataType: 'json',
    								url: ""+ruta+"Create_Usuario.php",
								})  
    							.done(function( data ) {
    								JSON.stringify(data);
    							})
    							.fail(function( jqXHR, textStatus, errorThrown ) {
     								console.log("jqxhr: "+jqXHR+", Text Status: "+textStatus+", errorThrown: "+errorThrown+"","error");
     							});
					})
					.then(function( data ){
						return $.ajax({
    						data:  JSON.stringify({"nombreFabrica":""+NombreFabrica+"","ubicacion":""+Ubicacion+"","lider":""+Lider+""}),
    						type: "POST",
    						contentType: "application/x-www-form-urlencoded; charset=UTF-8",
    						dataType: 'json',
    						url: ""+ruta+"Create_Fabrica.php",
						})  
    					.done(function( data ) {
    						JSON.stringify(data);		
    					})
    					.fail(function( jqXHR, textStatus, errorThrown ) {
     						console.log("jqxhr: "+jqXHR+", Text Status: "+textStatus+", errorThrown: "+errorThrown+"","error");
     					});
					})
					.then(function( data ){
						$("#nombrefab").val("");
    					$("#ubicacion").val("");
    					$("#userSave").val("");
    					$("#passSave").val("");
    					$("#confSave").val("");
    					MostrarFabricas();
    					$.notify("Fábrica guardada","success");
					})
					.catch(function(error) {
						console.log(error);
					});
				}
				else{
					$.notify("La contraseña debe tener 5 o mas caracteres","error");
				}
				
				return false;
			}); //---------------------------------------fin guardar fabrica------------------------------------


			function TablaVentas() { //-------------------Dibujar la tabla ventas al cargar la pagina---------------
			
				$.ajax({
    				type: "GET",
    				dataType: "json",
    				contentType: "application/x-www-form-urlencoded; charset=UTF-8",
    				url: ""+ruta+"GetAll_Venta.php",
					})  
    			.done(function( data ) {
    				JSON.stringify(data);
        			var table = $("#contenidoVenta").DataTable({
        				"dom": 'Bfrtip',
        				"buttons": [
        					{
        						extend: 'excelHtml5',
        						text: '<button type="button" class="btn btn-success btn-lg"><b><i class="fa fa-file-excel-o"></i> Excel</b></button>',
        						titleAttr: 'Excel'
        					},
        					{
        						extend: 'pdfHtml5',
        						text: '<button type="button" class="btn btn-success btn-lg"><b><i class="fa fa-file-pdf-o"></i> PDF</b></button>',
        						titleAttr: 'PDF'
        					} 
        					],
						"destroy" : true,
        				"lengthChange": true,
        				"responsive": true,
        				"autoWidth": false,
        				"pageLength": 10,
        				"dataType":"JSON",
						"data":data,
						"columns":[
							{"data":"IdVenta"},
							{"data":"Cantidad"},
							{"data":"Fecha"},
							{"data":"IdPunto"},
							{"data":"IdFabrica"},
							{"defaultContent":'<button type="button" class="eliminarventa btn btn-danger" data-toggle="modal" data-target="#deleteVenta"><span class="glyphicon glyphicon-trash"></span></button>'}
							]
						});
					obtener_venta_eliminar("#contenidoVenta tbody",table);
    			})
    			.fail(function( jqXHR, textStatus, errorThrown ) {
     				console.log("jqxhr: "+jqXHR+", Text Status: "+textStatus+", errorThrown: "+errorThrown+"","error");
				});
			}//------------------------------------------fin tabla ventas-------------------------------------------------

			var obtener_venta_eliminar = function(tbody,table){ //---------------------boton eliminar venta---------------
				$(tbody).on("click","button.eliminarventa", function(){
					var data= table.row($(this).parents("tr")).data();
					var idfabrica=$("#idventa_eliminar").val(data.IdVenta);
				});
			} //--------------------------------------boton eliminar venta-------------------------------------
			

			function Grafico(fecha1,fecha2){ //--------------------------------------Grafico-------------------------------------
					var myPromise = new Promise(function(resolve, reject) {
						$.ajax({
    						type: "GET",
    						contentType: "application/x-www-form-urlencoded; charset=UTF-8",
    						dataType: "json",
    						url: ""+ruta+"GetAll_Fabrica.php",
						})  
    					.done(function( data ) {
    						JSON.stringify(data);

    						var datos=new Array(data.length);
    						var i;
    						for( i = 0; i < data.length; i ++){
    							datos[i]= new Array(3);
    						}

    						for( i=0; i < data.length; i ++){
    							datos[i][0]=data[i].IdFabrica;
    							datos[i][1]=data[i].NombreFabrica;
    							datos[i][2]=0;

    						}

    						resolve(datos);
    					})
    					.fail(function( jqXHR, textStatus, errorThrown ) {
    						console.log("jqxhr: "+jqXHR+", Text Status: "+textStatus+", errorThrown: "+errorThrown+"","error");
    						reject("error");
    					});
					});

					myPromise.then(function(matriz){
						$.ajax({
    					type: "GET",
    					contentType: "application/x-www-form-urlencoded; charset=UTF-8",
    					dataType: "json",
    					url: ""+ruta+"GetDate_Venta.php?fecha1="+fecha1+"&fecha2="+fecha2+"",
						})  
    					.done(function( data ) {
    						JSON.stringify(data);

    						var i;
    						var j;
    						for(i=0; i < data.length; i++){
    							for(j=0; j < matriz.length; j++){
    								if(data[i].IdFabrica == matriz[j][0]){
    									matriz[j][2]= matriz[j][2] + parseInt(data[i].Cantidad);

    								}
    							}
    						}
    						var etiqueta=new Array(matriz.length);
    						var valores=new Array(matriz.length);
    						for(i=0;i<matriz.length;i++){
    							etiqueta[i]=matriz[i][1];
    							valores[i]=matriz[i][2];
    						}
    						renderChart(etiqueta,valores);
    					})
    					.fail(function( jqXHR, textStatus, errorThrown ) {
    						console.log("jqxhr: "+jqXHR+", Text Status: "+textStatus+", errorThrown: "+errorThrown+"","error");
    					});
					})
					.catch(function(error) {
						console.log(error);
					});
				
    				function renderChart (etiqueta, valores) {
    					 						
    						var color=['#DF0101','#F4FA58','#82FA58','#01DFA5','#2E64FE','#CC2EFA','#DF01A5','#FE9A2E','#FA5882','#81F7D8'];
    						var colorhigh=['#FE2E2E','#FFFF00','#40FF00','#58FAD0','#013ADF','#8904B1','#FE2EC8','#DF7401','#FE2E64','#A9F5E1'];
    						var i;
    						var pieData=[];
    						for( i=0; i<etiqueta.length; i++ ){
    							if(i<10)
    								pieData.push({value: valores[i],color:color[i], highlight: colorhigh[i],label: etiqueta[i]});
    							else
    								pieData.push({value: valores[i],color:color[i-10], highlight: colorhigh[i-10],label: etiqueta[i]});
    						}
						$('#myChart').remove();
  						$('#div_canvas').append('<canvas id="myChart" width="900px" height="500px"></canvas>');	
						var canvas = document.getElementById("myChart");	
  						var ctx = canvas.getContext("2d");
  						window.myPie = new Chart(ctx).Pie(pieData);	
						}
    		
			}// ---------------------------------- fin grafico ----------------------------------------------------

			$("#Crear_Grafico").click(function(){ //----------------funcion boton crear grafico------------------
				var fecha1=document.getElementById("fecha1").value;
				var fecha2=document.getElementById("fecha2").value;
				
				if(fecha1=="" || fecha2==""){
					var hoy = new Date();
					var dd = hoy.getDate();
					var mm = hoy.getMonth()+1; 
					var yyyy = hoy.getFullYear();

					if(dd<10) {
    					dd='0'+dd
					} 

					if(mm<10) {
    					mm='0'+mm
					} 

					var fecha = yyyy+'-'+mm+'-'+dd;
					Grafico(fecha,fecha);
				}else{
					Grafico(fecha1,fecha2);
				}
				
			});//-----------------------------------fin funcion boton crear grafico---------------------------------------------

			$("#eliminar_venta").click(function(){ //-...........................-eliminar venta ajax-----------------------
				var id = document.getElementById("idventa_eliminar").value;

				$.ajax({
    				type: "GET",
    				contentType: "application/x-www-form-urlencoded; charset=UTF-8",
    				dataType: 'text',
    				url: ""+ruta+"Delete_Venta.php?id="+id+"",
				})  
    			.done(function( data ) {
    				$("#idventa_eliminar").val("");
    				MostrarVentas();
    				$.notify("Se ha eliminado la venta","success");
    				})
    			.fail(function( jqXHR, textStatus, errorThrown ) {
     				console.log("jqxhr: "+jqXHR+", Text Status: "+textStatus+", errorThrown: "+errorThrown+"","error");
     			});
     			return false;
    		});//----------------------------------------------eliminar venta ajax------------------------------------------------

			

		});

		function MostrarFabricas(){
			var ruta = "/SistemaWeb-php/php/Controlador/";
			$.ajax({
    			type: "GET",
    			contentType: "application/x-www-form-urlencoded; charset=UTF-8",
    			dataType: "json",
    			url: ""+ruta+"GetAll_Fabrica.php", 
			})  
    		.done(function( data ) {
    			JSON.stringify(data);
    			var table = $("#contenido").DataTable();
    			table.rows().remove();
    			table.rows.add(data); 
				table.draw();
    		})
    		.fail(function( jqXHR, textStatus, errorThrown ) {
    			console.log("jqxhr: "+jqXHR+", Text Status: "+textStatus+", errorThrown: "+errorThrown+"","error");
    		});
		}

		function MostrarVentas(){
			var ruta = "/SistemaWeb-php/php/Controlador/";
			$.ajax({
    			type: "GET",
    			contentType: "application/x-www-form-urlencoded; charset=UTF-8",
    			dataType: "json",
    			url: ""+ruta+"GetAll_Venta.php",
			})  
    		.done(function( data ) {
    			JSON.stringify(data);
    			var table = $("#contenidoVenta").DataTable();
    			table.rows().remove();
    			table.rows.add(data); 
				table.draw();
    		})
    		.fail(function( jqXHR, textStatus, errorThrown ) {
    			console.log("jqxhr: "+jqXHR+", Text Status: "+textStatus+", errorThrown: "+errorThrown+"","error");
    		});
		}