<?php include('menu.php');?>
  <section class="content">
        <div class="container-fluid">

<?php $sql = mysqli_query($con, "SELECT * FROM `orders` WHERE uid='$userid' and dstatus='cart'");
$i=1;
$row = mysqli_num_rows($sql); ?>		
<!--Section: Block Content-->
<section>

  <!--Grid row-->
  <div class="row">

    <!--Grid column-->
    <div class="col-lg-8">

      <!-- Card -->
      <div class="mb-3">
        <div class="pt-4 wish-list">

          <h5 class="mb-4">Cart (<span><?php echo $row?></span> items)</h5>
<?php
while($rw = mysqli_fetch_array($sql)){
$uid = $rw['uid'];
$pic = $rw['pic'];
$pname = $rw['pname'];
$brand = $rw['brand'];
$qty = $rw['quantity'];
$net = $rw['netamt'];
$bv = $rw['estimate'];
?>
          <div class="row mb-4">
            <div class="col-md-5 col-lg-3 col-xl-3">
              <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                <img class="img-fluid w-100"
                  src="admin/image/product/<?php echo $pic?>" alt="Sample">
                <a href="#!">
                  <div class="mask">
                    <img class="img-fluid w-100"
                      src="admin/image/product/<?php echo $pic?>">
                    <div class="mask rgba-black-slight"></div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-md-7 col-lg-9 col-xl-9">
              <div>
                <div class="d-flex justify-content-between">
                  <div>
                    <h5><?php echo $pname?></h5><br /><br />
<br />                   <!--  <p class="mb-3 text-muted text-uppercase small">Shirt - blue</p>
                   <p class="mb-2 text-muted text-uppercase small">Color: blue</p>
                   <p class="mb-3 text-muted text-uppercase small">Size: M</p> -->
                  </div>
                  <div>
                    <div class="def-number-input number-input safari_only mb-0 w-100">
                      <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus decrease"></button>
                      <input class="quantity" min="0" name="quantity" value="<?php echo $qty?>" type="number">
                      <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus increase"></button>
                    </div>
                    <small id="passwordHelpBlock" class="form-text text-muted text-center">
                      (Note, 1 piece)
                    </small>
                  </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <a href="#!" type="button" class="card-link-secondary small text-uppercase mr-3"><i
                        class="fas fa-trash-alt mr-1"></i> Remove item </a>
                   <!--  <a href="#!" type="button" class="card-link-secondary small text-uppercase"><i
                       class="fas fa-heart mr-1"></i> Move to wish list </a> -->
                  </div>
                  <p class="mb-0"><span><strong id="summary">Rs.<?php echo $net?></strong></span></p class="mb-0">
                </div>
              </div>
            </div>
          </div>
      <?php } ?>
          <hr class="">
          <div class="row mb-4">
            <div class="col-md-5 col-lg-3 col-xl-3">
              <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                <img class="img-fluid w-100"
                  src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13a.jpg" alt="Sample">
                <a href="#!">
                  <div class="mask">
                    <img class="img-fluid w-100"
                      src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13.jpg">
                    <div class="mask rgba-black-slight"></div>
                  </div>
                </a>
              </div>
            </div>
            
          </div>
          <p class="text-primary mb-0"><i class="fas fa-info-circle mr-1"></i> Do not delay the purchase, adding
            items to your cart does not mean booking them.</p>

        </div>
      </div>
      <!-- Card -->

      <!-- Card -->
      <div class="mb-3">
        <div class="pt-4">

          <h5 class="mb-4">Expected shipping delivery</h5>

          <p class="mb-0"> Thu., 12.03. - Mon., 16.03.</p>
        </div>
      </div>
      <!-- Card -->

      <!-- Card -->
      
      <!-- Card -->

    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-lg-4">

      <!-- Card -->
      <div class="mb-3">
        <div class="pt-4">

          <h5 class="mb-3">The total amount of</h5>

          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
              Temporary amount
              <span>$25.98</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
              Shipping
              <span>Details</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
              <div>
                <strong>The total amount of</strong>
                <strong>
                  <p class="mb-0">(including VAT)</p>
                </strong>
              </div>
              <span><strong>$53.98</strong></span>
            </li>
            <label class="list-group-item">Address: </label>
		<textarea class="form-control" rows="5"></textarea>
		<label class="list-group-item">mobile: </label>
		<input class="form-control">
          </ul>

          <button type="button" name="click" class="btn btn-primary btn-block">go to checkout</button>

        </div>
      </div>
      <!-- Card -->

      <!-- Card -->
      <div class="mb-3">
        <div class="pt-4">

          <a class="dark-grey-text d-flex justify-content-between" data-toggle="collapse" href="#collapseExample"
            aria-expanded="false" aria-controls="collapseExample">
            Add a discount code (optional)
            <span><i class="fas fa-chevron-down pt-1"></i></span>
          </a>

          <div class="collapse" id="collapseExample">
            <div class="mt-3">
              <div class="md-form md-outline mb-0">
                <input type="text" id="discount-code" class="form-control font-weight-light"
                  placeholder="Enter discount code">
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Card -->

    </div>
    <!--Grid column-->

  </div>
  <!-- Grid row -->

</section>
<!--Section: Block Content-->

<?php include('flinks.php');?>