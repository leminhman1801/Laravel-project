@php
 use Illuminate\Support\Facades\DB;

$products = DB::table('products')->get();

foreach ($products as $product) {
    echo $product->name;
   
}

@endphp