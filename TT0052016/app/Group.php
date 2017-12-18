<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
  protected $table = "amp_group";
  protected $primaryKey = "group_id";

  public $timestamps = false;
  protected $guarded = ['group_id'];

  public function field() {
    return $this->BelongsTo('App\Field');
  }

  public function amplifiers() {
    return $this->HasMany('App\Amplifier');
  }
}
