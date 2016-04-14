<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $table = "amp_field";
    protected $primaryKey = "field_id";

    public $timestamps = false;
    protected $guarded = ['field_id'];

    public function groups() {
      return $this->HasMany('App\Group');
    }

    public function amplifiers() {
      return $this->HasManyThrough('App\Amplifier', 'App\Group');
    }
}
