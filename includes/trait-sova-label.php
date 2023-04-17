<?php

trait SOVA_Label
{
    private function label( $name )
    {
        $words = array_map( fn( $word ) => ucfirst( $word ), preg_split( '/_/', $name ) );

        return implode( ' ', $words );
    }
}