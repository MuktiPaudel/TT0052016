<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amplifier extends Model
{
  protected $table = "amplifiers";
  protected $primaryKey = "amp_id";

  public $timestamps = false;
  protected $guarded = ['amp_id'];

  public function group() {
    return $this->BelongsTo('App\Group');
  }

  public function datalogs() {
    return $this->HasMany('App\DataLog');
  }
}
