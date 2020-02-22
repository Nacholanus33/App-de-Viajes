<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Trip_requestsController extends Controller
{
  public function create()
  {
      return view('admin.products.create', [
          'trip' => new Trip,
      ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $this->validate($request, [
          'title' => 'required|max:200',
          'stock' => 'required|min:0',
          'price' => 'required|min:0',
          'category_id' => 'required|exists:categories,id',
      ]);

      $product = Product::create($request->all());

      // return redirect('/products/' . $product->id);

  //   return redirect()->back();

      return redirect('/products');
  }
}
