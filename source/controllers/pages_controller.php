<?php
require_once('controllers/base_controller.php');
require_once('models/product.php');
class PagesController extends BaseController
{
  function __construct()
  {
    $this->folder = 'pages';
  }

  public function product()
  {
    $products = Products::all();
    $categories = Categories::all();
    $data = array('products' => $products, 'categories' => $categories);
    $this->render('product_page', $data);
  }

  public function category()
  {
    $categories = Categories::all();
    $data = array('categories' => $categories);
    $this->render('category_page', $data);
  }

  public function category_add()
  {
    if(isset($_POST['add']) && isset($_POST['category'])){
      $category = $_POST['category'];
      Categories::add($category);
      header('Location: index.php?controller=pages&action=category');
    }
    else{
      header('Location: index.php?controller=pages&action=category');
    }
  }

  public function product_edit()
  {
    if(isset($_POST['update']) && isset($_POST['id'])){
      $id = $_POST['id'];
      if(isset($_POST['product_name']) && $_POST['product_name'] != ''){
        $product_name = $_POST['product_name'];
      }
      else{
        $product_name = Products::find($id)->product_name;
      }
      
      if(isset($_POST['id_category']) && $_POST['id_category'] != ''){
        $id_category = $_POST['id_category'];
      }
      else{
        $id_category = Products::find($id)->id_category;
      }

      if(isset($_FILES['image']) && $_FILES['image']['name'] != ''){
        $image = $_FILES['image']['name'];
        if(move_uploaded_file($_FILES["image"]["tmp_name"],"public/img/".$_FILES["image"]["name"])){
          Products::update($id, $product_name, $id_category, $image);
          header('Location: index.php?controller=pages&action=product');
        }
      }
      else{
        $image = Products::find($id)->image;
      }
      Products::update($id, $product_name, $id_category, $image);
      header('Location: index.php?controller=pages&action=product');
    }
    else{
      header('Location: index.php?controller=pages&action=product');
    }
  }

  public function product_add()
  {
    if(isset($_POST['add']) && isset($_FILES['image'])){
      $product_name = $_POST['product_name'];
      $id_category = $_POST['id_category'];
      $image = $_FILES['image']['name'];
      if(move_uploaded_file($_FILES["image"]["tmp_name"],"public/img/".$_FILES["image"]["name"])){
        Products::add($product_name, $id_category, $image);
        header('Location: index.php?controller=pages&action=product');
      }
      else{
        header('Location: index.php?controller=pages&action=product');
      }
    }
    else{
      header('Location: index.php?controller=pages&action=product');
    }
  }

  public function product_delete()
  {
    $id = $_GET['id'];
    Products::delete($id);
    header('Location: index.php?controller=pages&action=product');
  }

  public function product_search()
  {
    $search = $_POST['search'];
    $products = Products::search($search);
    $data = array('products' => $products);
    $this->render('product_page', $data);
  }

  public function error()
  {
    $this->render('error');
  }
}
