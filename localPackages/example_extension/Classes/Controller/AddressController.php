<?php

namespace Workshop\ExampleExtension\Controller;

/*
 * Copyright (C) 2018 Daniel Siepmann <coding@daniel-siepmann.de>
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301, USA.
 */

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
use Workshop\ExampleExtension\Domain\Model\Address;
use Workshop\ExampleExtension\Domain\Repository\AddressRepository;

class AddressController extends ActionController
{
    /**
     * @var AddressRepository
     */
    protected $addressRepository;

    public function __construct(AddressRepository $addressRepository)
    {
        $this->addressRepository = $addressRepository;
    }

    public function indexAction()
    {
        $this->view->assign('addresses', $this->addressRepository->findAll());
    }

    /**
     * @ignorevalidation $address
     */
    public function editAction(Address $address)
    {
        $this->view->assign('address', $address);
    }

    public function updateAction(Address $address)
    {
        $this->addressRepository->update($address);

        $this->signalSlotDispatcher->dispatch(__CLASS__, 'addressUpdated', [
            $address,
            $this,
        ]);

        $this->redirect('index');
    }
}
