<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'url_part';

    public static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->url_part = Data::create_url();
        });
    }

    protected static function create_url()
    {
        $pre_id = bin2hex(random_bytes(3));
        $done = True;
        while ($done) {
            $data = Data::find($pre_id);
            if (!$data) {
                return $pre_id;
            }
            else {
                $pre_id = bin2hex(random_bytes(3));
            }
        }
    }
}
