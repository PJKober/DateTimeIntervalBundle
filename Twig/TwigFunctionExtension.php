<?php
// pjkober/datetimeintervalbundle/Twig/TwigFunctionExtension.php

/**
 * File TwigFunctionExtension.php
 *
 * Created by Einste - Piotr J. Kober (c).
 * Date: 4/10/2017 Time: 10:20 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace pjkober\datetimeintervalbundle\Twig;


/**
 * Class TwigFunctionExtension
 * Definition functions and filters to use in TWIG
 *
 * @package pjkober\datetimeintervalbundle\Twig
 *
 * @author Piotr J. Kober
 */
class TwigFunctionExtension extends \Twig_Extension
{
    /**
     * Function getFunctions
     * List function to use in TWIG.
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction( 'days', [ $this, 'dateToDays' ], [ 'is_safe' => [ 'html' ] ] ),
            new \Twig_SimpleFunction( 'hours', [ $this, 'dateToHours' ], [ 'is_safe' => [ 'html' ] ] ),
            new \Twig_SimpleFunction( 'minutes', [ $this, 'dateToMinutes' ], [ 'is_safe' => [ 'html' ] ]),
            new \Twig_SimpleFunction( 'seconds', [ $this, 'dateToSeconds' ], [ 'is_safe' => [ 'html' ] ] ),
        ];
    }


    /**
     * List filters to use in TWIG.
     *
     * Function getFilters
     *
     * @return array
     */
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter( 'days', [ $this, 'dateToDays' ], [ 'is_safe' => [ 'html' ] ]),
            new \Twig_SimpleFilter( 'hours', [ $this, 'dateToHours' ], [ 'is_safe' => [ 'html' ] ]),
            new \Twig_SimpleFilter( 'minutes', [ $this, 'dateToMinutes' ], [ 'is_safe' => [ 'html' ] ]),
            new \Twig_SimpleFilter( 'seconds', [ $this, 'dateToSeconds' ], [ 'is_safe' => [ 'html' ] ]),
        ];
    }


    /**
     * Count number days between to date. If endDate is NULL the default value is now
     *
     * @param      $startDate
     * @param null $endDate
     *
     * @return float|int
     */
    public function dateToDays( $startDate, $endDate = NULL )
    {
        if ( $endDate != NULL ) {
            $end = date_format( $endDate, 'Y-m-d H:i:s' );
        }
        else {
            $end = date( 'Y-m-d H:i:s' );
        }

        $start     = date_format( $startDate, 'Y-m-d H:i:s' );
        $datetime1 = strtotime( $start );
        $datetime2 = strtotime( $end );

        $secs = $datetime2 - $datetime1;// == return sec in difference
        $days = $secs / 86400;

        return $days;
    }


    /**
     * Count hours between to date. If endDate is NULL the default value is now
     *
     * @param      $startDate
     * @param null $endDate
     *
     * @return float|int
     */
    public function dateToHours( $startDate, $endDate = NULL )
    {
        if ( $endDate != NULL ) {
            $end = date_format( $endDate, 'Y-m-d H:i:s' );
        }
        else {
            $end = date( 'Y-m-d H:i:s' );
        }

        $start     = date_format( $startDate, 'Y-m-d H:i:s' );
        $datetime1 = strtotime( $start );
        $datetime2 = strtotime( $end );

        $secs = $datetime2 - $datetime1;// == return sec in difference
        $hour = $secs / 3600;

        return $hour;
    }

    /**
     * Count number minutes between to date. If endDate is NULL the default value is now
     *
     * @param      $startDate
     * @param null $endDate
     *
     * @return float|int
     */
    public function dateToMinutes( $startDate, $endDate = NULL )
    {
        if ( $endDate != NULL ) {
            $end = date_format( $endDate, 'Y-m-d H:i:s' );
        }
        else {
            $end = date( 'Y-m-d H:i:s' );
        }

        $start     = date_format( $startDate, 'Y-m-d H:i:s' );
        $datetime1 = strtotime( $start );
        $datetime2 = strtotime( $end );

        $secs = $datetime2 - $datetime1;// == return sec in difference
        $min = $secs / 60;

        return $min;
    }


    /**
     * Count number seconds between to date. If endDate is NULL the default value is now
     *
     * @param      $startDate
     * @param null $endDate
     *
     * @return float|int
     */
    public function dateToSeconds( $startDate, $endDate = NULL )
    {
        if ( $endDate != NULL ) {
            $end = date_format( $endDate, 'Y-m-d H:i:s' );
        }
        else {
            $end = date( 'Y-m-d H:i:s' );
        }

        $start     = date_format( $startDate, 'Y-m-d H:i:s' );
        $datetime1 = strtotime( $start );
        $datetime2 = strtotime( $end );

        $secs = $datetime2 - $datetime1;// == return sec in difference

        return $secs;
    }

}