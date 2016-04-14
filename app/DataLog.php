<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataLog extends Model
{
  protected $table = "data_log";
  protected $primaryKey = "data_id";

  public $timestamps = false;
  protected $guarded = ['data_id'];

  public function amplifier() {
    return $this->BelongsTo('App\Amplifier');
  }
}
