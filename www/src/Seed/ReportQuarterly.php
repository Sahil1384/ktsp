<?php

namespace App\Seed;

use Nails\Common\Console\Seed\DefaultSeed;

class ReportQuarterly extends DefaultSeed
{
    const CONFIG_MODEL_NAME     = 'ReportQuarterly';
    const CONFIG_MODEL_PROVIDER = 'app';

    // --------------------------------------------------------------------------

    protected function generate($aFields)
    {
        $aData = parent::generate($aFields);

        $aData['label']   = strtoupper(random_string());
        $aData['year']    = $this->randomInteger(2012, 2025);
        $aData['pdf_id']  = $this->randomId('Object', 'nails/module-cdn', ['where' => [['mime', 'application/pdf']]]);
        $aData['html_id'] = $this->randomId('Object', 'nails/module-cdn', ['where' => [['mime', 'application/zip']]]);

        return $aData;
    }
}
