<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'detail',
        'image',
        'university_id',

    ];

    public function university()
    {
     return $this->belongsTo(University::class);
    }
}
