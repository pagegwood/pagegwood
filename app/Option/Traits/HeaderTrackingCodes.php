<?php

namespace App\Option\Traits;

use Illuminate\Support\Collection;
use App\Entity\HeaderTrackingCode;

trait HeaderTrackingCodes
{
    public function getHeaderTrackingCodesAttribute()
    {
        $codes = get_field('wood_site_header_tracking_codes', $this->ID);

        if (is_array($codes)) {
            foreach ($codes as &$code) {
                $code = new HeaderTrackingCode($code);
            }

            return new Collection($codes);
        }
    }

    public function hasHeaderTrackingCodes()
    {
        return !is_null($this->header_tracking_codes);
    }
}
