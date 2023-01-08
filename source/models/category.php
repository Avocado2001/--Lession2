<?php
interface Method
{
    public static function all();
    public static function delete($id);
}
class Categories implements Method
{
    public $id;
    public $category;
    public $total;

    public function __construct($id, $category, $total)
    {
        $this->id = $id;
        $this->category = $category;
        $this->total = $total;
    }

    public static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT categories.id,category, COUNT(products.id_category) AS total FROM categories LEFT JOIN products ON categories.id = products.id_category GROUP BY categories.id');

        foreach ($req->fetchAll() as $item) {
            $list[] = new Categories($item['id'], $item['category'], $item['total']);
        }
        return $list;
    }

    static function add($category)
    {
        $db = DB::getInstance();
        $req = $db->prepare('INSERT INTO categories (category) VALUES (:category)');
        $req->execute(array('category' => $category));
    }
    static function delete($id)
    {
        $db = DB::getInstance();
        $id = intval($id);
        $req = $db->prepare('DELETE FROM categories WHERE id = :id');
        $req->execute(array('id' => $id));
    }
}