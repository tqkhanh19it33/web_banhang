<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'slider_h1', 'slider_h2', 'slider_p', 'slider_image', 'slider_status'
    ];
    protected $primaryKey = 'slider_id';
    protected $table = 'tbl_slider';
}
