<?php

namespace Workshop\ExampleExtension\Domain\Event;

/*
 * Copyright (C) 2019 Daniel Siepmann <coding@daniel-siepmann.de>
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

use TYPO3\CMS\Core\Mail\MailMessage;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
use Workshop\ExampleExtension\Controller\AddressController;
use Workshop\ExampleExtension\Domain\Model\Address as AddressModel;

class Address
{
    public function updated(AddressModel $address, AddressController $controller)
    {
        $this->sendUpdateEMail($address);
        $this->addUpdateFlashMessage($address, $controller);
    }

    private function sendUpdateEmail(AddressModel $address)
    {
        $mail = GeneralUtility::makeInstance(MailMessage::class);

        $mail->setSubject('Address ' . $address->getCompanyName() . ' was updated');
        $mail->setTo(array('coding@daniel-siepmann.de'));
        $mail->setBody('The address ' . $address->getCompanyName() . ' was successfully updated.');
        $mail->send();
    }

    private function addUpdateFlashMessage(AddressModel $address, AddressController $controller)
    {
        $controller->addFlashMessage(
            LocalizationUtility::translate('flashSuccess', 'ExampleExtension', [
                'companyName' => $address->getCompanyName(),
                'street' => $address->getStreet(),
            ]),
            'Update successfully'
        );
    }
}
