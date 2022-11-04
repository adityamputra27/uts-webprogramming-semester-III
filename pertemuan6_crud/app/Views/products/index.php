<?= $this->extend('layouts/header') ?>

<?= $this->section('content') ?>

<div class="row my-3">
    <div class="col-lg-12">
        <h3>List of Products</h3>
        <hr>
        <a href="/products/create" class="btn btn-primary">Tambah Data</a>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <?php if(!empty(session()->getFlashdata('success'))){ ?>
            <div class="alert alert-success">
                <?php echo session()->getFlashdata('success');?>
            </div>
        <?php } ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <table class="table table-striped table-hovered table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Harga Beli</th>
                    <th scope="col">Harga Jual</th>
                    <th scope="col" width="10%">Thumbnail</th>
                    <th width="12%"></th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($products) > 0) { ?>
                    <?php foreach($products as $key => $value): ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $value['name'] ?></td>
                            <td><?= number_format($value['stock'], 0, '.', '.') ?></td>
                            <td>Rp. <?= number_format($value['purchase_price'], 0, '.', '.') ?></td>
                            <td>Rp. <?= number_format($value['selling_price'], 0, '.', '.') ?></td>
                            <td>
                                <?php
                                    if (!empty($value['thumbnail'])) {
                                        echo '<img src="'.base_url("assets/products/$value[thumbnail]").'" width="200"/>';
                                    }
                                ?>
                            </td>
                            <td>
                                <a href="products/edit/<?=$value['id'];?>" class="btn btn-primary">Edit</a>
                                <a href="products/delete/<?=$value['id'];?>" class="btn btn-danger" onclick="return confirm('Konfirmasi hapus produk?')">Hapus</a> 
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data!</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>