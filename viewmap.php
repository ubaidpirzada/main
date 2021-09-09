<?php
    session_start();
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit();
    } 
    
?>
<?php 
    include("includes/config.php");
    include_once('includes/header.php');
    $success_text = '';
?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Bootstrap Core CSS -->
        <link  rel="stylesheet" href="css/bootstrap.min.css"/>
<div id="page-wrapper" class="mb-5">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Maps</h1>
        </div>
    </div>    
    <div class="row">
        <div class="col-12 mb-3" style="    padding-bottom: 20px;">
            <span class="text-success h4" style="color: green"><em><?= $success_text;?></em></span>
        </div>
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>S.no </th>
                        <th>Local Input Name </th>
                        <th>API Input Name </th>
                        <td>Status</td>
                        <th>API Form ID </th>
                        <th>Action </th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $count = 1;
                        $db_query = "SELECT localfield, externalfield, formid, status FROM map";
                        $result = mysqli_query($link, $db_query) or die("mysql error");	
                        while($row = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                        <td><?= $count; ?></td>
                        <td><?= $row['localfield']; ?></td>
                        <td><?= $row['externalfield']; ?></td>
                        <td><?= $row['status']; ?></td>
                        <td><?= $row['formid']; ?></td>
                        <td>
                            <a href="update_map.php?map_id=<?= $row['formid']; ?>" data-attr="<?= $row['formid']; ?>" class="pr-3"><i class="fa fa-pencil text-primary"></i></a>
                            <a href="?map_id=<?= $row['formid']; ?>" data-attr="<?= $row['formid']; ?>"><i class="fa fa-trash text-danger" ></i></a>
                        </td>
                    </tr>
                    <?php $count++;} ?>
                </tbody>
            </table>
        </div>
   </div>
</div>
</body>
</html>
