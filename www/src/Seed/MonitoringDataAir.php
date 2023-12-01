<?php

namespace App\Seed;

use Nails\Common\Console\Seed\DefaultSeed;

class MonitoringDataAir extends DefaultSeed
{
    const CONFIG_MODEL_NAME     = 'MonitoringDataAir';
    const CONFIG_MODEL_PROVIDER = 'app';

    // --------------------------------------------------------------------------

    protected function generate($aFields)
    {
        $aData = parent::generate($aFields);

        $aData['date']    = $this->randomPastDate();
        $aData['weather'] = $this->randomItem(['Sunny', 'Overcast', 'Rain', 'Thunderstorm']);
        $aData['station'] = $this->randomItem(['AMS1', 'AMS2', 'AMS3']);

        return $aData;
    }
}
