<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const _STATUS_WANTED = 0;
    const _STATUS_BOUGHT = 1;
    const _STATUS_RECEIVED = 2;

    const STATUS_LABELS = [
        self::_STATUS_WANTED => 'Désiré',
        self::_STATUS_BOUGHT => 'Acheté',
        self::_STATUS_RECEIVED => 'Reçu',
    ];

    protected $fillable = [
        'name',
        'url',
        'url_parcel_tracking',
        'status'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }
}
