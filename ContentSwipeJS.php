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


class ContentSwipeJS extends ContentElement
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_swipejs';


	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### SWIPEJS SLIDER ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = $this->Environment->script.'?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}

		$this->swipeImages = deserialize($this->swipeImages);

		if (!is_array($this->swipeImages) || count($this->swipeImages) == 0)
		{
			return '';
		}

		return parent::generate();
	}


	protected function compile()
	{
		$arrImages = array();
		$arrSize = deserialize($this->size, true);

		foreach ($this->swipeImages as $arrImage)
		{
			if ($arrImage['singleSRC'] == '' || !is_file(TL_ROOT .'/'. $arrImage['singleSRC']))
			{
				continue;
			}

			$strImage = $this->getImage($arrImage['singleSRC'], $arrSize[0], $arrSize[1], $arrSize[2]);
			$imgSize = getimagesize(TL_ROOT . '/' . $strImage);

			$arrImages[] = array
			(
				'hasLink'		=> ($arrImage['href'] != ''),
				'href'			=> ($arrImage['href'] == '' ? $arrImage['singleSRC'] : $arrImage['href']),
				'title'			=> specialchars($arrImage['title']),
				'src'			=> $strImage,
				'alt'			=> specialchars($arrImage['title']),
				'size'			=> $imgSize[3],
			);
		}

		$this->Template->images = $arrImages;
	}
}

