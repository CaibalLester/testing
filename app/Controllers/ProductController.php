<?php

namespace App\Controllers;

use App\Controllers\BaseController;
//use App\Models\ProductModel;
class ProductController extends BaseController
{
    private $product;
    public function __construct()
    {
        $this->product = new \App\Models\ProductModel();
    }

    public function save()
    {
        $id = $this->request->getVar('id');
        $existingProduct = $this->product->find($id);
        $data = [
            'code' => $this->request->getVar('code'),
            'name' => $this->request->getVar('name'),
            'quantity' => $this->request->getVar('quantity'),
        ];
        $updatedData = [];
        foreach ($data as $field => $value) {
            if (isset($existingProduct[$field]) && $existingProduct[$field] !== $value) {
                $updatedData[$field] = $value;
            }
        }
        if (!empty($updatedData)) {
            $this->product->set($updatedData)->where('id', $id)->update();
        }
        return redirect()->to('/product');
    }
    public function add()
    {
    $data = [
        'code' => $this->request->getVar('code'),
        'name' => $this->request->getVar('name'),
        'quantity' => $this->request->getVar('quantity'),
    ];
    $this->product->insert($data);
    return redirect()->to('/product');
    return view('products', $data);
    }

    public function delete($id)
    {
        $this->product->delete($id);
        return redirect()->to('/product');
    }
    
    public function edit($id)
    {
    $data = [
        'product' => $this->product->findAll(),
        'pro' => $this->product->find($id), 
    ];
    return view('products', $data);
    }

    public function product($product)
    {
        echo $product;
    }

    public function CaibalLester()
    {
       $data['product'] = $this->product->findAll();
       return view('products', $data);
    }
    
    public function index()
    {
        //
    }
}
