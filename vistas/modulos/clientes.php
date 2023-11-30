<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Clientes
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-home"></i> Inicio</a></li>
      
      <li class="active">Administrar clientes</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente"><i class="fa fa-user-plus"></i>
          
          Agregar Cliente

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Nit/CI</th>
           <th>Razón</th>
           <th>Teléfono</th>
           <th>Total compras</th>
           <th>Última compra</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

        $item = null;
        $valor = null;

        $clientes = ControladorCliente::ctrMostrarCliente($item, $valor);

       foreach ($clientes as $key => $value){
         
          echo ' <tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["nit"].'</td>
                  <td>'.$value["razon"].'</td>';
                  echo '<td>'.$value["telefono"].'</td>
                  <td>'.$value["compras"].'</td>
                  <td>'.$value["ultima_compra"].'</td>
                 <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarCliente" idCliente="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCliente"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnEliminarCliente" idCliente="'.$value["id"].'"><i class="fa fa-times"></i></button>

                      </div>  

                    </td>

                </tr>';
        }


        ?> 

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR CLIENTE
======================================-->

<div id="modalAgregarCliente" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

          <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar cliente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-sort-numeric-desc"></i></span> 

                <input type="number" class="form-control input-lg" name="nuevoNit" placeholder="Ingresar Nit/CI" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA RAZON -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user-plus"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaRazon" placeholder="Ingresar Razón" required>

              </div>

            </div>


            <!-- ENTRADA PARA EL TELEFONO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                <input type="number" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar telefono">

              </div>

            </div>


          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Cliente</button>

        </div>

        <?php

          $crearCliente = new ControladorCliente();
          $crearCliente -> ctrCrearCliente();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CLIENTE
======================================-->

<div id="modalEditarCliente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

         <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar cliente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NIT-->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-sort-numeric-desc"></i></span> 

                <input type="number" class="form-control input-lg" id="editarNit" name="editarNit" value="" required>

                <input type="hidden"  name="idCliente" id="idCliente" required>


              </div>

            </div>

            <!-- ENTRADA PARA LA RAZON -->

              <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user-plus"></i></span> 

                <input type="text" class="form-control input-lg" id="editarRazon" name="editarRazon" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELEFONO -->
            
              <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                <input type="number" class="form-control input-lg" id="editarTelefono" name="editarTelefono" value="">

              </div>

            </div>



          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar Cliente</button>

        </div>

     <?php

          $editarCliente = new ControladorCliente();
          $editarCliente -> ctrEditarCliente();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarCliente = new ControladorCliente();
  $borrarCliente-> ctrBorrarCliente();

?> 


