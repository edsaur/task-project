<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'long_description']; // Only fillable items
    // protected $guarded = ['password'] to guard this specific column.


    public function toggleComplete() {
        $this->completed = !$this->completed;

        $this->save();
    }
}
