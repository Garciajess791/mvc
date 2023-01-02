<?php require_once('controller/clientes.php'); ?>
<script>
    $(document).ready(function(){$('#TClientes').DataTable();});
</script>
<?php 
if($_GET){
    if(isset($_GET['error']) and $_GET['error'] == 2){ 
        echo '<div class="alert alert-danger">'.$_GET['msndb'].'</div>';
    }
    if(isset($_GET['error']) and $_GET['error'] == 1){    
        echo '<div class="alert alert-success">'.$_GET['msndb'].'</div>';
    }
}
?>


<section class="container p-3 mb-3">
    <h2>Listado de Clientes <a class="btn btn-primary" 
    href="<?php echo $RHTTP.'index.php?vista=clientes_form&&accion=ADD_CLIENTES'; ?>" >Nuevo Cliente</a></h2>
    <?php
        if(isset($_GET['msndel']) and !empty($_GET['msndel'])){  
            echo '<div class="alert alert-danger" role="alert">'.$_GET['msndel'].'</div>'; 
        }
    ?>
    <table id="TClientes" class="table table-dark table-striped" >
       <thead>
                <tr>
                    <th>ID</th>
                    <th>NIF</th>
                    <th>Nombre</th>
                    <th>mail</th>
                    <th>Tel</th>                   
                    <th>Fecha de alta</th>
                    <th></th>
                    <th></th>
                </tr>
       </thead>
       <tbody>
        <?php
            foreach($DatosClientes  as $row){
                echo '<tr>';
                    echo '<td>'.$row['rowid'].'</td>';
                    echo '<td>'.$row['nif'].'</td>';
                    echo '<td><a href="mailto:'.$row['email'].'">'.$row['nombre'].'</a></td>';
                    echo '<td>'.$row['email'].'</td>';
                    echo '<td>'.$row['tel'].'</td>';                    
                    echo '<td>'.$row['falta'].'</td>';
                    echo '<td><a class="btn btn-primary" href="'.$RHTTP.'index.php?vista=clientes_form&&accion=EDIT_CLIENTES&&rowid='.$row['rowid'].'"><i class="fa-regular fa-folder-open"></i></a></td>';
                    echo '<td><a class="btn btn-danger" href="'.$RHTTP.'controller/clientes.php?accion=DELETE_CLIENTES&&rowid='.$row['rowid'].'"><i class="fa-solid fa-trash-can"></i></a></td>';
                echo '</tr>';
            }
        ?>
       <tbody>
    </table>
</section>
