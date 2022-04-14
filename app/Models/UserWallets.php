<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWallets extends Model
{
    use HasFactory;
    protected $table = 'user_wallets';

    protected $fillable = [
        'user_id',
        'name',
        'type'
    ];

    /**
     * Get the user that owns the wallets.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
