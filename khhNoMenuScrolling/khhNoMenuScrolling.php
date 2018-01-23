<?php

namespace khhNoMenuScrolling;

use Shopware\Components\Plugin;
use Enlight_Event_EventArgs;
use Shopware\Components\Theme\LessDefinition;
use Doctrine\Common\Collections\ArrayCollection;

class khhNoMenuScrolling extends Plugin
{
	/**
     * subscribe events
     *
     * @return array
     */
    public static function getSubscribedEvents()
    {
    	return [
    		'Theme_Compiler_Collect_Plugin_Less' 		   => 'addLessFiles',
            'Theme_Compiler_Collect_Plugin_Javascript' 	   => 'addJsFiles'
    	];
    } // end getSubscribedEvents()

    /**
     * add custom less files to compiler
     *
     * @param Enlight_Event_EventArgs   $args
     * @return array
     */
    public function addLessFiles(Enlight_Event_EventArgs $args)
    {
    	$addLessFiles = array(
    		__DIR__.'/Resources/views/frontend/_public/src/less/khhNoMenuScrolling.less'
    	);

    	$less = new LessDefinition([], $addLessFiles);
    	return new ArrayCollection([$less]);
    } // end addLessFiles()

    /**
     * add js files
     *
     * @param Enlight_Event_EventArgs  $args
     *
     * @return ArrayCollection
     */
    public function addJsFiles(Enlight_Event_EventArgs $args)
    {
		$jsFiles = [
			__DIR__.'/Resources/views/frontend/_public/src/js/khhNoMenuScrolling.js'
		];

        return new ArrayCollection($jsFiles);
    } // end addJsFiles()
}

?>