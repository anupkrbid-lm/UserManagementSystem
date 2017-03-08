<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio_CMS extends Model
{
    protected $table = 'portfolio_cms';

    public function publish()
    {
        return $this->hasOne('App\PortfolioPublish','p_id');
    }
}
