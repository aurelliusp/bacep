<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CleaningHistory extends Model
{
    use HasFactory;

    protected $table = 'cleaning_histories';
    protected $primaryKey = 'cleaning_history_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'cleaning_id',
        'created_by',
        'role_to',
        'status',
        'aktif'

    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class);
    }

    public function cleaning()
    {
        return $this->belongsTo(Cleaning::class);
    }
}
