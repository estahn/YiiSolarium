# YiiSolarium

YiiSolarium integrates Solarium (an opensource Solr client library for PHP applications)

## Install

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

## Configuration

YiiSolarium is a [Yii application component][yiidoc].
A comprehensive overview of the configuration parameters for Solarium can be found in the [Solarium documentation][sdoc].

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

## Usage

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

## Contributing

1. Fork it.
2. Create a branch (`git checkout -b my_markup`)
3. Commit your changes (`git commit -am "Added Snarkdown"`)
4. Push to the branch (`git push origin my_markup`)
5. Open a [Pull Request][1]
6. Enjoy a refreshing Diet Coke and wait

[yiidoc]: http://www.yiiframework.com/doc/guide/1.1/en/basics.application#application-components
[sdoc]: http://wiki.solarium-project.org/index.php/V1:Client#Options
[1]: https://github.com/estahn/YiiSolarium/pulls