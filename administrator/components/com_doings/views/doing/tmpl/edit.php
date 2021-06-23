<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_doing
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

// Include the component HTML helpers.
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');

JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');

$app = JFactory::getApplication();
$assoc = JLanguageAssociations::isEnabled();

$document = JFactory::getDocument();
$document->addStyleSheet('components/com_doings/assets/css/doings.css');
$document->addScript('components/com_doings/assets/js/jquery.maskcpfcnpj.js');
$document->addScript('components/com_doings/assets/js/jquery.maskMoney.js');
$document->addScript('components/com_doings/assets/js/jquery.noty.packaged.min.js');
$document->addScript('components/com_doings/assets/js/jquery.inputmask.bundle.js');
$document->addScript('components/com_doings/assets/js/script.js');
?>
<script type="text/javascript">
    Joomla.submitbutton = function (task)
    {
        if (task == 'doing.cancel' || document.formvalidator.isValid(document.id('doing-form')))
        {
            Joomla.submitform(task, document.getElementById('doing-form'));
        }
    }
</script>
<form action="<?php echo JRoute::_('index.php?option=com_doings&layout=edit&id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="doing-form" class="form-validate">

    <?php echo JLayoutHelper::render('joomla.edit.title_alias', $this); ?>
    <div class="form-personalizado">
        <div class="form-horizontal">
            <?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'details')); ?>

            <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'details', empty($this->item->id) ? JText::_('COM_DOING_NEW_DOING', true) : JText::_('COM_DOING_EDIT_DOING', true)); ?>
            <div class="row-fluid">
                <div class="span12">
                    <div class="row-fluid form-horizontal-desktop">
                        <div class="span6">
                            <?php echo $this->form->renderField('icon'); ?>
                            <?php echo $this->form->renderField('image'); ?>
                            <?php echo $this->form->renderField('date_start'); ?>
                            <?php echo $this->form->renderField('hour_start'); ?>
                            <?php echo $this->form->renderField('date_end'); ?>
                            <?php echo $this->form->renderField('hour_end'); ?>
                            <?php echo $this->form->renderField('local'); ?>
                            <?php echo $this->form->renderField('address'); ?>
                            <?php echo $this->form->renderField('id_city'); ?>
                            <?php echo $this->form->renderField('contact'); ?>
                            <?php echo $this->form->renderField('subscription'); ?>
                            <?php echo $this->form->renderField('description'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo JHtml::_('bootstrap.endTab'); ?>



            <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'publishing', JText::_('JGLOBAL_FIELDSET_PUBLISHING', true)); ?>
            <div class="row-fluid form-horizontal-desktop">
                <div class="span6">
                    <?php echo JLayoutHelper::render('joomla.edit.publishingdata', $this); ?>
                </div>
                <div class="span6">
                    <?php echo JLayoutHelper::render('joomla.edit.global', $this); ?>
                    <?php echo JLayoutHelper::render('joomla.edit.metadata', $this); ?>
                </div>
            </div>
            <?php echo JHtml::_('bootstrap.endTab'); ?>



            <?php if ($assoc) : ?>
                <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'associations', JText::_('JGLOBAL_FIELDSET_ASSOCIATIONS', true)); ?>
                <?php echo $this->loadTemplate('associations'); ?>
                <?php echo JHtml::_('bootstrap.endTab'); ?>
            <?php endif; ?>

            <?php echo JHtml::_('bootstrap.endTabSet'); ?>
        </div>
    </div>
    <input type="hidden" name="task" value="" />
    <?php echo JHtml::_('form.token'); ?>
</form>