<?php
/**
 * File TwigFunctionExtensionTest.php
 *
 * Created by Einste - Piotr J. Kober (c).
 * Date: 4/10/2017 Time: 10:20 PM
 */

namespace pjkober\datetimeintervalbundle\Tests\Twig;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use pjkober\datetimeintervalbundle\Twig\TwigFunctionExtension;

/**
 * Class TwigFunctionExtensionTest
 * Definition functions and filters to use in TWIG
 *
 * @package pjkober\datetimeintervalbundle\Twig
 *
 * @author  Piotr J. Kober
 */
class TwigFunctionExtensionTest extends \PHPUnit_Framework_TestCase
{

    /**
     *
     * Function testThatExtensionsExists
     */
    public function testThatExtensionsExists()
    {
        $extension = new TwigFunctionExtension();

        $this->assertEquals( 'pjkober\datetimeintervalbundle\Twig\TwigFunctionExtension',
            get_class( $extension ) );
    }


    /**
     * Function testDateToDays
     */
    public function testDateToDays()
    {
        $extension = new TwigFunctionExtension();

        $now  = new \DateTime();
        $past = new \DateTime();
        $past->sub( new \DateInterval( 'P10D' ) );

        $this->assertEquals( 10, $extension->dateToDays( $past ) );
        $this->assertEquals( -10, $extension->dateToDays( $now, $past ) );
        $this->assertEquals( 10, $extension->dateToDays( $past, $now ) );

        $this->assertEquals( 864000, $extension->dateToSeconds( $past ) );
        $this->assertEquals( -864000, $extension->dateToSeconds( $now, $past ) );
        $this->assertEquals( 864000, $extension->dateToSeconds( $past, $now ) );
    }


    /**
     * Function testDateToDaysFilters
     */
    public function testDateToDaysFilters()
    {
        if ( method_exists( '\Twig_Environment', 'createTemplate' ) ) { // twig > 2.0

            $twig = new \Twig_Environment( new \Twig_Loader_Array() );
            $twig->addExtension( new TwigFunctionExtension() );

            $past = new \DateTime();
            $past->sub( new \DateInterval( 'P1D' ) );

            // days
            $expected = 1;
            $template = $twig->createTemplate( '{{ body | days }}' );
            $this->assertEquals( $expected, $template->render( [ 'body' => $past ] ) );

            // hours
            $expected = 24;
            $template = $twig->createTemplate( '{{ body | hours }}' );
            $this->assertEquals( $expected, $template->render( [ 'body' => $past ] ) );


            // minutes
            $expected = 1440;
            $template = $twig->createTemplate( '{{ body | minutes }}' );
            $this->assertEquals( $expected, $template->render( [ 'body' => $past ] ) );

            // Seconds
            $expected = 86400;
            $template = $twig->createTemplate( '{{ body | seconds }}' );
            $this->assertEquals( $expected, $template->render( [ 'body' => $past ] ) );
        }

    }

}