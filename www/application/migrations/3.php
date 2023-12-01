<?php

/**
 * Migration:   3
 * Started:     2019-05-08
 * Finalised:
 */

namespace Nails\Database\Migration\App;

use Nails\Common\Console\Migrate\Base;

class Migration3 extends Base
{
    /**
     * Execute the migration
     * @return void
     */
    public function execute()
    {
        $this->query("
            INSERT INTO `{{NAILS_DB_PREFIX}}cms_block` (`type`, `slug`, `label`, `description`, `located`, `value`, `created`, `created_by`, `modified`, `modified_by`)
            VALUES
                ('plaintext', 'section-title-full-project-background', 'Section Title (Full): Project Background', '', '', 'Project Background', NOW(), NULL, NOW(), NULL),
                ('plaintext', 'section-title-full-monitoring-data', 'Section Title (Full): Monitoring Data', '', '', 'Environmental Monitoring & Audit Data', NOW(), NULL, NOW(), NULL),
                ('plaintext', 'section-title-full-ema-reports', 'Section Title (Full): EM&A Reports', '', '', 'Environmental Monitoring & Audit Reports', NOW(), NULL, NOW(), NULL),
                ('plaintext', 'section-title-full-downloads', 'Section Title (Full): Downloads', '', '', 'Key Environmental Impact Assessment Ordinance Documents', NOW(), NULL, NOW(), NULL),
                ('plaintext', 'section-title-full-environmental-permit', 'Section Title (Full): Environmental Permit', '', '', 'Environmental Permit Submissions', NOW(), NULL, NOW(), NULL),
                ('plaintext', 'section-title-full-contact', 'Section Title (Full): Contact', '', '', 'Contact Us', NOW(), NULL, NOW(), NULL);
        ");
    }
}
