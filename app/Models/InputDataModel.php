<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputDataModel extends Model
{
    use HasFactory;

    // Specify the table name if it's not the plural of the model name
    protected $table = 'menu'; // Adjust if your table name is different

    // Define the fillable attributes
    protected $fillable = [
        'image',
        'price',
        'description',
    ];
}
