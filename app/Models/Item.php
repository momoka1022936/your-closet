<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['item_name', 'item_image'];

    /**
     * アイテムを保持するユーザーの取得
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * アイテムの保持するタグの取得
     */
    public function tags():BelongsToMany
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
