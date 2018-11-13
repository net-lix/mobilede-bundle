<?php
/**
 * mobilede for Contao Open Source CMS
 *
 * Copyright (C) 2018 pdir / digital agentur <develop@pdir.de>
 *
 * @package    mobilede
 * @link       https://pdir.de/mobilede
 * @license    pdir license - All-rights-reserved - commercial extension
 * @author     pdir GmbH <develop@pdir.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pdir\MobileDeBundle\DataContainer;

use Contao\DataContainer;
use Doctrine\ORM\EntityManager;
use Pdir\MobileDeBundle\Service\AdService;
use Xuad\MobileDeBundle\Service\StringUtilService;

class AdDataContainer
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var AdService
     */
    private $adService;

    /**
     * Constructor.
     *
     * @param \Doctrine\ORM\EntityManager $entityManager
     * @param \Pdir\MobileDeBundle\Service\AdService $adService
     */
    public function __construct(EntityManager $entityManager, AdService $adService)
    {
        $this->entityManager = $entityManager;
        $this->adService = $adService;
    }

    /**
     * Generate alias
     *
     * @param $varValue
     * @param \Contao\DataContainer $dc
     *
     * @return mixed
     * @throws \Exception
     */
    public function generateAlias($varValue, DataContainer $dc)
    {
        $autoAlias = false;

        if ($varValue === '')
        {
            $autoAlias = true;

            $varValue = \StringUtil::generateAlias($dc->activeRecord->brand . '-' . $dc->activeRecord->name);
        }

        $ads = $this->adService->findByAlias($varValue);

        // Check whether the news alias exists
        if (count($ads) > 1 && $autoAlias === false)
        {
            throw new \Exception(sprintf($GLOBALS['TL_LANG']['ERR']['aliasExists'], $varValue));
        }

        // Add ID to alias
        if (count($ads) > 0 && $autoAlias === true)
        {
            $varValue .= '-' . $dc->id;
        }

        return $varValue;
    }
}
