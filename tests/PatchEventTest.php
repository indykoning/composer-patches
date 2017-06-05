<?php
namespace Vaimo\ComposerPatches\Tests;

use Vaimo\ComposerPatches\PatchEvent as Model;

use Composer\Package\PackageInterface;
use Vaimo\ComposerPatches\PatchEvents;

class PatchEventTest extends \PHPUnit_Framework_TestCase
{
    public function patchEventDataProvider()
    {
        $package = $this->getMock('Composer\Package\PackageInterface');

        return array(
            array(PatchEvents::PRE_PATCH_APPLY, $package, 'https://www.drupal.org', 'A test patch'),
            array(PatchEvents::POST_PATCH_APPLY, $package, 'https://www.drupal.org', 'A test patch'),
        );
    }

    /**
     * @dataProvider patchEventDataProvider
     */
    public function testGetNameShouldReturnSpecifiedEventName(
        $eventName, PackageInterface $package, $url, $description
    ) {
        $model = new Model($eventName, $package, $url, $description);

        $this->assertEquals($eventName, $model->getName());
    }

    /**
     * @dataProvider patchEventDataProvider
     */
    public function testGetUrlShouldReturnSpecifiedUrl(
        $eventName, PackageInterface $package, $url, $description
    ) {
        $model = new Model($eventName, $package, $url, $description);

        $this->assertEquals($url, $model->getUrl());
    }

    /**
     * @dataProvider patchEventDataProvider
     */
    public function testGetDescriptionShouldReturnSpecifiedDescription(
        $eventName, PackageInterface $package, $url, $description
    ) {
        $model = new Model($eventName, $package, $url, $description);

        $this->assertEquals($description, $model->getDescription());
    }

    /**
     * @dataProvider patchEventDataProvider
     */
    public function testGetPackageReturnSpecifiedPackageInstance(
        $eventName, PackageInterface $package, $url, $description
    ) {
        $model = new Model($eventName, $package, $url, $description);

        $this->assertSame($package, $model->getPackage());
    }
}
