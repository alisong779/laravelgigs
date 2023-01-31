<?php

namespace App\Models;

class Listing
{
    public static function all()
    {
        return [
            [
                'id' => 1,
                'title' => 'Listing One',
                'description' => 'Nullam pulvinar et nibh ut feugiat. Aliquam erat volutpat. Ut non turpis id quam pharetra lobortis.'
            ],
            [
                'id' => 2,
                'title' => 'Listing Two',
                'description' => 'Pellentesque eu magna egestas, aliquet nibh vel, molestie felis. Nullam suscipit dapibus consectetur. Pellentesque quis tortor dui. Nunc vulputate mattis nulla, nec sollicitudin elit.'
            ]
        ];
    }

    public static function find($id)
    {
        $listings = self::all();

        foreach ($listings as $listing) {
            if ($listing['id'] == $id) {
                return $listing;
            }
        }
    }
}
