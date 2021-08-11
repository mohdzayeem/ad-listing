<?php include "header.php"; ?>
<style>
    body{
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    background: #34495e;
  }
    .boxs{
    background: #191919;
    text-align: center;
  }
  label{
    color:#fff;
    text-transform: uppercase;
  }
  .form-group{
    background: none;
    display: block;
    margin: 10px auto;
    text-align: center;
    outline: none;
    color: white;
  }
</style>
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Post New AD </h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->
                  <form  class="boxs"action="save-post.php" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="post_title">Title</label>
                          <input type="text" name="post_title" placeholder="Enter your AD title"class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="post_title">Enter Price</label>
                          <input type="text" name="ad_price" placeholder="₹" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="post_title">Address</label>
                          <input type="text" name="ad_address" placeholder="Your full address" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="aut_email">Email</label>
                          <input type="text" name="aut_email" placeholder="Enter your valid Email" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1"> Description</label>
                          <textarea name="postdesc" placeholder="Enter the details of AD" class="form-control" rows="5"  required></textarea>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Category</label>
                          <select name="category" class="form-control">
                              <option disabled selected> Select Category</option>
                              <?php
                                include "config.php";
                                $sql = "SELECT * FROM category";

                                $result = mysqli_query($conn, $sql) or die("Query Failed.");

                                if(mysqli_num_rows($result) > 0){
                                  while($row = mysqli_fetch_assoc($result)){
                                    echo "<option value='{$row['category_id']}'>{$row['category_name']}</option>";
                                  }
                                }
                              ?>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Post image</label>
                          <input  type="file" name="fileToUpload" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                  </form>
                  <!--/Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
