<?php

namespace App\Seed;

use Nails\Common\Console\Seed\DefaultSeed;

class EnvironmentalPermit extends DefaultSeed
{
    const CONFIG_MODEL_NAME     = 'EnvironmentalPermit';
    const CONFIG_MODEL_PROVIDER = 'app';

    // --------------------------------------------------------------------------

    protected function generate($aFields)
    {
        $aData = parent::generate($aFields);

        $aData['ref']     = strtoupper(random_string());
        $aData['pdf_id']  = $this->randomId('Object', 'nails/module-cdn', ['where' => [['mime', 'application/pdf']]]);
        $aData['html_id'] = $this->randomId('Object', 'nails/module-cdn', ['where' => [['mime', 'application/zip']]]);

        return $aData;
    }
}
