<?php
/**
 * @file
 * Contains \Drupal\coding_test_ts\Form\SumForm.
 */
// Define namespaces
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
  // Define the function to build the form
  public function buildForm(array $form, FormStateInterface $form_state) {
    // Define the render array for the form 
    $form['form_title'] = array(
    '#markup' => '<div>Enter two numbers into the form, hit Add Numbers to add them up.</div>',
    // Attach the library that includes my JS and CSS, plus jQuery
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
  // Define the form validation function
  public function validateForm(array &$form, FormStateInterface $form_state) {
    // Check that both field inputs are numeric (they're both required), set errors as needed
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
  // Define the function to submit the form
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Get the values from both fields
    $num1 = $form_state->getValue('first_number');
    $num2 = $form_state->getValue('second_number');
    $sum = $num1 + $num2;  // Add them
    $sum = round($sum, 3);  // Round to 3 digits so they look reasonable
    // Display full inputs and rounded output
    $message = 'You entered ' . $num1 . ' + ' . $num2 . '.  ';
    $message .= 'The answer is ' . $sum;
    drupal_set_message($message);
  }
}
?>