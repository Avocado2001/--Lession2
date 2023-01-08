               
<!-- table -->
<div class="container min-vh-100">
    <form class="form-inline my-2 my-lg-0 d-flex">
        <a class="btn ml-auto my-2 my-lg-0 d-flex p-2 ml-auto" data-toggle="modal" data-target="#category-add"><i class="fa fa-plus-circle fa-lg"></i></a>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr class = "text-center">
                <th>#</th>
                <th>Category name</th>
                <th>Total product</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            foreach($categories as $category){
        ?>
            <tr class = "text-center">
                <td class="align-middle"><?= $category->id ?></td>
                <td class="align-middle"><?= $category->category ?></td>
                <td class="align-middle"><?= $category->total ?></td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div>

<!-- Modal add category-->
<form action="index.php?controller=pages&action=category_add" method="post" class="modal fade" id="category-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" enctype= multipart/form-data>
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Add new category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <label class="font-weight-bold" for="category">Category name:</label>
            <input type="text" name="category" id="category" class="form-control" placeholder="Name of category" required>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="add">Submit</button>
        </div>
    </div>
  </div>
</form>