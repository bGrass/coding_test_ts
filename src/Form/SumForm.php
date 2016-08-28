<?php
/**
 * @file
 * Contains \Drupal\coding_test_ts\Form\SumForm.
 */

namespace Drupal\coding_test_ts\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\UrlHelper;

/**
 * Contribute form.
 */
class SumForm extends FormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
  	return 'coding_test_ts_sum_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['form_title'] = array(
    '#markup' => '<p>Enter two numbers into the form, hit submit to add them up.</p>'
    );
    $form['first_number'] = array(
      '#type' => 'textfield',
      '#title' => t('First Number:'),
      '#required' => TRUE,
    );
    $form['second_number'] = array(
      '#type' => 'textfield',
      '#title' => t('Second Number:'),
      '#required' => TRUE,
    );
    return $form;
 
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
  }
}
?>