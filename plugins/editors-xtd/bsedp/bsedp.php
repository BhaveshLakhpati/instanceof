<?php
/*
# -------------------------------------------------------------------------------------
# plg_bsedp : Editor button plugin for easy inserting BS3 Grid definitions
# -------------------------------------------------------------------------------------
# author    eXtro-media GbR
# copyright Copyright (C) 2015. All Rights Reserved
# license   GNU/GPL Version 3 or later - http://www.gnu.org/licenses/gpl-3.0.html
# website   www.eXtro-media.de
# technical support https://www.eXtro-media.de
# -------------------------------------------------------------------------------------
*/

defined('_JEXEC') or die;


class PlgButtonBsedp extends JPlugin
{

	protected $autoloadLanguage = true;


	public function onDisplay($name)
	{

		$compat = $this->params->get('compatmode', 0);
		$css = '.icon-bsedp-add:before { content:  "\59"; color: #93c64d; }';
		$js = "
		/*
		function jSelectBsedp()
		{
			var evt = document.iframe[0].document.getElementById('bsedptype').value;
			var tag = '{vembed =' + evt + '}'; 
			jInsertEditorText(tag, '" . $name . "');
			SqueezeBox.close();
		}
		*/
		function jSelectBsedpCancel()
		{
			SqueezeBox.close();
		}
		";

		$doc = JFactory::getDocument();
		$doc->addScriptDeclaration($js);
		$doc->addStyleDeclaration($css);

		JHtml::_('behavior.modal');
		
		$lang = JFactory::getLanguage();


		$link = '../plugins/editors-xtd/bsedp/dialog.php?ih_name='.$name.'&amp;' . JSession::getFormToken() . '=1&amp;lang=' . $lang->getTag().'&amp;cm='.$compat;

		$button = new JObject;
		$button->modal = true;
		$button->class = 'btn';
		$button->link = $link;
		$button->text = JText::_('PLG_BSEDP_ADDROW');
		$button->name = 'bsedp-add';
		$button->options = "{handler: 'iframe', size: {x: 800, y: 500}}";
		
		return $button;
	}
}
