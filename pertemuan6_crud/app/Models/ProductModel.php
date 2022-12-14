<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'products';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'stock', 'selling_price', 'purchase_price'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    // Query
    public function getProducts()
    {
        return $this->findAll();
    }
    public function insertProducts($data = [])
    {
        return $this->db->table($this->table)->insert($data);
    }
    public function findProduct($id)
    {
        return $this->getWhere(['id' => $id]);
    }
    public function updateProducts($id, $data = [])
    {
        return $this->db->table($this->table)
                ->update($data, ['id' => $id]);
    }
    public function deleteProduct($id)
    {
        return $this->db->table($this->table)
                ->delete(['id' => $id]);
    }
}
