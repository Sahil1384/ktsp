<?php

/**
 * This model handles interactions with the app's "app_environmentalpermit" table.
 *
 * @package  App\Model
 * @category model
 */

namespace App\Model;

use App\Traits\HtmlBundle;
use Nails\Common\Model\Base;

class EnvironmentalPermit extends Base
{
    use HtmlBundle;

    // --------------------------------------------------------------------------

    /**
     * The table this model represents
     *
     * @var string
     */
    const TABLE = APP_DB_PREFIX . 'environmentalpermit';

    /**
     * The name of the resource to use (as passed to \Nails\Factory::resource())
     *
     * @var string
     */
    const RESOURCE_NAME = 'EnvironmentalPermit';

    /**
     * The provider of the resource to use (as passed to \Nails\Factory::resource())
     *
     * @var string
     */
    const RESOURCE_PROVIDER = 'app';

    // --------------------------------------------------------------------------

    public function describeFields($sTable = null)
    {
        $aFields = parent::describeFields($sTable);

        $aFields['pdf_id']->type    = 'cdn_object_picker';
        $aFields['pdf_id']->bucket  = 'environmental-permits';
        $aFields['html_id']->type   = 'cdn_object_picker';
        $aFields['html_id']->bucket = 'environmental-permits';

        return $aFields;
    }

    // --------------------------------------------------------------------------

    protected function formatObject(&$oObj, array $aData = [], array $aIntegers = [], array $aBools = [], array $aFloats = [])
    {
        $aIntegers[] = 'pdf_id';
        $aIntegers[] = 'html_id';
        parent::formatObject($oObj, $aData, $aIntegers, $aBools, $aFloats);
    }
}
