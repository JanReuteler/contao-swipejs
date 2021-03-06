-- **********************************************************
-- *                                                        *
-- * IMPORTANT NOTE                                         *
-- *                                                        *
-- * Do not import this file manually but use the TYPOlight *
-- * install tool to create and maintain database tables!   *
-- *                                                        *
-- **********************************************************

--
-- Table `tl_content`
--

CREATE TABLE `tl_content` (
  `swipeImages` blob NULL,
  `swipeSpeed` int(6) unsigned NOT NULL default '300',
  `swipeAuto` int(6) unsigned NOT NULL default '0',
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

