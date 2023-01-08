<?php
require_once('models/category.php');
class Products implements Method
{
  public $id;
  public $product_name;
  public $id_category;
  public $image;

  function __construct($id,$product_name, $id_category, $image)
  {
    $this->id = $id;
    $this->product_name = $product_name;
    $this->id_category = $id_category;
    $this->image = $image;
  }
  // get all products
  static function all()
  {
    $list = [];
    $db = DB::getInstance();
    $req = $db->query('SELECT products.id,product_name,category,image FROM products,categories WHERE id_category = categories.id ORDER BY products.id');

    foreach ($req->fetchAll() as $item) {
      $list[] = new Products($item['id'],$item['product_name'], $item['category'], $item['image']);
    }

    return $list;
  }
  // get product by id
  static function find($id)
  {
    $db = DB::getInstance();
    $req = $db->prepare('SELECT * FROM products WHERE id = :id');
    $req->execute(array('id' => $id));
    $item = $req->fetch();
    if (isset($item['id'])) {
      return new Products($item['id'],$item['product_name'], $item['id_category'], $item['image']);
    }
    return null;
  }
  // add product
  static function add($product_name, $id_category, $image)
  {
    $db = DB::getInstance();
    $req = $db->prepare('INSERT INTO products(product_name, id_category, image) VALUES (:product_name, :id_category, :image)');
    $req->execute(array('product_name' => $product_name, 'id_category' => $id_category, 'image' => $image));
  }
  // update product
  static function update($id, $product_name, $id_category, $image)
  {
    $db = DB::getInstance();
    $req = $db->prepare('UPDATE products SET product_name = :product_name, id_category = :id_category, image = :image WHERE id = :id');
    $req->execute(array('id' => $id, 'product_name' => $product_name, 'id_category' => $id_category, 'image' => $image));
  }
  // delete product
  static function delete($id)
  {
    $db = DB::getInstance();
    $req = $db->prepare('DELETE FROM products WHERE id = :id');
    $req->execute(array('id' => $id));
  }
  // search product
  static function search($key)
  {
    $list = [];
    $db = DB::getInstance();
    $req = $db->prepare('SELECT products.id,product_name,category,image FROM products INNER JOIN categories ON id_category = categories.id WHERE  product_name LIKE :key OR category LIKE :key');
    $req->execute(array('key' => '%'.$key.'%'));
    foreach ($req->fetchAll() as $item) {
      $list[] = new Products($item['id'],$item['product_name'], $item['category'], $item['image']);
    }
    return $list;
  }
}
