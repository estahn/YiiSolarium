YiiSolarium
===========

YiiSolarium integrates Solarium (an opensource Solr client library for PHP applications)

Install
=======

1. Download YiiSolarium into your application extension directory

    ```
    git clone https://github.com/estahn/YiiSolarium.git
    ```

1. Run composer within YiiSolarium directory

    ```
    cd <application extension dir>/YiiSolarium
    composer install
    ```

1. Remove .git directory

    ```
    rm -rf .git
    ```

Configuration
=============

YiiSolarium is a [Yii application component](http://www.yiiframework.com/doc/guide/1.1/en/basics.application#application-components).
A comprehensive overview of the configuration parameters for Solarium can be found in the [Solarium documentation](http://wiki.solarium-project.org/index.php/V1:Client#Options).

Example:
```
'components' => array(
    ...
    'solarium' => array(
        'class' => 'application.extensions.YiiSolarium.Solarium',
        'clientOptions' => array(
            'endpoint' => array(
                'localhost' => array(
                    'host' => '127.0.0.1',
                    'port' => '8089',
                    'path' => '',
                )
            )
        )
    )
    ...
)
```

Usage
=====

Solarium is accessible through ```Yii::app()->solarium```.

Example:
```
/** @var $client Solarium\Client */
$client = Yii::app()->solarium->getClient();

$query = $client->createSelect();
$query->setFields(array('name'));
$query->setQuery('name:%p1%', array('Bob'));
$query->setRows(3);
$result = $client->select($query);
```