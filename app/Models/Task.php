<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'due_date',
        'user_id',
    ];

    // Define the relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Query scope to filter tasks by status
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }
}
