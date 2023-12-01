<?php

namespace App\Traits;

use Nails\Common\Helper\Directory;
use Nails\Factory;

/**
 * Trait HtmlBundle
 *
 * @package App\Traits
 */
trait HtmlBundle
{
    public function create(array $aData = [], $bReturnObject = false)
    {
        if (!$this->processBundle($aData)) {
            return false;
        }
        return parent::create($aData, $bReturnObject);
    }

    // --------------------------------------------------------------------------

    public function update($mIds, array $aData = []): bool
    {
        if (!$this->processBundle($aData)) {
            return false;
        }
        return parent::update($mIds, $aData);
    }

    // --------------------------------------------------------------------------

    /**
     * Checks for an html_id field and extracts the HTML bundle therein if it has not already been extracted
     *
     * @param array $data
     *
     * @return bool
     */
    protected function processBundle(array $data): bool
    {
        if (array_key_exists('html_id', $data)) {
            $bundleId = getFromArray('html_id', $data);
            if (empty($bundleId)) {
                return true;
            }

            $dir = NAILS_APP_PATH . 'assets/uploads/html-bundles/' . $bundleId . '/';
            if (is_dir($dir)) {
                return true;
            }

            try {

                if (!mkdir($dir, 0777, true)) {
                    throw new \RuntimeException('Failed to create bundle directory');
                }

                $cdn       = Factory::service('Cdn', 'nails/module-cdn');
                $object    = $cdn->getObject($bundleId);
                $localPath = $cdn->objectLocalPath($bundleId);

                if ($object->file->mime !== 'application/zip') {
                    throw new \RuntimeException('Bundle is not a valid zip file');
                }

                $zip = new \ZipArchive;
                if ($zip->open($localPath) === true) {
                    $zip->extractTo($dir);
                    $zip->close();
                } else {
                    throw new \RuntimeException('Failed to unzip bundle');
                }

                return true;

            } catch (\Exception $e) {
                Directory::delete($dir);
                $this->setError('HTML Bundle is invalid: ' . $e->getMessage());
                return false;
            }
        }

        return true;
    }

    // --------------------------------------------------------------------------

    /**
     * Convenience method for returning a bundle's URL
     *
     * @param $bundleId
     *
     * @return string
     */
    public static function getBundleUrl($bundleId)
    {
        return site_url('assets/uploads/html-bundles/' . $bundleId);
    }
}
