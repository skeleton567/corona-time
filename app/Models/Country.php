<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['country'];

    protected $guarded =['id'];

    public function CovidStatistic(): HasOne
    {
        return $this->hasOne(CovidStatistic::class, 'country_code', 'code');
    }
}
