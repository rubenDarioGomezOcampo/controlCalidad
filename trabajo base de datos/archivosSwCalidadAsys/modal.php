<!--Ventana emergente MODAL-->

				<div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="myModalLabel">Filtrar por puerto</h4>
							</div>
							<div class="modal-body">
								<!--Cuerpo del modal-->
																
 								<form class="form-horizontal" name="form" method="GET" action="<?php echo "listarpricing.php";?>">
								<?php
									$conectar=conn(); //ejecuta las conexiones a la b.d.
									$sql="select puertos.nombre_puerto,puertos.id_puerto,paises.nombre_pais from puertos LEFT JOIN paises ON puertos.id_pais_puerto = paises.id_pais order by nombre_pais ASC, nombre_puerto ASC";
									$resul = mysqli_query($conectar , $sql);
									$total = mysqli_num_rows($resul);
								?>

						<table class="table" border="0" width="60%" align="center">
							<tr>
								<td>	
									<label for="inputEmail3" class="col-sm-2 control-label"> 
										Puerto:
									</label>
								</td>
								<td>
								 <select class="form-control chosen" aria-label="puerto" name="puerto" placeholder="puerto" required>
			                        <option selected>Seleccione el Puerto de origen</option>
			                            <?php
			                                while($row_total=mysqli_fetch_assoc($resul)){

												$id_puerto=$row_total['id_puerto'];
												$nombre_pais=$row_total["nombre_pais"];
												$nombre_puerto=$row_total["nombre_puerto"];

									 			echo "<option value=".$id_puerto.">".$nombre_pais." - ".$nombre_puerto."</option>"; 
									 		}
									 	?>
						    	 </select>
					    		</td>
							</tr>
					    		<input type="hidden" name="cod" value="<?php echo $cod; ?>">
					    		<input type="hidden" name="u" value="<?php echo $u; ?>"
							<tr>
								
								<td colspan="2"><input class="btn btn-success" type="submit" value="Filtrar"></td>
							</tr>
						</table>					
								</form>
							</div>
						</div>
					</div>
				</div>
				<!--Fin Modal-->

		<!----------------->


		<div class="modal fade" id="miModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="myModalLabel">Filtrar por puerto</h4>
							</div>
							<div class="modal-body">
								<!--Cuerpo del modal-->
																
 								<form class="form-horizontal" name="form" method="GET" action="<?php echo "listarpricing.php";?>">
								<?php
									$conectar=conn(); //ejecuta las conexiones a la b.d.
									$sql="select puertos.nombre_puerto,puertos.id_puerto,paises.nombre_pais from puertos LEFT JOIN paises ON puertos.id_pais_puerto = paises.id_pais order by nombre_pais ASC, nombre_puerto ASC";
									$resul = mysqli_query($conectar , $sql);
									$total = mysqli_num_rows($resul);
								?>

						<table class="table" border="0" width="60%" align="center">
							<tr>
								<td>	
									<label for="inputEmail3" class="col-sm-2 control-label"> 
										Puerto:
									</label>
								</td>
								<td>
								 <select class="form-control chosen" aria-label="puerto" name="puertod" placeholder="puerto" required>
			                        <option selected>Seleccione el Puerto de destino</option>
			                            <?php
			                                while($row_total=mysqli_fetch_assoc($resul)){

												$id_puerto=$row_total['id_puerto'];
												$nombre_pais=$row_total["nombre_pais"];
												$nombre_puerto=$row_total["nombre_puerto"];

									 			echo "<option value=".$id_puerto.">".$nombre_pais." - ".$nombre_puerto."</option>"; 
									 		}
									 	?>
						    	 </select>
					    		</td>
							</tr>
					    		<input type="hidden" name="cod" value="<?php echo $cod; ?>">
					    		<input type="hidden" name="u" value="<?php echo $u; ?>"
							<tr>
								
								<td colspan="2"><input class="btn btn-success" type="submit" value="Filtrar"></td>
							</tr>
						</table>					
								</form>
							</div>
						</div>
					</div>
				</div>
				<!--Fin Modal-->

		<!----------------->

		<div class="modal fade" id="miModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="myModalLabel">Filtrar por Naviera</h4>
							</div>
							<div class="modal-body">
								<!--Cuerpo del modal-->
																
 								<form class="form-horizontal" name="form" method="GET" action="<?php echo "listarpricing.php";?>">
								<?php
									$conectar=conn(); //ejecuta las conexiones a la b.d.
									$sql="select * from agentes_carga order by nombre_agente_carga";
			$resul = mysqli_query($conectar , $sql);
			$total = mysqli_num_rows($resul);
								?>

						<table class="table" border="0" width="60%" align="center">
							<tr>
								<td>	
									<label for="inputEmail3" class="col-sm-2 control-label"> 
										Naviera:
									</label>
								</td>
								<td>
								 <select class="form-control chosen" aria-label="naviera" name="naviera" placeholder="naviera" required>
			                        <option selected>Seleccione la naviera</option>
			                            <?php
			                                while($row_total=mysqli_fetch_assoc($resul)){

												$id_agente=$row_total['id_agente_carga'];
												$nombre_agente=$row_total["nombre_agente_carga"];
											
									 			echo "<option value=".$id_agente.">".$nombre_agente."</option>"; 
									 		}
									 	?>
						    	 </select>
					    		</td>
							</tr>
					    		<input type="hidden" name="cod" value="<?php echo $cod; ?>">
					    		<input type="hidden" name="u" value="<?php echo $u; ?>"
							<tr>
								
								<td colspan="2"><input class="btn btn-success" type="submit" value="Filtrar"></td>
							</tr>
						</table>					
								</form>
							</div>
						</div>
					</div>
				</div>
				<!--Fin Modal-->

		<!----------------->