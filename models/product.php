<?php

namespace Models;

/**
 * @Entity
 * @Table(name="product")
 */
class Product {
 
    /**
     * @Id
     * @Column(type="integer")
     */
    protected $id;
    
    /**
     * @Column(type="integer")
     */
    protected $id_producer;
    
    /**
     * @Column
     */
    protected $name;
    
    /**
     * @Column
     */
    protected $code;
    
    /**
     * @Column
     */
    protected $keywords;
    
    /**
     * @Column
     */
    protected $descr;
    
    /**
     * @Column
     */
    protected $photo;
    
    /**
     * @Column
     */
    protected $photo_path;
    
    /**
     * @Column
     */
    protected $weight;
    
    /**
     * @Column
     */
    protected $date_added;
    
    /**
     * @Column
     */
    protected $date_updated;
    
    /**
     * @Column
     */
    protected $award;
    
    /**
     * @Column
     */
    protected $vat_factor;

    /**
     * @Column
     */
    protected $search_index;

    /**
     * @Column
     */
    protected $kind_name;
    
    /**
     * @Column
     */
    protected $kind_values;
    
    /**
     * @Column
     */
    protected $kind_name_2;
    
    /**
     * @Column
     */
    protected $kind_values_2;
    
    /**
     * @Column
     */
    protected $kind_name_3;
    
    /**
     * @Column
     */
    protected $kind_values_3;
    
    /**
     * @Column
     */
    protected $flag_active;
    
    /**
     * @Column
     */    
    protected $flag_new;
    
    /**
     * @Column
     */
    protected $flag_super_product;
    
    /**
     * @Column
     */
    protected $flag_recommend;

    /**
     * @Column
     */
    protected $flag_sellout;
    
    /**
     * @Column
     */
    protected $flag_out_of_use;
    
    /**
     * @Column
     */
    protected $flag_mirror;
    
    /**
     * @Column
     */
    protected $flag_product_set;
    
    /**
     * @ManyToOne(targetEntity="Producer", inversedBy="products")
     * @JoinColumn(name="id_producer", referencedColumnName="id")
     */
    private $producer;
    
    /**
     * @ManyToMany(targetEntity="Param", inversedBy="products")
     * @JoinTable(name="product_to_features",
     * joinColumns={@JoinColumn(name="id_product", referencedColumnName="id")},
     * inverseJoinColumns={@JoinColumn(name="id_params", referencedColumnName="id")}
     * )
     */
    private $params;
    
    public function __construct() {
        $this->params = \Doctrine\Common\Collections\ArrayCollection();   
    }
    
    public function getParams() {
        return $this->params;
    }
    
    public function getName() { return $this->name; }
    
    public function getProducer() { return $this->producer; }
    
    public function getProducerId() { return $this->id_producer; }
    
    public function getId() { return $this->id; }
}