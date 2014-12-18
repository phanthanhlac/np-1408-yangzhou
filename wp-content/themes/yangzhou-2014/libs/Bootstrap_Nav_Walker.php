<?php
/**
 * Created by PhpStorm.
 * User: np-admin
 * Date: 12/7/2014
 * Time: 4:38 PM
 */

class Bootstrap_Nav_Walker extends Walker_Nav_Menu
{
    /**
     * Start the element output.
     *
     * @param  string $output Passed by reference. Used to append additional content.
     * @param  object $item   Menu item data object.
     * @param  int $depth     Depth of menu item. May be used for padding.
     * @param  array $args    Additional strings.
     * @return void
     */
    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output )
    {
        $id_field = $this->db_fields['id'];
        if ( is_object( $args[0] ) ) {
            $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
        }
        return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
    function start_lvl( &$output, $depth ) {
        // depth dependent classes
        $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
        $display_depth = ( $depth); // because it counts the first submenu as 0
        $classes = array('sub-menu dropdown-menu','level-' . $display_depth);
        $class_names = implode( ' ', $classes );

        // build html
        $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
    }
    function start_el(&$output, $item, $depth, $args)
    {

        $classes     = empty ( $item->classes ) ? array () : (array) $item->classes;

        $class_names = join(
            ' '
            ,   apply_filters(
                'nav_menu_css_class'
                ,   array_filter( $classes ), $item
            )
        );

        if ($args->has_children && $depth == 0){
            ! empty ( $class_names )
            and $class_names = ' class="'. esc_attr( $class_names ) . ' has_children dropdown"';
        }else{
            ! empty ( $class_names )
            and $class_names = ' class="'. esc_attr( $class_names ) . '"';
        }

        $output .= "<li id='menu-item-$item->ID' $class_names>" ;
        $attributes  = '';

        ! empty( $item->attr_title )
        and $attributes .= ' title="'  . esc_attr( $item->attr_title ) .'"';
        ! empty( $item->target )
        and $attributes .= ' target="' . esc_attr( $item->target     ) .'"';
        ! empty( $item->xfn )
        and $attributes .= ' rel="'    . esc_attr( $item->xfn        ) .'"';
        ! empty( $item->url )
        and $attributes .= ' href="'   . esc_attr( $item->url        ) .'"';


        // insert description for top level elements only
        // you may change this
        $description = ( ! empty ( $item->description ) and 0 == $depth )
            ? '<span class="desc">' . esc_attr( $item->description ) . '</span>' : '';

        $title = apply_filters( 'the_title', $item->title, $item->ID );
        if ( $depth == 0 ) {//top level items
            $item_output = $args->before
                ."<div class='first-level'>"
                . "<a $attributes>"
                . $args->link_before
                . $title
                . '</a>'
                . $args->link_after
                . $description
                . '</div>'
                . $args->after;
        }else{//everything else
            $item_output = $args->before
                . "<a $attributes>"
                . $args->link_before
                . $title
                . '</a> '
                . $args->link_after
                . $args->after;
        }
        // Since $output is called by reference we don't need to return anything.
        $output .= apply_filters(
            'walker_nav_menu_start_el'
            ,   $item_output
            ,   $item
            ,   $depth
            ,   $args
        );
    }

}