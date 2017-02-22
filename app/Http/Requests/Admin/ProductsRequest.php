<?php

namespace App\Http\Requests\Admin;


use \App\Http\Requests\ValidateRequest;

class ProductsRequest extends ValidateRequest
{

    public function customRules()
    {
        $store=[
          'name'  => 'bail|required|min:3|unique_with:update@none,table@petshops_products,tablefield@name,param@petshop_id',
          'brand'  => 'bail|required|min:3',
          'especifications'  => 'min:3',
          'stock_low'  => 'required|numeric',
          'categories'  => 'required|array|exists:petshops_categories,id',
          'picture' => ''
        ];

        $update=[
          'name'  => 'min:3',
          'brand'  => 'min:3',
          'especifications'  => 'min:3',
          'stock_low'  => 'numeric',
          'categories'  => 'array|exists:categories,id',
          'picture' => ''
        ];

        $stockStore=[
          "description" => 'bail|required|min:3|unique_with:update@none,table@petshops_products_stocks,tablefield@description,param@product_id',
          "price" => "required|numeric",
          "current_stock" => "required|numeric"
        ];

        $stockUpdate=[
          "current_stock" => "required|numeric"
        ];

        $promotionStore=[
          "type" => "required|boolean",
          "percent" => "required_without:value|numeric",
          "value" => "required_without:percent|numeric",
          "expires" => "required|date",
          "description" => "required|min:3"
        ];

        return [
          "store" => $store,
          "update" => $update,
          "stockStore" => $stockStore,
          "stockUpdate" => $stockUpdate,
          "promotionStore" => $promotionStore
        ];
    }

}
