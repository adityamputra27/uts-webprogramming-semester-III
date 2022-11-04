<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class Product extends BaseController
{
    public function index()
    {
        $model = new ProductModel;
        if (!$this->validate([])) {
            $data['validation'] = $this->validator;
            $data['products'] = $model->getProducts();
            return view('products/index', $data);
        }
    }

    public function create()
    {
        helper('form');
        return view('products/create');
    }

    public function store()
    {
        $model = new ProductModel();

        $validation = $this->validate([
            'thumbnail' => 'uploaded[thumbnail]|mime_in[thumbnail,image/jpg,image/jpeg,image/gif,image/png]|max_size[thumbnail,4096]',
            'name' => 'required',
            'stock' => 'required',
            'selling_price' => 'required',
            'purchase_price' => 'required',
        ]);

        if (!$validation) {
            session()->setFlashdata('error', $this->validator->listErrors());
			return redirect('products/create')->withInput();
        }

        $upload = $this->request->getFile('thumbnail');
        $upload->move(WRITEPATH . '../public/assets/products');
        $data = [
            'name' => $this->request->getPost('name'),
            'stock' => $this->request->getPost('stock'),
            'selling_price' => $this->request->getPost('selling_price'),
            'purchase_price' => $this->request->getPost('purchase_price'),
            'thumbnail' => $upload->getName()
        ];

        $model->insertProducts($data);

        return redirect()->to('products')->with('success', 'Data berhasil di simpan!');
    }

    public function edit($id)
    {
        $model = new ProductModel();
        helper('form');
        $data['product'] = $model->findProduct($id)->getRow();
        return view('products/edit', $data);
    }

    public function update()
    {
        $model = new ProductModel();

        $id = $this->request->getPost('id');

        $validation = $this->validate([
            'thumbnail' => 'uploaded[thumbnail]|mime_in[thumbnail,image/jpg,image/jpeg,image/gif,image/png]|max_size[thumbnail,4096]',
        ]);

        if (!$validation) {
            $data = [
                'name' => $this->request->getPost('name'),
                'stock' => $this->request->getPost('stock'),
                'selling_price' => $this->request->getPost('selling_price'),
                'purchase_price' => $this->request->getPost('purchase_price'),
            ];
        } else {
            $product = $model->findProduct($id)->getRow();
            $thumbnail = $product->thumbnail;
            $path = '../public/assets/products';
            @unlink($path.$thumbnail);

            $upload = $this->request->getFile('thumbnail');
            $upload->move(WRITEPATH . '../public/assets/products');

            $data = [
                'name' => $this->request->getPost('name'),
                'stock' => $this->request->getPost('stock'),
                'selling_price' => $this->request->getPost('selling_price'),
                'purchase_price' => $this->request->getPost('purchase_price'),
                'thumbnail' => $upload->getName()
            ];
        }

        $model->updateProducts($id, $data);

        return redirect()->to('products')->with('success', 'Data berhasil di ubah!');
    }

    public function delete($id)
    {
        $model = new ProductModel();
        $product = $model->findProduct($id)->getRow();

        $thumbnail = $product->thumbnail;
        $path = '../public/assets/products/';
        @unlink($path.$thumbnail);

        $model->delete($id);

        return redirect()->to('products')->with('success', 'Data berhasil di hapus!');
    }
}
