<?php
namespace Application\Hydrator;

use Zend\Stdlib\Exception\InvalidArgumentException;
use Zend\Stdlib\Hydrator\ClassMethods;

abstract class PrefixHydrator extends ClassMethods
{
    protected $prefix = null;

    function __construct()
    {
        if (is_null($this->getPrefix())) {
            throw new InvalidArgumentException(
                'No prefix is set for the PrefixHydrator!'
            );
        }
        
        parent::__construct();
    }

    public function extract($object)
    {
        $data = parent::extract($object);

        foreach ($data as $key => $value) {
            $newKey = $this->getPrefix() . $key;

            $data[$newKey] = $value;
            unset($data[$key]);
        }

        return $data;
    }

    public function hydrate(array $data, $object)
    {
        foreach ($data as $key => $value) {
            $newKey = str_replace($this->getPrefix(), '', $key);

            $data[$newKey] = $value;
            unset($data[$key]);
        }

        return parent::hydrate(
            $data, $object
        );
    }

    public function getPrefix()
    {
        return $this->prefix;
    }

    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
    }
}
