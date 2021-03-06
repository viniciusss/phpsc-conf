<?php
namespace PHPSC\Conference\Application\Action;

use \Lcobucci\ActionMapper2\Routing\Annotation\Route;
use \Lcobucci\ActionMapper2\Routing\Controller;
use \PHPSC\Conference\UI\Pages\Index;
use \PHPSC\Conference\UI\Pages\About;
use \PHPSC\Conference\UI\Pages\Venue;
use \PHPSC\Conference\UI\Main;

class Home extends Controller
{
    /**
     * @Route
     */
    public function displayHome()
    {
        return Main::create(new Index(), $this->application);
    }

    /**
     * @Route("/about")
     */
    public function displayAbout()
    {
        return Main::create(new About(), $this->application);
    }

    /**
     * @Route("/venue")
     */
    public function displayVenue()
    {
        return Main::create(
            new Venue($this->getEventManagement()->findCurrentEvent()),
            $this->application
        );
    }

    /**
     * @return \PHPSC\Conference\Domain\Service\EventManagementService
     */
    protected function getEventManagement()
    {
        return $this->get('event.management.service');
    }
}
