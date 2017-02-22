<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

 class OtherContact extends Model  {
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'others_contacts';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['name', 'email', 'message'];


  protected $hidden = [''];


}
