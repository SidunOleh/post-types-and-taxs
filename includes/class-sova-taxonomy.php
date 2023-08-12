<?php

defined( 'ABSPATH' ) or die;

class SOVA_Taxonomy
{
    private $name;

    private $post_types;

    private $label;

    private $label_plular;

    private $public;

    private $hierarchical;

    public function __construct()
    {
        $this->name = '';
        $this->post_types = [];
        $this->label = '';
        $this->label_plular = '';
        $this->public = true;
        $this->hierarchical = false;        
    }

    public function name( string $name ): self
    {
        $this->name = $name;

        return $this;
    }

    public function post_types( array $post_types ): self
    {
        $this->post_types = $post_types;

        return $this;
    }

    public function label( string $label ): self
    {
        $this->label = $label;

        return $this;
    }

    public function label_plular( string $label_plular ): self
    {
        $this->label_plular = $label_plular;

        return $this;
    }

    public function public( bool $public ): self
    {
        $this->public  = $public;

        return $this;
    } 

    public function hierarchical( bool $hierarchical ): self
    {
        $this->hierarchical = $hierarchical;

        return $this;
    }

    public function create(): void
    {
        add_action( 'init', [ $this, 'register' ] );
    }

    public function register(): void
    {
        register_taxonomy( $this->name, $this->post_types, [
            'label' => $this->label,
            'labels' => [
                'name'              => $this->label_plular,
                'singular_name'     => $this->label,
                'search_items'      => __( 'Search ' ) . $this->label,
                'all_items'         => __( 'All ' )  . $this->label_plular,
                'view_item '        => __( 'View ' ) . $this->label,
                'parent_item'       => __( 'Parent ' ) . $this->label,
                'parent_item_colon' => __( 'Parent :' ) . $this->label,
                'edit_item'         => __( 'Edit ' ) . $this->label,
                'update_item'       => __( 'Update ' ) . $this->label,
                'add_new_item'      => __( 'Add New ' ) . $this->label,
                'new_item_name'     => __( 'New ' ) . $this->label,
                'menu_name'         => $this->label_plular,
                'back_to_items'     => __( '← Back to ' ) . $this->label_plular,
            ],
            'public'                => $this->public,
            'hierarchical'          => $this->hierarchical,
        ] );
    }
}