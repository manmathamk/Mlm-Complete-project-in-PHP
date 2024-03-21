<?php include('menu.php');
?>

    <section class="content">
        <div class="container-fluid">
            <h4> Download Files </h4>
         <div class="row">  
        <?php foreach ($files as $file): ?> <div class="col-md-4 col-lg-4" >
             
            <img src="dir.png" style="width: 20%">
            <div><?php echo $file['name']; ?></div>
            <div><?php echo floor($file['size'] / 1000) . ' KB'; ?></div>
            <div><a href="downloads.php?file_id=<?php echo $file['id'] ?>">Download<i class="fa fa-download"></i> </a></div>
       

 </div> <?php endforeach;?> 
</div>

      

    <?php include('flinks.php'); ?>