<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MoviesModel extends Model
{
   /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'movies';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id_movie';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['created_at','update_at','title','description','
    direct_by','launched_at','awars','total_sold','url_image','user_created','user_edited','rate','tags','long_time'];
}
