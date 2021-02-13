<?php

namespace App\Option\Traits;

use Illuminate\Support\Collection;
use App\Entity\TrackingCode;

trait FooterTrackingCodes
{
    public function getFooterTrackingCodesAttribute()
    {
        $codes = get_field('sw_site_tracking_codes', $this->ID);

        if (is_array($codes)) {
            foreach ($codes as &$code) {
                $code = new TrackingCode($code);
            }

            return new Collection($codes);
        }
    }

    public function hasFooterTrackingCodes()
    {
        return !is_null($this->footer_tracking_codes);
    }
}
