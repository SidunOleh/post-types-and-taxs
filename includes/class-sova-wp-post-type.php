<?php

require_once plugin_dir_path( __FILE__ ) . 'trait-sova-label.php';

class SOVA_WP_Post_Type 
{
    use SOVA_Label;

    private $name;

    private $public;

    private $show_in_menu;

    private $menu_position;

    private $menu_icon;

    private $supports;

    private $has_archive;

    private $hierarchical;

    private $taxonomies;

    public function __construct()
    {
        $this->name = 'post_type';
        $this->public = true;
        $this->show_in_menu = true;
        $this->menu_position = 20;
        $this->menu_icon = 'dashicons-menu';
        $this->supports = [ 'title', 'editor', 'thumbnail', ];
        $this->has_archive = true;
        $this->hierarchical = false;
        $this->taxonomies = [];
    }

    public function name( string $name )
    {
        $this->name = $name;

        return $this;
    }

    public function public( bool $public )
    {
        $this->public = $public;

        return $this;
    }

    public function show_in_menu( bool $show_in_menu )
    {
        $this->show_in_menu = $show_in_menu;

        return $this;
    }

    public function menu_position( int $menu_position )
    {
        $this->menu_position = $menu_position;

        return $this;
    }

    public function menu_icon( string $menu_icon )
    {
        $this->menu_icon = $menu_icon;

        return $this;
    }

    public function supports( array $supports )
    {
        $this->supports = $supports;

        return $this;
    }

    public function has_archive( bool $has_archive )
    {
        $this->has_archive = $has_archive;

        return $this;
    }

    public function hierarchical( bool $hierarchical )
    {
        $this->hierarchical = $hierarchical;

        return $this;
    }

    public function taxonomies( array $taxonomies )
    {
        $this->taxonomies = $taxonomies;

        return $this;
    }

    public function create()
    {
        $label = $this->label( $this->name );

        register_post_type( $this->name, [
            'label'  => __( $label ),
            'labels' => [
                'name'               => __( $label ),
                'singular_name'      => __( $label ),
                'add_new'            => __( 'Add' ),
                'add_new_item'       => __( 'Add' ),
                'edit_item'          => __( 'Edit' ),
                'new_item'           => __( 'New' ),
                'view_item'          => __( 'View' ),
                'search_items'       => __( 'Search' ),
                'not_found'          => __( 'Not Found' ),
                'not_found_in_trash' => __( 'Not Found in Trash' ),
                'menu_name'          => __( "$label" ),
            ],
            'public'        => $this->public,
            'show_in_menu'  => $this->show_in_menu,
            'menu_position' => $this->menu_position,
            'menu_icon'     => $this->menu_icon,
            'supports'      => $this->supports,
            'has_archive'   => $this->has_archive,
            'hierarchical'  => $this->hierarchical,
            'taxonomies'    => $this->taxonomies,
        ] );
    }
}