<?php

defined( 'ABSPATH' ) or die;

class SOVA_Post_Type
{
    private $name;

    private $label;

    private $label_plular;

    private $taxonomies;

    private $public;

    private $menu_position;

    private $menu_icon;

    private $supports;

    private $hierarchical;

    private $has_archive;

    public function __construct()
    {
        $this->name = '';
        $this->label = '';
        $this->label_plular = '';
        $this->taxonomies = [];
        $this->public = true;
        $this->menu_position = 20;
        $this->menu_icon = 'dashicons-menu';
        $this->supports = [ 'title', 'editor', 'thumbnail', ];
        $this->hierarchical = false;      
        $this->has_archive = true;  
    }

    public function name( string $name ): self
    {
        $this->name = $name;

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

    public function taxonomies( array $taxonomies ): self
    {
        $this->taxonomies = $taxonomies;

        return $this;
    }

    public function public( bool $public ): self
    {
        $this->public  = $public;

        return $this;
    } 

    public function menu_position( int $menu_position ): self
    {
        $this->menu_position = $menu_position;

        return $this;
    }

    public function menu_icon( string $menu_icon ): self
    {
        $this->menu_icon = $menu_icon;

        return $this;
    }

    public function supports( array $supports ): self
    {
        $this->supports = $supports;

        return $this;
    }

    public function hierarchical( bool $hierarchical ): self
    {
        $this->hierarchical = $hierarchical;

        return $this;
    }

    public function has_archive( array $has_archive ): self
    {
        $this->has_archive = $has_archive;

        return $this;
    }

    public function create(): void
    {
        add_action( 'init', [ $this, 'register' ] );
    }

    public function register(): void
    {
        register_post_type( $this->name, [
            'label'  => $this->label,
            'labels' => [
                'name'               => $this->label_plular,
                'singular_name'      => $this->label,
                'add_new'            => __( 'Add ' ) . $this->label,
                'add_new_item'       => __( 'Add ' ) . $this->label,
                'edit_item'          => __( 'Edit ' ) . $this->label,
                'new_item'           => __( 'New ' ) . $this->label,
                'view_item'          => __( 'View ' ) . $this->label,
                'search_items'       => __( 'Search ' ) . $this->label,
                'not_found'          => __( 'Not Found' ),
                'not_found_in_trash' => __( 'Not Found in Trash' ),
                'menu_name'          => $this->label_plular,
            ],
            'public'              => $this->public,
            'menu_position'       => $this->menu_position,
            'menu_icon'           => $this->menu_icon,
            'hierarchical'        => $this->hierarchical,
            'supports'            => $this->supports,
            'taxonomies'          => $this->taxonomies,
            'has_archive'         => $this->has_archive,
        ] );
    }
}