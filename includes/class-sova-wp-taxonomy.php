<?php

require_once plugin_dir_path( __FILE__ ) . 'trait-sova-label.php';

class SOVA_WP_Taxonomy
{
    use SOVA_Label;

    private $name;

    private $post_types;

    private $public;

    private $hierarchical;

    public function __construct()
    {
        $this->name = 'taxonomy';
        $this->post_types = [];
        $this->public = true;
        $this->hierarchical = false;        
    }

    public function name( string $name )
    {
        $this->name = $name;

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

    public function create()
    {
        $label = $this->label( $this->name );

        register_taxonomy( $this->name, $this->post_types, [
            'label'                 => __( $label ),
            'labels'                => [
                'name'              => __( $label ),
                'singular_name'     => __( $label ),
                'search_items'      => __( 'Search' ),
                'all_items'         => __( 'All' ),
                'view_item '        => __( 'View' ),
                'parent_item'       => __( 'Parent' ),
                'parent_item_colon' => __( 'Parent:' ),
                'edit_item'         => __( 'Edit' ),
                'update_item'       => __( 'Update' ),
                'add_new_item'      => __( 'Add New' ),
                'new_item_name'     => __( 'New' ),
                'menu_name'         => __( $label ),
                'back_to_items'     => __( '← Back' ),
            ],
            'public'       => $this->public,
            'hierarchical' => $this->hierarchical,
        ] );
    }
}