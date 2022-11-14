<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;
use Datatables;

class ProductController extends Controller
{
    //
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Product::select('*'))
                ->addColumn('action', 'products.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('products.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'file_path' => 'required'
        ]);
        $file_name = time() . '.' . request()->file('file_path')->getClientOriginalExtension();

        request()->file_path->move(public_path('images/'), $file_name);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product ->file_path = $file_name;
        $product->save();
        return redirect()->route('products.index')
            ->with('success', 'Newsletter has been created successfully.');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
    return view('products.show',compact('products'));
    } 
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function edit(Product $product)
    {
    return view('products.edit',compact('product'));
    }
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
    $request->validate([
    'name' => 'required',
    'price' => 'required',
    'quantity' => 'required'
    
    ]);
    $file_path = $request->hidden_Image;

    if ($request->file_path != '') {
        $file_path = time() . '.' . request()->file_path->getClientOriginalExtension();

        request()->file_path->move(public_path('images/'), $file_path);
    }
    $product = Product::find($id);
    $product->name = $request->name;
    $product->price = $request->price;
    $product->quantity = $request->quantity;
    $product->file_path = $file_path;

    
    $product->save();
    return redirect()->route('products.index')
    ->with('success','Company Has Been updated successfully');
    }
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function destroy(Request $request)
    {
        $com = Product::where('id', $request->id)->delete();
        return Response()->json($com);
    }
    }