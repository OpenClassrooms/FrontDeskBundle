<?php

namespace OpenClassrooms\Bundle\FrontDeskBundle;

use OpenClassrooms\Bundle\FrontDeskBundle\DependencyInjection\OpenClassroomsFrontDeskExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * @author Killian Herbunot <killian.herbunot@openclassrooms.com>
 */
class OpenClassroomsFrontDeskBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function getContainerExtension()
    {
        return new OpenClassroomsFrontDeskExtension();
    }
}
