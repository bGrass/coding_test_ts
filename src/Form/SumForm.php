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
 * Sum form.
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
    '#markup' => '<div>Enter two numbers into the form, hit submit to add them up.</div>',
    '#attached' => [
      'library' => [
        'coding_test_ts/sum_form',
      ],
    ]
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
    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Add Numbers')
    );
    return $form;
 
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    if (!is_numeric($form_state->getValue('first_number'))) {
      $form_state->setErrorByName('first_number', $this->t('This entry is not a number.'));
    }
    if (!is_numeric($form_state->getValue('second_number'))) {
      $form_state->setErrorByName('second_number', $this->t('This entry is not a number.'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $num1 = $form_state->getValue('first_number');
    $num2 = $form_state->getValue('second_number');
    $sum = $num1 + $num2;
    $sum = round($sum, 3);
    $message = 'You entered ' . $num1 . ' + ' . $num2;
    $message .= 'The answer is ' . $sum;
    drupal_set_message($message);
  }
}
?>