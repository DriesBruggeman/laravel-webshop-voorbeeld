<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function images()
    {
        return $this->hasMany('App\ProductImage');
    }

    public function rating()
    {
        $counter = 0;
        $totalrating = 0;
        foreach ($this->reviews as $review)
        {
            $totalrating += $review->rating;
            $counter++;
        }
        if($counter > 0)
        {
            return $totalrating/$counter;
        }
        else
        {
            return null;
        }
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function ratingPercentage($stars)
    {
        $ratingAmount = $this->reviews->count();

        if($ratingAmount == 0){
            return 0;
        }

        $reviewsMatchStarts = 0;

        foreach ($this->reviews as $review)
        {
            if($review->rating == $stars){
                $reviewsMatchStarts++;
            }
        }

        return ($reviewsMatchStarts / $ratingAmount) * 100;
    }

    public function OrderDetails()
    {
        return $this->belongsToMany('App\OrderDetail');
    }
}
