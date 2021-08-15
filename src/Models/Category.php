<?php

namespace LaraZeus\Core\Models;

use LaraZeus\Core\Models\Form;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    use HasFactory;
    use HasUpdates;
    use HasActive;

    protected $fillable = ['name', 'user_id', 'ordering', 'is_active'];

    protected static function newFactory()
    {
        return CategoryFactory::new();
    }

    public function user()
    {
        return $this->belongsTo(config('auth.providers.users.model'));
    }

    public function forms()
    {
        return $this->hasMany(Form::class);
    }
}
