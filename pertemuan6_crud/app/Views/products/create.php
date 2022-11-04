<?= $this->extend('layouts/header') ?>

<?= $this->section('content') ?>

<div class="row my-3">
    <div class="col-lg-12">
        <h3>Add New Products</h3>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Form</h5>
            </div>
            <div class="card-body">

            <!-- validasi -->
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-danger" role="alert">
                    <h6>Periksa Entrian Form</h6>
                    </hr />
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
            <!-- end validasi -->

            <?= form_open_multipart(base_url('products/store')) ?>
            <div class="mb-3">
                <label class="form-label">Name : </label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Stock : </label>
                <input type="text" name="stock" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Harga Beli : </label>
                <input type="number" name="purchase_price" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Harga Jual : </label>
                <input type="number" name="selling_price" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Thumbnail : </label>
                <input type="file" name="thumbnail" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> Simpan</button>
            <?= form_close() ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>