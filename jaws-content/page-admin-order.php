<?php 
if(isset($_POST['order-delete'])) {
    if($db->dbDeleteOrder($_GET['order'])){
      registerError("Order deleted","success");
      redirect("/admin/orders/");
    }else {
      registerError("Order couldn't be removed","danger");
      redirect();
    }
}
jaws_header(); ?>

<?php listAdminSingleOrder($_GET['order']); ?>

<?php jaws_footer(); ?>