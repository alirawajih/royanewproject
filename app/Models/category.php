<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    protected $fillable = [
        'name'
    ];
    protected $guarded = ['id'];
    public function posts()
    {
        return $this->hasMany(PostNews::class,'category_id','id');
    }
    public function postsMain()
    {
        return $this->hasMany(PostNews::class,
            'category_id',
            'id')
            ->limit(6);
    }
}
