<?php

class SOVA_WP_Taxonomy
{
    private $name;

    private $label;

    private $label_plural;

    private $post_types;

    private $public;

    private $hierarchical;

    public function __construct()
    {
        $this->name = 'taxonomy';
        $this->label = '';
        $this->label_plural = '';
        $this->post_types = [];
        $this->public = true;
        $this->hierarchical = false;        
    }

    public function name( string $name )
    {
        $this->name = $name;

        return $this;
    }

    public function label( string $label )
    {
        $this->label = $label;

        return $this;
    }

    public function label_plural( string $label_plural )
    {
        $this->label_plural = $label_plural;

        return $this;
    }

    public function post_types( array $post_types )
    {
        $this->post_types = $post_types;

        return $this;
    }

    public function public( bool $public )
    {
        $this->public  = $public;

        return $this;
    } 

    public function hierarchical( bool $hierarchical )
    {
        $this->hierarchical = $hierarchical;

        return $this;
    }

    public function register()
    {
        register_taxonomy( $this->name, $this->post_types, [
            'label'                 => __( $this->label ),
            'labels'                => [
                'name'              => __( $this->label_plural ),
                'singular_name'     => __( $this->label ),
                'search_items'      => __( 'Search' ),
                'all_items'         => __( 'All' ),
                'view_item '        => __( 'View' ),
                'parent_item'       => __( 'Parent' ),
                'parent_item_colon' => __( 'Parent:' ),
                'edit_item'         => __( 'Edit' ),
                'update_item'       => __( 'Update' ),
                'add_new_item'      => __( 'Add New' ),
                'new_item_name'     => __( 'New' ),
                'menu_name'         => __( $this->label ),
                'back_to_items'     => __( '← Back' ),
            ],
            'public'       => $this->public,
            'hierarchical' => $this->hierarchical,
        ] );
    }
}
