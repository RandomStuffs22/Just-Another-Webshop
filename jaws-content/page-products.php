<?php jaws_header(); ?>
<?php
    listTaxanomies();
?>

    <div class="container marketing">
      <div class="row">
          <?php
            if(isset($_GET['category'])){
                listProductsFromTaxanomy($_GET['category']);
            }
          ?>        
      </div>
<?php jaws_footer(); ?>