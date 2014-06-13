<?php

class ShopCategory extends Eloquent {

  protected $table = 'shop_categories';
  
  public static function build_category_list($parent_id, &$category_list = array()){
    $shop_categories = ShopCategory::all();
    foreach($shop_categories as $shop_category){
      if($shop_category->parent_id == $parent_id){
        array_push($category_list, $shop_category->name);
        array_push($category_list, ShopCategory::build_category_list($shop_category->id));
      }
    }
    return $category_list;
  }
}