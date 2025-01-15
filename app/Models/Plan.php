<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','cod','short_description','price'];

    public function signatures(): HasMany
    {
        return $this->hasMany(Signature::class);
    }

    /**
     * Interact with the  attribute.
     *
     * return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    public function name(): Attribute
    {
        return Attribute::make(
            get: fn ( $value) => ucfirst($value),
        );
    }

    /**
     * Interact with the  attribute.
     *
     * return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    public function cod(): Attribute
    {
        return Attribute::make(
            get: fn ( $value) => strtoupper($value),
            set: fn ( $value) => strtolower($value),
        );
    }

    /**
     * Interact with the  attribute.
     *
     * return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    public function fullname(): Attribute
    {
        return Attribute::make(
            get: fn ( $value, $attributes) => $attributes['name'] . '-' . $attributes['cod'],
        );
    }
}
