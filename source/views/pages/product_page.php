               
<!-- table -->
<div class="container min-vh-100">
    <form class="mb-2" action="index.php?controller=pages&action=product_search" method="post">
        <div class="input-group">
            <input name="search" type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <form class="form-inline my-2 my-lg-0 d-flex">
        <p class="mr-2">Search found <?= $number_product = count($products); ?> result(s)</p>
        <a class="btn ml-auto my-2 my-lg-0 d-flex p-2 ml-auto" data-toggle="modal" data-target="#product-add"><i class="fa fa-plus-circle fa-lg"></i></a>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr class = "text-center">
                <th>#</th>
                <th>Product name</th>
                <th>Category</th>
                <th>Image</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            if(isset($_GET['page'])){
                $start = ($_GET['page'] * 10) - 10;
            }
            else{
                $start = 0;
            }
            for($i = $start; $i < count($products); $i++){
                if($i == $start + 10){
                    break;
                }
                $product = $products[$i];
        ?>
            <tr class = "text-center">
                <td class="align-middle"><?= $product->id ?></td>
                <td class="align-middle"><?= $product->product_name ?></td>
                <td class="align-middle"><?= $product->id_category ?></td>
                <td class="align-middle"><img class="rounded" src="public/img/<?= $product->image ?>" height="100" width="100" alt="<?= $product->image ?>"></td>
                <td class="align-middle">
                    <a class="mr-2" href="#" tabindex="-1" aria-disabled="true" data-toggle="modal" data-target="#product-infor-<?= $product->id ?>"><i class="fa fa-eye fa-lg"></i></a>
                    <a class="mr-2" href="#" tabindex="-1" aria-disabled="true" data-toggle="modal" data-target="#product-edit-<?= $product->id ?>"><i class="fa fa-pencil-square-o fa-lg"></i></a>
                    <a class="mr-2" href="index.php?controller=pages&action=product_delete&id=<?= $product->id ?>"><i class="fa fa-minus-circle fa-lg"></i></a>
                    <a href="#" tabindex="-1" aria-disabled="true"><i class="fa fa-file-o fa-lg"></i></a>
                </td>
            </tr>
        <?php }?>
        </tbody>
    </table>
    <?php 
        $page =  ceil($number_product/10);
        if(isset($_GET['page'])){
            $page_now = $_GET['page'];
            $page_previous = $_GET['page'] - 1;
            if($page_previous == 0)
                $page_previous = 1;
            $page_next = $_GET['page'] + 1;
            if($page_next > $page)
                $page_next = $page;
        }
        else{
            $page_now = 1;
            $page_previous = 0;
            if($page > 1)
                $page_next = 2;
            else
                $page_next = 1;
        }
    ?>
    <ul class="pagination justify-content-center">
        <li class="page-item"><a class="page-link" href="index.php?page=<?= $page_previous ?>">Previous</a></li>
        <?php for($i=1; $i <= $page; $i++){
            ?>
            <li class="page-item <?= ($page_now == $i) ? 'active' : '' ?>"><a class="page-link" href="index.php?page=<?= $i ?>"><?= $i ?></a></li>
            <?php
        }?>
        <li class="page-item"><a class="page-link" href="index.php?page=<?= $page_next ?>">Next</a></li>
    </ul>
</div>

<!-- Modal add product-->
<form action="index.php?controller=pages&action=product_add" method="post" class="modal fade" id="product-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" enctype= multipart/form-data>
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Add new product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <label class="font-weight-bold" for="product_name">Product name:</label>
            <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Name of product" required>
            <br>
            <label class="font-weight-bold" for="category">Category:</label> <br>
            <select name="id_category" class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example" required>
            <option selected>Select option</option>
            <?php foreach($categories as $category){?>
            <option value="<?= $category->id ?>"><?= $category->category?></option>
            <?php }?>
            </select>
            <br>
            <label class="font-weight-bold" for="image">Product Image</label>
            <input type="file" name="image" accept="image/*" class="form-control" required placeholder="Chọn nơi lưu ảnh">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="add">Submit</button>
        </div>
    </div>
  </div>
</form>

<!-- Modal edit product-->
<?php foreach ($products as $product) { ?>
<form action="index.php?controller=pages&action=product_edit" method="post" class="modal fade" id="product-edit-<?= $product->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" enctype= multipart/form-data>
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <input name="id" id="id" value="<?= $product->id ?>" hidden>
            <img class="card-img-top mb-2" src="public/img/<?= $product->image ?>" alt="<?= $product->image ?>">
            <label class="font-weight-bold" class="font-weight-bold" for="product_name">Product name:</label>
            <input type="text" name="product_name" id="product_name" class="form-control" placeholder="<?= $product->product_name ?>">
            <br>
            <label class="font-weight-bold" for="category">Category:</label> <br>
            <select name="id_category" class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example">
                <option value="" selected><?= $product->id_category ?></option>
                <?php foreach($categories as $category){?>
                <option value="<?= $category->id ?>"><?= $category->category?></option>
                <?php }?>
            </select>
            <br>
            <label class="font-weight-bold" for="image">Product Image:</label>
            <input type="file" name="image" accept="image/*" class="form-control">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="update">Update</button>
        </div>
    </div>
  </div>
</form>
<?php }?>

<!-- Modal show product-->
<?php foreach ($products as $product) { ?>
<form action="index.php?controller=pages&action=product_add" method="post" class="modal fade" id="product-infor-<?= $product->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" enctype= multipart/form-data>
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Product Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <img class="card-img-top mb-2" src="public/img/<?= $product->image ?>" alt="'<?= $product->image ?>'">
            <label class="font-weight-bold" for="product_name">Product id:</label>
            <input type="text" class="form-control" placeholder="<?= $product->id ?>" readonly>
            <br>
            <label class="font-weight-bold" for="product_name">Product name:</label>
            <input type="text" class="form-control" placeholder="<?= $product->product_name ?>" readonly>
            <br>
            <label class="font-weight-bold" for="category">Category:</label>
            <input type="text" name="category" id="category" class="form-control" placeholder="<?= $product->id_category ?>" readonly>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="add">Submit</button>
        </div>
    </div>
  </div>
</form>
<?php }?>