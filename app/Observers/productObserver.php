<?php

namespace App\Observers;

use App\Models\product;

class productObserver
{
  public function updating(product $product)
  {
   
   if ($product->Qty <= $product->ReOrderLevel){
      $product->Status='Reorder level';}


   else if ($product->Qty >$product->ReOrderLevel ){
      $product->Status='In Stock';}  

   if ($product->Qty <= 0) {
      $product->Status = 'Out of Stock';}
  
  }
  
}
