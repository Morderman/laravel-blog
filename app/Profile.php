<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Profile extends Model
{
    protected $guarded = [];

    /**
     * @return string
     */
    public function profileImage()
    {
        $imagePath = ($this->image) ? ($this->image) : 'profile/no-image.png';
        return '/storage/' . $imagePath;
    }

    /**
     * @return BelongsToMany
     */
    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongTo
    {
        return $this->belongsTo(User::class);
    }
}
