<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomerController
 *
 * @author  The scaffold-interface created at 2016-08-29 04:11:50pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Admin extends Model
{
    public $timestamps = false;
    protected $primaryKey='id';
    protected $table = 'admin';


}
