<?php
// $HeadURL: https://joomgallery.org/svn/joomgallery/JG-3/Plugins/JoomEditorBu/trunk/joombu.php $
// $Id: joombu.php 4317 2013-08-04 23:21:38Z chraneco $
/******************************************************************************\
**   JoomGallery Editor Button Plugin 'JoomBu' 3.2                            **
**   By: JoomGallery::ProjectTeam                                             **
**   Copyright (C) 2011 - 2013 JoomGallery::ProjectTeam                       **
**   Released under GNU GPL Public License                                    **
**   License: http://www.gnu.org/copyleft/gpl.html                            **
\******************************************************************************/
/** ### Original Copyright: ###
 * @copyright Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
 * @license   GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.plugin.plugin');

/**
 * Editor Image buton
 *
 * @package Editors-xtd
 * @since 1.5
 */
class plgButtonJoomBu extends JPlugin
{
  /**
   * Affects constructor behavior. If true, language files will be loaded automatically.
   *
   * @var    boolean
   * @since  3.2
   */
  protected $autoloadLanguage = true;

  /**
   * Displays the button
   *
   * @access  public
   * @param   string  $name The name of the element
   * @return  object  A button object
   * @since   1.5.0
   */
  function onDisplay($name)
  {
    // Create a new button object
    $button = new JObject();
    $button->set('text', JText::_('PLG_JOOMBU_LABEL'));
    $button->set('name', 'picture');
    $button->set('class', 'btn');

    // Task of the button
    if($this->params->get('extended', 1))
    {
      $link = 'index.php?option=com_joomgallery&amp;view=mini&amp;format=raw&amp;e_name='.$name.'&amp;catid=0&amp;extended=1';
      $button->set('link', $link);

      JHtml::_('behavior.modal');
      $button->set('modal', true);
      $button->set('options', "{handler: 'iframe', size: {x: 620, y: 550}}");// width:620
    }
    else
    {
      // Deprecated: This form of inserted images will most probably
      // be removed in the next major version of the plugin
      $doc = JFactory::getDocument();

      $script = "
      function insertJoomPlu(editor) {
        jInsertEditorText('{joomplu:}', editor);
      }
      ";
      $doc->addScriptDeclaration($script);
      $button->set('onclick', 'insertJoomPlu(\''.$name.'\');return false;');
      $button->set('link', '#');
    }

    return $button;
  }
}