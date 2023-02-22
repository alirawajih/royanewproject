<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostNews extends Model
{
    use HasFactory;

    protected $table = 'post_news';

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'employee_id',
        'image',
        'views'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\category', 'category_id');
    }

    public function employee()
    {
        return $this->belongsTo('App\Models\Accounts', 'employee_id');
    }

    protected $guarded = ['id'];
}
