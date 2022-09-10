<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class CovidStatistic extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['country'];

    protected $guarded =['id'];
}
