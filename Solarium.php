<?php
/**
 * YiiSolarium
 *
 * Integrates Solarium (an opensource Solr client library for PHP applications)
 *
 * @copyright Copyright (c) 2013 Enrico Stahn
 * @licence   http://github.com/estahn/YiiSolarium/LICENSE
 * @link      http://github.com/estahn/YiiSolarium
 * @author    Enrico Stahn <mail@enricostahn.com>
 */

/**
 * Solarium application component to integrate the solarium library into Yii
 *
 * Configuration:
 * <code>
 * 'components' => array(
 *     ...
 *     'solarium' => array(
 *         'class' => 'application.extensions.YiiSolarium.Solarium',
 *         'clientOptions' => array(
 *             'endpoint' => array(
 *                 'localhost' => array(
 *                     'host' => '127.0.0.1',
 *                     'port' => '8089',
 *                     'path' => '',
 *                 )
 *             )
 *         )
 *     )
 *     ...
 * )
 * </code>
 */
class Solarium extends CApplicationComponent
{
    /**
     * @var array|\Zend_Config
     */
    protected $clientOptions;

    /**
     * @var Solarium\Client
     */
    protected $client;

    /**
     * Initializes the application component
     *
     * Configure namespace aliases and setup solarium client.
     *
     * @see CApplicationComponent::init()
     */
    public function init()
    {
        Yii::setPathOfAlias('Solarium', __DIR__ . '/vendor/solarium/solarium/library/Solarium');
        Yii::setPathOfAlias('Symfony', __DIR__ . '/vendor/symfony/event-dispatcher/Symfony');

        $this->client = new Solarium\Client($this->clientOptions);

        parent::init();
    }

    /**
     * @return array|\Zend_Config
     */
    public function getClientOptions()
    {
        return $this->clientOptions;
    }

    /**
     * Set Solarium client options
     *
     * @see http://wiki.solarium-project.org/index.php/V1:Client#Options
     * @param array|\Zend_Config $clientOptions
     */
    public function setClientOptions($clientOptions)
    {
        $this->clientOptions = $clientOptions;
    }

    /**
     * Get the configured solarium instance
     * @return Solarium\Client
     */
    public function getClient()
    {
        return $this->client;
    }
}
