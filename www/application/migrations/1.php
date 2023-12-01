<?php

/**
 * Migration:   1
 * Started:     xxxx-xx-xx
 */

namespace Nails\Database\Migration\App;

use Nails\Auth\Model\User;
use Nails\Cdn\Service\Cdn;
use Nails\Cms\Model\Block;
use Nails\Common\Console\Migrate\Base;
use Nails\Common\Exception\FactoryException;
use Nails\Common\Exception\ModelException;
use Nails\Factory;

class Migration1 extends Base
{
    /**
     * The ID of the SuperUser group
     *
     * @var int
     */
    const USER_GROUP_SUPERUSER = 1;

    /**
     * The ID of the administrator group
     *
     * @var int
     */
    const USER_GROUP_ADMIN = 2;

    // --------------------------------------------------------------------------

    /**
     * Execute the migration
     *
     * @throws FactoryException
     * @throws ModelException
     */
    public function execute(): void
    {
        $this
            ->addUsers()
            ->addCmsBlocks()
            ->addSampleFiles();
    }

    // --------------------------------------------------------------------------

    /**
     * Adds initial users
     *
     * @return $this
     * @throws FactoryException
     */
    protected function addUsers(): self
    {
        $aUsers = [
            [
                'first_name' => 'Pablo',
                'last_name'  => 'de la Peña',
                'email'      => 'p@shedcollective.org',
                'username'   => 'pablo',
                'group_id'   => static::USER_GROUP_SUPERUSER,
            ],
            [
                'first_name' => 'Gary',
                'last_name'  => 'Duncan',
                'email'      => 'g@shedcollective.org',
                'username'   => 'gary',
                'group_id'   => static::USER_GROUP_SUPERUSER,
            ],
            [
                'first_name' => 'Shaun',
                'last_name'  => 'McWhinnie',
                'email'      => 'shaun@shedcollective.org',
                'username'   => 'shaun',
                'group_id'   => static::USER_GROUP_SUPERUSER,
            ],
            [
                'first_name' => 'Michaela',
                'last_name'  => 'Drake',
                'email'      => 'michaela@shedcollective.org',
                'username'   => 'michaela',
                'group_id'   => static::USER_GROUP_SUPERUSER,
            ],
            [
                'first_name' => 'Kathleen',
                'last_name'  => 'Lee',
                'email'      => 'kathleenlee@kaitaksportspark.com.hk',
                'username'   => 'kathleen',
                'group_id'   => static::USER_GROUP_ADMIN,
            ],
            [
                'first_name' => 'Jason',
                'last_name'  => 'Hrick',
                'email'      => 'jhrick@lagardere-se.com ',
                'username'   => 'jason',
                'group_id'   => static::USER_GROUP_ADMIN,
            ],
        ];

        /** @var User $oModel */
        $oModel = Factory::model('User', 'nails/module-auth');
        foreach ($aUsers as $aUser) {
            $aUser['temp_pw'] = true;
            $oModel->create($aUser, false);
        }
        return $this;
    }

    // --------------------------------------------------------------------------

    /**
     * Add initial CMS Blocks
     *
     * @return $this
     * @throws FactoryException
     * @throws ModelException
     */
    protected function addCmsBlocks(): self
    {
        $aBlocks = [
            //  Main Hero
            [
                'label' => 'Main hero title',
                'type'  => 'plaintext',
                'value' => 'Kai Tai Park<br>Environmental',
            ],
            [
                'label' => 'Main hero body',
                'type'  => 'richtext',
                'value' => implode(PHP_EOL, [
                    '<p>Kai Tak Sports Park will provide high-quality facilities, not only for major events but also for daily enjoyment by the community. With a wide variety of sports venues, open spaces, park facilities, shops and dining outlets, it is set to be an urban oasis to meet the diverse needs of the public, and professional and amateur athletes.</p>',
                ]),
            ],

            //  Section: Project Background
            [
                'label' => 'Section Title: Project Background',
                'type'  => 'plaintext',
                'value' => 'Project Background',
            ],
            [
                'label' => 'Section Body: Project Background',
                'type'  => 'richtext',
                'value' => implode(PHP_EOL, [
                    '<p>The accessibility of the West Kowloon Cultural District (WKCD) and all future venues depends on the provision of an efficient and effective internal transportation system</p>',
                    '<p>The main spine of the vehicular network within the WKCD site, and an integral part of the WKCD basement structure, is the underpass road. This will connect all of the district’s arts and cultural facilities, as well as all hotel, office and residential facilities, with a centralised road network, providing major entry and exit points to and from the WKCD. Diverting traffic underground through the underpass road will allow more space to be freed up at ground level for pedestrians and cyclists, as well as for open public areas and park.</p>',
                    '<p>The underpass road is a designated project under Schedule 2 of the Environmental Impact Assessment Ordinance (EIAO), and requires an environmental permit for its construction and operation. In November 2013, the Environmental Impact Assessment Report for the WKCD development was approved under the EIAO, and an environmental permit for the "Underpass Road and Austin Flyover serving the WKCD" was obtained.</p>',
                ]),
            ],

            //  Section: Monitoring Data
            [
                'label' => 'Section Title: Monitoring Data',
                'type'  => 'plaintext',
                'value' => 'Monitoring Data',
            ],

            //  Section: EM&A
            [
                'label' => 'Section Title: EM&A Reports',
                'type'  => 'plaintext',
                'value' => 'EM&A Reports',
            ],

            //  Section: Downloads
            [
                'label' => 'Section Title: Downloads',
                'type'  => 'plaintext',
                'value' => 'Downloads',
            ],

            //  Section: Environmental Permit
            [
                'label' => 'Section Title: Environmental Permit',
                'type'  => 'plaintext',
                'value' => 'Environmental Permit',
            ],

            //  Section: Contact
            [
                'label' => 'Section Title: Contact',
                'type'  => 'plaintext',
                'value' => 'Contact Us',
            ],
            [
                'label' => 'Contact: Phone Number',
                'type'  => 'plaintext',
                'value' => '(852) 2200 0217',
            ],
            [
                'label' => 'Contact: Email address',
                'type'  => 'email',
                'value' => 'info@kaitaisportpark.com',
            ],
        ];

        /** @var Block $oModel */
        $oModel = Factory::model('Block', 'nails/module-cms');
        foreach ($aBlocks as $aBlock) {

            $aBlock['slug'] = strtolower($aBlock['label']);
            $aBlock['slug'] = preg_replace('/[^a-z ]/', '', $aBlock['slug']);
            $aBlock['slug'] = trim($aBlock['slug']);
            $aBlock['slug'] = preg_replace('/\s{1,}/', '-', $aBlock['slug']);
            $aBlock['slug'] = trim($aBlock['slug']);

            $oModel->create($aBlock);
        }

        return $this;
    }

    // --------------------------------------------------------------------------

    /**
     * Add some sample files to the CDN
     *
     * @return $this
     * @throws FactoryException
     */
    public function addSampleFiles(): self
    {
        /** @var Cdn $cdn */
        $cdn = Factory::service('Cdn', 'nails/module-cdn');
        $cdn->objectCreate(
            NAILS_APP_PATH . 'assets/samples/sample.html',
            ['slug' => 'samples', 'is_hidden' => true]
        );
        $cdn->objectCreate(
            NAILS_APP_PATH . 'assets/samples/sample.pdf',
            ['slug' => 'samples', 'is_hidden' => true]
        );
        $cdn->objectCreate(
            NAILS_APP_PATH . 'assets/samples/sample.zip',
            ['slug' => 'samples', 'is_hidden' => true]
        );
        return $this;
    }
}
