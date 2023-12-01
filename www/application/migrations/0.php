<?php

/**
 * Migration:   0
 * Started:     2019-04-05
 */

namespace Nails\Database\Migration\App;

use Nails\Common\Console\Migrate\Base;

class Migration0 extends Base
{
    /**
     * Execute the migration
     * @return void
     */
    public function execute(): void
    {
        $this->query('
            DROP TABLE IF EXISTS {{APP_DB_PREFIX}}download;
            CREATE TABLE `{{APP_DB_PREFIX}}download` (
                `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `label` varchar(150) DEFAULT NULL,
                `ref` varchar(150) DEFAULT NULL,
                `pdf_id` int(11) unsigned DEFAULT NULL,
                `html_id` int(11) unsigned DEFAULT NULL,
                `is_deleted` tinyint(1) unsigned NOT NULL DEFAULT \'0\',
                `created` datetime NOT NULL,
                `created_by` int(11) unsigned DEFAULT NULL,
                `modified` datetime NOT NULL,
                `modified_by` int(11) unsigned DEFAULT NULL,
                PRIMARY KEY (`id`),
                KEY `created_by` (`created_by`),
                KEY `modified_by` (`modified_by`),
                KEY `pdf_id` (`pdf_id`),
                KEY `html_id` (`html_id`),
                CONSTRAINT `{{APP_DB_PREFIX}}download_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{APP_DB_PREFIX}}download_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{APP_DB_PREFIX}}download_ibfk_3` FOREIGN KEY (`pdf_id`) REFERENCES `{{NAILS_DB_PREFIX}}cdn_object` (`id`),
                CONSTRAINT `{{APP_DB_PREFIX}}download_ibfk_4` FOREIGN KEY (`html_id`) REFERENCES `{{NAILS_DB_PREFIX}}cdn_object` (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8
        ');
        $this->query('
            DROP TABLE IF EXISTS {{APP_DB_PREFIX}}environmentalpermit;
            CREATE TABLE `{{APP_DB_PREFIX}}environmentalpermit` (
                `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `label` varchar(150) DEFAULT NULL,
                `ref` varchar(150) DEFAULT NULL,
                `pdf_id` int(11) unsigned DEFAULT NULL,
                `html_id` int(11) unsigned DEFAULT NULL,
                `is_deleted` tinyint(1) unsigned NOT NULL DEFAULT \'0\',
                `created` datetime NOT NULL,
                `created_by` int(11) unsigned DEFAULT NULL,
                `modified` datetime NOT NULL,
                `modified_by` int(11) unsigned DEFAULT NULL,
                PRIMARY KEY (`id`),
                KEY `created_by` (`created_by`),
                KEY `modified_by` (`modified_by`),
                KEY `pdf_id` (`pdf_id`),
                KEY `html_id` (`html_id`),
                CONSTRAINT `{{APP_DB_PREFIX}}environmentalpermit_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{APP_DB_PREFIX}}environmentalpermit_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{APP_DB_PREFIX}}environmentalpermit_ibfk_3` FOREIGN KEY (`pdf_id`) REFERENCES `{{NAILS_DB_PREFIX}}cdn_object` (`id`),
                CONSTRAINT `{{APP_DB_PREFIX}}environmentalpermit_ibfk_4` FOREIGN KEY (`html_id`) REFERENCES `{{NAILS_DB_PREFIX}}cdn_object` (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8
        ');
        $this->query('
            DROP TABLE IF EXISTS {{APP_DB_PREFIX}}monitoringdata_air;
            CREATE TABLE `{{APP_DB_PREFIX}}monitoringdata_air` (
                `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `date` date DEFAULT NULL,
                `weather` varchar(150) DEFAULT NULL,
                `station` varchar(150) DEFAULT NULL,
                `time` time DEFAULT NULL,
                `wind_speed` varchar(150) DEFAULT NULL,
                `wind_direction` varchar(150) DEFAULT NULL,
                `one_hour_tsp` varchar(150) DEFAULT NULL,
                `is_deleted` tinyint(1) unsigned NOT NULL DEFAULT \'0\',
                `created` datetime NOT NULL,
                `created_by` int(11) unsigned DEFAULT NULL,
                `modified` datetime NOT NULL,
                `modified_by` int(11) unsigned DEFAULT NULL,
                PRIMARY KEY (`id`),
                KEY `created_by` (`created_by`),
                KEY `modified_by` (`modified_by`),
                CONSTRAINT `{{APP_DB_PREFIX}}monitoringdata_air_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{APP_DB_PREFIX}}monitoringdata_air_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8
        ');
        $this->query('
            DROP TABLE IF EXISTS {{APP_DB_PREFIX}}monitoringdata_noise;
            CREATE TABLE `{{APP_DB_PREFIX}}monitoringdata_noise` (
                `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `date` date DEFAULT NULL,
                `weather` varchar(150) DEFAULT NULL,
                `station` varchar(150) DEFAULT NULL,
                `start_time` time DEFAULT NULL,
                `wind_speed` varchar(150) DEFAULT NULL,
                `leq` varchar(150) DEFAULT NULL,
                `is_deleted` tinyint(1) unsigned NOT NULL DEFAULT \'0\',
                `created` datetime NOT NULL,
                `created_by` int(11) unsigned DEFAULT NULL,
                `modified` datetime NOT NULL,
                `modified_by` int(11) unsigned DEFAULT NULL,
                PRIMARY KEY (`id`),
                KEY `created_by` (`created_by`),
                KEY `modified_by` (`modified_by`),
                CONSTRAINT `{{APP_DB_PREFIX}}monitoringdata_noise_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{APP_DB_PREFIX}}monitoringdata_noise_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8
        ');
        $this->query('
            DROP TABLE IF EXISTS {{APP_DB_PREFIX}}report_monthly;
            CREATE TABLE `{{APP_DB_PREFIX}}report_monthly` (
                `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `label` varchar(150) DEFAULT NULL,
                `year` int(11) unsigned DEFAULT NULL,
                `month` int(11) unsigned DEFAULT NULL,
                `pdf_id` int(11) unsigned DEFAULT NULL,
                `html_id` int(10) unsigned DEFAULT NULL,
                `is_deleted` tinyint(1) unsigned NOT NULL DEFAULT \'0\',
                `created` datetime NOT NULL,
                `created_by` int(11) unsigned DEFAULT NULL,
                `modified` datetime NOT NULL,
                `modified_by` int(11) unsigned DEFAULT NULL,
                PRIMARY KEY (`id`),
                KEY `created_by` (`created_by`),
                KEY `modified_by` (`modified_by`),
                KEY `pdf_id` (`pdf_id`),
                KEY `html_id` (`html_id`),
                CONSTRAINT `{{APP_DB_PREFIX}}report_monthly_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{APP_DB_PREFIX}}report_monthly_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{APP_DB_PREFIX}}report_monthly_ibfk_3` FOREIGN KEY (`pdf_id`) REFERENCES `{{NAILS_DB_PREFIX}}cdn_object` (`id`),
                CONSTRAINT `{{APP_DB_PREFIX}}report_monthly_ibfk_4` FOREIGN KEY (`html_id`) REFERENCES `{{NAILS_DB_PREFIX}}cdn_object` (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8
        ');
        $this->query('
            DROP TABLE IF EXISTS {{APP_DB_PREFIX}}report_quarterly;
            CREATE TABLE `{{APP_DB_PREFIX}}report_quarterly` (
                `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `label` varchar(150) DEFAULT NULL,
                `year` int(11) unsigned DEFAULT NULL,
                `quarter` enum(\'Q1\',\'Q2\',\'Q3\',\'Q4\') DEFAULT NULL,
                `pdf_id` int(11) unsigned DEFAULT NULL,
                `html_id` int(11) unsigned DEFAULT NULL,
                `is_deleted` tinyint(1) unsigned NOT NULL DEFAULT \'0\',
                `created` datetime NOT NULL,
                `created_by` int(11) unsigned DEFAULT NULL,
                `modified` datetime NOT NULL,
                `modified_by` int(11) unsigned DEFAULT NULL,
                PRIMARY KEY (`id`),
                KEY `created_by` (`created_by`),
                KEY `modified_by` (`modified_by`),
                KEY `pdf_id` (`pdf_id`),
                KEY `html_id` (`html_id`),
                CONSTRAINT `{{APP_DB_PREFIX}}report_quarterly_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{APP_DB_PREFIX}}report_quarterly_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{APP_DB_PREFIX}}report_quarterly_ibfk_3` FOREIGN KEY (`pdf_id`) REFERENCES `{{NAILS_DB_PREFIX}}cdn_object` (`id`),
                CONSTRAINT `{{APP_DB_PREFIX}}report_quarterly_ibfk_4` FOREIGN KEY (`html_id`) REFERENCES `{{NAILS_DB_PREFIX}}cdn_object` (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8
        ');
        $this->query('
            DROP TABLE IF EXISTS {{NAILS_DB_PREFIX}}user_meta_app;
            CREATE TABLE `{{NAILS_DB_PREFIX}}user_meta_app` (
                `user_id` int(11) unsigned NOT NULL,
                PRIMARY KEY (`user_id`),
                CONSTRAINT `{{NAILS_DB_PREFIX}}user_meta_{{APP_DB_PREFIX}}ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8
        ');
    }
}
