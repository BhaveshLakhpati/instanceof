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

    define( '_JEXEC', 1 );
    define( 'DS', DIRECTORY_SEPARATOR );
    define( 'JPATH_BASE', realpath( '..'.DS.'..'.DS.'..'.DS ) );    
    require_once ( JPATH_BASE.DS.'includes'.DS.'defines.php' );
    require_once ( JPATH_BASE.DS.'includes'.DS.'framework.php' );
 
    $mainframe = JFactory::getApplication('administrator');        
    jimport( 'joomla.plugin.plugin' );
    
 
    $jinput = JFactory::getApplication()->input;
    $ih_name = $jinput->get('ih_name', '', 'string');
    $cm = $jinput->get('cm', '', 'int');
    
    $lang = JFactory::getLanguage();
    $extension = 'plg_bsedp';
    $base_dir = JPATH_BASE.'/administrator';
    $language_tag = $jinput->get('lang', 'en-GB', 'string');
    $lang->load($extension, $base_dir, $language_tag, true);
    
    $sp3 = 'col-sm-3'; $sp4 = 'col-sm-4'; $sp6 = 'col-sm-6'; $sp8 = 'col-sm-8'; $sp12 = 'col-xs-12'; $row = '';
    if($cm == 1) { $sp3 = 'span3'; $sp4 = 'span4'; $sp6 = 'span6'; $sp8 = 'span8'; $sp12 = 'span12'; $row = '-fluid'; }

?>
<html>
    <head>
    <title><?php echo JText::_('PLG_BSEDP_TITLE'); ?></title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link rel="stylesheet" href="../../../administrator/templates/isis/css/template.css?c5cf25cab274b47fd9fbab11e32fb9e7" type="text/css" />
    <script type="text/javascript">
 

        
        function insertTag() {
        	if (window.parent) {
        		var typ = document.getElementById('bsedptype').value;
        		var einf = '';

        	  if (typ == 1)
        	  {
        	    einf = '<div class="row<?php echo $row; ?>">\n\t<div class="<?php echo $sp12; ?>"><?php echo JText::_("PLG_BSEDP_R1_DESC1"); ?></div>\n</div>\n<p>&nbsp;</p>\n';
        	  } else if (typ == 2)
        	  {
        	  	einf = '<div class="row<?php echo $row; ?>">\n\t<div class="<?php echo $sp6; ?>"><?php echo JText::_("PLG_BSEDP_R2_DESC1"); ?></div>\n\t<div class="<?php echo $sp6; ?>"><?php echo JText::_("PLG_BSEDP_R2_DESC2"); ?></div>\n</div>\n<p>&nbsp;</p>\n';
        	  } else if (typ == 3)
        	  {
        	  	einf = '<div class="row<?php echo $row; ?>">\n\t<div class="<?php echo $sp8; ?>"><?php echo JText::_("PLG_BSEDP_R3_DESC1"); ?></div>\n\t<div class="<?php echo $sp4; ?>"><?php echo JText::_("PLG_BSEDP_R3_DESC2"); ?></div>\n</div>\n<p>&nbsp;</p>\n';
        	  } else if (typ == 4)
        	  {
        	  	einf = '<div class="row<?php echo $row; ?>">\n\t<div class="<?php echo $sp4; ?>"><?php echo JText::_("PLG_BSEDP_R4_DESC1"); ?></div>\n\t<div class="<?php echo $sp8; ?>"><?php echo JText::_("PLG_BSEDP_R4_DESC2"); ?></div>\n</div>\n<p>&nbsp;</p>\n';
        	  } else if (typ == 5)
        	  {
        	  	einf = '<div class="row<?php echo $row; ?>">\n\t<div class="<?php echo $sp4; ?>"><?php echo JText::_("PLG_BSEDP_R5_DESC1"); ?></div>\n\t<div class="<?php echo $sp4; ?>"><?php echo JText::_("PLG_BSEDP_R5_DESC2"); ?></div>\n\t<div class="<?php echo $sp4; ?>"><?php echo JText::_("PLG_BSEDP_R5_DESC3"); ?></div>\n</div>\n<p>&nbsp;</p>\n';
        	  } else if (typ == 6)
        	  {
        	  	einf = '<div class="row<?php echo $row; ?>">\n\t<div class="<?php echo $sp3; ?>"><?php echo JText::_("PLG_BSEDP_R6_DESC1"); ?></div>\n\t<div class="<?php echo $sp3; ?>"><?php echo JText::_("PLG_BSEDP_R6_DESC2"); ?></div>\n\t<div class="<?php echo $sp3; ?>"><?php echo JText::_("PLG_BSEDP_R6_DESC3"); ?></div>\n\t<div class="<?php echo $sp3; ?>"><?php echo JText::_("PLG_BSEDP_R6_DESC4"); ?></div>\n</div>\n<p>&nbsp;</p>\n';
        	  }

            window.parent.jInsertEditorText( einf , '<?php echo $ih_name; ?>'); window.parent.jSelectBsedpCancel();
        	}
        }
        	
       
    </script>
    </head>

    <body>
    
    <form class="form-horizontal" name="bsedpform" id="bsedpform" onSubmit="return false;">
    <div class="container-fluid">
     <div class="row-fluid">
      <div class="span12">
       <h3><?php echo JText::_('PLG_BSEDP_TITLE'); ?></h3>
      </div>
     </div>

     <div class="row-fluid">
      <div class="span12"><hr /><br /></div>
     </div>

     <div class="row-fluid">
      <div class="span4">
      <?php echo JText::_('PLG_BSEDP_TYPE'); ?>
      </div>
      <div class="span8">
        <select name="bsedptype" id="bsedptype" class="input-block-level">          
          <option value="1"><?php echo JText::_('PLG_BSEDP_R1'); ?></option>
          <option value="2"><?php echo JText::_('PLG_BSEDP_R2'); ?></option>
          <option value="3"><?php echo JText::_('PLG_BSEDP_R3'); ?></option>
          <option value="4"><?php echo JText::_('PLG_BSEDP_R4'); ?></option>
          <option value="5"><?php echo JText::_('PLG_BSEDP_R5'); ?></option>
          <option value="6"><?php echo JText::_('PLG_BSEDP_R6'); ?></option>
        </select>
      </div>
     </div>
     
     <div class="row-fluid">
      <div class="span12"><br /></div>
     </div>
     
     <div class="row-fluid">
      <div class="span4">

      </div>
      <div class="span6">
      <a href="javascript:void(0)" onclick="javascript:insertTag();"  class="btn btn-success"><?php echo JText::_('PLG_BSEDP_LOS'); ?></a>
      </div>
     </div>


    </div>
    </form>

    </body>
</html>