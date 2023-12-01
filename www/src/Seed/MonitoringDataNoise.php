<?php

namespace App\Seed;

use Nails\Common\Console\Seed\DefaultSeed;

class MonitoringDataNoise extends DefaultSeed
{
    const CONFIG_MODEL_NAME     = 'MonitoringDataNoise';
    const CONFIG_MODEL_PROVIDER = 'app';

    // --------------------------------------------------------------------------

    protected function generate($aFields)
    {
        $aData = parent::generate($aFields);

        $aData['date']    = $this->randomPastDate();
        $aData['weather'] = $this->randomItem(['Sunny', 'Overcast', 'Rain', 'Thunderstorm']);
        $aData['station'] = $this->randomItem(['NMS1', 'NMS2', 'NMS3']);

        return $aData;
    }
}
