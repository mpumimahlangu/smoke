<?php return array(
    'root' => array(
        'name' => '__root__',
        'pretty_version' => '1.0.0+no-version-set',
        'version' => '1.0.0.0',
        'reference' => NULL,
        'type' => 'library',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        '__root__' => array(
            'pretty_version' => '1.0.0+no-version-set',
            'version' => '1.0.0.0',
            'reference' => NULL,
            'type' => 'library',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'giggsey/libphonenumber-for-php' => array(
            'pretty_version' => '8.13.37',
            'version' => '8.13.37.0',
            'reference' => '536c747ff1af433dddc615b26b9674047e013076',
            'type' => 'library',
            'install_path' => __DIR__ . '/../giggsey/libphonenumber-for-php',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'giggsey/libphonenumber-for-php-lite' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => '8.13.37',
            ),
        ),
        'giggsey/locale' => array(
            'pretty_version' => '2.6',
            'version' => '2.6.0.0',
            'reference' => '37874fa473131247c348059fb7b8985efc18b5ea',
            'type' => 'library',
            'install_path' => __DIR__ . '/../giggsey/locale',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'symfony/polyfill-mbstring' => array(
            'pretty_version' => 'v1.29.0',
            'version' => '1.29.0.0',
            'reference' => '9773676c8a1bb1f8d4340a62efe641cf76eda7ec',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/polyfill-mbstring',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
    ),
);
