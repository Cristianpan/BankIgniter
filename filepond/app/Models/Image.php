<?php

namespace App\Models;

use CodeIgniter\Model;

class Image extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'images';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['url'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

}
