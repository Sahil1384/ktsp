<?php

/**
 * Define your application's services, models and factories.
 *
 * @link http://nailsapp.co.uk/docs/services
 */

return [

    /**
     * Classes/libraries which don't necessarily relate to a database table.
     * Once instantiated, a request for a service will always return the same instance.
     */
    'services'  => [
        // GENERATOR[SERVICES]
    ],

    /**
     * Models generally represent database tables.
     * Once instantiated, a request for a model will always return the same instance.
     */
    'models'    => [
        'MonitoringDataAir' => function () {
            return new App\Model\MonitoringData\Air();
        },
        'MonitoringDataNoise' => function () {
            return new App\Model\MonitoringData\Noise();
        },
        'ReportMonthly' => function () {
            return new App\Model\Report\Monthly();
        },
        'ReportQuarterly' => function () {
            return new App\Model\Report\Quarterly();
        },
        'Download' => function () {
            return new App\Model\Download();
        },
        'EnvironmentalPermit' => function () {
            return new App\Model\EnvironmentalPermit();
        },
        // GENERATOR[MODELS]
    ],

    /**
     * A class for which a new instance is created each time it is requested.
     */
    'factories' => [
        // GENERATOR[FACTORIES]
    ],

    /**
     * A class which represents an object from the database
     */
    'resources' => [
        'MonitoringDataAir' => function ($oObj) {
            return new App\Resource\MonitoringData\Air($oObj);
        },
        'MonitoringDataNoise' => function ($oObj) {
            return new App\Resource\MonitoringData\Noise($oObj);
        },
        'Report' => function ($oObj) {
            return new App\Resource\Report($oObj);
        },
        'ReportMonthly' => function ($oObj) {
            return new App\Resource\Report\Monthly($oObj);
        },
        'ReportQuarterly' => function ($oObj) {
            return new App\Resource\Report\Quarterly($oObj);
        },
        'Download' => function ($oObj) {
            return new App\Resource\Download($oObj);
        },
        'EnvironmentalPermit' => function ($oObj) {
            return new App\Resource\EnvironmentalPermit($oObj);
        },
        // GENERATOR[RESOURCES]
    ],
];
