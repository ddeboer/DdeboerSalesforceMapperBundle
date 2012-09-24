<?php

namespace Ddeboer\Salesforce\MapperBundle\Request\ParamConverter;

use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ConfigurationInterface;
use Ddeboer\Salesforce\MapperBundle\Mapper;

/**
 * This param converter convers a Salesforce id into a Salesforce object, using
 * the Salesforce mapper for lookup.
 *
 * @author David de Boer <david@ddeboer.nl>
 */
class SalesforceParamConverter implements ParamConverterInterface
{
    /**
     * @var Mapper
     */
    protected $mapper;

    /**
     * @var array
     *
     * Property name => Salesforce model name
     */
    protected $mappings;

    /**
     * {@inheritdoc}
     */
    public function __construct(Mapper $mapper, array $mappings)
    {
        $this->mapper = $mapper;
        $this->mappings = $mappings;
    }

    /**
     * {@inheritdoc}
     */
    public function apply(Request $request, ConfigurationInterface $configuration)
    {
        // @todo Is it smart to do this based on variable name? Perhaps it's
        // better to, here also, look at class name?
        $class = $configuration->getClass();

        // If request has property set that corresponds to the Salesforce model,
        // go ahead and do the param conversion.
        $propertyName = \array_search($class, $this->mappings);
        if ($request->attributes->has($propertyName)) {
            $id = $request->attributes->get($propertyName);
            $model = $this->mapper->find($class, $id);
            if (!$model) {
                throw new NotFoundHttpException('Model with id ' . $id . ' not found');
            }

            $request->attributes->set($configuration->getName(), $model);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function supports(ConfigurationInterface $configuration)
    {
        return in_array($configuration->getClass(), $this->mappings);
    }
}

