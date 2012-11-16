<?php

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2012 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  terminal42 gmbh 2012
 * @author     Andreas Schempp <andreas.schempp@terminal42.ch>
 * @license    http://opensource.org/licenses/lgpl-3.0.html
 */


$this->loadDataContainer('tl_style');


/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['swipejs'] = '{type_legend},type,headline;{image_legend},swipeImages,size,fullsize,swipeSpeed,swipeAuto;{protected_legend:hide},protected;{expert_legend:hide},guests,start,stop,cssID,space';


/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['swipeImages'] = array
(
	'label'			=> &$GLOBALS['TL_LANG']['tl_content']['swipeImages'],
	'exclude'		=> true,
	'inputType'		=> 'multiColumnWizard',
	'eval'			=> array
	(
		'columnFields' => array
		(
			'singleSRC' => array
			(
				'label'		=> &$GLOBALS['TL_LANG']['tl_content']['swipeImages']['singleSRC'],
				'inputType'	=> 'text',
				'eval'		=> array('mandatory'=>true, 'rgxp'=>'url', 'class'=>'tl_text_2'),
				'wizard' => array
				(
					array('tl_style', 'filePicker')
				)
			),
			'title' => array
			(
				'label'		=> &$GLOBALS['TL_LANG']['tl_content']['swipeImages']['title'],
				'inputType'	=> 'text',
				'eval'		=> array('style'=>'width:220px'),
			),
			'href' => array
			(
				'label'		=> &$GLOBALS['TL_LANG']['tl_content']['swipeImages']['href'],
				'inputType'	=> 'text',
				'eval'		=> array('rgxp'=>'url', 'class'=>'tl_text_2'),
				'wizard' => array
				(
					array('tl_content', 'pagePicker')
				)
			),
		),
	),
);

$GLOBALS['TL_DCA']['tl_content']['fields']['swipeSpeed'] = array
(
	'label'			=> &$GLOBALS['TL_LANG']['tl_content']['swipeSpeed'],
	'exclude'		=> true,
	'inputType'		=> 'text',
	'eval'			=> array('mandatory'=>true, 'rgxp'=>'digit', 'tl_class'=>'clr w50'),
);

$GLOBALS['TL_DCA']['tl_content']['fields']['swipeAuto'] = array
(
	'label'			=> &$GLOBALS['TL_LANG']['tl_content']['swipeAuto'],
	'exclude'		=> true,
	'inputType'		=> 'text',
	'eval'			=> array('mandatory'=>true, 'rgxp'=>'digit', 'tl_class'=>'w50'),
);
