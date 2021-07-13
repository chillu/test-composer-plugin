<?php
namespace Chillu\TestComposerPlugin;

use Composer\Composer;
use Composer\Plugin\PluginInterface;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\Script\Event;
use Composer\IO\IOInterface;


class Plugin implements PluginInterface, EventSubscriberInterface
{

    /**
     * @var IOInterface
     */
    protected $io;

    /**
     * @var Composer
     */
    protected $composer;

    public static function getSubscribedEvents()
    {
        return array(
            'post-install-cmd' => 'fire',
            'post-update-cmd' => 'fire',
        );
    }

    public function activate(Composer $composer, IOInterface $io)
    {
        $this->io = $io;
    }

    public function deactivate(Composer $composer, IOInterface $io)
    {
        // no-op
    }

    public function uninstall(Composer $composer, IOInterface $io)
    {
        // no-op
    }

    public function fire(Event $event)
    {
        $this->io->write('Plugin fired: ' . $event->getName());
    }
}
