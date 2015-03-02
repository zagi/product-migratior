<?php
/**
 * Wordpress connector
 * super simple connector
 * 
 * author:  michal<at>zagalski.pl
 */

namespace Lib;

class Wordpress { 
    
    public function __construct() { 
        return require_once('/wordpress/wp-load.php'); 
    } 
    
    public function addProduct($product) {
     
        $data = $this->prepareProductData($product);
            
        if(empty($data)) {
            die('Something wrong happend');   
        }
        
        $post = array(
            'post_author'   => $data['post_author'],
            'post_content'  => $data['post_content'],
            'post_status'   => $data['post_status'],
            'post_title'    => $data['post_tile'],
            'post_parent'   => $data['post_parent'],
            'post_category' => $data['post_category'],
            'post_data'     => $data['post_data'],
            'post_type'     => 'product',
        );

        //$post_id = wp_insert_post( $post, $wp_error );
        
        print_r($data);
        
        $attributes = $this->prepareProductAttributes($product->getParams());
        
        print_r($attributes);
    }
    
    private function prepareProductData($product) {
        
        $data = array();
        
        $data['post_author']    = get_current_user_id();
        $data['post_content']   = !empty($product->getDescr()) ? $product->getDescr() : 'No content';
        $data['post_status']    = 'publish';
        $data['post_title']     = !empty($product->getName()) ? $product->getName() : 'No title';
        $data['post_parent']    = 0;
        $data['post_data']      = $this->prepareProductDate($product->getDate());
        $data['post_category']  = $this->prepareProductCategory($product->getCategory());
        //$data['tags_input']     = $this->prepareProductTags($product->getKeywords());
        
        return $data;
    }
    
    private function prepareProductDate($date) {
        
        return $date;
    }
    
    private function prepareProductCategory($category) {
        
        $categories = array();
        
        //check if it exists in wordpress database
        if(0 == (get_cat_ID($category->getName()))) {
            $categories[] = wp_create_category($category->getName());
        }
        
        $categories[] = get_cat_ID($category->getName());
        
        
        return $categories;
    }
    
    private function prepareProductTags($keywords) {
        return $keywords;
    }
    
    private function prepareProductAttributes($params) {
     
        $attrs = array('', '');
        
    }

}