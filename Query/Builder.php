<?php

namespace Ddeboer\Salesforce\MapperBundle\Query;

use Ddeboer\Salesforce\MapperBundle\Annotation\AnnotationReader;
use Ddeboer\Salesforce\MapperBundle\Query;

class Builder
{
    private $mapper;
    private $client;
    private $annotationReader;
    private $selectFields = array();
    private $groupBy = array();
    private $parameters = array();
    private $from = array();
    private $where = array();
    private $limit;

    public function __construct($mapper, $client, AnnotationReader $annotationReader)
    {
        $this->mapper = $mapper;
        $this->client = $client;
        $this->annotationReader = $annotationReader;
    }

    public function select($select)
    {
        if (is_array($select)) {
            $this->selectFields += $select;
        } else {
            $this->selectFields[] = $select;
        }
        
        return $this;
    }

    public function from($objectType)
    {
        $this->from[] = $objectType;       
        return $this;
    }

    /**
     *
     * @param string|array $predicate   Where predicate: can be either a string,
     *                                  e.g. <code>name = "Something"</code>, or
     *                                  an array
     * @return Builder
     */
    public function where($predicate)
    {
        if (is_array($predicate)) {
            $this->where = $predicate;
        } else {
            $this->where[] = $predicate; 
        }
        return $this;
    }
    
    public function andWhere($predicate)
    {
        $this->where[] = ' AND ' . $predicate;
        return $this;
    }
    
    public function orWhere($predicate)
    {
        $this->where[] = ' OR ' . $predicate;
    }

    private function getMappedSelectFields()
    {
        if (count($this->selectFields) > 0) {
            return $this->getMappedFields($this->selectFields);
        } else {
            // No no select fields supplied, so get them all
            return $this->mapper->getFields($this->from[0], 1);
        }
    }

    private function getMappedFields(array $fields)
    {
        if (count($fields) > 0) {
            $mappedFields = array();
            foreach ($fields as $field) {
                $mappedFields[] = $this->annotationReader->getSalesforceField(
                    $this->from[0], $field
                )->name;
            }
        } 

        return $mappedFields;
    }

    private function getFromObject()
    {
        return $this->annotationReader->getSalesforceObject($this->from[0])->name;
    }

    private function getWhereString()
    {
        if (0 === count($this->where)) {
            return;
        }

        $whereString = ' WHERE ';        
        foreach ($this->where as $where) {
            preg_match('/(AND |OR )?(\w+) *([!=><]+|LIKE) *[\'"]?(.*)[\'"]?/i', $where,
                       $matches);
            
            list($all, $connector, $field, $operator, $value) = $matches;
            $salesforceFieldName = $this->annotationReader
                ->getSalesforceField($this->from[0], $field)->name;
            $whereString .= $connector . $salesforceFieldName . $operator
                         . $this->quoteValue($value) . ' ';
        }

        return rtrim($whereString);
    }

    private function quoteValue($value)
    {
        if ($value == 'null') {
            return $value;
        } else {
            return '\'' . $value . '\'';
        }
    }

    /**
     *
     * @return Query
     */
    public function getQuery()
    {
        $query = 'SELECT '
               . implode(',', $this->getMappedSelectFields())
               . ' FROM '
               . $this->getFromObject();

        if (count($this->where) > 0) {
            $query .= $this->getWhereString();
        }

        if (isset($this->groupBy['fields'])) {
            $query .= ' GROUP BY '
                    . implode(',',  $this->getMappedFields($this->groupBy['fields']));

            if (isset($this->groupBy['having'])) {
                $query .= ' HAVING ' . $this->groupBy['having'];
            }
        }

        if (null !== $this->limit) {
            $query .= ' LIMIT ' . $this->limit;
        }

        return new Query($this->mapper, $this->client, $query, $this->from[0]);
    }

    public function in()
    {
        
    }

    public function groupBy($fields, $having)
    {
        $this->groupBy = array(
            'fields'    => is_array($fields) ? $fields : array($fields),
            'having'    => $having);
        return $this;
    }

    public function having($having)
    {
        $this->having = $having;
        return $this;
    }

    public function limit($limit)
    {
        $this->limit = (int) $limit;
        return $this;
    }

    public function setParameter($key, $value)
    {
        $this->parameters[$key] = $value;
    }
}