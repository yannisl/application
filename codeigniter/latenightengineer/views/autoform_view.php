<?
echo '<html><head><title="Test form">';
echo '<style type="text/css">dl{line-height: 28px;}dt{float: left;width: 125px;padding-right: 10px;}</style>';
echo '</head><body>';

// Open form
echo form_open_multipart($this->uri->uri_string(), array('class' => 'form'));

echo '<dl>';

// Echo hidden fields
echo $form->getValidationErrors();
foreach ($form->form['hidden'] as $element) {
    echo $element['input'];
}

// Echo visible fields
foreach ($form->form['visible'] as $element) {
    echo '<dt>' . $element['label'] . '</dt>';
    echo '<dd>' . $element['prepend'] . $element['input'] . $element['append'] . $element['error'] . '</dd>';
}

echo '</dl>';

// Close form
echo form_close();

echo '<body></html>';
?>