<?php namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Response;
use Symfony\Component\Console\Input\Input;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = Product::latest()->paginate(50);
        return view('product.index', ['data' => $data]);
    }

    /**
     * All resource
     *
     *  @return Response
     */
    public function listing()
    {
        $data = Product::all();
       return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $category = Category::all();
        return view('product.add',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     * @param ProductRequest $request
     * @return Response
     */
    public function store(ProductRequest $request)
    {
        $destinationPath = 'uploads';
        $extension = Input::file('image')->getClientOriginalExtension();
        $fileName = rand(11111,99999).'.'.$extension;
        Input::file('image')->move($destinationPath, $fileName);
        Product::create($request->all());
        return redirect('administrator/product')->with('message', 'Запись успешно создана.') -> withInput ();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function showAjax($id)
    {
        return response()->json(Product::find($id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return view('product.show', ['data' => Product::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $category = Category::all();
        return view('product.edit', ['data' => Product::find($id),'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param ProductRequest $request
     * @return Response
     */
    public function update($id, ProductRequest $request)
    {

        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect('administrator/product')->with('message', 'Запись успешно изменена.') -> withInput ();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('administrator/product')->with('message', 'Запись успешно удалена.');
    }

}
