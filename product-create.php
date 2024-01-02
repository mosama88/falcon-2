<?php require_once('inc/header.php'); ?>

<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<main class="main" id="top">
  <div class="container" data-layout="container">
    <script>
      var isFluid = JSON.parse(localStorage.getItem('isFluid'));
      if (isFluid) {
        var container = document.querySelector('[data-layout]');
        container.classList.remove('container');
        container.classList.add('container-fluid');
      }
    </script>

    <?php require_once('inc/sidebar.php'); ?>

    <div class="content">
      <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand">

        <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
        <a class="navbar-brand me-1 me-sm-3" href="index.php">
          <div class="d-flex align-items-center"><img class="me-2" src="assets/img/icons/spot-illustrations/falcon.png" alt="" width="40" /><span class="font-sans-serif">falcon</span>
          </div>
        </a>



        <?php require_once('inc/nav.php'); ?>

      </nav>
      <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-4.png);">
        </div>
        <!--/.bg-holder-->


      </div>
      <div class="card mb-3">
        <div class="card-header">
          <div class="row flex-between-end">
            <div class="col-auto align-self-center">
              <h5 class="mb-0" data-anchor="data-anchor">Create Product</h5>
            </div>
            <div class="col-auto ms-auto">
            </div>
          </div>
        </div>

                <!-- Start Code errors -->
                <?php
                if(isset($_SESSION['errors'])):
                    foreach ($_SESSION['errors'] as $errors):
            ?>
                            <div class="col-6 m-auto example">
                            <div class="alert alert-danger text-center error-success text-white">
                                <?php echo $errors;?>
                            </div>
                            </div>
                            

            <?php    
                
                    endforeach;
                    unset($_SESSION['errors']);

                endif;
            ?>

                <!-- END Code success -->
                                <!-- Start Code success -->
                                <?php
                if(isset($_SESSION['success'])):
                    foreach ($_SESSION['success'] as $success):
            ?>
                          <div class="col-6 m-auto">
                            <div class="alert alert-success text-center">
                                <?php echo $success;?>
                            </div>
                          </div>


            <?php    
                
                    endforeach;
                    unset($_SESSION['success']);

                endif;
            ?>

                <!-- END Code successs -->
     


        <!-- Form Product -->
        <form action="handler/handelproduct-creat.php" method="POST" enctype="multipart/form-data">
          <div class="card-body bg-light">
            <div class="tab-content">
              <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-071d002a-db29-4ada-a16d-4ce90c710ff3" id="dom-071d002a-db29-4ada-a16d-4ce90c710ff3">
                <!-- Name -->
                <div class="mb-3">
                  <label class="form-label">Product Name</label>
                  <input class="form-control form-control-md" name="name" type="text" placeholder="Name" aria-label=".form-control-lg example" />
                </div>

                <!-- Select Category -->
                <div class="mb-3">
                  <label class="form-label">Choose </label>
                  <select class="form-select" name="chooseCategory" aria-label="Default select example">
                    <option selected="">Open Category menu</option>
                    <option value="1">Home</option>
                    <option value="2">Electronic</option>
                    <option value="3">Mobile</option>
                    <option value="4">Computers</option>
                    <option value="4">Clothes</option>
                  </select>
                </div>

                <!-- Price -->
                <div class="mb-3">
                  <label class="form-label">Product Price</label>
                  <input class="form-control form-control-md" name="price" type="text" placeholder="Price" aria-label=".form-control-lg example" />
                </div>
                <!-- Discount -->
                <div class="mb-3">
                  <label class="form-label">Product Discount</label>
                  <input class="form-control form-control-md" name="discount" type="text" placeholder="Discount" aria-label=".form-control-lg example" />
                </div>

              

                <!-- Image -->
                <div class="mb-3">
                  <label class="form-label">Upload Image</label>
                  <input class="form-control" name="fileToUpload" type="file" />
                </div>
                <!-- Description -->
                <div class="mb-3">
                  <!-- <label class="form-label">Product Description</label> -->
                  <label class="form-label" for="exampleFormControlTextarea1">Product Description</label>
                  <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <!-- Submit -->
                <div class="mb-3">
                  <input class="btn btn-primary" value="Add Product" type="submit">
                </div>
              </div>

            </div>
          </div>
        </form>
      </div>
      <?php require_once('inc/footer.php'); ?>

    </div>

  </div>
</main>
<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->

<?php require_once('inc/customized.php'); ?>


<!-- ===============================================-->
<!--    JavaScripts-->
<!-- ===============================================-->
<script src="vendors/popper/popper.min.js"></script>
<script src="vendors/bootstrap/bootstrap.min.js"></script>
<script src="vendors/anchorjs/anchor.min.js"></script>
<script src="vendors/is/is.min.js"></script>
<script src="vendors/echarts/echarts.min.js"></script>
<script src="vendors/fontawesome/all.min.js"></script>
<script src="vendors/lodash/lodash.min.js"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
<script src="vendors/list.js/list.min.js"></script>
<script src="assets/js/theme.js"></script>

</body>

</html>

<style>
  @keyframes example {
    from {
        background-color: cyan;
    }
    to {
        background-color: blue;
    }
}
.error-success {
    background-color: #e07474;
    animation-name: example;
    animation-duration: 3s;
} 
</style>