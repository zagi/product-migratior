<?php

namespace Models;

/**
 * @Entity
 * @Table(name="params")
 */
class Param {

    /**
     * @Id
     * @Column
     */
    protected $id;
    
    /**
     * @Column
     */
    protected $name;
    
    /**
     * @Column
     */
    protected $type;
    
    /**
     * @Column
     */
    protected $precision;
    
    /**
     * @Column
     */
    protected $unit;
    
    /**
     * @Column
     */
    protected $default_list_options;

    /**
     * @ManyToMany(targetEntity="Product", mappedBy="params")
     */
    private $products;

    public function __construct() {
        $this->products = \Doctrine\Common\Collections\ArrayCollection();   
    }
    
    public function getName() {
        return $this->name;   
    }
    
    public function getValue() {
        return $this->default_list_options; 
    }
}