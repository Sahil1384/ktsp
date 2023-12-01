<?php

/**
 * Migration:   2
 * Started:     2019-04-20
 * Finalised:
 */

namespace Nails\Database\Migration\App;

use Nails\Common\Console\Migrate\Base;

class Migration2 extends Base
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
                ('plaintext', 'contact-address', 'Contact: Address', '', '', '11/F Chevalier Commercial Centre, 8 Wang Hoi Road, Kowloon Bay, Hong Kong', NOW(), NULL, NOW(), NULL);
        ");
    }
}
