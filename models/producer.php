<?php

namespace Models;

/**
 * @Entity
 * @Table(name="producer")
 */
class Producer {
 
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
    protected $www;
    
    /**
     * @Column
     */
    protected $descr;
    
    /**
     * @Column
     */
    protected $logo;
    
    /**
     * @Column
     */
    protected $logo_path;
    
    /**
     * @OneToMany(targetEntity="Product", mappedBy="producer")
     */
    private $products;
    
    public function __construct() {
        $this->products = new ArrayCollection();
    }
    
    public function getName() { return $this->name; }
    
}