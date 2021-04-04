<?php

namespace App\Observers;

use App\Models\product;

class productObserver
{
    public function updating(product $product)
    {
     if ($product->Qty <= 0) {
        $product->Status = 'Not Available';}

     else if ($product->Qty <= 5 && $product->Qty >= 1){
        $product->Status='Reorder level';}


      if ($product->Qty > 6 ){
        $product->Status='In Stock';}
          
    }
}
