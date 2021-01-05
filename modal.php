 <div class="modal fade" id="Modal_editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title">Modificar productos</h2>
                                    </div>
                                    <?php
                                        include('connect.php');
                                        
    
                                        $consulta = $db -> query("SELECT * FROM products WHERE product_id = $id");
                                        $nfilas = $consulta -> num_rows;
    
                                        for($F=0; $F < $nfilas; $F++)
                                        {
                                            $fila = $consulta -> fetch_row();
                                        
                                    ?>
                                                    
                                    <form action="modificar_productos.php" method="post">
                                        <div class="modal-body">
                                            <div class="col-md-12 form-group1">
                                                <input type="text" name="memi" id="memi" value="" />
                
                                                <span>Marca</span><input type="text" name="code" value="<?php echo $fila[1]; ?>" Required/><br>
                
                                                 <span>Nombre</span><input type="text" name="gen" value="<?php echo $fila[2]; ?>" /><br>
                
                                                <span>Descripcion</span><textarea name="name" value=""><?php echo $fila[3]; ?></textarea><br>
                
                                                <span>Fecha de compra</span><input type="date" name="date_arrival" value="<?php echo $fila[13]; ?>" /><br>
                
                                                <span>Precio de Venta</span><input type="text" id="txt1" name="price" value="<?php echo $fila[6]; ?>" onkeyup="sum();" Required/><br>
                
                                                <span>Precio Original</span><input type="text" id="txt2" name="o_price" value="<?php echo $fila[5]; ?>" onkeyup="sum();" Required/><br>
                
                                                <span>Ganancia</span><input type="text" id="txt3" name="profit" value="<?php echo $fila[7]; ?>" readonly><br>
                
                                                <span>Proveedor</span>
                                                    <select name="supplier">
                                                    <?php
                                                        $consulta = $db -> query( "SELECT * FROM supliers" );
                                                        $nfilas = $consulta -> num_rows;
                                                                                
                                                        for($F=0; $F < $nfilas; $F++)
                                                        {
                                                            $fila = $consulta -> fetch_row();
                                                            echo " <option>$fila[1]</option> ";
                                                        }
                                                    ?>
                                                </select><br>
                
                                                <span>Cantidad</span><input type="number" min="0" name="sold" value="<?php echo $fila[11]; ?>" /><br>
                                            </div>

                                            
                                        </div>
                                        <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                                <button type="submit" value="Agregar" class="btn btn-primary">Agregar producto</button>
                                            </div>
                                    </form>
                                <?php }
                                ?>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>