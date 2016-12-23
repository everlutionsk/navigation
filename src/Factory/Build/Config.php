<?php

declare(strict_types = 1);

namespace Everlution\Navigation\Factory\Build;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class NavigationItemConfig.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
abstract class Config
{
    const OPTION_CLASS = 'class';

    /** @var OptionsResolver */
    protected $resolver;
    /** @var array */
    protected $supportedClasses = [];

    public function __construct()
    {
        $this->resolver = new OptionsResolver();

        $this->resolver->setRequired([self::OPTION_CLASS]);
        $this->resolver->setAllowedTypes(self::OPTION_CLASS, 'string');

        $this->config();
    }

    /**
     * @param string $className
     * @param array $arguments
     * @return mixed
     */
    abstract protected function getObject(string $className, array $arguments);

    /**
     * @param $object
     * @return array
     */
    abstract protected function getArray($object): array;

    /**
     * @param array $config
     * @return array
     */
    protected function resolve(array $config): array
    {
        return $this->resolver->resolve($config);
    }

    /**
     * @param string $class
     */
    protected function checkIfSupport(string $class)
    {
        if (false === in_array($class, $this->supportedClasses)) {
            throw new UnsupportedItemClassException($class, $this->supportedClasses);
        }
    }

    /**
     * Specifies additional options
     * This method is called after initial OptionsResolver setup
     * Use OptionsResolver within this method
     *
     * @return void
     */
    abstract protected function config();

    /**
     * @param array $config
     * @return string
     */
    protected function popClassName(array $config): string
    {
        $class = $config[self::OPTION_CLASS];
        unset($config[self::OPTION_CLASS]);

        return $class;
    }
}
